<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refugio;
use App\Models\Ubicacion;
use App\Http\Controllers\UbicacionController;

class AdminUbicacionController extends Controller
{
    public function crearRef(Request $request) {

        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'direccion' => 'required',
        ]);
        $refugio = new Refugio([
            'nombre'=> $request['nombre'],
            'tipo'=> $request['tipo'],
        ]);
        $refugio->save();
        $request['idRef'] = $refugio->id;
        UbicacionController::create($request);
        return redirect()->route('admin.ubi');
    }

    public function updateRef(Request $request){
        $refugio = Refugio::where('id',$request->idRef)->first();
        $ubicacion = Ubicacion::where('idRefugio',$refugio->id)->first();
        if($request['tipo']!=-1){
            $refugio->update([
                'nombre'=> $request['nombre'],
                'tipo'=> $request['tipo'],
            ]);
        UbicacionController::update($request,$ubicacion);
        }
        else{
            $refugio->update([
                'nombre'=> $request['nombre'],
            ]);
            UbicacionController::update($request,$ubicacion);
        }

        return redirect()->route('admin.ubi');
    }

    public function deleteRef(Refugio $refugio){
        $ubicacion = Ubicacion::where('idRefugio',$refugio->id);
        if($ubicacion){
            $ubicacion->delete();
        }
        $refugio->delete();
        return redirect()->route('admin.ubi');
    }


}
