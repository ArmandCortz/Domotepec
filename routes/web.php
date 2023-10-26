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
        Route::get('/sucursales', "SucursalesController@index")->name('sucursales.index');
        Route::put('/sucursales/{id}', 'SucursalesController@update')->name('sucursales.update');
        Route::resource('sucursales', 'SucursalesController')->except('index','update');
        
        // Rutas para cabañas
        Route::get('cabañas/{id}/edit', 'CabañasController@edit')->name('cabañas.edit');
        Route::resource('cabañas', 'CabañasController')->names('cabañas')->except('edit');

        //rutas para galeria
        
        Route::get('/galeria', "GaleriaController@index")->name('galerias.index');
        Route::resource('/galerias', "GaleriaController")->except('index');
        Route::get('/user/galeria', 'GaleriaController@indexs')->name('galerias.indexs');

        //rutas para contacto
       // Route::resource('contacto', "ContactoController");

        //RUTA PARA BIENES
        Route::resource('bienes', "BienesController")->names('bienes');

        // rutas para servicios
        Route::resource('servicios', "ServiciosController")->names('servicios');
        
        // Rutas para contacto
        Route::delete('/contacto/eliminar-todos', 'ContactoController@eliminarTodos')->name('contacto.eliminarTodos');
        Route::resource('contacto', 'ContactoController')->only(['index', 'store']);



    }); 

});
;