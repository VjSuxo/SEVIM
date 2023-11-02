<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nosotros;
use Illuminate\Support\Facades\Storage;

class AdminPController extends Controller
{
    public function crearP(Request $request){
        $imagen = $request->file('urlImagen')->store('public/Nosotros');
        $urlFondoPath = Storage::url($imagen);
        $consulta = new Request([
            'titulo' => $request['titulo'],
            'texto'  => $request['relleno'],
            'tipo'   => "qp_PC",
            'urlImagen'=>$urlFondoPath,
        ]);
        NosotrosController::create($consulta);
        return redirect()->route('admin.edit.Participa');
    }

    public function updateP(Request $request) {
        $nosotros = Nosotros::where('id',$request['idV'])->first();
        if($nosotros){
            if($request->hasFile('urlFondo')){
                $imagen = $request->file('urlFondo')->store('public/Nosotros');
                $urlFondoPath = Storage::url($imagen);
                if($urlFondoPath != $nosotros['urlFondo']){
                    $consulta = new Request([
                        'urlFondo'=>$urlFondoPath,
                    ]);
                    NosotrosController::update($consulta,$nosotros);
                    return redirect()->route('admin.edit.Participa');
                }
                $consulta = new Request([
                    'urlFondo'=>$nosotros['urlFondo'],
                ]);
                NosotrosController::update($consulta,$nosotros);
                return redirect()->route('admin.edit.QueHacemos');
            }
            if($request->hasFile('urlImagen')){
                $imagen = $request->file('urlImagen')->store('public/Nosotros');
                $urlFondoPath = Storage::url($imagen);
                if($urlFondoPath != $nosotros['urlImagen']){

                    $consulta = new Request([
                        'titulo' => $request['titulo'],
                        'texto'=>$request['relleno'],
                        'urlImagen'=>$urlFondoPath,
                    ]);
                    NosotrosController::update($consulta,$nosotros);
                    return redirect()->route('admin.edit.Participa');
                }
                $consulta = new Request([
                    'titulo' => $request['titulo'],
                    'texto'=>$request['texto'],
                    'urlImagen'=>$nosotros['urlImagen'],
                ]);
                NosotrosController::update($consulta,$nosotros);
                return redirect()->route('admin.edit.Participa');
            }
            $consulta = new Request([
                'titulo' => $request['titulo'],
                'texto'=>$request['relleno'],
                'resumen'=>$request['resumen'],
                'urlImagen'=>$nosotros['urlImagen'],
                'urlFondo'=>$nosotros['urlFondo'],
            ]);
            NosotrosController::update($consulta,$nosotros);
            return redirect()->route('admin.edit.Participa');
        }
        return redirect()->route('admin.edit.Participa');
    }

    public function deleteP(Nosotros $nosotros){
        NosotrosController::destroy($nosotros);
        return redirect()->route('admin.edit.Participa');
    }
}
