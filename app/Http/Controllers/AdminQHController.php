<?php

namespace App\Http\Controllers;

use App\Models\Nosotros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminQHController extends Controller
{
    public function crearQH(Request $request){

        if($request['resumen'] != ''){
            $consulta = new Request([
                'resumen'=>$request['resumen'],
                'tipo'=>"qH_Pf",
            ]);
            NosotrosController::create($consulta);
        }
        if($request['titulo'] != '' && $request['relleno'] != ''){
            $imagen = $request->file('urlmagen')->store('public/Nosotros');
            $urlFondoPath = Storage::url($imagen);
            $consulta = new Request([
                'titulo'=>$request['titulo'],
                'relleno'=>$request['relleno'],
                'urlImagen'=>$urlFondoPath,
                'tipo'=>"qH_PC",
            ]);
            NosotrosController::create($consulta);
        }
        if($request->hasFile('urlFondo')){
            $imagen = $request->file('urlFondo')->store('public/Nosotros');
            $urlFondoPath = Storage::url($imagen);
            $consulta = new Request([
                'urlFondo'=>$urlFondoPath,
                'tipo'=>"qH_PF",
            ]);
            NosotrosController::create($consulta);
        }


        return redirect()->route('admin.edit.QueHacemos');

    }

    public function updateQH(Request $request){
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

    public function deleteQH(Nosotros $nosotros){
        NosotrosController::destroy($nosotros);
        return redirect()->route('admin.edit.QueHacemos');
    }

}
