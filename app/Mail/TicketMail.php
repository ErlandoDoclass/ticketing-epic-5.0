<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tickets;
    public $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct($tickets, $pdf)
    {
        $this->tickets = $tickets;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Tiket Anda')
                    ->view('emails.ticket_pdf_multiple')
                    ->attachData($this->pdf->output(), 'tickets.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
