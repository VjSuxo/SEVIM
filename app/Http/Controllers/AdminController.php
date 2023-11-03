<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DenunciaViolencia;
use App\Models\Tiene;
use App\Models\User;
use App\Models\Evento;
use App\Models\EstadoCivil;

class AdminController extends Controller
{
    public function index()  {
        $tienes = Tiene::get();
        return view('/admin/denuncias',['tienes'=>$tienes]);
    }

    public function editIndex() {
        return view('/admin/editindex');
    }

    public function indexUser() {
        $users = User::get();
        $civil = EstadoCivil::get();
        return view('/admin/listaUsuarios',['users'=>$users,'civil'=>$civil]);
    }

    public function indexDenuncia(Tiene $tiene) {
        return view('/admin/verDenuncia',['tiene'=>$tiene]);
    }

    public function indexEvento() {
        $eventos = Evento::get();
        return view('/admin/evento',['eventos'=>$eventos]);
    }


    public function crearUser()  {
        return view('/admin/edituser');
    }

}
