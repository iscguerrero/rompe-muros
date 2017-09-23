$(document).ready(function(){
	/*************** CONFIGURACION GENERAL DEL COMPORTAMIENTO DE LA VISTA ***************/
	// Configuracion de las alertas con toastr
		toastr.options.closeButton = true;
		toastr.options.closeHtml = '<button><i class="power-off"></i></button>';
		toastr.options.preventDuplicates = true;
	// Configuracion del tooltip en la vista
		$('[data-toggle="tooltip"]').tooltip();
	// Configuracion del modal de mensajes del sistema
		modalAlerta = $('#modalAlerta').modal({
			backdrop: 'static',
			keyboard: false,
			show: false
		});
		msjAlerta = $('#msjAlerta');
	// Configuracion del datepicker
	$('.simple-dp').datetimepicker({
		locale: 'es',
		format: 'DD-MMMM-YYYY',
		ignoreReadonly: true,
		allowInputToggle: true
	});
});
// Funcion para dar formato a un numero
function formato_numero(numero, decimales, separador_decimal, separador_miles){
	numero = parseFloat(numero);
	if(isNaN(numero)) return '';
	if(decimales!==undefined) numero=numero.toFixed(decimales);
	numero = numero.toString().replace('.', separador_decimal!==undefined ? separador_decimal : ',');
	if(separador_miles) {
		var miles=new RegExp("(-?[0-9]+)([0-9]{3})");
		while(miles.test(numero)) {
			numero=numero.replace(miles, '$1' + separador_miles + '$2');
		}
	}
	return numero;
}
// Funcion para dar de alta un cliente
var ajax = function(url, str){
	response = [];
	$.ajax({
		url: url,
		data: str,
		type: 'POST',
		async: false,
		cache: false,
		dataType: 'json',
		success: function(json){
			response = json;
		}
	});
	return response;
}