<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Anda</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .ticket-box { border: 2px solid #000; padding: 20px; margin: 20px; }
        img { width: 150px; height: 150px; }
    </style>
</head>
<body>
    <div class="ticket-box">
        <h2>{{ $ticket->event->name }}</h2>
        <p><b>Nama:</b> {{ $ticket->customer->name }}</p>
        <p><b>Kode Tiket:</b> {{ $ticket->ticket_code }}</p>
        <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code">
        <p>Gunakan kode QR ini untuk check-in.</p>
    </div>
</body>
</html>
