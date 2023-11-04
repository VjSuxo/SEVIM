<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Evento;

class EventoController extends Controller
{
    public static function create(Request $request){
        $evento = new Evento([
            'titulo'  => $request['titulo']     ,
            'descripcion'  => $request['descripcion'],
            'fechaIni'  => $request['fechaIni']   ,
            'fechaFin'  => $request['fechaFin']   ,
            'urlImg'  => $request['urlImg']     ,
            'urlSecion'  => $request['urlSecion']  ,
            'tipo'  => $request['tipo']       ,
        ]);
        $evento->save();
        return $evento;
    }

    public static function update(Request $request, Evento $evento){
        $evento->update([
            'titulo'  => $request['titulo']     ,
            'descripcion'  => $request['descripcion'],
            'fechaIni'  => $request['fechaIni']   ,
            'fechaFin'  => $request['fechaFin']   ,
            'urlImg'  => $request['urlImg']     ,
            'urlSecion'  => $request['urlSecion']  ,
            'tipo'  => $request['tipo']       ,
        ]);
    }

    public static function delete(Evento $evento){
        $evento->delete();
    }
}
