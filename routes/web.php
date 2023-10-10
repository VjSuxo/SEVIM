<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ConfirmarCodigo;
use App\Http\Controllers\Auth\Recuperar;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEditarController;
use App\Http\Controllers\OrientacionController;
use App\Http\Controllers\NosotrosEditController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\NoticiaController;

use App\Models\Orientacion;
use App\Models\Nosotros;
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
    $orientacion = Orientacion::get();
    $nosotros = Nosotros::get();
    return view('welcome',['orientaciones'=>$orientacion,'nosotros'=>$nosotros]);
})->name('welcome');

Route::get('/quienesSomos', function () {
    $nosotros = Nosotros::get();
    return view('quienesSomos',['nosotros'=>$nosotros]);
})->name('quienesSomos');

Route::get('/queHacemos', function () {
    $nosotros = Nosotros::get();
    return view('queHacemos',['nosotros'=>$nosotros]);
})->name('queHacemos');

Route::get('/participa', function () {
    $nosotros = Nosotros::get();
    return view('participa',['nosotros'=>$nosotros]);
})->name('participa');

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
        Route::get("/edit/seccion_2",'seccion_2Index')->name('admin.Eseccion2');
        Route::get("/edit/seccion_3",'seccion_3Index')->name('admin.Eseccion3');
    });

    Route::controller(OrientacionController::class)->group(function(){
        Route::post("/store/seccion",'store')->name('orientacion.store');
        Route::delete('/store/seccion/delete/{orientacion}','Destroy')->name('orientacion.delete');
    });

    Route::controller(NosotrosController::class)->group(function(){
        Route::post("/store/seccion/nosotrosQuienes",'storeQ')->name('nosotrosQ.store');
        Route::delete('/store/seccion/nosotrosQuienes/delete/{nosotros}','Destroy')->name('nosotrosQ.delete');
    });

    Route::controller(NosotrosEditController::class)->group(function () {
        Route::get('/edit/seccion_2/quienesSomos','indexQuienes')->name('admin.edit.QuienesSomos');
        Route::get('/edit/seccion_2/queHacemos','indexHacemos')->name('admin.edit.QueHacemos');
        Route::get('/edit/seccion_2/participa','indexParticipa')->name('admin.edit.Participa');
    });

    Route::controller(NoticiaController::class)->group(function(){
        Route::post('/store/seccion_3/Noticia','store')->name('noticia.Store');
        Route::delete('/store/seccion_3/Noticia/{noticia}/Destroy','destroy')->name('noticia.Delete');
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

