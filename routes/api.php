<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultasGenteController;
use App\Http\Controllers\DatosPropiedadesController;
use App\Http\Controllers\fileController;
use App\Models\ConsultasGente;
use App\Models\DatosPropiedades;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// *************** LOGIN ***************
/*
Route::post('/login', function(Request $request) {
    // || Obtencion de credenciales
    $credentials = $request->only(['email', 'password']);

    if(Auth::attempt($credentials)) {
        return response()->json([
            "status" => 'ok',
            "user" => Auth::user()
        ]);
    }
    return response()->json([
        'error' => 'credenciales incorrectas',
    ]);
});
*/

Route::post('logout', function (Request $request) {
    $auth = new AuthController();
    $response = $auth->logout();
    return $response;
});


// *************** IMAGENES ***************
Route::get("download",[fileController::class,'donwload']);
Route::post("upload",[fileController::class,'upload']);
Route::get("files", [fileController::class, "getFiles"]);
//Route::get("save", [FormCasasController::class, "save"]);

// *************** CONSULTAS-CONTACTO ***************
Route::controller(ConsultasGenteController::class)->group(function(){
    Route::get('/queries', 'index'); // colocamos la ruta en donde van a aparecer y luego el metodo creado   
    Route::post('/Listaqueries', 'generarConsulta'); //agrega  // SOLO VISTO POR LOS USUARIOS     // LOS DEMAS SOLO EL ADMIN
    Route::get('/queries/{id}', 'show'); //muestra po id
    Route::put('/queries/{id}', 'update'); // edita por id
    Route::delete('/queries/{id}', 'destroy'); //elimina
});

// *************** LOGIN ***************
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    //Route::post('logout', 'logout');
    Route::post('register', 'register');
    Route::post('refresh', 'refresh');

});


// CREO QUE ES ESTO NOMAS
// *************** PROPIEDADES ***************
Route::controller(DatosPropiedadesController::class)->group(function(){
    Route::get('/addproperties','index'); //subir datos a la db
    Route::post('listproperties','register');
    Route::get('/addproperties/{id}', 'show');
    Route::put('/addproperties/{id}', 'update'); // edita por id NOSE  SI SE VA A USAR
    Route::delete('addproperties/{id}','destroy');
});

