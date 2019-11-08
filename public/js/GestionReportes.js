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
