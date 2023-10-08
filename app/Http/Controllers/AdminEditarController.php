<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orientacion;
use App\Models\Nosotros;
use App\Models\Noticia;

class AdminEditarController extends Controller
{
    public function seccion_1Index(){
        $orientaciones = Orientacion::get();
        return view('/admin/secciones/seccion_1',['orientaciones'=>$orientaciones]);
    }

    public function seccion_2Index(){
        $nosotros = Nosotros::get();
        return view('/admin/secciones/seccion_2',['nosotros'=>$nosotros]);
    }

    public function seccion_3Index(){
        $noticias = Noticia::get();
        return view('/admin/secciones/seccion_3',['noticias'=>$noticias]);
    }
}
