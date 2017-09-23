<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Top5 extends Base_Controller{

	# Constructor de la clase
	function __construct(){
		parent::__construct();
		$this->load->model('vn_detalles_cliente');
		$this->load->model('vn_top5_publicaciones');
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

	# Metodo para listar las publicaciones del top5
	public function obtenerTop() {
		$cve_usuario = $this->input->post('cve_usuario');
		$tipo = $this->input->post('tipo');
		$limit = $this->input->post('limit');
		exit(json_encode($this->vn_top5_publicaciones->obtenerPublicaciones($cve_usuario, $tipo, $limit)));
	}

	# Funcion para dar de alta una nueva publicacion en el top5
	public function AltaTop5() {
		# Validamos los datos del formulario
		$this->form_validation->set_rules('cve_usuario', 'Usuario', 'trim|required', array(
			'required' => 'El campo Usuario es requerido'
		));
		$this->form_validation->set_rules('tipo', 'Red Social', 'trim|required', array(
			'required' => 'Selecciona a que red social pertenece la publicación'
		));
		$this->form_validation->set_rules('codigo', 'Código', 'required', array(
			'required' => 'Debes proporcionar el código de la publicación'
		));
		# Retornamos los errrores de validacion en caso de que estos se presente
		if ($this->form_validation->run() === false) {
			exit(json_encode(array('bandera'=>false, 'msj'=>'Las validaciones del formulario no se completaron, atiende:', 'error'=>validation_errors())));
		} else {
			# Guardamos los parametros de la peticion en variables locales
			$cve_usuario = $this->input->post('cve_usuario');
			$tipo = $this->input->post('tipo');
			$codigo = $this->input->post('codigo');
			$estatus = $this->input->post('estatus');

			$this->vn_top5_publicaciones->altaPublicacion($cve_usuario, $tipo, $codigo, $estatus) === false ? exit(json_encode(array('bandera'=>false, 'msj'=>'Se presento un error al insertar el registro'))) : exit(json_encode(array('bandera'=>true, 'msj'=>'Registro insertado con éxito')));
		}
	}

	# Metodo para editar la informacion de una publicacion
	public function EditarTop5() {
		# Validamos los datos del formulario
		$this->form_validation->set_rules('id', 'ID', 'trim|required', array(
			'required' => 'El Identificador de la publicación es requerido'
		));
		$this->form_validation->set_rules('cve_usuario', 'Usuario', 'trim|required', array(
			'required' => 'El campo Usuario es requerido'
		));
		$this->form_validation->set_rules('tipo', 'Red Social', 'trim|required', array(
			'required' => 'Selecciona a que red social pertenece la publicación'
		));
		$this->form_validation->set_rules('codigo', 'Código', 'required', array(
			'required' => 'Debes proporcionar el código de la publicación'
		));
		# Retornamos los errrores de validacion en caso de que estos se presente
		if ($this->form_validation->run() === false) {
			exit(json_encode(array('bandera'=>false, 'msj'=>'Las validaciones del formulario no se completaron, atiende:', 'error'=>validation_errors())));
		} else {
			# Guardamos los parametros de la peticion en variables locales
			$id = $this->input->post('id');
			$cve_usuario = $this->input->post('cve_usuario');
			$tipo = $this->input->post('tipo');
			$codigo = $this->input->post('codigo');
			$estatus = $this->input->post('estatus');

			$this->vn_top5_publicaciones->editarPublicacion($id, $cve_usuario, $tipo, $codigo, $estatus) === false ? exit(json_encode(array('bandera'=>false, 'msj'=>'Se presento un error al actualizar el registro'))) : exit(json_encode(array('bandera'=>true, 'msj'=>'Registro actualizado con éxito')));
		}
	}

}