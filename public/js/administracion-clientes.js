$(document).ready(function(){
// Configuracion de la tabla de pre visualizacion de la cotizacion
	$('#tclientes').bootstrapTable({
		data: obtenerClientes(),
		clickToSelect: true,
		toolbar: '#toolbar',
		columns: [
			{radio: true, align: 'center'},
			{field: 'id', title: 'id', visible: false},
			{field: 'cve_usuario', title: 'Usuario'},
			{field: 'nombre', title: 'Nombre'},
			{field: 'correo', title: 'Correo'},
			{field: 'facebook', title: "<i class='fa fa-facebook'></i> Facebook", formatter: function(value, row, index){
				if(value==''){
					return '';
				} else{
					return "<a target='_blank' href='https://www.facebook.com/"+value+"'>@"+value+"</a>";
				}
			}},
			{field: 'twitter', title: "<i class='fa fa-twitter'></i> Twitter", formatter: function(value, row, index){
				if(value==''){
					return '';
				} else{
					return "<a target='_blank' href='https://www.twitter.com/"+value+"'>@"+value+"</a>";
				}
			}},
			{field: 'instagram', title: "<i class='fa fa-instagram'></i> Instagram", formatter: function(value, row, index){
				if(value==''){
					return '';
				} else{
					return "<a target='_blank' href='https://www.instagram.com/"+value+"'>@"+value+"</a>";
				}
			}},
			{field: 'paginaweb', title: "<i class='fa fa-globe'></i> Página Web", formatter: function(value, row, index){
				if(value==''){
					return '';
				} else{
					return "<a target='_blank' href='"+value+"'>"+value+"</a>";
				}
			}},
			{field: 'estatus', title: "Estatus", formatter: function(value, row, index){
				if(value=='A'){
					return '<span class="label label-success">Activo</span>';
				} else{
					return '<span class="label label-danger">Suspendido</span>';
				}
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
			$('#btnSuspender').val(row.estatus == 'A' ? 'Suspender' : 'Activar');
			$('#strongAccion').text(row.estatus == 'A' ? 'Suspender' : 'Activar')
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
			toastr.info('Selecccion un registro de la tabla para continuar', 'Mensaje del Sistema',  {timeOut: 4000});
		} else{
			$('#cve_usuario').prop('readonly', true);
			$('#contrasenia').closest('div').hide();
			$('#confirmar_contrasenia').closest('div').hide();
			$('#accion').val('editar');
			$('#modalCliente').modal('show');
		}
	});

// Abrimos el modal para suspender la cuenta de un cliente
	$('#btnSuspender').click(function(){
		if($('#cve_usuario').val() == ''){
			toastr.info('Selecccion un registro de la tabla para continuar', 'Mensaje del Sistema',  {timeOut: 4000});
		} else{
			$('#modalSuspender').modal('show');
		}
	});

// Configuracion del comportamiento del switch de clientes
	var cbxSuspendidos = document.getElementById('cbxSuspendidos');
	var init = new Switchery(cbxSuspendidos, {
		color: '#26B99A'
	});
	cbxSuspendidos.onchange = function(){
		$('#tclientes').bootstrapTable('load', obtenerClientes());
	};

// Enviamos el formulario de alta/edicion de cliente
	$('#formCliente').submit(function(e){
		e.preventDefault();
		url = $('#accion').val() == 'alta' ? '../Clientes/AltaCliente' : '../Clientes/EditarCliente';
		respuesta = ajax(url, $('#formCliente').serialize());
		toastr.clear();
		if(respuesta.bandera == true){
			console.log(respuesta);
			$('#modalCliente').modal('hide');
			$('#tclientes').bootstrapTable('load', obtenerClientes());
			toastr.success(respuesta.msj, 'Mensaje del Sistema');
		} else{
			toastr.error(respuesta.msj + ' ' + respuesta.error, 'Mensaje del Sistema',  {timeOut: 0});
		}
	});

// Enviamos el formulario para suspender un cliente
	$('#formSuspender').submit(function(e){
		e.preventDefault();
		estatus = $('#btnSuspender').val() == 'Suspender' ? 'X' : 'A';
		respuesta = ajax('../Clientes/SuspenderCliente', {cve_usuario: $('#cve_usuario').val(), estatus: estatus});
		toastr.clear();
		if(respuesta.bandera == true){
			$('#modalSuspender').modal('hide');
			$('#tclientes').bootstrapTable('load', obtenerClientes());
			toastr.success(respuesta.msj, 'Mensaje del Sistema');
		} else{
			toastr.error(respuesta.msj + ' ' + respuesta.error, 'Mensaje del Sistema',  {timeOut: 0});
		}
	});

});

// Funcion para obtener la lista de clientes
	var obtenerClientes = function(){
		$('#btnSuspender').val('...');
		$('#cve_usuario').val('');
		response = ajax('../Clientes/ObtenerClientes', {estatus: $('#cbxSuspendidos').is(':checked') ? 'X' : 'A'});
		return response;
	}
