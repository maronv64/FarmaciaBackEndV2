<div id="cardPedidos" class="card">
    <div class="card-header barra">Pedidos</div>

    <div class="card-body">

<!-- 		<form class="needs-validation">

		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Pedidos:</label>
		    <div class="col-sm-10">
		      <select class="form-control form-control-sm" id="cmb_tipo_u" placeholder="col-form-label-sm" required> </select>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control form-control-sm" id="c" placeholder="col-form-label-sm" required>
		    </div>
		  </div>

		  <div class="form-group row">
		    <div class="col-sm-12">
		      <input type="submit" class="form-control form-control-sm bg-primary" id="btnGuardarPedido" style="color: white">
		    </div>
		  </div>

		</form> -->

    </div>

	<div class="card-footer">
		@include('z_admin.Pedidos.tabla')
		@include('z_admin.Pedidos.z_modal')
		@include('z_admin.Pedidos.zfk_modal_courier')
	</div>

</div>
