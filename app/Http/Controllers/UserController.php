<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Persona;
use App\Models\Ubicacion;
use Carbon\Carbon;

class UserController extends Controller
{
    function index(){
        $users = User::get();
        return redirect()->back()->with(['users'=>$users]);
    }

    public function store(){
        $validateData = $request->validate([
            'id'=>'requierd',
            'email'=>'requierd',
            'username'=>'requierd',
            'role'=>'requierd',
            'name'=>'requierd',
            'apPat'=>'requierd',
            'apMat'=>'requierd',
            'sexo'=>'requierd',
            'fechaNac'=>'requierd',
            'cel' =>'requierd',
            'ec'=>'requierd',
        ]);
        $persona = new Persona([
            'id' =>  $validateData['id']  ,
            'nombre'=>  $validateData['name'] ,
            'apPat' => $validateData['apPat'] ,
            'apMat' => $validateData['apMat'] ,
            'fechaNac'=>Carbon::parse( $validateData['fechaNac'] ),
            'sexo' =>  $validateData['sexo'] ,
            'celular' => $validateData['cel'] ,
            'email' => $validateData['email'] ,
            'idEstado' => $validateData['ec'] ,
        ]);
        $user = new User([
            'id'=>  $validateData['id'],
            'username'=> $validateData['username'] ,
            'password'=> bcrypt( $validateData['password'] ),
            'email'=> $validateData['email'] ,
            'role'=>  $validateData['role'],
            'persona_id' => $validateData['id'] ,
        ]);
    }


    public static function update(Request $request) {

        $user = User::find($request->id);
        $persona = Persona::find($request->id);
        if($user){
            if($request->ec == -1){
                $persona->update([
                    'id' =>  $request['id']  ,
                    'nombre'=>  $request['name'] ,
                    'apPat' => $request['apPat'] ,
                    'apMat' => $request['apMat'] ,
                    'fechaNac'=>Carbon::parse( $request['fechaNac'] ),
                    'sexo' =>  $request['sexo'] ,
                    'celular' => $request['cel'] ,
                    'email' => $request['email'] ,
                ]);
            }
            else{
                $persona->update([
                    'id' =>  $request['id']  ,
                    'nombre'=>  $request['name'] ,
                    'apPat' => $request['apPat'] ,
                    'apMat' => $request['apMat'] ,
                    'fechaNac'=>Carbon::parse( $request['fechaNac'] ),
                    'sexo' =>  $request['sexo'] ,
                    'celular' => $request['cel'] ,
                    'email' => $request['email'] ,
                    'idEstado' => $request['ec'] ,
                ]);
            }
            $user->update([
                'id'=>  $request['id'],
                'username'=> $request['username'] ,
                'password'=> bcrypt( $request['password'] ),
                'email'=> $request['email'] ,
                'role'=>  $request['role'],
            ]);
        }
    }

    public static function delete(User $user){
        $persona = Persona::find($user->id);
        $user->delete();
        $ubicacion = Ubicacion::where('idPersona',$persona->id);
        if($ubicacion){
            $ubicacion->delete();
        }
        $persona->delete();
    }
}
