<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nosotros;
use Illuminate\Support\Facades\Storage;

class AdminPController extends Controller
{
    public function crearP(Request $request){
        $imagen = $request->file('urlFondo')->store('public/Nosotros');
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
                        'titulo' => $request['titulo'],
                        'texto'=>$request['relleno'],
                        'resumen'=>$request['resumen'],
                        'urlFondo'=>$urlFondoPath,
                    ]);
                    NosotrosController::update($consulta,$nosotros);
                    return redirect()->route('admin.edit.QueHacemos');
                }
                $consulta = new Request([
                    'titulo' => $request['titulo'],
                    'texto'=>$request['texto'],
                    'urlFondo'=>$nosotros['urlFondo'],
                ]);
                NosotrosController::update($consulta,$nosotros);
                return redirect()->route('admin.edit.QueHacemos');
            }
            if($request->hasFile('urlmagen')){
                $imagen = $request->file('urlmagen')->store('public/Nosotros');
                $urlFondoPath = Storage::url($imagen);
                if($urlFondoPath != $nosotros['urlImagen']){

                    $consulta = new Request([
                        'titulo' => $request['titulo'],
                        'texto'=>$request['relleno'],
                        'resumen'=>$request['resumen'],
                        'urlImagen'=>$urlFondoPath,
                    ]);
                    NosotrosController::update($consulta,$nosotros);
                    return redirect()->route('admin.edit.QuienesSomos');
                }
                $consulta = new Request([
                    'titulo' => $request['titulo'],
                    'texto'=>$request['texto'],
                    'urlFondo'=>$nosotros['urlImagen'],
                ]);
                NosotrosController::update($consulta,$nosotros);
                return redirect()->route('admin.edit.QuienesSomos');
            }
            $consulta = new Request([
                'titulo' => $request['titulo'],
                'texto'=>$request['relleno'],
                'resumen'=>$request['resumen'],
            ]);
            NosotrosController::update($consulta,$nosotros);
            return redirect()->route('admin.edit.QueHacemos');
        }
        return redirect()->route('admin.edit.QueHacemos');
    }
}
