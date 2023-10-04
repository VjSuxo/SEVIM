<?php

namespace App\Http\Controllers\Auth;

use App\Mail\RecoveryCodeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class Recuperar extends Controller
{

    function EnviarCodigoRecu(Request $request)  {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        //return $request;
        // Generar un código de recuperación aleatorio
    $recoveryCode = random_int(1000, 9999);

    Mail::to($request->email)->send(new RecoveryCodeMail($recoveryCode));
    Event::listen(MessageSent::class, function (MessageSent $event) {
        // Verificar si el mensaje se envió correctamente
        if ($event->message->getSwiftMessage()->getHeaders()->get('X-Swift-Send-Event') === 'success') {
            // El mensaje se envió con éxito
            // Puedes realizar acciones adicionales aquí si es necesario
            return redirect()->route('welcome');
            Log::info('Correo electrónico enviado con éxito.');
        } else {
            // El mensaje no se envió correctamente
            return redirect()->route('recobery');
            Log::error('No se pudo enviar el correo electrónico.');
        }
    });
    }
}
