//GestionPedidos.js
$( document ).ready(function() {
	//swal('GestionPedidos.js');
	//cargar_tablaPedidos('');
});


//	Cargar Todos los pedidos
//****************************************************************************************************************************************************************************
function cargar_tablaPedidos(value='') {
  var FrmData=
  {
    value: value,
    value2: 'pedidos',
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
      GP_crearTablaPedidos_2(data.items);   
    },
    error: function () {
        mensaje = "OCURRIO UN ERROR : Archivo->GestionPedidos.js, funcion->cargar_tablaPedidos()";
        swal(mensaje);
    }
  });
}

function crear_tablaPedidos(data) {
	//swal('hola');
  	$('#tablaPedidos').html('');

    //console.log(data);
	$.each(data.items, function(a, item) { // recorremos cada uno de los datos que retorna el objero json n valores

	  var fila="";
	  fila=`
	    <tr class="fila_${item.nome_token}">
	        <th scope="row">${a+1}</th>
          <td><input type="hidden" value="${item.fecha}">${item.fecha}</td>
	        <td><input type="hidden" value="${item.cliente.name}">${item.cliente.name}</td>
	        <td><button type="button" class="btn btn-sm btn-outline-success" onclick="pedidos_verCouriers('${item.nome_token}')">Asignar </button></td>
	        <td>
	          <button type="button" class="btn btn-sm btn-outline-info" onclick="pedidos_ver('${item.nome_token}')" data-toggle="modal" >Ver</button>
	          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="pedidos_eliminar('${item.nome_token}')">Eliminar</button>
	        </td>
	    </tr>
	  `;
	    //console.log(item);
	    $('#tablaPedidos').append(fila);

	});

}

function GP_crearTablaPedidos_2(data) {
  // debugger
  $('#tablaPedidos').html('');
  $('#tablaPedidos_padre').html('');
  //$.get(`${apiProductos}api/v0/itemsBodega`,function (data) {
    $('#tablaPedidos_padre').DataTable({
/////////////////////////////////////////////////////////////////////////////////////
      destroy: true,
      order: [],
      data: data,
      'createdRow': function (row, data, dataIndex) {
          // console.log(data);
      },
      'columnDefs': [
          {
             'targets': 3,
             'data':'id',
             'createdCell':  function (td, cellData, rowData, row, col) {
                  // $(td).attr('id','nombreCurso'+row);
                  // $(td).html('');
                  // $(td).append('<label class="switch"><input type="checkbox"><span class="slider round"></span></label>');
                  // $(td).append(`<button type="button" class="btn btn-sm btn-outline-info">ver</button>`);
                  // $(td).append('<button type="button" class="btn btn-sm btn-outline-secondary">Eliminar</button>');
             },
          }
       ],
      columns: [
          {
              title: 'FECHA',
              data: 'fecha'
          },
          {
              title: 'CLIENTE',
              data: 'cliente.name'
          },
          {
              title: 'TRANSPORTE',
              data: null,
              render: function ( data, type, row ) {

                var html = `
                  <button type="button" class="btn btn-sm btn-outline-success" onclick="pedidos_verCouriers('${data.nome_token}')">Asignar </button>
                `;

                return `${html}`;
                
              }
          },
          {
              title: 'ACCIONES',
              data: null,
              render: function (data, type, row) {

                var html = `
                  <button type="button" class="btn btn-sm btn-outline-info" onclick="pedidos_ver('${data.nome_token}')" data-toggle="modal" >Ver</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="pedidos_eliminar('${data.nome_token}')">Eliminar</button>
                `;

                return `${html}`;
                // return `<button>hola</button>`;

              }
          }
      ],
/////////////////////////////////////////////////////////////////////////////////////
    });
  //});
}




function pedidos_ver(nome_token) {
	// body...
	///swal('pedidos_ver');

	$(".frmPedidos_modal").modal('show');
}



//Cargar todos los Couriers
//****************************************************************************************************************************************************************************

function pedidos_verCouriers(nome_token) {
	//swal('oh');
	$("#pedido_nome_token").val(nome_token);
  cargar_tablaCouriers('');
	$(".frmCourier_modal").modal("show");
}


function cargar_tablaCouriers(value='') {
  var FrmData=
  {
    value: value,
  }
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });

  $.ajax({
    url: '/api/v0/usuarios_couriers_filtro/'+$('#nome_token_user').val()+'/'+FrmData,// Url que se envia para la solicitud esta en el web php es la ruta
    method: "GET",             // Tipo de solicitud que se enviará, llamado como método
    data: FrmData,               // Datos enviaráados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
    success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
    {
      //console.log(data);
        crear_tablaCouriers(data);
    },
    error: function () {
        mensaje = "OCURRIO UN ERROR: archivo->GestionPedidos.js , función->cargar_tablaCouriers()";
        swal(mensaje);
    }
  });
}

function crear_tablaCouriers(data) {
  $('#tablaCouriers').html('');
    //console.log(data);
    $.each(data.items, function(a, item) { // recorremos cada uno de los datos que retorna el objero json n valores

      var fila="";

      fila=`
        <tr class="fila_${item.nome_token}">
            <th scope="row">${a+1}</th>
            <td><input type="hidden" value="${item.tipo.descripcion}">${item.tipo.descripcion}</td>
            <td><input type="hidden" value="${item.name}">${item.name}</td>
            <td><input type="hidden" value="${item.email}">${item.email}</td>
            <td><input type="hidden" value="${item.cedula}">${item.cedula}</td>
            <td><input type="hidden" value="${item.celular}">${item.celular}</td>
            <td>
              <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" onclick="pedidos_asignarCourier('${item.nome_token}')">Asignar</button>
            </td>
        </tr>
      `;
        //console.log(item);
        $('#tablaCouriers').append(fila);

    });

}
function pedidos_asignarCourier(nome_token) {
  //swal(nome_token);
	$("#fk_courier_nome_token").val(nome_token);

	var FrmData=
  {
    nome_token_venta: $("#pedido_nome_token").val(),
		nome_token_courier: nome_token,
  }
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });

	//swal("nome_token_venta :"+FrmData.nome_token_venta+" -- nome_token_courier: "+FrmData.nome_token_courier);

	swal({
		title: "Estas seguro de esto?",
		text: "Si aceptas, los datos seran modificados!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {

			$.ajax({
		    url: '/api/v0/ventas_asignar_courier/'+$('#nome_token_user').val()+'/'+FrmData,// Url que se envia para la solicitud esta en el web php es la ruta
		    method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
		    data: FrmData,               // Datos enviaráados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
		    success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
		    {
					//swal(data);
          //console.log(data);
          console.log(data);
          
		    	cargar_tablaPedidos('');
					$(".frmCourier_modal").modal("hide");
		    },
		    error: function () {
		        mensaje = "OCURRIO UN ERROR: archivo->GestionPedidos.js , función->pedidos_asignarCourier()";
		        swal(mensaje);
		    }
		  });

		} else {
			swal("Cancelado!");
		}
	});


}

//****************************************************************************************************************************************************************************

$('#filtroPedidos').keyup(function (e) {
  cargar_tablaPedidos($('#filtroPedidos').val());
});
