<?php

use Illuminate\Support\Facades\Route;

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
        Route::get('/', "HomeController@index")->middleware('can:home')->name('home');

        Route::get('/perfil', 'PerfilController@index')->name('perfil'); // Vista de perfil
        Route::put('/perfil/{user}', 'PerfilController@update')->name('perfil.update'); // Actualizar perfil
        Route::put('/perfil/{user}/password', 'PerfilController@updatePassword')->name('perfil.updatePassword'); // Actualizar contraseña

        // Rutas para users

        Route::resource('users', "UserController")->names('users');

        // rutas para empresas
        Route::resource('empresas', "EmpresasController")->names('empresas');

        // Rutas para sucursales
        Route::resource('sucursales', 'SucursalesController')->names('sucursales');

        // Rutas para cabañas
        // Route::get('cabañas', 'CabañasController@index')->name('cabañas.index');
        // Route::get('cabañas/create', 'CabañasController@create')->name('cabañas.create');
        // Route::post('cabañas', 'CabañasController@store')->name('cabañas.store');
        Route::get('cabañas/{id}/edit', 'CabañasController@edit')->name('cabañas.edit');
        Route::put('cabañas/{id}', 'CabañasController@update')->name('cabañas.update');
        Route::delete('cabañas/{id}', 'CabañasController@destroy')->name('cabañas.destroy');
        Route::resource('cabañas', 'CabañasController')->except('edit','update','destroy')->names('cabañas');

        //rutas para galeria

        Route::get('/galeria', "GaleriaController@index")->name('galerias.index');
        Route::resource('/galerias', "GaleriaController")->except('index');
        Route::get('/user/galeria', 'GaleriaController@indexs')->name('galerias.indexs');

        //rutas para contacto
        // Route::resource('contacto', "ContactoController");

        //Rutas para bienes
        Route::resource('bienes', "BienesController")->names('bienes');

        // Rutas para servicios
        Route::resource('servicios', "ServiciosController")->names('servicios');

        // Rutas para contacto
        Route::delete('/contacto/eliminar-todos', 'ContactoController@eliminarTodos')->name('contacto.eliminarTodos');
        Route::resource('contacto', 'ContactoController')->only(['index', 'store', 'edit']);


    });

});
;