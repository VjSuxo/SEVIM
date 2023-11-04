<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use  App\Models\Evento;
use  App\Models\Ubicacion;
class AdminEventoController extends Controller
{
    public function crear(Request $request) {
        $request->validate([
            'titulo'  => 'required'     ,
            'descripcion'  =>'required' ,
            'fechaI'  =>  'required'  ,
            'fechaF'  =>  'required' ,
            'urlImagen'  =>   'required' ,
            'tipo'  =>  'required'  ,
        ]);
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
            'fechaFin'  => $request['fechaF']   ,
            'urlImg'  => $evento['urlImg'] ,
            'urlSecion'  => $request['enlaceE']  ,
            'tipo'  => $request['tipo']        ,
        ]);
        if($request->hasFile('urlImagen')){
            $imagen = $request->file('urlImagen')->store('public/Evento');
                $urlFondoPath = Storage::url($imagen);
                if($urlFondoPath != $evento['urlImg']) {
                    $consulta['urlImg'] = $urlFondoPath;
                }
        }
        if($request['fechaI'] == null ){
            $consulta['fechaIni'] = $evento['fechaIni'];
        }
        if($request['fechaF'] == null ){
            $consulta['fechaFin'] = $evento['fechaFin'];
        }
        if($request['tipo'] == -1 ){
            $consulta['tipo'] = $evento['tipo'];
        }
        if($request['enlaceE'] == null ){
            $consulta['urlSecion'] = $evento['urlSecion'];
        }
        $evento = EventoController::update($consulta,$evento);
        if($request['direccionE'] != null){
            $ubicacion = Ubicacion::where('idEvento',$request['id'])->first();

            if($ubicacion['direccion'] != $request['direccionE']){
                $ubicacion->update([
                    'direccion' => $request['direccionE'],
                ]);
            }
        }
        return redirect()->route('admin.indexEvento');
    }

    public function delete(Evento $evento) {
        if($evento->tipo == 2){
            $ubicacion = Ubicacion::where('id',$evento->ubicaciones[0]->id)->first();
            UbicacionController::delete($ubicacion);
        }
        EventoController::delete($evento);
        return redirect()->route('admin.indexEvento');
    }
}
