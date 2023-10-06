<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ConfirmarCodigo;
use App\Http\Controllers\Auth\Recuperar;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEditarController;
use App\Http\Controllers\OrientacionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

// Route User
Route::middleware(['auth','checkAccountStatus','user-role:0'])->group(function()
{
    Route::get("/user/home",[HomeController::class, 'userHome'])->name("home");
});
// Route Editor
Route::middleware(['auth','checkAccountStatus','user-role:1'])->group(function()
{
    Route::get("/editor/home",[HomeController::class, 'editorHome'])->name("editor.home");
});
// Route Admin
Route::middleware(['auth','checkAccountStatus','user-role:2'])->group(function()
{
    Route::get("/admin/home",[HomeController::class, 'adminHome'])->name("admin.home");
    Route::get("/admin/denuncias",[AdminController::class,'index'])->name("admin.denuncias");
    Route::get("/admin/editIndex",[AdminController::class,'editIndex'])->name('admin.editIndex');
    // Editar index
    Route::controller(AdminEditarController::class)->group(function(){
        Route::get("/edit/seccion_1",'seccion_1Index')->name('admin.Eseccion1');
    });

    Route::controller(OrientacionController::class)->group(function(){
        Route::post("/store/seccion",'store')->name('orientacion.store');
    });

});


Route::controller(DenunciaController::class)->group(function () {
    Route::get('/formulario','index')->name('formulario');
    Route::post('/formularioPost','createDH')->name('formularioPDH');
    Route::get('/forumularioVictima/{denuncia}','indexVic')->name('formularioVic');
    Route::post('/formularioVictimaPost/{denuncia}','createDV')->name('formularioPDV');
    Route::get('/formularioDenunciado/{tiene}','indexDen')->name('formularioDen');
    Route::post('/formDenunciadoPost/{tiene}','createDD')->name('formularioPDen');
});

//Especiales
Route::view('recuperarCuenta',"/recuperarCuenta")->name('recuperar');
Route::view('codigoConfirmacion',"/codigoConfirmacion")->name('codigo');


//Verificacion
Route::get('/verificar-codigo',[HomeController::class, 'showVerificationForm'] )->name('verification.show');
Route::post('/verificar-codigo',[ConfirmarCodigo::class,'verifyCode'])->name('verification.verify');
//Recuperacion
Route::post('/recuperar-codigo',[Recuperar::class,'EnviarCodigoRecu'])->name('recobery');

