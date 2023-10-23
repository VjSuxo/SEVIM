<?php

namespace App\Http\Controllers;

use App\Models\Nosotros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminQHController extends Controller
{
    public function crearQH(Request $request){
        $nosotros = Nosotros::where('id',$request['idV']);

        if($nosotros != null){
            $this->updateQH($request);
        }

        $imagen = $request->file('urlFondo')->store('public/Nosotros');
        $urlFondoPath = Storage::url($imagen);
        $consulta = new Request([
            'titulo' => $request['titulo'],
            'tipo'=>$request['tipo'],
            'texto'=>$request['relleno'],
            'urlImagen'=>$urlFondoPath,
        ]);
        NosotrosController::create($request);
        return redirect()->route('admin.edit.QueHacemos');

    }

    public function updateQH(Request $request){
        $nosotros = Nosotros::where('id',$request['idV']);
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
                    return redirect()->route('admin.edit.QuienesSomos');
                }
                $consulta = new Request([
                    'titulo' => $request['titulo'],
                    'texto'=>$request['texto'],
                    'urlFondo'=>$nosotros['urlFondo'],
                ]);
                NosotrosController::update($consulta,$nosotros);
                return redirect()->route('admin.edit.QuienesSomos');
            }
            $consulta = new Request([
                'titulo' => $request['titulo'],
                'texto'=>$request['texto'],
                'urlFondo'=>$nosotros['urlFondo'],
            ]);
            NosotrosController::update($consulta,$nosotros);
            return redirect()->route('admin.edit.QuienesSomos');
        }
    }

    public function deleteQH(Nosotros $nosotros){
        NosotrosController::destroy($nosotros);
        return redirect()->route('admin.edit.QuienesSomos');
    }

}
