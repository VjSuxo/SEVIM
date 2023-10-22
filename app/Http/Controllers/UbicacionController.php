<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionController extends Controller
{
    public static function create(Request $request) {
        $direccion = $request['direccion'];
        $direccion = str_replace('\/', '/', $direccion);
        $ubicacion = new Ubicacion([
            'latitud' => 0,
            'longitud'=> 0,
            'direccion' => $direccion,
            'tipo' => $request['tipo'],
            'idRefugio'=>$request['idRef'],
        ]);
        $ubicacion->save();
        return $request;
    }

    public static function update(Request $request,Ubicacion $ubicacion){
        $direccion = $request['direccion'];
        $direccion = str_replace('\\', '/', $direccion);
        if($request['tipo']!=-1){
            $ubicacion->update([
                'direccion' => $direccion,
                'tipo' => $request['tipo'],
            ]);
        }
        else{
            $ubicacion->update([
                'direccion' => $direccion,
            ]);
        }
    }
    public static function delete(Ubicacion $ubicacion){
        $ubicacion->delete();
    }
}
