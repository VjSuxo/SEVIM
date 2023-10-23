<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ley;

class AdminLeyController extends Controller
{
    public function crearLey(Request $request){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        LeyController::create($request);
        return redirect()->route('admin.Ley');
    }

    public function updateLey(Request $request){
        $ley = Ley::where('id',$request['idLey'])->first();
        LeyController::update($ley,$request);
        return redirect()->route('admin.Ley');
    }

    public function deleteLey(Ley $ley){
        LeyController::delete($ley);
        return redirect()->route('admin.Ley');
    }
}
