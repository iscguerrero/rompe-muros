<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

	# Constructor del Controlador
	function __construct(){
		parent::__construct();
		# Cargamos la base de datos por defecto
			$this->load->database();
		# Cargamos Helpers basicos
			$this->load->helper(array('url','form'));
		# Cargamos la libreria para la validacion de los formularios
			$this->load->library(array('form_validation', 'session', 'encrypt'));
		# Cargamos el modelo del catalogo de usuarios
			$this->load->model('gl_cat_usuarios');
	}

	# Metodo para retornar la vista del login del sistema
	public function Inicio($errors = null){
		if ($this->session->userdata() && $this->session->userdata('logueado') == true) {
			switch ($this->session->userdata('cve_perfil')) {
				case '001':
					redirect(site_url('Administracion/Clientes'));
					break;
				case '002':
					redirect(site_url('Inicio/Top5'));
					break;
				default:
					redirect('/');
					break;
			}
		} else{
			$this->load->view('Login/inicio', $errors);
		}
	}

	# Metodo para dar de alta un nuevo usuario
	public function AltaUsuario() {
		# Validamos los datos del formulario
		$this->form_validation->set_rules('cve_usuario', 'Usuario', 'trim|required|min_length[4]|is_unique[gl_cat_usuarios.cve_usuario]', array(
			'required' => 'El campo Usuario es requerido',
			'min_length' => 'El campo Usuario debe contener al menos cuatro caracteres',
			'is_unique' => 'Usuario registrado con anterioridad, intenta nuevamente',
		));
		$this->form_validation->set_rules('contrasenia', 'Contraseña', 'trim|required|min_length[6]', array(
			'required' => 'El campo Contraseña es requerido',
			'min_length' => 'El campo Contraseña debe contener al menos seis caracteres',
		));
		$this->form_validation->set_rules('confirmar_contrasenia', 'Confirmar Contraseña', 'trim|required|min_length[6]|matches[contrasenia]', array(
			'required' => 'El campo Confirmar Contraseña es requerido',
			'min_length' => 'El campo Confirmar Contraseña debe contener al menos seis caracteres',
			'matches' => 'El campo Confirmar Contraseña debe coincidir con el campo Contraseña',
		));
		$this->form_validation->set_rules('cve_perfil', 'Perfil', 'required', array(
			'required' => 'El campo Perfil es requerido'
		));
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required', array(
			'required' => 'El campo Nombre es requerido'
		));
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|valid_email|is_unique[gl_cat_usuarios.correo]', array(
			'required' => 'El campo Correo es requerido',
			'valid_email' => 'El correo registrado no cuenta con una estructura válida',
			'is_unique' => 'El correo proporcionado ya se encuentra registrado en el sistema'
		));
		# Retornamos los errrores de validacion en caso de que estos se presente
		if ($this->form_validation->run() === false) {
			exit(json_encode(array('bandera'=>false, 'msj'=>'Las validaciones del formulario no se completaron, atiende:', 'error'=>validation_errors())));
		} else {
			# Guardamos los parametros de la peticion en variables locales
			$cve_usuario = $this->input->post('cve_usuario');
			$contrasenia = $this->input->post('contrasenia');
			$cve_perfil = $this->input->post('cve_perfil');
			$nombre = $this->input->post('nombre');
			$correo = $this->input->post('correo');

			if ($this->gl_cat_usuarios->altaUsuario($cve_usuario, $contrasenia, $cve_perfil, $nombre, $correo)) {
				exit(json_encode(array('bandera'=>true, 'msj'=>'Registro creado con éxito')));
			} else {
				exit(json_encode(array('bandera'=>false, 'msj'=>'Se presento un error al crear el registro')));
			}
		}
	}
	# Metodo para loguear el usuario dentro del sistema
	public function Acceder() {
		# Validamos la cambinacion de usuario y contraseña de inicio de sesion
		$this->form_validation->set_rules('cve_usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('contrasenia', 'Contraseña', 'required');
		if ($this->form_validation->run() == false) {
			exit(json_encode(array('bandera'=>false, 'msj'=>'Las validaciones del formulario no se completaron, atiende:', 'error'=>validation_errors())));
		} else {
			# Guardamos los parametros de la peticion en variables locales
			$cve_usuario = $this->input->post('cve_usuario');
			$contrasenia = $this->input->post('contrasenia');
			# En caso de que la combinacion sea correcta
			if ($this->gl_cat_usuarios->resolverLogin($cve_usuario, $contrasenia)) {
				$usuario = $this->gl_cat_usuarios->obtenerUsuario($cve_usuario);
				# Seteamos las variables de sesion
				$nickname = explode(' ', $usuario->nombre);
				$nickname = $nickname[0];
				$sesion = array(
					'cve_usuario' => $usuario->cve_usuario,
					'cve_perfil' => $usuario->cve_perfil,
					'nombre' => $usuario->nombre,
					'correo' => $usuario->correo,
					'nickname' => $nickname,
					'logueado' => true
				);
				$this->session->set_userdata($sesion);
				switch ($this->session->userdata('cve_perfil')) {
					case '001':
						redirect(site_url('Administracion/Clientes'));
						break;
					case '002':
						redirect(site_url('Inicio/Top5'));
						break;
					default:
						redirect('/');
						break;
				}
			} else {
				redirect('/');
			}
		}
	}
	# Metodo para destruir los variables de sesion del usuario logueado
	public function Salir() {
		if ($this->session->userdata() && $this->session->userdata('logueado') == true) {
			$sesion = array('logueado' => false);
			$this->session->set_userdata($sesion);
			redirect('/');
		} else {
			redirect('/');
		}
	}
}