$(document).ready(function(){
// Configuracion de la tabla de pre visualizacion de la cotizacion
	$('#tclientes').bootstrapTable({
		data: obtenerClientes(),
		clickToSelect: true,
		toolbar: '#toolbar',
		uniqueId: 'id',
		showRefresh: true,
		columns: [
			{radio: true, align: 'center'},
			{field: 'id', title: 'id', visible: false},
			{field: 'cve_usuario', title: 'Usuario'},
			{field: 'nombre', title: 'Nombre'},
			{field: 'correo', title: 'Correo'},
			{field: 'facebook', title: 'Facebook', formatter: function(value, row, index){
				return "<a target='_blank' href='https://www.facebook.com/"+value+"'><i class='fa fa-facebook'></i>@"+value+"</a>";
			}},
			{field: 'twitter', title: 'Twitter', formatter: function(value, row, index){
				return "<a target='_blank' href='https://www.twitter.com/"+value+"'><i class='fa fa-twitter'></i>@"+value+"</a>";
			}},
			{field: 'instagram', title: 'Instagram', formatter: function(value, row, index){
				return "<a target='_blank' href='https://www.instagram.com/"+value+"'><i class='fa fa-instagram'></i>@"+value+"</a>";
			}},
			{field: 'paginaweb', title: 'Página Web', formatter: function(value, row, index){
				return "<a target='_blank' href='"+value+"'><i class='fa fa-globe'></i>"+value+"</a>";
			}}
		],
		onClickRow: function(row, $element, field){
			$('#cve_usuario').val(row.cve_usuario).prop('readonly', true);
			$('#contrasenia').val('');
			$('#confirmar_contrasenia').val('');
			$('#nombre').val(row.nombre);
			$('#correo').val(row.correo);
			$('#facebook').val(row.facebook);
			$('#twitter').val(row.twitter);
			$('#instagram').val(row.instagram);
			$('#paginaweb').val(row.paginaweb);
		},
	});
// Abrimos el modal para dar de alta un nuevo cliente
	$('#btnAlta').click(function(){
		$('#cve_usuario').val('').prop('readonly', false).prop('placeholder', 'Mínimo 4 caracteres');
		$('#contrasenia').val('').prop('placeholder', 'Mínimo 6 caracteres').closest('div').show();
		$('#confirmar_contrasenia').val('').closest('div').show();
		$('#nombre').val('');
		$('#correo').val('');
		$('#facebook').val('');
		$('#twitter').val('');
		$('#instagram').val('');
		$('#paginaweb').val('');
		$('#accion').val('alta');
		$('#modalCliente').modal('show');
	});
// Abrimos el modal para editar la informacion de un cliente
	$('#btnEditar').click(function(){
		if($('#cve_usuario').val() == ''){
			toastr.info('Selecccion un registro de la tabla para editar', 'Mensaje del Sistema',  {timeOut: 4000});
		} else{
			$('#cve_usuario').prop('readonly', true);
			$('#contrasenia').closest('div').hide();
			$('#confirmar_contrasenia').closest('div').hide();
			$('#accion').val('editar');
			$('#modalCliente').modal('show');
		}
	});
// Enviamos el formulario de alta de cliente
	$('#formCliente').submit(function(e){
		e.preventDefault();
		url = $('#accion').val() == 'alta' ? 'AltaCliente' : 'EditarCliente';
		response = ajax(url, $('#formCliente').serialize());
		toastr.clear();
		if(response.bandera == true){
			$('#modalCliente').modal('hide');
			$('#tclientes').bootstrapTable('load', obtenerClientes());
			toastr.success(response.msj, 'Mensaje del Sistema');
		} else{
			toastr.error(response.msj + ' ' + response.error, 'Mensaje del Sistema',  {timeOut: 0});
		}
	});
});
// Funcion para obtener la lista de clientes
var obtenerClientes = function(){
	response = ajax('obtenerClientes');
	return response;
}