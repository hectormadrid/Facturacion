<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Cliente', function () {
    return view('Cliente.create');
});
Route::get('/Producto', function () {
    return view('Producto.create');
});
Route::get('/Cliente/create', [ClienteController::class, 'create'])->name('Cliente.create');

Route::post('/Cliente', [ClienteController::class, 'store'])->name('Cliente.store');

Route::get('/Producto/create', [ProductoController::class, 'create'])->name('Producto.create');
Route::post('/Productos', [ProductoController::class, 'store'])->name('Poducto.store');


Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);
Route::resource('facturas', FacturaController::class); 