<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//ProductosJs
Route::get('/v0/produtosjs', function () {
    // return echo "" . asset('/js/itemsBodega.js');
    echo "hola";// storage_path('app/public');
});

//TIPOS DE USUARIOS-----------------------------------------------------------------------------------------------------------------------
// Route::resource('/v0/tipo_usuarios','TipoUsuarioController');
Route::post('/v0/tipo_usuarios_store/{nome_token_user?}/{data?}','TipoUsuarioController@store')->name('api.v0.tipo_usuarios.store');
Route::get('/v0/tipo_usuarios_show/{nome_token_user?}/{data?}','TipoUsuarioController@show')->name('api.v0.tipo_usuarios.show');
Route::put('/v0/tipo_usuarios_update/{nome_token_user?}/{data?}','TipoUsuarioController@update')->name('api.v0.tipo_usuarios.update');
Route::delete('/v0/tipo_usuarios_delete/{nome_token_user?}/{data?}','TipoUsuarioController@destroy')->name('api.v0.tipo_usuarios.delete');
Route::get('/v0/tipo_usuarios_filtro/{nome_token_user?}/{data?}','TipoUsuarioController@Filtro')->name('api.v0.tipo_usuarios.filtro');
// USUARIOS--------------------------------------------------------------------------------------------------------------------------------
//Route::resource('/v0/usuarios','UserController');
Route::post('/v0/usuarios_store/{nome_token_user?}/{data?}','UserController@store')->name('api.v0.usuarios.store');
Route::get('/v0/usuarios_show/{nome_token_user?}/{data?}','UserController@show')->name('api.v0.usuarios.show');
Route::put('/v0/usuarios_update/{nome_token_user?}/{data?}','UserController@update')->name('api.v0.usuarios.update');
Route::delete('/v0/usuarios_delete/{nome_token_user?}/{data?}','UserController@destroy')->name('api.v0.usuarios.delete');
Route::get('/v0/usuarios_filtro/{nome_token_user?}/{data?}','UserController@Filtro')->name('api.v0.usuarios.filtro');
// Route::get('/v0/usuarios_filtro/','UserController@Filtro')->name('api.v0.usuarios.filtro');
Route::get('/v0/usuarios_couriers_filtro/{nome_token_user?}/{data?}','UserController@FiltroCourier')->name('api.v0.usuarios_couriers.filtro');

Route::get('/v0/prueba','UserController@prueba')->name('api.v0.prueba.prueba');
Route::get('/v0/login/{data?}','UserController@login')->name('api.v0.usuarios.login');
Route::post('/v0/register/{data?}','UserController@register')->name('api.v0.usuarios.register');

// UBICACION DE USUARIOS--------------------------------------------------------------------------------------------------------------------------------
Route::post('/v0/ubicacion_store/{nome_token_user?}/{data?}','UbicacionController@store')->name('api.v0.ubicacion.store');



//ESTADO VENTA
Route::post('/v0/estado_ventas_store/{nome_token_user?}/{data?}','EstadoVentaController@store')->name('api.v0.estado_ventas.store');
Route::get('/v0/estado_ventas_show/{nome_token_user?}/{data?}','EstadoVentaController@show')->name('api.v0.estado_ventas.show');
Route::put('/v0/estado_ventas_update/{nome_token_user?}/{data?}','EstadoVentaController@update')->name('api.v0.estado_ventas.update');
Route::delete('/v0/estado_ventas_delete/{nome_token_user?}/{data?}','EstadoVentaController@destroy')->name('api.v0.estado_ventas.delete');
Route::get('/v0/estado_ventas_filtro/{nome_token_user?}/{data?}','EstadoVentaController@Filtro')->name('api.v0.estado_ventas.filtro');
//VENTA
Route::post('/v0/ventas_store/{nome_token_user?}/{data?}','VentaController@store')->name('api.v0.ventas.store'); //paso uno de la venta
Route::get('/v0/ventas_show/{nome_token_user?}/{data?}','VentaController@show')->name('api.v0.ventas.show');
Route::put('/v0/ventas_update/{nome_token_user?}/{data?}','VentaController@update')->name('api.v0.ventas.update');
Route::delete('/v0/ventas_delete/{nome_token_user?}/{data?}','VentaController@destroy')->name('api.v0.ventas.delete');
Route::get('/v0/ventas_filtro/{nome_token_user?}/{data?}','VentaController@Filtro')->name('api.v0.ventas.filtro');
Route::put('/v0/ventas_asignar_courier/{nome_token_user?}/{data?}','VentaController@asignar_courier')->name('api.v0.ventas.asignar_courier'); //paso dos de la venta
Route::put('/v0/ventas_generar_pedido/{nome_token_user?}/{data?}','VentaController@generar_pedido')->name('api.v0.ventas.generar_pedido'); //paso dos de la venta
Route::get('/v0/ventas_mi_historial_pediodos/{nome_token_user?}/{data?}','VentaController@mi_historial_pediodos')->name('api.v0.ventas.mi_historial_pedidos');
Route::get('/v0/ventas_mi_historial_entregas/{nome_token_user?}/{data?}','VentaController@mi_historial_entregas')->name('api.v0.ventas.mi_historial_entregas');
Route::put('/v0/ventas_rechazar_entrega/{nome_token_user?}/{data?}','VentaController@rechazar_entrega')->name('api.v0.ventas.rechazar_entrega'); //paso dos de la venta
Route::put('/v0/vemtas_finalizar_venta/{nome_token_user?}/{data?}','VentaController@finalizar_venta')->name('api.v0.ventas.finalizar_venta'); //paso dos de la venta

Route::get('/v0/ventas_prueba','VentaController@prueba')->name('api.v0.ventas.prueba'); //paso dos de la venta
//DETALLE DE VENTAS
Route::post('/v0/detalle_ventas_store/{nome_token_user?}/{data?}','DetalleVentaController@store')->name('api.v0.detalle_ventas.store');
Route::get('/v0/detalle_ventas_show/{nome_token_user?}/{data?}','DetalleVentaController@show')->name('api.v0.detalle_ventas.show');
Route::put('/v0/detalle_ventas_update/{nome_token_user?}/{data?}','DetalleVentaController@update')->name('api.v0.detalle_ventas.update');
Route::delete('/v0/detalle_ventas_delete/{nome_token_user?}/{data?}','DetalleVentaController@destroy')->name('api.v0.detalle_ventas.delete');
Route::get('/v0/detalle_ventas_filtro/{nome_token_user?}/{data?}','DetalleVentaController@Filtro')->name('api.v0.detalle_ventas.filtro');
// Route::post('/v0/detalle_ventas_asignar_venta/{nome_token_user?}/{data?}','DetalleVentaController@asignar_venta')->name('api.v0.detalle_ventas.asignar_venta');
//PRODUCTOS
Route::post('/v0/productos_store/{nome_token_user?}/{data?}','ProductoController@store')->name('api.v0.productos.store');
Route::get('/v0/productos_show/{nome_token_user?}/{data?}','ProductoController@show')->name('api.v0.productos.show');
// Route::get('/v0/productos_show_con_f/{nome_token_user?}/{data?}','ProductoController@show_con_f')->name('api.v0.productos_ventas.show_con_f');
// Route::get('/v0/productos_show_con_f2/{data?}','ProductoController@show_con_f2')->name('api.v0.productos_ventas.show_con_f2');
Route::put('/v0/productos_update/{nome_token_user?}/{data?}','ProductoController@update')->name('api.v0.productos.update');
Route::delete('/v0/productos_delete/{nome_token_user?}/{data?}','ProductoController@destroy')->name('api.v0.productos.delete');
Route::get('/v0/productos_filtro/{nome_token_user?}/{data?}','ProductoController@Filtro')->name('api.v0.productos.filtro');
Route::post('/v0/productos_guardar_img/{nome_token_user?}/{data?}','ProductoController@guardar_img')->name('api.v0.productos.guardar_img');



//DPF

Route::get('/v0/pdf', function () {
    $pdf = PDF::loadView('z_reportes.a_cuerpo');
  // $pdf = PDF::loadHtml("pdf");
   return $pdf->stream();
//    return $pdf->download();
});