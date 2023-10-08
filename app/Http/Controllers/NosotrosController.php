<?php

namespace App\Http\Controllers;
use App\Models\Nosotros;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NosotrosController extends Controller
{
    public function storeQ(Request $request){

        $nosotros = Nosotros::find($request->idV);
        if($nosotros){
            if($request->urlFondo == null){
                if($nosotros->tipo == 'Pp'){
                    $nosotros->update([
                        'titulo' => $request['titulo'],
                        'resumen' => $request['resumen'],
                        'texto' => $request['relleno'],

                    ]);
                }
                else{
                    if($nosotros->tipo == 'Pr'){
                        $nosotros->update([
                            'titulo' => $request['frace'],
                            'resumen' => $request['dicho'],
                            'texto' => $request['relleno'],
                            'texto'=> $request['dicho'],
                        ]);
                    }
                    if($nosotros->tipo == 'qH_Pf'){
                        $nosotros->update([
                            'resumen' => $request['resumen'],
                        ]);
                    }
                    if($nosotros->tipo == 'qH_PC'){
                        $nosotros->update([
                            'titulo' => $request['titulo'],
                            'texto' => $request['relleno'],
                        ]);
                    }
                    if($nosotros->tipo == 'qp_Pf'){
                        $nosotros->update([
                            'resumen' => $request['resumen'],
                        ]);
                    }
                    if($nosotros->tipo == 'qp_PC'){
                        $nosotros->update([
                            'titulo' => $request['titulo'],
                            'texto' => $request['relleno'],
                        ]);
                    }
                }
            }
            else{
                $imagen = $request->file('urlFondo')->store('public/quien');
                $urlFondoPath = Storage::url($imagen);

                if($nosotros->tipo == 'Pp'){
                    $nosotros->update([
                        'titulo' => $request['titulo'],
                        'resumen' => $request['resumen'],
                        'texto' => $request['relleno'],
                        'texto'=> $request['texto'],
                        'urlFondo' => $urlFondoPath,
                    ]);
                }
                else{
                   // return $nosotros;
                    if($nosotros->tipo == 'Pr'){
                        $nosotros->update([
                            'titulo' => $request['frace'],
                            'resumen' => $request['dicho'],
                            'texto' => $request['relleno'],
                            'texto'=> $request['dicho'],
                            'urlFondo' => $urlFondoPath,
                        ]);
                    }
                    if($nosotros->tipo == 'qH_Pf'){
                        $nosotros->update([
                            'resumen' => $request['resumen'],
                            'urlImagen'=> $urlFondoPath,
                        ]);
                    }
                    if($nosotros->tipo == 'qH_PC'){
                        $nosotros->update([
                            'titulo' => $request['titulo'],
                            'texto' => $request['relleno'],
                            'urlImagen'=> $urlFondoPath,
                        ]);
                    }
                    if($nosotros->tipo == 'qH_PF'){
                        $nosotros->update([
                            'urlFondo'=> $urlFondoPath,
                        ]);
                    }
                    if($nosotros->tipo == 'qp_Pf'){
                        $nosotros->update([
                            'resumen' => $request['resumen'],
                            'urlImagen'=> $urlFondoPath,
                        ]);
                    }
                    if($nosotros->tipo == 'qp_PC'){
                        $nosotros->update([
                            'titulo' => $request['titulo'],
                            'texto' => $request['relleno'],
                            'urlImagen'=> $urlFondoPath,
                        ]);
                    }
                    if($nosotros->tipo == 'qp_PF'){
                        $nosotros->update([
                            'urlFondo'=> $urlFondoPath,
                        ]);
                    }
                }

            }

            $nosotros->save();
            $nosotros = Nosotros::get();
            return redirect()->back()->with('success', 'Registro creado con éxito')->with(['nosotros' => $nosotros]);
        }
        if($request->idV == null){
            $validatedData = $request->validate([
                'titulo' => 'required',
                'relleno' => 'required',
                'urlFondo' => 'required',
                'tipo' => 'required',
            ]);

            $imagen = $request->file('urlFondo')->store('public/quien');
            $urlFondoPath = Storage::url($imagen);

            $hacemos = new Nosotros([
                'titulo' => $validatedData['titulo'],
                'urlImagen'=> $urlFondoPath,
                'tipo'=> $validatedData['tipo'],
                'texto'=> $validatedData['relleno'],
            ]);

            $hacemos->save();
            $nosotros = Nosotros::get();
            return redirect()->back()->with('success', 'Registro creado con éxito')->with(['nosotros' => $nosotros]);
        }
    }

    public function destroy(Nosotros $nosotros) {

        $nosotros->delete();
        $nosotros = Nosotros::get();
        return redirect()->back()->with('success', 'Registro creado con éxito')->with(['nosotros' => $nosotros]);
    }

}
