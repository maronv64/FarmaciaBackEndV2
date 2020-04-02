$( document ).ready(function(e) {
  // console.log($('#cmb_tipo_reporte').val());
  $('#tabla_reporte_head').html('');
  $('#tabla_reporte_body').html('');
});

$('#cmb_tipo_reporte').change(function (e) {
  console.log($('#cmb_tipo_reporte').val());
  if ($('#cmb_tipo_reporte').val()==='pedidos') {
    crear_estructura_repor_pedidos();
  }
});

function crear_estructura_repor_usuarios() {

  var html = `
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-control-sm limpiar" id="txt_nombre_u" placeholder="col-form-label-sm" required>
    </div>
  </div>
  `;

}

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

  } else if ($('#cmbTipoReporte').val()=="ventas") {
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

      detalle+='</tr></tbody>'

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


