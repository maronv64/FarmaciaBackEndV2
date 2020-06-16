<?php

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
header('Access-Control-Allow-Origin: *');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cabeza', function () {
    return view('z_reportes.a_cuerpo');
});

Route::get('/v0/tipo_usuarios_filtro/{nome_token_user?}/{data?}','TipoUsuarioController@Filtro')->name('api.v0.tipo_usuarios.filtro');
Route::get('/v0/usuarios_filtro/{nome_token_user?}/{data?}','UserController@Filtro')->name('api.v0.usuarios.filtro');
Route::get('/v0/productos_filtro/{nome_token_user?}/{data?}','ProductoController@Filtro')->name('api.v0.productos.filtro');
