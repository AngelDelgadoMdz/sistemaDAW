<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PedidosController;

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
    return view('auth.login');
});

//Estamos creando una interfaz para el administrador, por lo que podemos quitar lo siguiento con => false
Auth::routes(['register' => false, 'reset' => false]);

Route::resource('productos', ProductosController::class)->middleware('auth');
Route::resource('pedidos', PedidosController::class)->middleware('auth');


Route::get('/home', [ProductosController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', [ProductosController::class, 'index'])->name('home');
});
