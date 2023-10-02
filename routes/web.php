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
    })->name('/');

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

Route::prefix('/')->group(function () {

    Route::prefix("/")->group(function () {
        Auth::routes();
    });

    Route::prefix("/")->namespace("App\\Http\\Controllers")->group(function () {
        Route::get('/', "HomeController@index")->name('home');

        Route::get('/users', "UserController@index")->name('users.index');
        Route::get('/users', "UserController@index")->name('users.create');
        Route::resource('/users', "UserController");
        // Rutas para sucursales
        Route::get('/sucursales', "SucursalesController@index")->name('sucursales.index');
        Route::get('/sucursales/{id}', "SucursalesController@show")->name('sucursales.show');
        Route::resource('sucursales', 'SucursalesController');

            });

});;