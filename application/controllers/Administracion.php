<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administracion extends Base_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		echo $this->templates->render('Administracion/index');
	}
	function clientes(){
		echo $this->templates->render('Administracion/clientes');
	}
}