//Declaracion de variables globales...
//-----------------------------------------------------------------------------------------
// var apiProductos = "http://192.168.137.1:8080/FarmaciaApis/public/"
var apiProductos = "http://localhost:8080/FarmaciaApis/public/"
//-----------------------------------------------------------------------------------------
$( document ).ready(function() {
    // $('#btnVerFrmTipoUsuarios').hide();
    // $('#btnVerFrmUsuarios').hide();
    // $('#btnVerFrmVentas').hide();
    ocultar();
    $('#fondo').show();
});

function ocultar(argument) {
	$('#fondo').hide();
    $('#cardTipoUsuarios').hide();
    $('#cardUsuarios').hide();
    $('#cardProductos').hide();
    $('#cardPedidos').hide();
    $('#cardVentas').hide();
}

function mostrar(argument) {
	$('#fondo').hide();
    $('#cardTipoUsuarios').show();
    $('#cardUsuarios').show();
    $('#cardProductos').show();
    $('#cardPedidos').show();
    $('#cardVentas').show();
}

function limpiar() {
	$('.limpiar').val('');
}

function cargarMenu() {
	var menu = ['Roles','Usuarios','Ventas'];
	// $.each(menu, function( index, value ) {

	// });
	$( "#menuOpciones" ).html('');
	$.each(menu, function( index, item ) {
	  	$("#menuOpciones").append(
	  		`<button class="btn btn-secondary btn-lg btn-block">
	  			<div class="row fa fa-users"></div>
	  			<div class="row"><div class="col-md-12">${item}</div>
	  		</button>`
	   	);
	});
}

//Botones Principales
//****************************************************************************************************************************************************************************

//boton TipoUsuarios
$('#btnVerFrmTipoUsuarios').click(function (e) {
	ocultar();
  cargar_tablaTipoUsuarios('');
	$('#cardTipoUsuarios').show();
	//cargar_frm_tipo_usuarios();
});

//boton Usuarios
$('#btnVerFrmUsuarios').click(function (e) {
	ocultar();
  cargar_cmbTipoUsuario();
  cargar_tablaUsuarios('');
	$('#cardUsuarios').show();
	//cargar_frm_usuarios();
});

//boton Ventas
$('#btnVerFrmVentas').click(function (e) {
	ocultar();
  cargar_tablaVentas('');
	$('#cardVentas').show();
	//cargar_frm_ventas();
});

//boton Pedidos
$('#btnVerFrmPedidos').click(function (e) {
	ocultar();
  cargar_tablaPedidos('');
	$('#cardPedidos').show();
	//cargar_frm_ventas();
});

//boton Productos
$('#btnVerFrmProductos').click(function (e) {
	ocultar();
	//alert('hola');
  // puto();
  // GP_cargarTablaProductosApp();
  GP_cargar_lista_productos('');
  GP_cargarTablaProductosBodega_2();
	$('#cardProductos').show();
	//cargar_frm_ventas();
});
//*****************************************************************************************************************************************************************************
