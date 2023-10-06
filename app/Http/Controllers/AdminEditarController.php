<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orientacion;

class AdminEditarController extends Controller
{
    public function seccion_1Index(){
        $orientaciones = Orientacion::get();
        return view('/admin/secciones/seccion_1',['orientaciones'=>$orientaciones]);
    }

    public function seccion_2Index(){
        $orientaciones = Orientacion::get();
        return view('/admin/secciones/seccion_1',['orientaciones'=>$orientaciones]);
    }

    public function seccion_3Index(){
        $orientaciones = Orientacion::get();
        return view('/admin/secciones/seccion_1',['orientaciones'=>$orientaciones]);
    }
}
