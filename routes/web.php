<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminReservasController;
use App\Http\Controllers\ReservaController;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Definicion de rutas necesarias para el proyecto

Route::prefix('/user')->namespace("App\\Http\\Controllers")->group(function () {

    Route::get('/', 'HomeUserController@index')->name('Inicio');

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

    Route::get('/reservaciones', "ReservaController@reservar")->name('reservaciones');
    Route::get('/reservaciones/{id}/cabaña', "ReservaController@reservar")->name('reservaciones.cabaña');
});
// Route::get('/reservaciones', [ReservaController::class, 'reservar'])->name('reservaciones');

Route::prefix('/')->group(function () {

    Route::prefix("/")->group(function () {
        Auth::routes();

    });

    Route::prefix('/')->namespace("App\\Http\\Controllers")->group(function () {
        Route::get('/', "HomeController@index")->name('home');

        // Rutas para users
        Route::resource('users', "UserController")->names('users');

        // Rutas para Perfil de usuario
        Route::resource('/perfil', 'PerfilController')->only('index', 'update')->names('Perfil');
        Route::put('/perfil/{user}/password', 'PerfilController@updatePassword')->name('Perfil.updatePassword'); // Actualizar contraseña

        // rutas para empresas
        Route::resource('empresas', "EmpresasController")->names('empresas');

        // Rutas para sucursales
        Route::resource('sucursales', 'SucursalesController')->names('sucursales');

        // Rutas para cabañas

        Route::resource('cabanas', 'CabañasController')->names('cabañas');
        Route::get('cabanas/{id}/imagenes/edit', 'ImagenesCabañasController@edit')->name('cabañas.imagenes');
        Route::put('cabanas/{id}/imagenes/update', 'ImagenesCabañasController@update')->name('cabañas.imagenes.update');

        //Rutas para bienes
        Route::resource('bienes', "BienesController")->names('bienes');

        // Rutas para servicios
        Route::resource('servicios', "ServiciosController")->names('servicios');

        //rutas para galeria

        Route::get('/galeria', "GaleriaController@index")->name('galerias.index');
        Route::resource('/galerias', "GaleriaController")->except('index');
        Route::get('/user/galeria', 'GaleriaController@indexs')->name('galerias.indexs');

        // Rutas para contacto
        Route::delete('/contacto/eliminar-todos', 'ContactoController@eliminarTodos')->name('contacto.eliminarTodos');
        Route::resource('contacto', 'ContactoController')->only(['index', 'store', 'edit']);

        // Rutas para reservas
        // Route::resource('/reservas', 'AdminReservasController')->only(['index', 'store']);
        Route::get('/reservas', 'AdminReservasController@index')->name('admin.reservas.index');
        Route::post('/reservas/store', [AdminReservasController::class, 'storeReserva'])->name('reservas.store');

        Route::post('/reservaciones', [ReservaController::class, 'reservar'])->name('reservas');
    });
});