<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecoveryCodeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $codigo;
    /**
     * Create a new message instance.
     */
    public function __construct($codigo)
{
    $this->codigo = $codigo;
}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Recovery Code Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        return (new Content)
            ->view('recovery_code'); // Reemplaza 'emails.recovery_code' con la vista correcta

        }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
