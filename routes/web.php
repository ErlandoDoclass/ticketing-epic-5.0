<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/booking/{id}', [FrontController::class, 'booking'])->name('front.booking');
Route::post('/booking/store', [FrontController::class, 'bookingStore'])->name('front.booking.store');
Route::get('/booking/payment/{id}', [FrontController::class, 'payment'])->name('front.booking.payment');
route::get('/sukses', [FrontController::class, 'ojanganteng']);

Route::get('/checkout/success/{transaction}', [FrontController::class, 'success'])->name('checkout.success');
Route::post('/booking/payment/store', [FrontController::class, 'paymentStore'])->name('front.payment.store');
Route::middleware('auth:sanctum')->group(function () {
});

Route::get('/ticket/{ticket_code}', [FrontController::class, 'ticketDetail'])->name('front.ticket');
Route::get('/ticket/{ticket_code}', [FrontController::class, 'ticketDetail'])->name('front.ticket');
Route::get('/ticket/print-all/{id_customer}/{id_event}', [FrontController::class, 'printAllTickets'])->name('ticket.print.all');
Route::get('/print/tiket/{id}', [FrontController::class, 'printTiket'])->name('print.ticket');
Route::get('/admin/ticket/send/{id}', [CustomerController::class, 'sendTicketEmail'])->name('admin.ticket.send');
Route::get('/search-ticket', [FrontController::class, 'searchTicketByEmail']);



Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin/concert', [EventController::class, 'index'])->name('admin.concert.index');
    Route::get('/admin/concert/create', [EventController::class, 'create'])->name('admin.concert.create');
    Route::post('/admin/concert/store', [EventController::class, 'store'])->name('admin.concert.store');
    Route::get('/admin/concert/destroy/{id}', [EventController::class, 'destroy'])->name('admin.concert.delete');
    Route::get('/admin/ticket', [CustomerController::class, 'index'])->name('admin.ticket.index');
    Route::get('/admin/ticket/checkin', [CustomerController::class, 'checkIn'])->name('admin.ticket.checkin');
    Route::post('/admin/ticket/store', [CustomerController::class, 'checkInStore'])->name('admin.ticket.checkin.store');
    
        Route::get('/report', [ReportController::class, 'index'])->name('admin.report');
        Route::get('/report/pdf', [ReportController::class, 'exportPDF'])->name('admin.report.pdf');

       
    
    Route::get('/checkin', function () {
        return view('frontend.checkin');
    })->name('front.checkin');
    
});
