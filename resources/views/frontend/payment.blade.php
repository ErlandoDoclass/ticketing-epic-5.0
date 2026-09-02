<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ekapaksicup81 - Pembayaran</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .checkout-header {
                background-color:#dfbc6f;
                padding: 0.6rem 1.5rem;
                box-shadow: 0.2rem 0.2rem 0.2rem rgba(120, 120, 120, 0.4);
            }
            .main-logo {
                width: 5rem;
            }
</style>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENTKEY') }}"></script>
</head>
<body>
<div class="checkout-header">
            <img src="https://ekapaksicup81.com/EPIC.webp" class="main-logo">
        </div>
    <section class="container mt-4">
        <h1>Pembayaran</h1>
        
        <div class="alert alert-info text-justify">
            Setelah melakukan pembayaran, jika tidak ada perubahan data, silahkan coba refresh kembali halaman ini. 
            Apabila masih tidak ada perubahan data atau mengalami kendala lainnya, silahkan hubungi developer untuk 
            dapat dikirimkan link konfirmasi pembayaran melalui email.
        </div>
        
        <div class="row">
            <div class="col-lg-12 mt-4">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif 
                
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $data->event->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="p-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id_customer" value="{{ $data->customer->id }}" />
                                    <input type="hidden" name="id_event" value="{{ $data->event->id }}" />
                                    
                                    <p><strong>Nama Pemesan:</strong> {{ $data->customer->name }}</p>
                                    <p><strong>Jumlah Dibayar:</strong> Rp. {{ number_format($data->final_price, 0, ',', '.') }}</p>
                                    <p><strong>Tanggal:</strong> {{ $data->created_at }}</p>
                                    <p><strong>Invoice:</strong> {{ $data->invoice }}</p>
                                    <hr />
                                    
                                    <button type="submit" class="btn btn-primary" id="pay-button">
                                        Konfirmasi Pembayaran
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Cara Pembayaran</h4>
                        <p>Silahkan lakukan pembayaran sejumlah <b>{{ number_format($data->final_price,0,',','.') }},-</b></p>
                        <p>Pembayaran dapat dilakukan dengan metode:</p>
                        <ul>
                            <li>Transfer Bank (Virtual Account: Mandiri, BCA, BNI, BRI, dll)</li>
                            <li>QRIS</li>
                        </ul>
                        <p>Perhatikan Batas Waktu Pembayaran sesuai metoda pembayaran Anda:</p>
                        <ul>
                            <li>QRIS, GoPay / GoPay Later: 15 menit</li>
                            <li>Transfer Bank (Virtual Account): 24 jam</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script type="text/javascript">
        document.getElementById("pay-button").onclick = function () {
            event.preventDefault();
            snap.pay("{{ $data->snap_token }}", {
                onSuccess: function (result) {
                    window.location.href = "{{ route('checkout.success', $data->id) }}";
                },
                onPending: function (result) {
                    document.getElementById("result-json").innerHTML += JSON.stringify(result, null, 2);
                },
                onError: function (result) {
                    console.log(result);
                    document.getElementById("result-json").innerHTML += JSON.stringify(result, null, 2);
                },
            });
        };
    </script>
</body>
</html>
