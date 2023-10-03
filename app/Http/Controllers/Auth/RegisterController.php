<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],
            'name' => ['required', 'string', 'max:255'],
            'apePaterno' => ['required', 'string', 'max:255'],
            'apeMaterno' => ['required', 'string', 'max:255'],
            'sexo' => ['required', 'string', 'in:Femenino,Masculino,Otro'],
            'ci' => ['required', 'string', 'max:255'],
            'fechaNac' => ['required', 'date'],
            'estadoCi' => ['required'],
            'number' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'ciudad' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
         // Crear una instancia de Persona
        $persona = Persona::create([
            'id' => $data['ci'], // Asigna el CI como ID
            'nombre' => $data['name'],
            'email' => $data['email'], // Utiliza el mismo correo electrónico
            'apPat' => $data['apePaterno'],
            'apMat' => $data['apeMaterno'],
            'fechaNac' => $data['fechaNac'],
            'sexo' => $data['sexo'],
            'celular' => $data['number'],
            'idEstado' => $data['estadoCi'],
        ]);

        // Crear un usuario y relacionarlo con la persona
        $user = User::create([
            'id' => $data['ci'], // Asigna el CI como ID
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'], // Utiliza el mismo correo electrónico
            'role' => 0, // Asigna el rol deseado
            'email_verified_at' => now(),
            'persona_id' => $data['ci'], // Asigna el CI como ID de persona
        ]);

        // Retorna el usuario creado
        return $user;
    }
}
