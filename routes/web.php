<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Categoriaprod;
use App\Http\Livewire\Producto;
use App\Http\Controllers\IndexController;
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

Route::get('/','App\Http\Controllers\IndexController@index');

Route::get('categorias', Categoriaprod::class);
Route::get('productos', Producto::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('agregar/{id}','App\Http\Controllers\ShoppingcarController@agregar_producto');
Route::get('sumar/{id}','App\Http\Controllers\ShoppingcarController@sumar');
Route::get('restar/{id}','App\Http\Controllers\ShoppingcarController@restar');

Route::get('registro_cliente/{total}','App\Http\Controllers\ClienteController@registro_cliente');
Route::post('/grabar_cliente','App\Http\Controllers\ClienteController@save');

Route::get('proforma/{id}','App\Http\Controllers\ClienteController@proforma');