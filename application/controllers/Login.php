<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends Base_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view('Login/index');
	}
	function get_algo(){
		$this->load->model('gl_asignacion_de_permisos');
		//$result = $this->gl_asignacion_de_permisos->get_rows();
		$this->gl_asignacion_de_permisos->created_at = 'como estas';
		exit(json_encode($this->gl_asignacion_de_permisos->created_at));
	}
}