<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', [UsuarioController::class, 'index']);
Route::post('/', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::delete('/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
Route::put('/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');


