<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nosotros;
use Illuminate\Support\Facades\Storage;

class AdminPController extends Controller
{
    public function crearP(Request $request){
        $imagen = $request->file('urlmagen')->store('public/Nosotros');
        $urlFondoPath = Storage::url($imagen);

    }
}
