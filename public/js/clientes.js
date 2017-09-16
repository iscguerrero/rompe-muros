$(document).ready(function(){
// Configuracion de la tabla de pre visualizacion de la cotizacion
	$('#tclientes').bootstrapTable({
		data: [],
		clickToSelect: true,
		toolbar: '#toolbar',
		uniqueId: 'id',
		columns: [
			{radio: true, align: 'center'},
			{field: 'id', title: 'id', visible: false},
			{field: 'cve_usuario', title: 'Usuario', align: 'center', halign: 'center'},
			{field: 'descripcion', title: 'Perfil', align: 'center', halign: 'center'},
			{field: 'nombre', title: 'Nombre', align: 'center', halign: 'center'},
			{field: 'correo', title: 'Correo', align: 'center', halign: 'center'}
		]
	});
// Enviamos el formulario de alta de cliente
	$('#formCliente').submit(function(e){
		e.preventDefault();
		response = ajax('../Login/AltaUsuario', $('#formCliente').serialize());
		modalAlerta.modal('hide');
		toastr.clear();
		if(response.bandera == true){
			$('#modalCliente').modal('hide');
			toastr.success(response.msj, 'Mensaje del Sistema');
		} else{
			toastr.error(response.msj + ' ' + response.error, 'Mensaje del Sistema',  {timeOut: 0});
		}
	});
});