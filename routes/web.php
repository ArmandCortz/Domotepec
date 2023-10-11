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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::prefix('/')->group(function () {

    Route::prefix("/")->group(function () {
        Auth::routes();

    });

    Route::prefix("/")->namespace("App\\Http\\Controllers")->group(function () {
        Route::get('/', "HomeController@index")->name('home');
        Route::get('/perfil',"PerfilController@index")->name('Perfil');

        // Rutas para users
        Route::get('/users', "UserController@index")->name('users.index');
        Route::get('/users', "UserController@create")->name('users.create');
        Route::resource('users', "UserController");

        
        // Rutas para sucursales
        Route::get('/sucursales', "SucursalesController@index")->name('sucursales.index');
        Route::put('/sucursales/{id}', 'SucursalesController@update')->name('sucursales.update');
        Route::resource('sucursales', 'SucursalesController');
        // Rutas para cabañas
        Route::get('/cabañas', "cabañasController@index")->name('cabañas.index');
        Route::put('/cabañas/{id}', 'cabañasController@update')->name('cabañas.update');
        Route::resource('cabañas', 'cabañasController');
        //rutas para galeria
        Route::get('/galeria', "GaleriaController@index")->name('galerias.index');
        Route::resource('/galerias', "GaleriaController");

    });

});
;