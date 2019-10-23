<div id="cardUsuarios" class="card">
    <div class="card-header barra">Usuarios</div>

    <div class="card-body">

		<form id="frmUsuarios" class="needs-validation">

		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tipo de Usuario:</label>
		    <div class="col-sm-10">
		      <select class="form-control form-control-sm" id="cmb_tipo_u" placeholder="col-form-label-sm" required> </select>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control form-control-sm limpiar" id="txt_nombre_u" placeholder="col-form-label-sm" required>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email:</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control form-control-sm limpiar" id="txt_email_u" placeholder="col-form-label-sm" required>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Cédula:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control form-control-sm limpiar" id="txt_cedula_u" placeholder="col-form-label-sm" required>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Celular:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control form-control-sm limpiar" id="txt_celular_u" placeholder="col-form-label-sm" required>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Password:</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control form-control-sm limpiar" id="txt_password_u" placeholder="col-form-label-sm" required>
		    </div>
		  </div>

		  <div class="form-group row">
		    <div class="col-sm-12">
		      <input type="submit" class="form-control form-control-sm bg-primary" id="btnGuardarUsuario" style="color: white" value="Enviar">
		    </div>
		  </div>

		</form>

    </div>

	<div class="card-footer">
		@include('z_admin.Usuarios.tabla')
		@include('z_admin.Usuarios.z_modal')
	</div>

</div>
