<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketMail;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FrontController extends Controller
{
    public function index()
    {
        $data = Event::orderBy('id', 'desc')->get();
        return view('frontend.index', compact('data'));
    }

    public function booking($id)
    {
        $data = Event::findOrFail($id);
        return view('frontend.booking', compact('data'));
    }

    public function bookingStore(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'birthdate' => 'required',
    ]);

    $customer = new Customer();
    $customer->name = $request->name;
    $customer->email = $request->email;
    $customer->address = $request->address;
    $customer->phone = $request->phone;
    $customer->birthdate = $request->birthdate;
    $customer->save();

    $order = new Order();
    $order->id_customer = $customer->id;
    $order->id_event = $request->id_event;
    $order->status = 'pending';
    $order->invoice = 'epic81-' . time() . '-' . Str::random(8);
    $order->quantity = $request->quantity; // pastikan kolom ini ada di tabel orders


    // Ambil harga asli dari event
    $event = Event::findOrFail($request->id_event);
    $originalPrice = intval($event->price); // Harga asli dari database

    // Tambahkan angka acak 3 digit
    $randomDigits = rand(100, 999);
    $finalPrice = ($originalPrice * $request->quantity) + $randomDigits;

    // Konfigurasi Midtrans
    \Midtrans\Config::$serverKey = config('midtrans.serverKey');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    $params = [
        'transaction_details' => [
            'order_id' => 'order-' . time() . '-' . Str::random(5),
            'gross_amount' => $finalPrice,
        ],
        'customer_details' => [
            'first_name' => $customer->name,
            'email' => $customer->email,
        ],
    ];

    $snapToken = \Midtrans\Snap::getSnapToken($params);
    $order->snap_token = $snapToken;
    $order->final_price = $finalPrice; // Simpan harga yang sudah ditambah angka acak
    $order->save();

    return redirect()->route('front.booking.payment', $order->id)
        ->with('message', "Sukses. Silakan lakukan pembayaran sebesar Rp " . number_format($finalPrice, 0, ',', '.'));
}


public function payment($id)
{
    $data = Order::with('customer', 'event')->findOrFail($id);

    // Pastikan final_price sudah ada di database
    if (!$data->final_price) {
        return redirect()->back()->with('error', 'Final price belum ditentukan.');
    }

    return view('frontend.payment', compact('data'));
}

public function searchTicketByEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $customer = Customer::where('email', $request->email)->first();

    if (!$customer) {
        return response()->json(['message' => 'Customer not found'], 404);
    }

    // Ambil semua tiket dari semua order customer
    $tickets = $customer->orders()->with('tickets')->get()->flatMap(function ($order) {
        return $order->tickets;
    });

    return response()->json([
        'email' => $customer->email,
        'total_tickets' => $tickets->count(),
        'ticket_codes' => $tickets->pluck('ticket_code')
    ]);
}


public function success(Request $request, $id)
{
    $order = Order::with('customer', 'event')->findOrFail($id);

    // Cegah pembuatan tiket ulang
    $existingTickets = Ticket::where('id_customer', $order->id_customer)
        ->where('id_event', $order->id_event)
        ->count();

    if ($existingTickets > 0) {
        return redirect(route('front.ticket', ['ticket_code' => Ticket::where('id_customer', $order->id_customer)->first()->ticket_code]))
            ->with('message', 'Tiket sudah dibuat sebelumnya! Silakan cek email Anda.');
    }

    // Cek status pembayaran
    if ($order->status !== 'success') {
        $order->status = 'success'; // Anggap sudah dibayar (atau sesuaikan dengan webhook Midtrans)
        $order->save();
    }

    // Tentukan jumlah tiket dari order (default 1 kalau belum pakai qty)
    $qty = $order->quantity ?? 1;

    // Buat tiket sesuai jumlah
    $tickets = [];
    for ($i = 0; $i < $qty; $i++) {
        $ticket = new Ticket();
        $ticket->ticket_code = Str::upper(Str::random(8));
        $ticket->id_customer = $order->id_customer;
        $ticket->id_event = $order->id_event;
        $ticket->status = 0;
        $ticket->save();

        $tickets[] = $ticket;
    }

    // Buat QR code untuk semua tiket
    $qrCodes = [];
foreach ($tickets as $ticket) {
    $qrCodes[$ticket->ticket_code] = base64_encode(
        QrCode::format('png')
              ->size(300)
              ->generate($ticket->ticket_code)
    );
}

    // Generate PDF semua tiket
    $pdf = Pdf::loadView('emails.ticket_pdf_multiple', compact('tickets', 'qrCodes'));

    // Kirim email (pakai data dari tiket pertama)
    Mail::to($order->customer->email)->send(new TicketMail($tickets, $pdf));

    // Redirect ke salah satu tiket
    return redirect(route('front.ticket', ['ticket_code' => $tickets[0]->ticket_code]))
        ->with('message', 'Tiket berhasil dibuat dan dikirim ke email.');
}




    public function paymentStore(Request $request)
    {
        $ticket = new Ticket();
        $ticket->ticket_code = Str::random(8);
        $ticket->id_customer = $request->id_customer;
        $ticket->id_event = $request->id_event;
        $ticket->status = 0;
        $ticket->save();

        return redirect(route('front.ticket', ['ticket_code' => $ticket->ticket_code]))
    ->with('message', 'Simpan nomor tiket untuk melakukan check-in.');
    }

    public function ticketDetail($ticket_code)
    {
        $firstTicket = Ticket::where('ticket_code', $ticket_code)->firstOrFail();
    
        // Ambil semua tiket milik customer untuk event yang sama
        $tickets = Ticket::where('id_customer', $firstTicket->id_customer)
                         ->where('id_event', $firstTicket->id_event)
                         ->get();
    
        // Buat QR code untuk semua tiket
        $qrCodes = [];
        foreach ($tickets as $ticket) {
            $qrCodes[$ticket->ticket_code] = base64_encode(
                QrCode::format('png')->size(300)->generate($ticket->ticket_code)
            );
        }
    
        return view('frontend.ticket', compact('tickets', 'qrCodes'));
    }

    public function ojanganteng()
    {
        return view('frontend.success');
    }
    

public function printAllTickets($id_customer, $id_event)
{
    $tickets = Ticket::where('id_customer', $id_customer)
                     ->where('id_event', $id_event)
                     ->with('event', 'customer')
                     ->get();

    // Buat QR Code untuk masing-masing tiket
    $qrCodes = [];
foreach ($tickets as $ticket) {
    $qrCodes[$ticket->id] = base64_encode(
        QrCode::format('png')
              ->size(300)
              ->generate($ticket->ticket_code)
    );
}


    // Ambil nama customer dari salah satu tiket (karena semua tiket punya customer yang sama)
    $customerName = $tickets->first()->customer->name ?? 'customer';

    $pdf = Pdf::loadView('frontend.pdf.ticket_multiple', [
        'tickets' => $tickets,
        'qrCodes' => $qrCodes,
    ]);

    $filename = 'E-TICKETS EKAPAKSICUP81 - ' . str_replace(' ', '_', strtolower($customerName)) . '.pdf';

    return $pdf->stream($filename);
}



public function printTiket(Request $request, $order)
{
    $ticket = Ticket::findOrFail($order);
    $tickets = collect([$ticket]); // bikin jadi collection biar bisa di-foreach
    $qrCodes = [
        $ticket->ticket_code => base64_encode(
            QrCode::format('png')->size(300)->generate($ticket->ticket_code)
        )
    ];

    if ($request->get('export') == 'pdf') {
        $pdf = Pdf::loadView('frontend.pdf.ticket', compact('tickets', 'qrCodes'));
        $filename = 'E-TICKET EKAPAKSICUP81 -' . str_replace(' ', '_', strtolower($ticket->customer->name)) . '.pdf';
        return $pdf->stream($filename);
    }

    return view('frontend.ticket', compact('tickets', 'qrCodes'));
}

}
