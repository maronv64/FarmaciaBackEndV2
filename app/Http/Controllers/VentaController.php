<?php

namespace App\Http\Controllers;

use App\Venta;
use Illuminate\Http\Request;
use App\User;
use App\EstadoVenta;
use Illuminate\Support\Str;
use App\DetalleVenta;

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
    public function store($nome_token_user,Request $request) // la venta se genera inicialmente en solicitud (pedido) 
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

                try {

                    $code = '200';

                    $items = new Venta();
                    //-------------------------------------------------------
                    //cuando se genera una venta por defecto sera una socisitud (o pedido del cliente) por ende se buacara el idestdo correspondiente
                    $estado = EstadoVenta::where('cod','001')->first();
                    $items->idestado = $estado->id;
                    //------------------------------------------------------
                    //$items->idestado = $request->idestado;
                    $items->idcliente = $request->idcliente;
                    // $items->idcourier = $request->idcourier;
                    $items->fecha = date("Y-m-d H:i:s");   //$request->fecha;//fecha del servidor
                    $items->subtotal = $request->subtotal;
                    $items->total = $request->total;
                    $items->estado_del = '1';
                    $items->nome_token = str_replace($ignorar,"",bcrypt(Str::random(10)));
                    $items->save();

                    $message = 'OK';

                } catch (\Throwable $th) {
                    $code = '418';
                    $message = 'I am a teapot';
                }
                

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
    public function asignar_courier($nome_token_user='',Request $request) // paso dos de la venta es asignar el courier
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

            try {

                $code = '200';
                $items = Venta::where("nome_token",$request->nome_token_venta)->first();
                // como la venta pasa al 2 nivel que es asigar el courier entonces se debe cambiar el estado de la venta.
                $estado = EstadoVenta::where('cod','002')->first();
                $items->idestado = $estado->id;
                //return response()->json($estado);
                $courier = User::where('nome_token',$request->nome_token_courier)->first();
                $items->idcourier = $courier->id;
  
                $items->update();
                $message = 'OK';

            } catch (\Throwable $th) {
                $code = '418';
                $message = 'I am a teapot';
            }

          }

      }

      $result =   array(
                      'items'     => $items,
                      'code'      => $code,
                      'message'   => $message
                  );

      return response()->json($result);

    }

    public function generar_pedido($nome_token_user,Request $request)  // con esta funcion se agregan los items del carrito a la venta en estado pedido
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
                
                try {
                    //buscar la venta con el token enviado desde la app
                    $venta = Venta::where("nome_token",$request->nome_token)->first();

                    $code = '200';
                    $message = 'OK';
                    //se buscan todos los registros de la tabla detalle venta que encajen el la idea de carrito
                    $items = DetalleVenta::with('producto')->where([["estado_del","1"],['idventa',null],["idcliente","$validad->id"]])->get();
                    //se realiza un recorrido a a los registros de la tabla para actualizarlos con el id de venta 
                    foreach ($items as $key => $item) {
                        $item->idventa=$venta->idventa;
                        $item->update();
                    }
                } catch (\Throwable $th) {
                    $code = '418';
                    $message = 'I am a teapot';
                }
               
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
