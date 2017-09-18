<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administracion extends Base_Controller{

	# Constructor de la clase
	function __construct(){
		parent::__construct();
		$this->load->model('gl_cat_usuarios');
		$this->load->model('vn_detalles_cliente');
		$this->load->model('vn_top5_publicaciones');
	}

	# Funcion para retornar la vista de administracion de clientes
	public function Clientes(){
		echo $this->templates->render('Administracion/clientes');
	}

	# Funcion para retornar la vista de crud de top 5
	public function Top5(){
		echo $this->templates->render('Administracion/top5');
	}

	# Funcion para obtener la lista de clientes
	public function obtenerClientes(){
		exit(json_encode($this->gl_cat_usuarios->obtenerClientes()));
	}

	# Funcion para dar de alta un nuevo cliente
	public function AltaCliente() {
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
		$this->form_validation->set_rules('facebook', 'Facebook', 'trim');
		$this->form_validation->set_rules('twitter', 'Twitter', 'trim');
		$this->form_validation->set_rules('instagram', 'Instagram', 'trim');
		$this->form_validation->set_rules('paginaweb', 'Página Web', 'trim|valid_url', array(
			'valid_url' => 'La url de la página web no cuenta con una estructura válida'
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
			$facebook = $this->input->post('facebook');
			$twitter = $this->input->post('twitter');
			$instagram = $this->input->post('instagram');
			$paginaweb = $this->input->post('paginaweb');

			$this->db->trans_start();
			$this->gl_cat_usuarios->altaUsuario($cve_usuario, $contrasenia, $cve_perfil, $nombre, $correo);
			$this->vn_detalles_cliente->altaDetalles($cve_usuario, $facebook, $twitter, $instagram, $paginaweb);
			$this->db->trans_complete();

			$this->db->trans_status() === FALSE ? exit(json_encode(array('bandera'=>false, 'msj'=>'Se presento un error al crear el registro'))) : exit(json_encode(array('bandera'=>true, 'msj'=>'Registro creado con éxito')));
		}
	}

	# Funcion para editar la informacion de un cliente
	public function EditarCliente() {
		# Validamos los datos del formulario
		$this->form_validation->set_rules('cve_usuario', 'Usuario', 'trim|required', array(
			'required' => 'El campo Usuario es requerido',
			'min_length' => 'El campo Usuario debe contener al menos cuatro caracteres'
		));
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required', array(
			'required' => 'El campo Nombre es requerido'
		));
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|valid_email', array(
			'required' => 'El campo Correo es requerido',
			'is_unique' => 'El correo proporcionado ya se encuentra registrado en el sistema'
		));
		$this->form_validation->set_rules('facebook', 'Facebook', 'trim');
		$this->form_validation->set_rules('twitter', 'Twitter', 'trim');
		$this->form_validation->set_rules('instagram', 'Instagram', 'trim');
		$this->form_validation->set_rules('paginaweb', 'Página Web', 'trim|valid_url', array(
			'valid_url' => 'La url de la página web no cuenta con una estructura válida'
		));
		# Retornamos los errrores de validacion en caso de que estos se presente
		if ($this->form_validation->run() === false) {
			exit(json_encode(array('bandera'=>false, 'msj'=>'Las validaciones del formulario no se completaron, atiende:', 'error'=>validation_errors())));
		} else {
			# Guardamos los parametros de la peticion en variables locales
			$cve_usuario = $this->input->post('cve_usuario');
			$nombre = $this->input->post('nombre');
			$correo = $this->input->post('correo');
			$facebook = $this->input->post('facebook');
			$twitter = $this->input->post('twitter');
			$instagram = $this->input->post('instagram');
			$paginaweb = $this->input->post('paginaweb');

			$this->db->trans_start();
			$this->gl_cat_usuarios->editarUsuario($cve_usuario, $nombre, $correo);
			$this->vn_detalles_cliente->editarDetalles($cve_usuario, $facebook, $twitter, $instagram, $paginaweb);
			$this->db->trans_complete();

			$this->db->trans_status() === FALSE ? exit(json_encode(array('bandera'=>false, 'msj'=>'Se presento un error al editar el registro'))) : exit(json_encode(array('bandera'=>true, 'msj'=>'Registro actualizado con éxito')));
		}
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