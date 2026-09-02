<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Ticket::with('customer', 'event')->orderBy('id', 'desc')->get();
    return view('ticket.index', compact('data'));
    }
    

    public function checkIn()
    {
        //$ticket = Ticket::with('customer','concert')->where('ticket_code', $request->ticket_code)->first();
        return view('ticket.checkin');
    }

    public function checkInStore(Request $request)
{
    $ticket = Ticket::with(['customer', 'event'])->where('ticket_code', $request->ticket_code)->first();

    if (!$ticket) {
        return response()->json(['success' => false, 'message' => '❌ Data tiket tidak ditemukan!'], 404);
    }

    if ($ticket->status == 1) {
        return response()->json(['success' => false, 'message' => '⚠️ Tiket atas nama ' . $ticket->customer->name . ' sudah digunakan!'], 400);
    }

    $ticket->status = 1;
    $ticket->save();

    return response()->json(['success' => true, 'message' => '✅ Check-in berhasil untuk ' . $ticket->customer->name . '!']);
}

}
