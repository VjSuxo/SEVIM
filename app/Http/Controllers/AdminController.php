<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DenunciaViolencia;
use App\Models\Tiene;
class AdminController extends Controller
{
    public function index()  {
        $tienes = Tiene::get();
        $denuncias = DenunciaViolencia::get();
        //return $tienes;
        return view('/admin/denuncias',['tienes'=>$tienes]);
    }
}
