<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientes extends Base_Controller{

	# Constructor de la clase
	function __construct(){
		parent::__construct();
		$this->load->model('gl_cat_usuarios');
		$this->load->model('vn_detalles_cliente');
	}

	# Metodo para obtener la lista de clientes
	public function ObtenerClientes(){
		$estatus = $this->input->post('estatus');
		exit(json_encode($this->gl_cat_usuarios->obtenerClientes($estatus)));
	}

	# Metodo para dar de alta un nuevo cliente
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

	# Metodo para dar de baja un cliente de forma logica
	public function SuspenderCliente() {
		# Validamos los datos del formulario
		$this->form_validation->set_rules('cve_usuario', 'Usuario', 'trim|required', array(
			'required' => 'El campo Usuario es requerido'
		));
		$this->form_validation->set_rules('estatus', 'Estatus', 'trim|required', array(
			'required' => 'El campo Estatus es requerido'
		));
		# Retornamos los errrores de validacion en caso de que estos se presente
		if ($this->form_validation->run() === false) {
			exit(json_encode(array('bandera'=>false, 'msj'=>'Las validaciones del formulario no se completaron, atiende:', 'error'=>validation_errors())));
		} else {
			# Guardamos los parametros de la peticion en variables locales
			$cve_usuario = $this->input->post('cve_usuario');
			$estatus = $this->input->post('estatus');

			$this->gl_cat_usuarios->suspenderUsuario($cve_usuario, $estatus) === false ? exit(json_encode(array('bandera'=>false, 'msj'=>'Se presento un error al actualizar el registro'))) : exit(json_encode(array('bandera'=>true, 'msj'=>'Registro actualizado con éxito')));
		}
	}

	# Metodo para editar la informacion de un cliente
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

}