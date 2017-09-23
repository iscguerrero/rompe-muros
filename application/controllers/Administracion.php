<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administracion extends Base_Controller{

	# Constructor de la clase
	function __construct(){
		parent::__construct();
	}

	# Metodo para retornar la vista de administracion de clientes
	public function Clientes(){
		echo $this->templates->render('Administracion/clientes');
	}

	# Metodo para retornar la vista de administracion del top5
	public function Top5(){
		echo $this->templates->render('Administracion/top5');
	}

	# Metodo para retornar la vista donde se cargan las estadisticas del cliente
	public function Estadisticas(){
		echo $this->templates->render('Administracion/estadisticas');
	}

}