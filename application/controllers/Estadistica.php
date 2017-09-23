<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Estadistica extends Base_Controller{
	function __construct(){
		parent::__construct();
	}
	# Metodo para retornar la vista del top5 del cliente logueado
	function Captura(){
		echo $this->templates->render('Estadistica/captura');
	}
}