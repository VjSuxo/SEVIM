<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    function index(){
        $noticias = Noticia::get();
        return redirect()->route('admin.Eseccion3',['noticias'=>$noticias]);
    }

    function store(Request $request){
        $validatedData = $request->validate([
            'tipo'=>'required',
            'enlace'=>'required',
        ]);
        $noticia = new Noticia([
            'tipo'=>$validatedData['tipo'],
            'enlace'=>$validatedData['enlace'],
        ]);
        $noticia->save();
        $this->index();

    }

    function update(Request $request){
        $noticiaUp = Noticia::find($request->id);
        if($noticiaUp){
            $noticiaUp->update([
                'tipo'=>$request['tipo'],
            'enlace'=>$request['enlace'],
            ]);
            $noticiaUp->save();
        }
        $this->index();
    }

    function destroy(Noticia $noticia){
        $noticia->delete();
        $this->index();
    }
}
