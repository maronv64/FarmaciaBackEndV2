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

      <a tabindex="0" class="btn btn-sm btn-primary popover-dismiss" style="border-radius: 100%;" data-placement="top" role="button" data-toggle="popover" data-trigger="focus" data-content="And here's some amazing content. It's very engaging. Right?"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></a>
      <a tabindex="0" class="btn btn-sm btn-primary popover-dismiss" style="border-radius: 100%;" data-placement="top" role="button" data-toggle="popover" data-trigger="focus" data-content="And here's some amazing content. It's very engaging. Right?"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></a>

      <button class="btn btn-sm btn-primary" style="border-radius: 100%;" type="button" name="button"> <i class="fa fa-circle-o-notch" aria-hidden="true"></i> </button>


      <button type="button" name="button" onclick="generarPDF();">Generar PDF</button>

      <a href="api/v0/produtosjs">ir a login</a>

      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
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
