@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Booking Tiket</h5>
                    </div>
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Tiket</th>
                                    <th scope="col">Nama Konser</th>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">Status Tiket</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($data as $ticket)
                                    <tr>
                                        <th scope="row">{{ $no }}</th>
                                        <td>{{ $ticket->ticket_code }}</td>
                                        <td>{{ $ticket->event->name }}</td>
                                        <td>{{ $ticket->customer->name }}</td>
                                        <td>{{ $ticket->status == 0 ? 'Belum Check In' : 'Sudah Check In' }}</td>
                                    </tr>
                                    @php $no++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
