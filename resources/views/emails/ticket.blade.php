<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-TICKET EPIC81</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
            font-size: 16px;
        }
        .ticket-code {
            background: #007bff;
            color: white;
            padding: 10px;
            display: inline-block;
            border-radius: 5px;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .footer {
            margin-top: 15px;
            font-size: 14px;
            color: #aaa;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>E- Tiket</h2>
        <p>Halo EpicMates! <b>{{ $ticket->customer->name }}</b>!</p>
        <p>Jenis Ticket: <b>{{ $ticket->event->name }}</b></p>
        <p>Tanggal Event: <b>{{ $ticket->event->start_time }}</b>!</p>
        <p>Kode Tiket:</p>
        <div class="ticket-code">{{ $ticket->ticket_code }}</div>
        <p>Simpan Tiket dalam bentuk PDF telah dilampirkan.</p>
        <p class="footer"> Sampai Bertemu EpicMates! Terima kasih! <p>
    </div>

</body>
</html>
