$(document).ready(function(){
// Llenado del combo de clientes
	clientes = ajax('../Clientes/obtenerClientes', {estatus: 'A'});
	$.each(clientes, function(index, item){
		$('#cve_usuario').append("<option value='"+item.cve_usuario+"'>"+item.nombre+"</option>");
	});

// Configuracion de la tabla de pre visualizacion de la cotizacion
	$('#tpublicaciones').bootstrapTable({
		data: obtenerTop(),
		clickToSelect: true,
		toolbar: '#toolbar',
		uniqueId: 'id',
		showRefresh: false,
		columns: [
			{radio: true, align: 'center'},
			{field: 'id', title: 'id', visible: false},
			{field: 'codigo', title: 'Código de Inserción', formatter: function(value, row, index){
				return value
			}},
		],
		onClickRow: function(row, $element, field){
			$('#id').val(row.id);
			$('#estatus').val(row.estatus);
			$('#codigo').val(row.codigo);
		},
	});

// Abrimos el modal para dar de alta un nuevo cliente
	$('#btnAlta').click(function(){
		$('#id').val('');
		$('#estatus').val('A');
		$('#codigo').val('');
		$('#accion').val('alta');
		$('#modalTop5').modal('show');
	});

// Abrimos el modal para agregar una nueva publicacion al top5 del cliente
	$('#btnEditar').click(function(){
		if($('#id').val() == ''){
			toastr.info('Selecccion un registro de la tabla antes de continuar', 'Mensaje del Sistema',  {timeOut: 4000});
		} else{
			$('#accion').val('editar');
			$('#modalTop5').modal('show');
		}
	});

	// Actualizamos el data del reporte
	$('#btnGenerar').click(function(){
		$('#tpublicaciones').bootstrapTable('load', obtenerTop());
	});

	// Enviamos el formulario para agregar una nueva publicacion al top5 del cliente
	$('#formTop5').submit(function(e){
		e.preventDefault();
		if( $('#accion').val() == 'alta' ){
			data = {
				cve_usuario: $('#cve_usuario').val(),
				tipo: $('#tipo').val(),
				codigo: $('#codigo').val(),
				estatus: $('#estatus').val()
			};
			url = '../Top5/AltaTop5'
		} else{
			data = {
				id: $('#id').val(),
				cve_usuario: $('#cve_usuario').val(),
				tipo: $('#tipo').val(),
				codigo: $('#codigo').val(),
				estatus: $('#estatus').val()
			};
			url = '../Top5/EditarTop5'
		}
		respuesta = ajax( url, data );
		toastr.clear();
		if(respuesta.bandera == true){
			$('#modalTop5').modal('hide');
			$('#tpublicaciones').bootstrapTable('load', obtenerTop());
			toastr.success(respuesta.msj, 'Mensaje del Sistema');
		} else{
			toastr.error(respuesta.msj + ' ' + respuesta.error, 'Mensaje del Sistema',  {timeOut: 0});
		}
	});
});

// Funcion para obtener la lista de clientes
var obtenerTop = function(){
	response = ajax('../Top5/obtenerTop', {cve_usuario: $('#cve_usuario').val(), tipo: $('#tipo').val(), limit: 450});
	return response;
}