<div id="cardReportes" class="card">
    <input id="fecha_inicio" type="hidden" name="" value="<?php echo date('d-m-y') ?>">
    <div class="card-header barra">Reportes</div>

    <div class="card-body">

		<form id="frmReportes" class="needs-validation">

		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tipo de Reporte:</label>
		    <div class="col-sm-10">
		      <select class="form-control form-control-sm" id="cmb_tipo_reporte" placeholder="col-form-label-sm" required>
            <option value="usuarios" selected>Usuarios</option>
            <option value="pedidos">Pedidos</option>
            <option value="ventas">Ventas</option>
          </select>
		    </div>
		  </div>

      <div id="ReporteContenido">

      </div>

		  <!-- <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control form-control-sm limpiar" id="txt_nombre_u" placeholder="col-form-label-sm" required>
		    </div>
		  </div> -->

		</form>

    </div>

	<div class="card-footer">
		{{--@include('z_admin.Reportes.tabla')
		@include('z_admin.Reportes.z_modal')--}}
	</div>

</div>
