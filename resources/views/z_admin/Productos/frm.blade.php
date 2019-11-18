<div class="card" id="cardProductos">
    <div class="card-header barra"> <!-- <button class="btn btn-sm btn-primary btnOcultarFrmTipoUsuarios"><span class="fa fa-minus"></span></button> --> Productos </div>

	<div class="card-body">

		<!-- <div class="form-group row">

		    <div class="col-sm-1">
		      <button class="btn btn-sm btn-primary"><span class="fa fa-minus"></span></button>
		    </div>
		    <label for="colFormLabelSm" class="col-sm-11 col-form-label col-form-label-sm"><strong>USUARIOS</strong></label>
		</div> -->

		<form id="frmProductos" class="needs-validation">
<!--
		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Descripcion:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control form-control-sm limpiar" id="txt_descripcion_t_u" placeholder="col-form-label-sm" required>
		    </div>
		    <div class="col-sm-4">
		      <input type="submit" class="form-control form-control-sm bg-primary" id="btnGuardarProductos" value="Enviar" style="color: white">
		    </div>
		  </div>
 -->
		</form>
    </div>

	<div class="card-footer">
		<div class="row">
			<div class="col-md-12">
				@include('z_admin.Productos.tabla_foranea')
			</div>
			<!-- <div class="col-md-6"> -->
				{{--@include('z_admin.Productos.tabla')--}}
			<!-- </div> -->
		</div>

	</div>
		@include('z_admin.Productos.z_modal')
		@include('z_admin.Productos.z_modal_img')
</div>
