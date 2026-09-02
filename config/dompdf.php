<?php
return [
    'show_warnings' => false,

    'default_paper_size' => 'a4',

    'default_font' => 'sans-serif',

    'dpi' => 96,  // Tingkatkan jika kualitas PDF buram

    'font_height_ratio' => 1.1,

    'remote_enabled' => true, // **WAJIB**: Izinkan gambar dari URL eksternal seperti QR Code
    'chroot' => realpath(base_path()), // Pastikan semua path bisa diakses

    'log_output_file' => storage_path('logs/dompdf.log'),

    'enable_php' => true, // Aktifkan jika ada script PHP dalam template
];
