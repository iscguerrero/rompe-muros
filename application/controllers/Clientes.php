<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientes extends Base_Controller{
	function __construct(){
		parent::__construct();
	}
	function calendario_mensual(){
		echo $this->templates->render('Clientes/calendario_mensual');
	}
	function estadisticas_mensuales(){
		echo $this->templates->render('Clientes/estadisticas_mensuales');
	}
	function estadisticas_anuales(){
		echo $this->templates->render('Clientes/estadisticas_anuales');
	}
}