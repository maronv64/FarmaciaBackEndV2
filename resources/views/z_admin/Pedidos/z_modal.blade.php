<!-- Large modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".frmPedidos_modal">Large modal</button> -->

<div class="modal fade frmPedidos_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
	  	<div class="modal-header text-white" style="background:  #004a93">
	        <h5 class="modal-title" id="exampleModalLabel">Detalle</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span class="text-white" aria-hidden="true">&times;</span>
	        </button>  		
	  	</div> 	

	  	<div class="modal-body">

			<form id="frmPedidos_modificar" class="needs-validation">
				<input type="hidden" name="" id="nome_token_tipo_u_modal" required>
				<div class="form-group row">
				    <!-- <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Descripcion:</label> -->
				    <div class="col-sm-12">
				    	<textarea rows="10" cols="50" type="text" class="form-control form-control-sm" id="txt_descripcion_t_u_modal" placeholder="col-form-label-sm" disabled></textarea>
				    </div>
				</div>	
			</form>	

	  	</div>	     

	  	<div class="modal-footer">
	  		
	  	</div>

    </div>
  </div>
</div>