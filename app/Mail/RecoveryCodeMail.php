<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Suppert\Facades\Mail;

class RecoveryCodeMail extends Mailable
{
   public function enviar(Request $request) {
        $email = $request->email;
        $asunto = "asunt";
        Mail::send('correo.prueba',$request->all(),function ($msg) use($email) {
            $msg->from($email,$nombre);
            $msg->subject("esto");
            $msg->from($email);
        });
        return view('welcome');
   }
}
