<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
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
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => ['required',new \App\Rules\Recaptcha]
        ]);

        $this->validarBloqueo($request);
        if( auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
           // $user = User::where('email', $request->email)->first();
          //  return redirect()->route('confirmacion',$user->id);

            $user = Auth::user();
            $user->update(['intentos_fallidos' => 0]);
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
        else
        {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->increment('intentos_fallidos');
                $this->validarBloqueo($request);
                //return response()->json([$user]);
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

    private function validarBloqueo(Request $request){
            $user = User::where('email', $request->email)->first();
         //   return response()->json([$user]);
            if($user){
                if ($user->intentos_fallidos >= 3) {
                    $user->update(['bloqueo' => 1]);
                    return redirect()
                    ->route('login')
                    ->with('bloqueo', 'Su cuenta fue bloqueada por demasiados intentos ');

                }
            }
    }
}
