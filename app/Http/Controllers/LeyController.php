<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ley;

class LeyController extends Controller
{

    public static function create(Request $request){
        $ley = new Ley([
            'nombre' => $request['nombre'],
            'descripcion'=>$request['descripcion'],
        ]);
        $ley->save();
    }

    public static function update(Ley $ley,Request $request){
        $ley->update([
            'nombre' => $request['nombre'],
            'descripcion'=>$request['descripcion'],
        ]);
    }

    public static function delete(Ley $ley) {
        $ley->delete();
    }
}
