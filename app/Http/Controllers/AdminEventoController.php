<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use  App\Models\Evento;
use  App\Models\Ubicacion;
class AdminEventoController extends Controller
{
    public function crear(Request $request) {
        $imagen = $request->file('urlImagen')->store('public/Evento');
        $urlFondoPath = Storage::url($imagen);
        $consulta= new Request([
            'titulo'  => $request['titulo']     ,
            'descripcion'  => $request['descripcion'],
            'fechaIni'  => $request['fechaI']   ,
            'fechaFin'  => $request['fechaF']   ,
            'urlImg'  => $urlFondoPath   ,
            'urlSecion'  => $request['enlace']  ,
            'tipo'  => $request['tipo']       ,
        ]);
        $evento = EventoController::create($consulta);
        if($request['direccion'] != null){
            $consulta = new Request([
                'direccion' => $request['direccion'],
                'tipo' => 5,
                'idEve' => $evento['id']
            ]);
            UbicacionController::create($consulta);
        }
        return redirect()->route('admin.indexEvento');
    }

    public function update(Request $request){
        $evento = Evento::where('id',$request['id'])->first();
        $consulta= new Request([
            'titulo'  => $request['titulo']     ,
            'descripcion'  => $request['descripcion'],
            'fechaIni'  => $request['fechaI']   ,
            'fechaFin'  => $request['fechaFin']   ,
            'urlImg'  => ''   ,
            'urlSecion'  => $request['enlace']  ,
            'tipo'  => $request['tipo']        ,
        ]);
        if($request->hasFile('urlImagen')){
            $imagen = $request->file('urlImagen')->store('public/Evento');
                $urlFondoPath = Storage::url($imagen);
                $consulta['urlImg'] = $urlFondoPath;
            if($request['fechaIni'] == $evento['fechaIni'] && $request['fechaIni'] != null ){
                $consulta['fechaIni'] = $evento['fechaIni'];
            }
            if($request['fechaFin'] == $evento['fechaFin'] && $request['fechaFin'] != null ){
                $consulta['fechaFin'] = $evento['fechaFin'];
            }
            if($request['fechaFin'] == $evento['fechaFin'] && $request['fechaFin'] != null ){
                $consulta['fechaFin'] = $evento['fechaFin'];
            }
            $evento = EventoController::create($consulta);
            if($request['direccion'] != null){
                $consulta = new Request([
                    'direccion' => $request['direccion'],
                    'tipo' => 5,
                    'idEve' => $evento['id']
                ]);
                UbicacionController::create($consulta);
            }
            return redirect()->route('admin.indexEvento');
        }
    }

    public function delete(Evento $evento) {
        $ubicacion = Ubicacion::where('id',$evento->ubicaciones[0]->id)->first();
        UbicacionController::delete($ubicacion);
        EventoController::delete($evento);
        return redirect()->route('admin.indexEvento');
    }
}
