$( document ).ready(function(e) {
  // console.log($('#cmb_tipo_reporte').val());
  $('#tabla_reporte_head').html('');
  $('#tabla_reporte_body').html('');
  $('#combo_fechas_filtro').hide();
  $('#combo_tipo_usuario_filtro').hide();
  cargar_cmbTipoUsuarioFiltro();
  // $('#combo_fechas_filtro').show();
});

// $('#cmb_tipo_reporte').change(function (e) {
//   console.log($('#cmb_tipo_reporte').val());
//   if ($('#cmb_tipo_reporte').val()==='pedidos') {
//     crear_estructura_repor_pedidos();
//   }
// });


function crear_estructura_repor_pedidos() {

  var html = `
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Fecha de Inicio:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control form-control-sm limpiar" value="${$('#fecha_inicio').val()}">
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Fecha de Fin:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control form-control-sm limpiar" value="${$('#fecha_inicio').val()}">
    </div>
  </div>
  `;
  $('#ReporteContenido').append(html);
}

function cargar_cmbTipoUsuarioFiltro() {
  var FrmData=
  {
    value: '',
  }
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/api/v0/tipo_usuarios_filtro/'+$('#nome_token_user').val()+'/'+FrmData,// Url que se envia para la solicitud esta en el web php es la ruta
        method: "GET",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log("que pasa wey",data);
            $('#cmbTipoUsuarioFiltro').html('');
            $('#cmbTipoUsuarioFiltro').append(`<option value="xtodo">Todos</option>`);
            $.each(data.items, function(a, item) { // recorremos cada uno de los datos que retorna el objero json n valores

                var fila ="";
                fila = `<option value="${item.nome_token}">${item.descripcion}</option>`;
                $('#cmbTipoUsuarioFiltro').append(//identificamos ala nota que queremos add esta otra nota
                    fila
                );
               //console.log(item);
           });
        },
        error: function (err) {
            console.log(err);
            mensaje = "OCURRIO UN ERROR: Archivo->GestionUsuarios.js , funcion->cargar_cmbTipoUsuario()";
            swal(mensaje);
        }
  });
}

// function generarPDF() {
//   console.log('hola');
//   var doc = new jsPDF()
//   var html = `<p>hola</p>`;
//   doc.text(html, 10, 10)
//   doc.save('a4.pdf')
// }


// var doc = new jsPDF();
// var specialElementHandlers = {
//     '#editor': function (element, renderer) {
//         return true;
//     }
// };

// $('#cmd').on("click",function (e) {

//     e.preventDefault();

//     doc.fromHTML($('#content').html(), 15, 15, {
//         'width': 170,
//             'elementHandlers': specialElementHandlers
//     });
//     doc.save('sample-file.pdf');
// });

$("#jqueryPrinf").on("click",function (e) {
  e.preventDefault();
  $("#content").print({
    globalStyles: true,
    mediaPrint: false,
    stylesheet: null,
    noPrintSelector: ".no-print",
    iframe: true,
    append: null,
    prepend: null,
    manuallyCopyFormValues: true,
    deferred: $.Deferred(),
    timeout: 750,
    title: null,
    doctype: '<!doctype html>'
  });

});

$('#cmbTipoReporte').change(function (e) {

  $('#tabla_reporte_head').html('');
  $('#tabla_reporte_body').html('');

  if ($('#cmbTipoReporte').val()=="usuarios"){
    $('#combo_fechas_filtro').hide();
    $('#combo_tipo_usuario_filtro').show();

    console.log('usuarios');
    var FrmData = {
      value:'',
    };
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $.ajax({
      url: '/api/v0/usuarios_filtro/'+$('#nome_token_user').val()+'/'+FrmData,// Url que se envia para la solicitud esta en el web php es la ruta
      method: "GET",             // Tipo de solicitud que se enviará, llamado como método
      data: FrmData,               // Datos enviaráados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
      success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
      {
        if (data.code==='200') {

          crear_reportes_tabla_usuarios(data);
        }
      },
      error: function () {
          mensaje = "OCURRIO UN ERROR: Archivo->GestionReportes.js , funcion->cmbTipoReporte.change()";
          swal(mensaje);
      }
    });
  } else if ($('#cmbTipoReporte').val()=="ventas") {
     $('#combo_fechas_filtro').show();
     $('#combo_tipo_usuario_filtro').hide();

    var FrmData=
    {
      value: "",
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
          // crear_tablaVentas(data);
          crear_reportes_tabla_venta_pedidos(data);
      },
      error: function () {
          mensaje = "OCURRIO UN ERROR: Archivo->GestionReportes.js , funcion->cargar_tablaVentas()";
          swal(mensaje);
      }
    });
  } else if ($('#cmbTipoReporte').val()=="pedidos"){
    $('#combo_fechas_filtro').show();
    $('#combo_tipo_usuario_filtro').hide();

    var FrmData=
    {
      value: "",
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
          // crear_tablaVentas(data);
          crear_reportes_tabla_venta_pedidos(data);
      },
      error: function () {
          mensaje = "OCURRIO UN ERROR: Archivo->GestionReportes.js , funcion->cargar_tablaVentas()";
          swal(mensaje);
      }
    });
  }
});

function crear_reportes_tabla_venta_pedidos(data) {

  console.log(data);


  $('#tabla_reporte_head').html('');
  $('#tabla_reporte_body').html('');

  $('#tabla_reporte_head').append(
    `<tr>
        <th scope="col">#</th>
        <th scope="col">FECHA</th>
        <th scope="col">COURIER</th>
        <th scope="col">CLIENTE</th>
        <th scope="col">DETALLE</th>
        <th scope="col">TOTAL</th>
    </tr>`
  );

  $.each(data.items, function(a, item) { // recorremos cada uno de los datos que retorna el objero json n valores

    var detalle = ``;

    console.log(item.detalle.length);
    if (item.detalle.length>=1) {
      detalle += '<tbody> <tr>';

      for (let index = 0; index < item.detalle.length; index++) {
        const element = item.detalle[index];
        detalle +=`
          <td> ${element.producto.cod_barra} </td>
          <td> ${element.producto.descripcion} </td>
          <td> ${element.cantidad} </td>
          <td> ${element.precio_u} </td>
          <td> ${element.subtotal} </td>

        `;
      }

      detalle+='</tr></tbody>';

    }
    var courier = 'NO ASIGNADO';
    if (item.courier == null) {

    } else {
      courier = item.courier.name;
    }

    var fila="";
    fila=`
      <tr class="fila_${item.nome_token}">
          <th scope="row">${a+1}</th>
          <td><input type="hidden" value="${item.fecha}">${item.fecha}</td>
          <td><input type="hidden" value="${courier }">${courier  }   </td>
          <td><input type="hidden" value="${item.cliente.name}">${item.cliente.name}   </td>
          <td>
            <div >
              <table >
                <thead >
                <tr>
                  <th scope="col">COD. DE BARRA</th>
                  <th scope="col">DESCRIPCIÓN</th>
                  <th scope="col">CANTIDAD</th>
                  <th scope="col">PRECIO</th>
                  <th scope="col">SUBTOTAL</th>
                </tr>
                </thead >

                ${detalle}

              </table>
            </div>

          </td>
          <td><input type="hidden" value="${item.total}">${parseFloat(item.total).toFixed(3)}</td>
      </tr>
    `;

      $('#tabla_reporte_body').append(fila);

  });

}

function crear_reportes_tabla_usuarios(data) {
  $('#tabla_reporte_head').html('');
  $('#tabla_reporte_body').html('');
  $('#tabla_reporte_head').append(
    `<tr>
        <th scope="col">#</th>
        <th scope="col">TIPO</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">E-MAIL</th>
        <th scope="col">CÉDULA</th>
        <th scope="col">CELULAR</th>
    </tr>`
  );

  console.log('USUARIOS',data);



  $.each(data.items,function (a,item) {
    console.log('item:',item);
    var fila="";
    fila=`
      <tr class=$fila_{item.nome_token}>
        <th scope="row">${a+1}</th>
        <td>${item.tipo.descripcion}</td>
        <td>${item.name}</td>
        <td>${item.email}</td>
        <td>${item.cedula}</td>
        <td>${item.celular}</td>
      </tr>
    `;
      $('#tabla_reporte_body').append(fila);

  });


}

$('#cmbTipoUsuarioFiltro').change(function (e) {
  $('#combo_fechas_filtro').hide();
  $('#combo_tipo_usuario_filtro').show();

  console.log('usuarios');

  var _value = $('#cmbTipoUsuarioFiltro').val();

  console.log("_value");

  var FrmData = {
    value: _value,
    valueTipoFiltro: 'xtipo',
  };

  if ($('#cmbTipoUsuarioFiltro').val()=='xtodo') {
    _value = '';
    FrmData.value = _value;
    FrmData.valueTipoFiltro = _value;
  }

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
  $.ajax({
    url: '/api/v0/usuarios_filtro/'+$('#nome_token_user').val()+'/'+FrmData,// Url que se envia para la solicitud esta en el web php es la ruta
    method: "GET",             // Tipo de solicitud que se enviará, llamado como método
    data: FrmData,               // Datos enviaráados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
    success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
    {
      console.log('aasdasd',data);
      if (data.code==='200') {

        crear_reportes_tabla_usuarios(data);
      }
    },
    error: function () {
        mensaje = "OCURRIO UN ERROR: Archivo->GestionReportes.js , funcion->cmbTipoUsuarioFiltro.change()";
        swal(mensaje);
    }
  });
});

$('#dateInputInicio').change(function (e) {
  $('#combo_fechas_filtro').show();
  $('#combo_tipo_usuario_filtro').hide();

  console.log("ewewewewewe");

   var FrmData=
   {
     value: "",
     value2: $('#cmbTipoReporte').val(),
     valueInicio: $('#dateInputInicio').val(),
     valueFin: $('#dateInputFin').val(),
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
         console.log("provando",data);
         crear_reportes_tabla_venta_pedidos(data);
     },
     error: function () {
         mensaje = "OCURRIO UN ERROR: Archivo->GestionReportes.js , funcion->cargar_tablaVentas()";
         swal(mensaje);
     }
   });
});
