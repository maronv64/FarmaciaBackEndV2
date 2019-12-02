$( document ).ready(function(e) {
  // console.log($('#cmb_tipo_reporte').val());
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

function generarPDF() {
  console.log('hola');
  var doc = new jsPDF()
  var html = `<p>hola</p>`;
  doc.text(html, 10, 10)
  doc.save('a4.pdf')
}


var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').on("click",function (e) {

    e.preventDefault();

    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});

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

