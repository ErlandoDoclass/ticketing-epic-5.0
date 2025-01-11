<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
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
Route::get('/checkout/success/{transaction}', [FrontController::class, 'success'])->name('checkout.success');
Route::post('/booking/payment/store', [FrontController::class, 'paymentStore'])->name('front.payment.store');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tickets', [TicketController::class, 'index']);
    Route::get('/tickets/{id}', [FrontController::class, 'show']);
});

Route::get('/ticket/{id}', [FrontController::class, 'ticketDetail'])->name('front.ticket');
Route::get('/print/tiket/{id}', [FrontController::class, 'printTiket'])->name('print.ticket');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin/concert', [EventController::class, 'index'])->name('admin.concert.index');
    Route::get('/admin/concert/create', [EventController::class, 'create'])->name('admin.concert.create');
    Route::post('/admin/concert/store', [EventController::class, 'store'])->name('admin.concert.store');
    Route::get('/admin/concert/destroy/{id}', [EventController::class, 'destroy'])->name('admin.concert.delete');
    Route::get('/admin/ticket', [CustomerController::class, 'index'])->name('admin.ticket.index');
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/checkin', [TicketController::class, 'checkIn'])->name('tickets.checkin'); 
    Route::get('/admin/ticket/checkin', [CustomerController::class, 'checkIn'])->name('admin.ticket.checkin');
    Route::post('/admin/ticket/store', [CustomerController::class, 'checkInStore'])->name('admin.ticket.checkin.store');
});
