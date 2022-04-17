<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\UserController;

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
    return view('home');
})->middleware(['auth'])->name('home');


Route::resource('cliente', ClienteController::class)->except(['show'])->middleware(['auth']);
Route::resource('produto', ProdutoController::class)->except(['show'])->middleware(['auth']);
Route::resource('venda', VendaController::class)->except(['show'])->middleware(['auth']);
Route::resource('usuario', UserController::class)->only(['index','store'])->middleware(['auth']);

require __DIR__.'/auth.php';
