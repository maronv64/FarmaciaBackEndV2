<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($nome_token_user,Request $request)
    {
      //return response()->json($request);
        //return response()->json($request['item']['cod_barra']);
         // dd($nome_token_user);
         // return;
        $ignorar = array("/", ".", "$");

        $code='';
        $message ='';
        $items ='';

        if (empty($nome_token_user)) {

            $code='403';
            $items = 'null';
            $message = 'Forbidden: La solicitud fue legal, pero el servidor rehúsa responderla dado que el cliente no tiene los privilegios para hacerla. En contraste a una respuesta 401 No autorizado, la autenticación no haría la diferencia';

        }else{

            $validad = User::where('nome_token',$nome_token_user)->first();

            if (empty($validad['name'])|| $validad['estado_del']=='0' ) {
                //no existe ese usuarios o fue dado de baja.
            } else {

                $code = '200';
                $items = Producto::where("id_foraneo",$request->id_item_bodega)->first();

                if (empty($items)) {
                  // code...esta vacio
                  $items = new Producto();
                }

                //item_bodega
                //id_item_bodega
                $items->id_foraneo = $request->id_item_bodega;
                  //item
                  $items->cod_barra =         $request['item']['cod_barra'];
                  $items->cod_barra_alterno = $request['item']['cod_barra_alterno'];
                  $items->codigo_alterno_1 =  $request['item']['codigo_alterno_1'];
                  $items->codigo_alterno_2 =  $request['item']['codigo_alterno_2'];
                  $items->descripcion =       $request['item']['descripcion'];
                  $items->descripcion_larga = $request['item']['descripcion_larga'];
                  $items->precio =            $request['item']['precio'];
                  $items->observacion =       $request['item']['observacion'];
                    //marca
                    $items->marca =           $request['item']['marca']['descripcion'];
                    //producto
                    $items->presentacion =    $request['item']['producto']['presentacion'];
                    $items->medida =          $request['item']['producto']['medida'];
                    $items->concentracion =   $request['item']['producto']['concentracion'];
                //estado_item_bodega
                $items->estado_item_bodega=   $request['estado_item_bodega']['codigo'];
                //
                $items->estado_del = '1';
                $items->nome_token = str_replace($ignorar,"",bcrypt(Str::random(10)));
                $items->save();

                $message = 'OK';

            }

        }

        $result =   array(
                        'items'     => $items,
                        'code'      => $code,
                        'message'   => $message
                    );

        return response()->json($items);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($nome_token_user,Request $request)
    {
        //return response()->json($request);
        $code='';
        $message ='';
        $items ='';

        if (empty($nome_token_user)) {

            $code='403';
            $items = 'null';
            $message = 'Forbidden: La solicitud fue legal, pero el servidor rehúsa responderla dado que el cliente no tiene los privilegios para hacerla. En contraste a una respuesta 401 No autorizado, la autenticación no haría la diferencia';

        }else{

            $validad = User::where('nome_token',$nome_token_user)->first();

            if (empty($validad['name'])|| $validad['estado_del']=='0' ) {
                //no existe ese usuarios o fue dado de baja.
            } else {

                $code = '200';
                $items = Producto::where("nome_token",$request->nome_token)->first();
                $message = 'OK';

            }

        }

        $result =   array(
                        'items'     => $items,
                        'code'      => $code,
                        'message'   => $message
                    );

        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($nome_token_user='',Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update($nome_token_user='',Request $request)
    {
        //return response()->json($request);
        $code='';
        $message ='';
        $items ='';

        if (empty($nome_token_user)) {

            $code='403';
            $items = 'null';
            $message = 'Forbidden: La solicitud fue legal, pero el servidor rehúsa responderla dado que el cliente no tiene los privilegios para hacerla. En contraste a una respuesta 401 No autorizado, la autenticación no haría la diferencia';

        }else{

            $validad = User::where('nome_token',$nome_token_user)->first();

            if (empty($validad['name'])|| $validad['estado_del']=='0' ) {
                //no existe ese usuarios o fue dado de baja.
            } else {

                $code = '200';

                $items = Producto::where("nome_token",$request->nome_token)->first();
                $items->codigo = $request->codigo;
                $items->name = $request->name;
                $items->descripcion = $request->descripcion;
                $items->precio = $request->precio;
                $items->presentacion = $request->presentacion;
                $items->medida = $request->medida;
                $items->concentracion = $request->concentracion;
                $items->update();

                $message = 'OK';

            }

        }

        $result =   array(
                        'items'     => $items,
                        'code'      => $code,
                        'message'   => $message
                    );

        return response()->json($result);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //destroy
    public function destroy ($nome_token_user='',Request $request)
    {
      //  return response()->json($request);
        $code='';
        $message ='';
        $items ='';

        if (empty($nome_token_user)) {

            $code='403';
            $items = 'null';
            $message = 'Forbidden: La solicitud fue legal, pero el servidor rehúsa responderla dado que el cliente no tiene los privilegios para hacerla. En contraste a una respuesta 401 No autorizado, la autenticación no haría la diferencia';

        }else{

            $validad = User::where('nome_token',$nome_token_user)->first();

            if (empty($validad['name'])|| $validad['estado_del']=='0' ) {
                //no existe ese usuarios o fue dado de baja.
            } else {

                $code = '200';
                $items = Producto::where("id_foraneo",$request->nome_token)->first();
                $items->estado_del='0';
                $items->update();
                $message = 'OK';

            }

        }

        $result =   array(
                        'items'     => $items,
                        'code'      => $code,
                        'message'   => $message
                    );

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function Filtro($nome_token_user='',Request $request)
    {
        $code='';
        $message ='';
        $items ='';

        // $items = Producto::where([["estado_del","1"],["descripcion","like","%$request->nome_token%"]])->get();
        // return response()->json($items);

        if (empty($nome_token_user)) {

            $code='403';
            $items = 'null';
            $message = 'Forbidden: La solicitud fue legal, pero el servidor rehúsa responderla dado que el cliente no tiene los privilegios para hacerla. En contraste a una respuesta 401 No autorizado, la autenticación no haría la diferencia';

        }else{

            $validad = User::where('nome_token',$nome_token_user)->first();

            if (empty($validad['name'])|| $validad['estado_del']=='0' ) {
                //no existe ese usuarios o fue dado de baja.
            } else {

                $code = '200';
                $items = Producto::where([["estado_del","1"],["descripcion","like","%$request->nome_token%"]])->get();
                $message = 'OK';

            }

        }

        $items = Producto::where('estado_del','1')->get();

        $result =   array(
                        'items'     => $items,
                        'code'      => $code,
                        'message'   => $message
                    );
        //
        return response()->json($result);
    }



}
