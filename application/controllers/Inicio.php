<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inicio extends Base_Controller{

	# Constructor de la clase
	function __construct(){
		parent::__construct();
	}

	# Metodo para retornar la vista que carga el top5 de las publicaciones del cliente
	public function Top5(){
		echo $this->templates->render('Inicio/top5');
	}

	# Metodo para retornar la vista del calendario mensual de actividades
	function calendarioMensual(){
		echo $this->templates->render('Inicio/calendario-mensual');
	}

	# Metodo para retornar la vista de las estadisticas mensuales del cliente
	function estadisticasMensuales(){
		echo $this->templates->render('Inicio/estadisticas-mensuales');
	}

	# Metodo para retornar la vista de estadisticas anuales del cliente
	function estadisticasAnuales(){
		echo $this->templates->render('Inicio/estadisticas-anuales');
	}

}