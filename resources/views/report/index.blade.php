@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-3">Laporan Tiket</h2>
    
    <a href="{{ route('admin.report.pdf') }}" class="btn btn-danger mb-3">Download PDF</a>
    
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nama Pemesan</th>
                <th>Harga</th>
                <th>Status Check-in</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $key => $ticket)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $ticket->customer->name }}</td>
                <td>Rp. {{ number_format($ticket->final_price,0,',','.') }},-</td> <!-- Menampilkan harga -->
                <td>{{ $ticket->status == 0 ? 'Belum Check In' : 'Sudah Check In' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
