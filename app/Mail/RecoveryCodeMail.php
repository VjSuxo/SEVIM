<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
class RecoveryCodeMail extends Mailable
{
    public function index(User $user) {

        $this->enviar($user);
        return route('codigo',$user->id);
    }
    public function confirm(Request $request,User $user) {
        if($request->codigo = $user->codigo){

        }
    }

    public function generarCodigo(User $user )
    {
        return $user;
        $codigoGenerado = $this->generarCodigoUnico();
        // Guarda el código generado en la base de datos o realiza otras operaciones
        $user->update([
            'username'=>$user['username'],
            'codigo' => $codigoGenerado,
        ]);
        $user->save();
        return $codigoGenerado;
    }
    private function generarCodigoUnico()
    {
        do {
            $codigo = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        } while (User::where('codigo', $codigo)->exists());

        return $codigo;
    }


   public function enviar(User $request) {
        $user =  User::where('email',$request->email);
        $email = $request->email;
        $asunto = "Validacion Correo";
        $codigoAleatorio = $this->generarCodigo($request);
        return $request;
        $request->merge(['codigo' => $codigoAleatorio]);

        Mail::send('correo.prueba', ['codigo' => $codigoAleatorio], function ($msg) use ($email) {
            $msg->from($email, $user->email);
            $msg->subject("Validacion Correo");
            $msg->to($user->$email);
        });
        return view('welcome');
   }
}
