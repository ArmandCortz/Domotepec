<?php

use Illuminate\Support\Facades\Route;

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

// Grupo de rutas para vista usuario

Route::prefix("/user")->group(function () {
    Route::get('/', function () {
        return view('users.home');
    })->name('Home');

    Route::get('#servicios', function () {
        return view('users.home');
    })->name('Servicios');

    Route::get('/galeria', function () {
        return view('users.galeria');
    })->name('Galeria');

    Route::get('/producto', function () {
        return view('users.producto');
    })->name('Producto');

    Route::get('/contacto', function () {
        return view('users.contacto');
    })->name('Contacto');

    Route::get('/reservaciones', function () {
        return view('users.reservaciones');
    })->name('Reservaciones');
});
use App\Http\Controllers\UserController;

Route::prefix("/administracion")->namespace("App\\Http\\Controllers")->group(function () {
    Auth::routes();
    Route::get('/', "HomeController@index")->name('Home');

    Route::resource('users', "UserController");
});

