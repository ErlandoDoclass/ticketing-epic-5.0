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
    // Cari tiket berdasarkan kode tiket, dengan relasi customer dan event
    $ticket = Ticket::with(['customer', 'event'])->where('ticket_code', $request->ticket_code)->first();

    // Jika tiket tidak ditemukan
    if (!$ticket) {
        return back()->with('error', 'Data tiket tidak ditemukan');
    }

    // Jika tiket sudah digunakan untuk check-in
    if ($ticket->status == 1) {
        return back()->with('error', 'Tiket atas nama ' . $ticket->customer->name . ' sudah melakukan Check In');
    }

    // Perbarui status tiket ke checked-in
    $ticket->status = 1;
    $ticket->save();

    return redirect(route('admin.ticket.checkin'))->with('message', 'Check In atas nama ' . $ticket->customer->name . ' Berhasil');
}
}
