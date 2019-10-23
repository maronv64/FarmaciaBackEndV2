//GestionVentas.js
$( document ).ready(function() {
	//cargar_tablaVentas('');
});

function cargar_tablaVentas(value='') {
  //swal('cargar_tablaVentas');
  var FrmData=
  {
    value: value,
    value2: 'ventas',
  }
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });

  $.ajax({
    url: '/api/v0/ventas_filtro/'+$('#nome_token_user').val()+'/'+FrmData,// Url que se envia para la solicitud esta en el web php es la ruta
    method: "GET",             // Tipo de solicitud que se enviará, llamado como método
    data: FrmData,               // Datos enviaráados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
    success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
    {
      	//console.log(data);
        crear_tablaVentas(data);
    },
    error: function () {
        mensaje = "OCURRIO UN ERROR: Archivo->GestionUsuarios.js , funcion->cargar_tablaVentas()";
        swal(mensaje);
    }
  });
}

function crear_tablaVentas(data) {
	//swal('hola');
  	$('#tablaVentas').html('');

    //console.log(data);
	$.each(data.items, function(a, item) { // recorremos cada uno de los datos que retorna el objero json n valores

	  var fila="";
	  fila=`
	    <tr class="fila_${item.nome_token}">
	        <th scope="row">${a+1}</th>
					<td><input type="hidden" value="${item.fecha}">${item.fecha}</td>
	        <td><input type="hidden" value="${item.cliente.name}">${item.cliente.name}</td>
	        <td><input type="hidden" value="${item.courier.name}">${item.courier.name}</td>
	        <td><input type="hidden" value="${item.total}">${item.total}</td>
	        <td><input type="hidden" value="${item.estado.descripcion}">${item.estado.descripcion}</td>
	        <td>
	          <button type="button" class="btn btn-sm btn-outline-info" onclick="ventas_ver('${item.nome_token}')" data-toggle="modal" >Modificar</button>
	          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="ventas_eliminar('${item.nome_token}')">Eliminar</button>
	        </td>
	    </tr>
	  `;
	    //console.log(item);
	    $('#tablaVentas').append(fila);

	});

}

//filtro de ventas
$("#filtroVentas").keyup(function (e) {
	cargar_tablaVentas($("#filtroVentas").val());
});
