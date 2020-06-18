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
// header('Access-Control-Allow-Origin: *'); 
// header("Access-Control-Allow-Credentials: true");

header("Access-Control-Allow-Origin","*");
header("Access-Control-Allow-Methods","GET,POST,PUT,DELETE");
header("Access-Control-Allow-Header","X-Requested-With,Content-Type,X-Token-Auth,Authorization");

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => ['cors','api'],
    'prefix'     => 'v0'
], function ($router)
{
    
    Route::get('/hola',function()
    {
        return response()->json("hola");
    });
 
    //TIPOS DE USUARIOS-----------------------------------------------------------------------------------------------------------------------
// Route::resource('/tipo_usuarios','TipoUsuarioController');
Route::post('/tipo_usuarios_store/{nome_token_user?}/{data?}','TipoUsuarioController@store')->name('api.v0.tipo_usuarios.store');
Route::get('/tipo_usuarios_show/{nome_token_user?}/{data?}','TipoUsuarioController@show')->name('api.v0.tipo_usuarios.show');
Route::put('/tipo_usuarios_update/{nome_token_user?}/{data?}','TipoUsuarioController@update')->name('api.v0.tipo_usuarios.update');
Route::delete('/tipo_usuarios_delete/{nome_token_user?}/{data?}','TipoUsuarioController@destroy')->name('api.v0.tipo_usuarios.delete');
Route::get('/tipo_usuarios_filtro/{nome_token_user?}/{data?}','TipoUsuarioController@Filtro')->name('api.v0.tipo_usuarios.filtro');
// USUARIOS--------------------------------------------------------------------------------------------------------------------------------
//Route::resource('/usuarios','UserController');
Route::post('/usuarios_store/{nome_token_user?}/{data?}','UserController@store')->name('api.v0.usuarios.store');
Route::get('/usuarios_show/{nome_token_user?}/{data?}','UserController@show')->name('api.v0.usuarios.show');
Route::put('/usuarios_update/{nome_token_user?}/{data?}','UserController@update')->name('api.v0.usuarios.update');
Route::delete('/usuarios_delete/{nome_token_user?}/{data?}','UserController@destroy')->name('api.v0.usuarios.delete');
Route::get('/usuarios_filtro/{nome_token_user?}/{data?}','UserController@Filtro')->name('api.v0.usuarios.filtro');
// Route::get('/usuarios_filtro/','UserController@Filtro')->name('api.v0.usuarios.filtro');
Route::get('/usuarios_couriers_filtro/{nome_token_user?}/{data?}','UserController@FiltroCourier')->name('api.v0.usuarios_couriers.filtro');

Route::get('/prueba','UserController@prueba')->name('api.v0.prueba.prueba');
Route::get('/login/{data?}','UserController@login')->name('api.v0.usuarios.login');
Route::post('/register/{data?}','UserController@register')->name('api.v0.usuarios.register');

// UBICACION DE USUARIOS--------------------------------------------------------------------------------------------------------------------------------
Route::post('/ubicacion_store/{nome_token_user?}/{data?}','UbicacionController@store')->name('api.v0.ubicacion.store');



//ESTADO VENTA
Route::post('/estado_ventas_store/{nome_token_user?}/{data?}','EstadoVentaController@store')->name('api.v0.estado_ventas.store');
Route::get('/estado_ventas_show/{nome_token_user?}/{data?}','EstadoVentaController@show')->name('api.v0.estado_ventas.show');
Route::put('/estado_ventas_update/{nome_token_user?}/{data?}','EstadoVentaController@update')->name('api.v0.estado_ventas.update');
Route::delete('/estado_ventas_delete/{nome_token_user?}/{data?}','EstadoVentaController@destroy')->name('api.v0.estado_ventas.delete');
Route::get('/estado_ventas_filtro/{nome_token_user?}/{data?}','EstadoVentaController@Filtro')->name('api.v0.estado_ventas.filtro');
//VENTA
Route::post('/ventas_store/{nome_token_user?}/{data?}','VentaController@store')->name('api.v0.ventas.store'); //paso uno de la venta
Route::get('/ventas_show/{nome_token_user?}/{data?}','VentaController@show')->name('api.v0.ventas.show');
Route::put('/ventas_update/{nome_token_user?}/{data?}','VentaController@update')->name('api.v0.ventas.update');
Route::delete('/ventas_delete/{nome_token_user?}/{data?}','VentaController@destroy')->name('api.v0.ventas.delete');
Route::get('/ventas_filtro/{nome_token_user?}/{data?}','VentaController@Filtro')->name('api.v0.ventas.filtro');
Route::put('/ventas_asignar_courier/{nome_token_user?}/{data?}','VentaController@asignar_courier')->name('api.v0.ventas.asignar_courier'); //paso dos de la venta
Route::put('/ventas_generar_pedido/{nome_token_user?}/{data?}','VentaController@generar_pedido')->name('api.v0.ventas.generar_pedido'); //paso dos de la venta
Route::get('/ventas_mi_historial_pediodos/{nome_token_user?}/{data?}','VentaController@mi_historial_pediodos')->name('api.v0.ventas.mi_historial_pedidos');
Route::get('/ventas_mi_historial_entregas/{nome_token_user?}/{data?}','VentaController@mi_historial_entregas')->name('api.v0.ventas.mi_historial_entregas');
Route::put('/ventas_rechazar_entrega/{nome_token_user?}/{data?}','VentaController@rechazar_entrega')->name('api.v0.ventas.rechazar_entrega'); //paso dos de la venta
Route::put('/vemtas_finalizar_venta/{nome_token_user?}/{data?}','VentaController@finalizar_venta')->name('api.v0.ventas.finalizar_venta'); //paso dos de la venta

Route::get('/ventas_prueba','VentaController@prueba')->name('api.v0.ventas.prueba'); //paso dos de la venta
//DETALLE DE VENTAS
Route::post('/detalle_ventas_store/{nome_token_user?}/{data?}','DetalleVentaController@store')->name('api.v0.detalle_ventas.store');
Route::get('/detalle_ventas_show/{nome_token_user?}/{data?}','DetalleVentaController@show')->name('api.v0.detalle_ventas.show');
Route::put('/detalle_ventas_update/{nome_token_user?}/{data?}','DetalleVentaController@update')->name('api.v0.detalle_ventas.update');
Route::delete('/detalle_ventas_delete/{nome_token_user?}/{data?}','DetalleVentaController@destroy')->name('api.v0.detalle_ventas.delete');
Route::get('/detalle_ventas_filtro/{nome_token_user?}/{data?}','DetalleVentaController@Filtro')->name('api.v0.detalle_ventas.filtro');
// Route::post('/detalle_ventas_asignar_venta/{nome_token_user?}/{data?}','DetalleVentaController@asignar_venta')->name('api.v0.detalle_ventas.asignar_venta');
//PRODUCTOS
Route::post('/productos_store/{nome_token_user?}/{data?}','ProductoController@store')->name('api.v0.productos.store');
Route::get('/productos_show/{nome_token_user?}/{data?}','ProductoController@show')->name('api.v0.productos.show');
// Route::get('/productos_show_con_f/{nome_token_user?}/{data?}','ProductoController@show_con_f')->name('api.v0.productos_ventas.show_con_f');
// Route::get('/productos_show_con_f2/{data?}','ProductoController@show_con_f2')->name('api.v0.productos_ventas.show_con_f2');
Route::put('/productos_update/{nome_token_user?}/{data?}','ProductoController@update')->name('api.v0.productos.update');
Route::delete('/productos_delete/{nome_token_user?}/{data?}','ProductoController@destroy')->name('api.v0.productos.delete');
Route::get('/productos_filtro/{nome_token_user?}/{data?}','ProductoController@Filtro')->name('api.v0.productos.filtro');
Route::post('/productos_guardar_img/{nome_token_user?}/{data?}','ProductoController@guardar_img')->name('api.v0.productos.guardar_img');



//DPF

Route::get('/pdf', function () {
    $pdf = PDF::loadView('z_reportes.a_cuerpo');
  // $pdf = PDF::loadHtml("pdf");
   return $pdf->stream();
//    return $pdf->download();
});

});

//ProductosJs
// Route::get('/produtosjs', function () {
//     // return echo "" . asset('/js/itemsBodega.js');
//     echo "hola";// storage_path('app/public');
// });

