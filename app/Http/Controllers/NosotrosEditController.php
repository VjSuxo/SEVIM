<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nosotros;
class NosotrosEditController extends Controller
{
    public function indexQuienes() {
        $nosotros = Nosotros::get();
        return view('admin/secciones/nosotros/quienesSomos',['nosotros'=>$nosotros]);
    }

    public function indexHacemos() {
        $nosotros = Nosotros::get();
        return view('admin/secciones/nosotros/queHacemos',['nosotros'=>$nosotros]);
    }

    public function indexParticipa() {
        $nosotros = Nosotros::get();
        return view('admin/secciones/nosotros/participa',['nosotros'=>$nosotros]);
    }
}

