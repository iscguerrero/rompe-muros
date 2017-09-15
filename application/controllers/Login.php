<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		# Cargamos la base de datos por defecto
			$this->load->database();
		# Cargamos Helpers basicos
			$this->load->helper(array('url','form'));
		# Cargamos la libreria para la validacion de los formularios
			$this->load->library(array('form_validation', 'session', 'encrypt'));
	}
	# Funcion para retornar el login del sistema
	function Home(){
		$this->load->view('Login/home');
	}
	# Funcion para obtener comprobar la combinacion de usuario y contraseña del inicio de sesion
	function Acceder(){
		if ($this->input->post()) {
			$cve_usuario = $this->input->post('cve_usuario');
			$contrasenia = $this->input->post('contrasenia');
			$this->load->model('gl_cat_usuarios');
			$usuario = $this->gl_cat_usuarios->ComprobarUsuario($cve_usuario, $contrasenia);
			print_r($usuario);
			die();
			if ($usuario) {
				$data_sesion = array(
					'cve_usuario' => $usuario->cve_usuario,
					'nombre' => $usuario->nombre,
					'cve_perfil' => $usuario->cve_perfil,
					'logueado' => TRUE
				);
				$this->session->set_userdata($data_sesion);
				redirect('Administracion/Clientes');
			} else {
				redirect('');
			}
		} else {
			redirect('');
		}
	}
	# Funcion para cerrar la sesion del usuario logueado
	public function cerrar_sesion() {
		$data_sesion = array(
			'logueado' => FALSE
		);
		$this->session->set_userdata($usuario_data);
		redirect('Login/Home');
	}



	function get_algo(){
		$this->load->model('gl_asignacion_de_permisos');
		//$result = $this->gl_asignacion_de_permisos->get_rows();
		$this->gl_asignacion_de_permisos->created_at = 'como estas';
		exit(json_encode($this->gl_asignacion_de_permisos->created_at));
	}
}