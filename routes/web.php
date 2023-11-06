<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ConfirmarCodigo;
use App\Http\Controllers\Auth\Recuperar;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPController;
use App\Http\Controllers\AdminEditarController;
use App\Http\Controllers\AdminLeyController;
use App\Http\Controllers\AdminEventoController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminQSController;
use App\Http\Controllers\AdminQHController;
use App\Http\Controllers\AdminUbicacionController;
use App\Http\Controllers\OrientacionController;
use App\Http\Controllers\NosotrosEditController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\GeocodeController;
use App\Models\Orientacion;
use App\Models\Nosotros;
use App\Models\Noticia;
use App\Models\Ley;
use App\Models\Evento;
use App\Models\Ubicacion;
use App\Models\Refugio;
use App\Mail\RecoveryCodeMail;

//mmov
use App\Http\Controllers\Movil\UserMController;


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
    $noticias = Noticia::get();
    return view('welcome',['orientaciones'=>$orientacion,'nosotros'=>$nosotros,'noticias'=>$noticias]);
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

Route::get('/evento', function () {
    $eventos = Evento::get();
    return view('evento',['eventos'=>$eventos]);
})->name('evento');

Route::get('/leyes', function () {
    $ley = Ley::get();
    return view('leyes',['leyes'=>$ley]);
})->name('leyes');

Route::get('/refugio', function () {
    $refugios = Refugio::get();
    $ubicacion = Ubicacion::get();
    return view('refugio',['refugios'=>$refugios,'ubicaciones'=>$ubicacion]);
})->name('refugio');

Auth::routes();

// Route User
Route::middleware(['auth','checkAccountStatus','user-role:0','verificarCodigo'])->group(function()
{
    Route::get("/user/home",[HomeController::class, 'userHome'])->name("home");
});
// Route Editor
Route::middleware(['auth','checkAccountStatus','user-role:1','verificarCodigo'])->group(function()
{
    Route::get("/editor/home",[HomeController::class, 'editorHome'])->name("editor.home");
});
// Route Admin
Route::middleware(['auth','checkAccountStatus','user-role:2','verificarCodigo'])->group(function()
{
    Route::get("/admin/home",[HomeController::class, 'adminHome'])->name("admin.home");
    Route::get("/admin/denuncias",[AdminController::class,'index'])->name("admin.denuncias");
    Route::get("/admin/editIndex",[AdminController::class,'editIndex'])->name('admin.editIndex');
    Route::get("/admin/Users",[AdminController::class,'indexUser'])->name('admin.userIndex');
    Route::get("/admin/denuncia/{tiene}",[AdminController::class,'indexDenuncia'])->name('admin.tieneDen');
    Route::get("/admin/createUsr",[AdminController::class,'crearUser'])->name('admin.crearTUser');
    Route::get("/admin/evento",[AdminController::class,'indexEvento'])->name('admin.indexEvento');

    Route::view("/admin/crearUbicacion",'/admin/crearUbicacion')->name('admin.crearUbicacion');


    // Editar index
    Route::controller(AdminEditarController::class)->group(function(){
        Route::get("/edit/seccion_1",'seccion_1Index')->name('admin.Eseccion1');
        Route::get("/edit/seccion_2",'seccion_2Index')->name('admin.Eseccion2');
        Route::get("/edit/seccion_3",'seccion_3Index')->name('admin.Eseccion3');
        Route::get("/edit/Ley",'leyesIndex')->name('admin.Ley');
        Route::get("/edit/refugios",'ubiIndex')->name('admin.ubi');
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

    Route::controller(AdminUserController::class)->group(function(){
        Route::post('/update/user','modificar')->name('admin.User.update');
        Route::delete('/delete/user/{user}','eliminar')->name('admin.User.Delete');
        Route::post('/amindcrete/user','crearUsuario')->name('admin.crearUser');
    });
    //CRUD REFUGIO
    Route::controller(AdminUbicacionController::class)->group(function(){
        Route::post('/admin/createRef','crearRef')->name('admin.CreateRefugio');
        Route::post('/admin/updateRef','updateRef')->name('admin.UpdateRefugio');
        Route::delete('/admin/deleteteRef/{refugio}','deleteRef')->name('admin.DeleteRefugio');
    });
    //CRUD Ley
    Route::controller(AdminLeyController::class)->group(function(){
        Route::post('/admin/crearLey','crearLey')->name('admin.crearLey');
        Route::post('/admin/updateLey','updateLey')->name('admin.updateLey');
        Route::delete('/admin/delete/{ley}','deleteLey')->name('admin.deleteLey');
    });
    //CRUD QUIENES SOMOS
    Route::controller(AdminQSController::class)->group(function(){
        Route::post('/admin/crearQS','crearQS')->name('admin.crearQS');
        Route::post('/admin/updateQS','updateQS')->name('admin.updateQS');
        Route::delete('/admin/deleteQS/{nosotros}','deleteQS')->name('admin.deleteQS');
    });
    //CRUD QUE HACEMOS
    Route::controller(AdminQHController::class)->group(function(){
        Route::post('/admin/crearHS','crearQH')->name('admin.crearQH');
        Route::post('/admin/updateHS','updateQH')->name('admin.updateQH');
        Route::delete('/admin/deleteHS/{nosotros}','deleteQH')->name('admin.deleteQH');
    });
    //CRUD QUE PARTICIPA
    Route::controller(AdminPController::class)->group(function(){
        Route::post('/admin/crearP','crearP')->name('admin.crearP');
        Route::post('/admin/updateP','updateP')->name('admin.updateP');
        Route::delete('/admin/deleteP/{nosotros}','deleteP')->name('admin.deletP');
    });

    //CRUD QUE Ley
    Route::controller(AdminLeyController::class)->group(function(){
        Route::post('/admin/crearLey','crearLey')->name('admin.crearLey');
        Route::post('/admin/updateLey','updateLey')->name('admin.updateLey');
        Route::delete('/admin/deleteLey/{ley}','deleteLey')->name('admin.deletLey');
    });

    //CRUD QUE Evento
    Route::controller(AdminEventoController::class)->group(function(){
        Route::post('/admin/crearEvento','crear')->name('admin.crearEvento');
        Route::post('/admin/updateEvento','update')->name('admin.updateEvento');
        Route::delete('/admin/deleteEventooo/{evento}','delete')->name('admin.deletEvento');
    });


});

Route::middleware(['auth', 'verificarCodigo'])->group(function () {
    Route::controller(DenunciaController::class)->group(function () {
        Route::get('/formulario','index')->name('formulario');
        Route::post('/formularioPost','createDH')->name('formularioPDH');
        Route::get('/forumularioVictima/{denuncia}','indexVic')->name('formularioVic');
        Route::post('/formularioVictimaPost/{denuncia}','createDV')->name('formularioPDV');
        Route::get('/formularioDenunciado/{tiene}','indexDen')->name('formularioDen');
        Route::post('/formDenunciadoPost/{tiene}','createDD')->name('formularioPDen');

        Route::post('/update/Formulario/{tiene}','updateDe')->name('veriForm');
        Route::get('/upv/FormularioVictima/{tiene}','verifiForVic')->name('vFic');
        Route::post('/update/FormularioVictm/{tiene}','updateVi')->name('veriFDEN');
        Route::get('/upv/FormularioDen/{tiene}','verifiForDenu')->name('vDen');
        Route::post('/upv/FoV/{tiene}','updateDen')->name('veriFVV');
    });
});

//Especiales
//Verificacion
Route::get('/ingresarCodigo',[CorreoController::class,'validarCodigo'])->name('vwCodigo');
Route::post('/validarCodigo',[CorreoController::class,'verificarCodigo'])->name('verificar');
Route::post('/validacion',[RecoveryCodeMail::class,'enviar'])->name('enviarCodigo');
Route::get('/validacionCodigo/{request}',[RecoveryCodeMail::class,'validar'])->name('validarCodigo');

Route::get('/recuperacion',[CorreoController::class,'recuperarCuenta'])->name('vwRecuperar');
Route::post('/recuperar',[RecoveryCodeMail::class,'recuperar'])->name('enviarRecu');
Route::post('/validarCodigoRec',[CorreoController::class,'verificarCodigoR'])->name('verificarR');
//Recuperacion
Route::post('/recuperar-codigo',[Recuperar::class,'EnviarCodigoRecu'])->name('recobery');

//RUTAS MOVIL
Route::controller(UserMController::class)->group(function () {
    Route::get('/movil/user','index');

});
