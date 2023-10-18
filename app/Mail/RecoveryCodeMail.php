<?php

namespace App\Mail;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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
       // return $user;
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


   public function enviar(Request $request) {
        $input = $request->all();

                $user =  User::where('email',$request->email)->first();
                $user->update([
                    'verificado'=>'false',
                ]);
                $email = $request->email;
                $asunto = " Validacion Correo";
                $codigoAleatorio = $this->generarCodigo($user);
                $request->merge(['codigo' => $codigoAleatorio]);

                Mail::send('correo.prueba', ['codigo' => $codigoAleatorio], function ($msg) use ($email,$user) {
                    $msg->from($email, $user->email);
                    $msg->subject("Validacion Correo");
                    $msg->to($email);
                });
   }

   public function recuperar(Request $request) {
    $input = $request->all();

            $user =  User::where('email',$request->email)->first();
            $user->update([
                'verificado'=>'false',
            ]);
            $email = $request->email;
            $asunto = " Validacion Correo";
            $codigoAleatorio = $this->generarCodigo($user);
            $request->merge(['codigo' => $codigoAleatorio]);

            Mail::send('correo.prueba', ['codigo' => $codigoAleatorio], function ($msg) use ($email,$user) {
                $msg->from($email, $user->email);
                $msg->subject("Validacion Correo");
                $msg->to($email);
            });
            return view('codigoRecuperacion',['request'=>$request]);
}



}
