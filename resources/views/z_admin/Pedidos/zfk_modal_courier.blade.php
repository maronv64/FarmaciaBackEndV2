<!-- Large modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".frmCourier_modal">Large modal</button> -->

<div class="modal fade frmCourier_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

	  	<div class="modal-header text-white" style="background:  #004a93">
	        <h5 class="modal-title" id="exampleModalLabel">Asignar Transporte</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span class="text-white" aria-hidden="true">&times;</span>
	        </button>
	  	</div>

	  	<div class="modal-body">

<!-- 			<form id="frmCourier_modificar" class="needs-validation">
				<input type="hidden" name="" id="nome_token_tipo_u_modal" required>
				<div class="form-group row">
				    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Descripcion:</label>
				    <div class="col-sm-6">
				    	<input type="text" class="form-control form-control-sm" id="txt_descripcion_t_u_modal" placeholder="col-form-label-sm" required>
				    </div>
				    <div class="col-sm-4">
				      	<input type="submit" class="form-control form-control-sm bg-primary" value="Enviar" style="color: white">
				    </div>
				</div>
			</form>	 -->
			<input type="hidden" name="" id="fk_courier_nome_token" value="fk_courier_nome_token">

			@include('z_admin.Pedidos.zfk_tabla_courier')

	  	</div>

	  	<div class="modal-footer">

	  	</div>

    </div>
  </div>
</div>
