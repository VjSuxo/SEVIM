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

    Mail::to('eljudionaci234@gmail.com')->send(new RecoveryCodeMail($recoveryCode));

    }
}
