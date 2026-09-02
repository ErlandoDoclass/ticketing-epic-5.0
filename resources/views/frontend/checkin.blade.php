<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-in Tiket</title>
    
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- QR Code Scanner -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.7/html5-qrcode.min.js"></script>

    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }
        #reader { width: 300px; margin: auto; }
        .result { font-size: 18px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>

    <h2>Scan Tiket QR Code</h2>
    <div id="reader"></div>
    <p class="result" id="result"></p>

    <script>
        function onScanSuccess(qrCodeMessage) {
            document.getElementById('result').innerText = "🔄 Memverifikasi tiket...";

            // Kirim ke backend untuk validasi tiket
            fetch("{{ route('admin.ticket.checkin.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ ticket_code: qrCodeMessage })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Check-in Berhasil!',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    document.getElementById('result').innerText = data.message;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Check-in Gagal!',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    document.getElementById('result').innerText = data.message;
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: '⚠️ Tidak dapat memproses tiket!',
                    showConfirmButton: false,
                    timer: 2000
                });
                document.getElementById('result').innerText = "⚠️ Error saat memproses!";
            });
        }

        // Inisialisasi QR Scanner
        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 }
        );
        html5QrcodeScanner.render(onScanSuccess);
    </script>

</body>
</html>
