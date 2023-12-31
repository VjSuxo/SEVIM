<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Mail\RecoveryCodeMail;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
       //     'g-recaptcha-response' => ['required',new \App\Rules\Recaptcha]
        ]);
        $input = $request->all();
        if( auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            $this->validarBloqueo($request);
            if (Auth::user()->bloqueo == 1) {
                Auth::logout();
                return redirect()
                ->route('login')
                ->with('bloqueo', 'Su cuenta fue bloqueada por demasiados intentos ');
            }
            else{
                $enviar = new RecoveryCodeMail();
                $enviar->enviar($request);
                return view('codigoConfirmacion',['request'=>$request]);
            }
        }
        else
        {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->increment('intentos_fallidos');
                $this->validarBloqueo($request);
                return redirect()
                ->route('login')
                ->with('error', 'Credenciales incorrectas, intentos fallidos ' . $user->intentos_fallidos . ' de 3');
            }
            //return response()->json([$user]);
            return redirect()
            ->route('login')
            ->with('error', 'Credenciales incorrectas');

        }
    }

    public function validarBloqueo(Request $request){
            $user = User::where('email', $request->email)->first();
            if($user){

                if ($user->intentos_fallidos >= 3) {
                    $user->update(['bloqueo' => 1]);
                    return redirect()
                    ->route('login')
                    ->with('bloqueo', 'Su cuenta fue bloqueada por demasiados intentos ');
                }
            }
            return true;
    }




}
