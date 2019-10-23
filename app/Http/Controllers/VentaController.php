<?php

namespace App\Http\Controllers;

use App\Venta;
use Illuminate\Http\Request;
use App\User;
use App\EstadoVenta;
use Illuminate\Support\Str;

class VentaController extends Controller
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

                $items = new Venta();
                $items->idestado = $request->idestado;
                $items->idcliente = $request->idcliente;
                $items->idcourier = $request->idcourier;
                $items->fecha = $request->fecha;
                $items->subtotal = $request->subtotal;
                $items->total = $request->total;
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

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
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
                $items = Venta::where("nome_token",$request->nome_token)->first();
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
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update($nome_token_user,Request $request)
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
                $items = Venta::where("nome_token",$request->nome_token)->first();
                $items->idestado = $request->idestado;
                $items->idcliente = $request->idcliente;
                $items->idcourier = $request->idcourier;
                $items->fecha = $request->fecha;
                $items->subtotal = $request->subtotal;
                $items->total = $request->total;
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
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($nome_token_user,Request $request)
    {
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
                $items = Venta::where("nome_token",$request->nome_token)->first();
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

    public function Filtro($nome_token_user='',Request $request)
    {
        // $items = Venta::with('estado','cliente','courier','detalle')->get();
        // $consulta = array (
        //     'items' => $items,
        // );
        //return  response()->json($request);

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
                if ($request->value2=='ventas') {
                    $estado = EstadoVenta::where([['cod','001']])->first();
                    $items = Venta::with('estado','cliente','courier','detalle')->where([["estado_del","1"],["idestado","<>","$estado->id"],["fecha","like","%$request->value%"]])->get();
                } else if($request->value2=='pedidos'){
                    $estado = EstadoVenta::where([['cod','001']])->first();
                    $items = Venta::with('estado','cliente','courier','detalle')->where([["estado_del","1"],["idestado","$estado->id"],["fecha","like","%$request->value%"]])->get();
                }

                //dd($items);
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

    //asignar courier
    public function asignarCourier($nome_token_user='',Request $request)
    {
      //return response()->json('hola');
      // // code...
      // //return response()->json($request);
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
              $items = Venta::where("nome_token",$request->nome_token_venta)->first();
              $estado = EstadoVenta::where('cod','002')->first();
              $items->idestado = $estado->id;
              //return response()->json($estado);
              $courier = User::where('nome_token',$request->nome_token_courier)->first();
              $items->idcourier = $courier->id;

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

}
