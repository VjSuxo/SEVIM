<?php

namespace App\Http\Controllers;

use App\Models\Nosotros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminQSController extends Controller
{
    public function crearQS(Request $request){
        $consulta = new Request([
            'resumen'=>$request['resumen'],
            'tipo'=>'qSP',
        ]);
        NosotrosController::create($consulta);
        $imagen = $request->file('urlFondo')->store('public/Nosotros');
        $urlFondoPath = Storage::url($imagen);
        $consulta = new Request([
            'titulo' => $request['titulo'],
            'tipo'=>'qST',
            'texto'=>$request['relleno'],
            'urlFondo'=>$urlFondoPath,
        ]);
       NosotrosController::create($consulta);
        $consulta = new Request([
            'titulo'=>$request['frace'],
            'tipo'=>'qSF',
            'texto'=>$request['dicho'],
        ]);
        NosotrosController::create($consulta);

        return redirect()->route('admin.edit.QuienesSomos');
    }

    public function  updateQS(Request $request){
        $nosotros = Nosotros::where('id',$request['id'])->first();
        if($request->hasFile('urlFondo')){
            $imagen = $request->file('urlFondo')->store('public/Nosotros');
            $urlFondoPath = Storage::url($imagen);
            if($urlFondoPath != $nosotros['urlFondo']){
                $consulta = new Request([
                    'titulo' => $request['titulo'],
                    'texto'=>$request['texto'],
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
            'resumen'=>$request['resumen'],
            'urlFondo'=>$nosotros['urlFondo'],
        ]);
        NosotrosController::update($consulta,$nosotros);
        return redirect()->route('admin.edit.QuienesSomos');
    }

    public function  deleteQS(Nosotros $nosotros){
        NosotrosController::destroy($nosotros);
        return redirect()->route('admin.edit.QuienesSomos');
    }
}
