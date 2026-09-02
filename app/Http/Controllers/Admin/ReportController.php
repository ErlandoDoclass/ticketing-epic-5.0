<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;  // Import the Ticket model
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Eager load the correct relationships
        $tickets = Ticket::with(['customer', 'event', 'order'])->get();  // Corrected 'order'

        return view('report.index', compact('tickets'));
    }

    public function exportPDF()
    {
        // Eager load the correct relationships for PDF export
        $tickets = Ticket::with(['customer', 'event', 'order'])->get();  // Corrected 'order'

        // Generate PDF with the tickets data
        $pdf = Pdf::loadView('report.pdf', compact('tickets'));  // Pass the tickets to the PDF view

        return $pdf->download('laporan_tiket.pdf');  // Return the generated PDF for download
    }
}
