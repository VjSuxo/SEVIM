<?php

namespace App\Http\Controllers\Movil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserMController extends Controller
{
    public function index(){
        $users = User::get();
        return response()->json($users);
    }

    public function store(Request $request){
        return response()->json($request);
    }


}
