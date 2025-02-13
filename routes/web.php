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
    return view('Cliente.createC');
})->name('Cliente');

Route::get('/Producto', function () {
    return view('Producto.createP');
})->name('Producto');
//Controlador Cliente
// Mostrar la lista de clientes
Route::get('/Cliente', [ClienteController::class, 'index'])->name('Cliente.index');
// Mostrar el formulario de creación
Route::post('/Cliente', [ClienteController::class, 'store'])->name('Cliente.store');

// Mostrar el formulario de edición
Route::get('/Cliente/{rut}/edit', [ClienteController::class, 'edit'])->name('Cliente.edit');

// Procesar la actualización del cliente
Route::put('/Cliente/{rut}', [ClienteController::class, 'update'])->name('Cliente.update');

// Eliminar un cliente
Route::delete('/Cliente/{rut}', [ClienteController::class, 'destroy'])->name('Cliente.destroy');
//Controlador Producto
// Mostrar la lista de productos
Route::get('/Producto', [ProductoController::class, 'index'])->name('Producto.index');
// Mostrar el formulario de creación
Route::post('/Producto', [ProductoController::class, 'store'])->name('Producto.store');

// Mostrar el formulario de edición
Route::get('/Producto/{id}/edit', [ProductoController::class, 'edit'])->name('Producto.edit');

// Procesar la actualización del cliente
Route::put('/Producto/{id}', [ProductoController::class, 'update'])->name('Producto.update');

// Eliminar un cliente
Route::delete('/Producto/{id}', [ProductoController::class, 'destroy'])->name('Producto.destroy');
