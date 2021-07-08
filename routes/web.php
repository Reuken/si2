<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('layouts/admin');
})->middleware("auth");
Auth::routes(["register" => true]);

route::resource("user",PersonaController::class)->middleware("auth");
route::resource("cliente",ClienteController::class)->middleware("auth");
route::resource("proveedor",ProveedorController::class)->middleware("auth");