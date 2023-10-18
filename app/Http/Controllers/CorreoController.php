<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class CorreoController extends Controller
{
    public function validarCodigo(){
        return view('/codigoConfirmacion');
    }

    public function verificarCodigo(Request $request){
            $digits = $request->input('digits');
            $codigoIngresado = implode('', $digits);
            $user = Auth::user();
            if($user->codigo == $codigoIngresado ){
                $user->update([
                    'verificado'=>'true',
                    'intentos_fallidos' => 0,
                ]);
                if (auth()->user()->role == '2')
                {
                return redirect()->route('admin.denuncias');
                }
                else if (auth()->user()->role == 'editor')
                {
                return redirect()->route('editor.home');
                }
                else
                {
                return redirect()->route('home');
                }
            }
            else{
                return view('codigoConfirmacion',['request'=>$request]);
            }
    }

    public function verificarCodigoR(Request $request){
        $digits = $request->input('digits');
        $codigoIngresado = implode('', $digits);
        $user =  User::where('email',$request->email)->first();
        if($user->codigo == $codigoIngresado ){
            $user->update([
                'bloqueo'=>0,
                'intentos_fallidos' => 0,
            ]);
            return redirect()->route('login');
        }
        else{
            return view('codigoRecuperacion');
        }
}

    public function recuperarCuenta(){
        return view('recuperarCuenta');
    }
}
