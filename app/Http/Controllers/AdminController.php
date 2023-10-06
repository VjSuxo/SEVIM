<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DenunciaViolencia;
use App\Models\Tiene;
class AdminController extends Controller
{
    public function index()  {
        $tienes = Tiene::get();
        return view('/admin/denuncias',['tienes'=>$tienes]);
    }

    public function editIndex() {
        return view('/admin/editindex');
    }

}
