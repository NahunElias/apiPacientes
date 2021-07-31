<?php

use App\Http\Controllers\API\PacienteController;
use App\Http\Controllers\API\AutenticarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//URIs de las rutas en ingles, al igual que los nombres de los controladores
Route::post('register', [AutenticarController::class, 'registro']);
Route::post('login', [AutenticarController::class, 'acceso']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    //En vez de poner cada uno de los métodos está el método apiResource
    Route::apiResource('patients', PacienteController::class);
    Route::post('logout', [AutenticarController::class, 'cerrarSesion']);
});
