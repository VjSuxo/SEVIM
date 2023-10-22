<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orientacion;
use App\Models\Nosotros;
use App\Models\Noticia;
use App\Models\Ley;
use App\Models\Refugio;
use App\Models\Ubicacion;

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

    public function leyesIndex(){
        $leyes = Ley::get();
        return view('/admin/leyes',['leyes'=>$leyes]);
    }

    public function ubiIndex(){
        $refugios = Refugio::get();
        $ubicaciones = Ubicacion::get();
        return view('/admin/ubicaciones',['ubicaciones'=>$ubicaciones,'refugios'=>$refugios]);
    }


}
