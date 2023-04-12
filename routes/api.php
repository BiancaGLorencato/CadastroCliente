<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/getCliente/{limite}', [ClientesController::class, 'getClients']);

Route::get('/getCountCliente', [ClientesController::class, 'getClienteCount']);

Route::post('/getClienteFiltro', [ClientesController::class, 'getClientesFiltro']);

Route::post('/createClient', [ClientesController::class, 'create']);