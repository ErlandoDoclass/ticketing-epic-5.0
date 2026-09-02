<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Tiket</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; position: relative; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; page-break-inside: auto; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr { page-break-inside: avoid; }
        .page-break { page-break-after: always; }
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 50px;
            color: rgba(0, 0, 0, 0.1);
            z-index: -1;
        }
        .timestamp { margin-top: 10px; font-size: 14px; }
    </style>
</head>
<body>

    <h2>Laporan Tiket</h2>
    <div class="timestamp">Dicetak pada: {{ now()->format('d-m-Y H:i:s') }}</div>
    <div class="watermark">IT EPIC</div>

    @php $count = 0; @endphp
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pemesan</th>
                <th>Harga</th>
                <th>Status Check-in</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $key => $ticket)
            @if ($count % 50 == 0 && $count != 0) 
                </tbody>
            </table>
            <div class="page-break"></div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pemesan</th>
                        <th>Harga</th>
                        <th>Status Check-in</th>
                    </tr>
                </thead>
                <tbody>
            @endif
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $ticket->customer->name }}</td>
                    <td>Rp {{ number_format($tickets->order->final_price, 0, ',', '.') }}</td>
                    <td>{{ $ticket->status ? 'Sudah Check-in' : 'Belum Check-in' }}</td>
                </tr>
            @php $count++; @endphp
            @endforeach
        </tbody>
    </table>

</body>
</html>
