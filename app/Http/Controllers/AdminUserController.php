<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\User;

class AdminUserController extends Controller
{

    public function crearUsuario(){

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
