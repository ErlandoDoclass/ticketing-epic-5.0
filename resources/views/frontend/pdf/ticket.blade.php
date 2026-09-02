<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>E-Ticket Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333333;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            color: #555555;
        }

        .ticket-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            text-align: left;
            background-image: url("/assets/home/ticket2.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .ticket-code {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            font-weight: bold;
            border-radius: 6px;
            margin: 10px 0;
            letter-spacing: 1px;
        }

        .qr-code {
            margin-top: 10px;
            width: 150px;
            height: 150px;
        }

        .ticket-content {
            position: relative;
            padding: 50px;
            z-index: 2; /* pastikan di atas background */
            color: #333;
}

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 13px;
            color: #999;
        }
    </style>
</head>
<body>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
         @endif @if(session()->has('message'))
        <div class="alert alert-success">
        {{ session()->get('message') }}
     </div>
    @endif
    <div class="container background">
        <h2><b>E-Ticket EKA PAKSI STAGE 2025</b></h2>
        <p><strong>Halo EpicMates!</strong></p>
        <p>Berikut adalah detail tiket Anda:</p>

        @foreach ($tickets as $ticket)
            <div class="ticket-card">
                <div class="ticket-content">
                    <p><strong>Event:</strong> {{ $ticket->event->name }}</p>
                    <p><strong>Nama:</strong> {{ $ticket->customer->name }}</p>
                    <p><strong>Kode Tiket:</strong> 
                    <span class="ticket-code">{{ $ticket->ticket_code }}</span>
                </p>
                    <p><strong>Tanggal Event:</strong> {{ \Carbon\Carbon::parse($ticket->event->start_time)->translatedFormat('d F Y H:i') }}</p>

                @if(isset($qrCodes[$ticket->ticket_code]))
                    <img class="qr-code" src="data:image/png;base64,{{ $qrCodes[$ticket->ticket_code] }}" alt="QR Code">
                @endif
                </div>

            </div>
         @endforeach

    </div>

        <div class="footer">
            Terima kasih telah memesan tiket melalui EPIC. Sampai jumpa di acara!
        </div>
    </div>
</body>
</html>
