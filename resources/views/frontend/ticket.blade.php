<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Ticket Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 960px;
            background-color: #fff;
            border-radius: 16px;
            padding: 40px;
            margin: auto;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .alert-info {
            background-color: #dfbc6f;
            border: none;
            color: #222;
            font-weight: 600;
            text-align: center;
        }

        .ticket-card {
            background-image: url("/assets/home/ticket2.png");
            background-size: cover;
            background-position: center;
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            position: relative;
            overflow: hidden;
        }

        .ticket-info {
            background-color: rgba(255,255,255,0.85);
            border-radius: 10px;
            padding: 25px;
        }

        .ticket-code {
            background-color: #dfbc6f;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            display: inline-block;
            border-radius: 6px;
            font-size: 18px;
            margin: 10px 0;
            letter-spacing: 1px;
        }

        .qr-code {
            display: block;
            margin: 20px auto 0 auto;
            max-width: 160px;
        }

        .footer {
            text-align: center;
            color: #999;
            font-size: 14px;
            margin-top: 40px;
        }

        .info-label {
            font-weight: 600;
            color: #444;
        }

        .info-value {
            color: #333;
        }

        hr {
            border-top: 1px dashed #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="title"><strong>E-Ticket EKA PAKSI STAGE 2025</strong> </h2>

        <div class="alert alert-info">
            📸 Jangan lupa discreenshot / disimpan!<br>
            📩 PDF E-Ticket bisa diunduh melalui link yang dikirim ke email.
        </div>

        @foreach ($tickets as $ticket)
            <div class="ticket-card">
                <div class="ticket-info">
                    <p><span class="info-label">Event:</span> <span class="info-value">{{ $ticket->event->name }}</span></p>
                    <p><span class="info-label">Nama:</span> <span class="info-value">{{ $ticket->customer->name }}</span></p>
                    <p><span class="info-label">Kode Tiket:</span> 
                        <span class="ticket-code">{{ $ticket->ticket_code }}</span>
                    </p>
                    <p><span class="info-label">Tanggal Event:</span> 
                        <span class="info-value">{{ \Carbon\Carbon::parse($ticket->event->start_time)->translatedFormat('d F Y H:i') }}</span>
                    </p>

                    @if(isset($qrCodes[$ticket->ticket_code]))
                        <img class="qr-code" src="data:image/png;base64,{{ $qrCodes[$ticket->ticket_code] }}" alt="QR Code">
                    @endif
                </div>
            </div>
        @endforeach

        <div class="footer">
            Terima kasih telah memesan tiket melalui <strong>EPIC</strong>.<br>Sampai jumpa di venue!
        </div>
    </div>

</body>
</html>
