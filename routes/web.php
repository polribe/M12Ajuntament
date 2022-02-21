<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\RecintoController;
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
    return view('welcome1');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/',[EventoController::class, 'welcome1'])->name('welcome1');
Route::get('/eventos/table',[EventoController::class, 'table'])->name('evento.table');
Route::get('/users/table',[HomeController::class, 'users_table'])->name('user_table');

Route::get('/reservas/table',[HomeController::class, 'reservas_table'])->name('reserva_table');
Route::get('/reservas/destroy/{reserva}',[ReservaController::class, 'destroy'])->name('reserva.delete');
Route::get('/eventos/create',[EventoController::class, 'create'])->name('evento.create');
Route::post('/eventos/store',[EventoController::class, 'store'])->name('evento.store');


Route::get('/opinions/table',[HomeController::class, 'opinions_table'])->name('opinion_table');
Route::get('/recintos/table',[HomeController::class, 'recintos_table'])->name('recinto_table');
Route::get('/eventos',[EventoController::class, 'index'])->name('evento.index');
Route::get('/eventos/{evento}',[EventoController::class, 'show'])->name('evento.show');
Route::post('/eventos/update/{evento}',[EventoController::class, 'update'])->name('evento.update');
Route::get('/eventos/destroy/{evento}',[EventoController::class, 'destroy'])->name('evento.destroy');

Route::get('/opinions/destroy/{opinion}',[OpinionController::class, 'destroy'])->name('opinion.delete');
Route::post('/opinions/store/{evento}',[OpinionController::class, 'store'])->name('opinion.store');

Route::get('/evento/reserva/{evento}',[EventoController::class, 'reserva'])->name('evento.reserva');
Route::post('/evento/reserva/{evento}/store',[ReservaController::class, 'store'])->name('reserva.store');

Route::get('/eventos/edit/{evento}',[EventoController::class, 'edit'])->name('evento.edit');
Route::post('/eventos/store',[EventoController::class, 'store'])->name('evento.store');

Route::get('/recintos/edit/{recinto}',[RecintoController::class, 'edit'])->name('recinto.edit');

Route::post('/recintos/store',[RecintoController::class, 'store'])->name('recinto.store');
Route::get('/recintos/destroy/{recinto}',[RecintoController::class, 'destroy'])->name('recinto.delete');
Route::post('/recintos/update/{recinto}',[RecintoController::class, 'update'])->name('recinto.update');


Route::get('/users/edit/{user}',[UserController::class, 'edit'])->name('user.edit');
Route::post('/users/update/{user}',[UserController::class, 'update'])->name('user.update');
Route::get('/users/destroy/{user}',[UserController::class, 'destroy'])->name('user.delete');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
