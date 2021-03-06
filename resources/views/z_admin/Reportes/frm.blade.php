<div id="cardReportes" class="card">
    <input id="fecha_inicio" type="hidden" name="" value="<?php echo date('d-m-y') ?>">
    <div class="card-header barra">Reportes</div>

    <div class="card-body">

		<form id="frmReportes" class="needs-validation">

		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-4 col-md-4 col-lg-3 col-form-label col-form-label-sm">Tipo de Reporte:</label>
		    <div class="col-sm-8 col-md-8 col-lg-9">
		      <select id="cmbTipoReporte" class="form-control form-control-sm"  placeholder="col-form-label-sm" required>
            <option value="usuarios" selected>Usuarios</option>
            <option value="pedidos">Pedidos</option>
            <option value="ventas">Ventas</option>
          </select>
        </div>

		  </div>
      <div hidden class="form-group row" id="combo_fechas_filtro">
        <label for="colFormLabelSm" class="col-sm-4 col-md-4 col-lg-3 col-form-label col-form-label-sm">Fecha de Inicio:</label>
        <div class="col-sm-8 col-md-8 col-lg-3">
		      <input id="dateInputInicio" type="date"  class="form-control form-control-sm"  placeholder="col-form-label-sm" required>
        </div>
        <label for="colFormLabelSm" class="col-sm-4 col-md-4 col-lg-3 col-form-label col-form-label-sm">Fecha de Fin:</label>
        <div class="col-sm-8 col-md-8 col-lg-3">
		      <input id="dateInputFin" type="date" class="form-control form-control-sm" placeholder="col-form-label-sm" required>
        </div>
      </div>
      <div class="form-group row" id="combo_tipo_usuario_filtro">
		    <label for="colFormLabelSm" class="col-sm-4 col-md-4 col-lg-3 col-form-label col-form-label-sm">Filtrar por Tipo:</label>
		    <div class="col-sm-8 col-md-8 col-lg-9">
		      <select id="cmbTipoUsuarioFiltro" class="form-control form-control-sm"  placeholder="col-form-label-sm" required>

          </select>
        </div>

		  </div>

      <div class="form-group row">
        <div class="col-sm-12">
            <button id="jqueryPrinf" class="form-control form-control-sm btn btn-sm btn-primary">Imprimir</button>
        </div>
      </div>

		</form>

    </div>

	<div class="card-footer">
		@include('z_admin.Reportes.tabla')
		{{--@include('z_admin.Reportes.z_modal')--}}
	</div>

</div>
