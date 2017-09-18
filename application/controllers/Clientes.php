<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientes extends Base_Controller{
	function __construct(){
		parent::__construct();
	}
	# Metodo para retornar la vista del top5 del cliente logueado
	function Top5(){
		echo $this->templates->render('Clientes/top5');
	}
	# Metodo para retornar la vista del calendario mensual de actividades
	function calendarioMensual(){
		echo $this->templates->render('Clientes/calendario-mensual');
	}
	# Metodo para retornar la vista de las estadisticas mensuales del cliente
	function estadisticasMensuales(){
		echo $this->templates->render('Clientes/estadisticas-mensuales');
	}
	# Metodo para retornar la vista de estadisticas anuales del cliente
	function estadisticasAnuales(){
		echo $this->templates->render('Clientes/estadisticas-anuales');
	}
	# Metodo para retornar el top 5 de las publicaciones del cliente
	public function obtenerTop5(){
		# Cargamos el modelo del Top5 publicaciones
		$this->load->model('vn_top5_publicaciones');
		# Obtenemos las ultimas publicaciones del cliente por red social
		$data = array(
			'f' => $this->vn_top5_publicaciones->obtenerPublicaciones($this->created_user, 'f'),
			't' => $this->vn_top5_publicaciones->obtenerPublicaciones($this->created_user, 't'),
			'i' => $this->vn_top5_publicaciones->obtenerPublicaciones($this->created_user, 'i')
		);
		exit(json_encode($data));
	}
}