<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{


    public function crearUsuario(Request $data){
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
            'verificado' => 'true',
        ]);
        return redirect()->route('admin.userIndex' );
    }

    public function modificar(Request $request) {
        UserController::update($request);
        return redirect()->route('admin.userIndex');
    }

    public function eliminar(User $user){
        UserController::delete($user);
        return redirect()->route('admin.userIndex');
    }
}
