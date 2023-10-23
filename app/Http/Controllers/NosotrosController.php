<?php

namespace App\Http\Controllers;
use App\Models\Nosotros;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NosotrosController extends Controller
{
    public static function create(Request $request){

        if($request['urlFondo'] == null && $request['urlImagen'] == null){
            $nosotros = new Nosotros([
                'titulo'=> $request['titulo'],
                'resumen'=> $request['resumen'],
                'tipo'=> $request['tipo'],
                'texto'=> $request['texto'],
            ]);
            $nosotros->save();
        }
        else{
            if($request['urlFondo'] != null){
                $nosotros = new Nosotros([
                    'titulo'=> $request['titulo'],
                    'resumen'=> $request['resumen'],
                    'tipo'=> $request['tipo'],
                    'texto'=> $request['texto'],
                    'urlFondo'=> $request['urlFondo'],
                ]);
                $nosotros->save();
            }
            if($request['urlImagen'] != null){
                $nosotros = new Nosotros([
                    'titulo'=> $request['titulo'],
                    'resumen'=> $request['resumen'],
                    'tipo'=> $request['tipo'],
                    'texto'=> $request['texto'],
                    'urlImagen'=> $request['urlImagen'],
                ]);
                $nosotros->save();
            }
        }
    }

    public static function update(Request $request,Nosotros $nosotros){
        $nosotros->update([
            'titulo'=> $request['titulo'],
            'resumen'=> $request['resumen'],
            'urlImagen'=> $request['urlImagen'],
            'texto'=> $request['texto'],
            'urlFondo'=> $request['urlFondo'],
        ]);
    }

    public static function destroy(Nosotros $nosotros) {
        $nosotros->delete();
    }

}
