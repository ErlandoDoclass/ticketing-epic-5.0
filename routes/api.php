<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Order;

Route::post('/midtrans/notification', function (Request $request) {
    Log::info('Midtrans Callback:', $request->all()); // Debugging log

    $serverKey = config('midtrans.serverKey');
    $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

    // Cek apakah signature key dari Midtrans valid
    if ($hashed !== $request->signature_key) {
        Log::error('Invalid Midtrans Signature');
        return response()->json(['message' => 'Invalid signature'], 403);
    }

    // Cari order berdasarkan invoice
    $order = Order::where('invoice', $request->order_id)->first();

    if (!$order) {
        Log::error('Order Not Found: ' . $request->order_id);
        return response()->json(['message' => 'Order not found'], 404);
    }

    // Update status order berdasarkan transaksi Midtrans
    if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
        $order->status = 'success';
    } elseif ($request->transaction_status == 'pending') {
        $order->status = 'pending';
    } elseif ($request->transaction_status == 'deny' || $request->transaction_status == 'expire' || $request->transaction_status == 'cancel') {
        $order->status = 'failed';
    }

    $order->save();
    Log::info('Order Updated: ' . $order->invoice . ' Status: ' . $order->status);

    return response()->json(['message' => 'Payment status updated']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
