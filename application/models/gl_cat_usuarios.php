<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gl_cat_usuarios extends Base_Model{

	# Constructor del modelo
	function construct(){
		parent::__construct();
	}

	# Metodo para crear un nuevo registro en el catalogo de usuarios
	public function altaUsuario($cve_usuario, $contrasenia, $cve_perfil, $nombre, $correo) {
		$data = array(
			'cve_usuario' => $cve_usuario,
			'contrasenia' => $this->hash_password($contrasenia),
			'cve_perfil' => $cve_perfil,
			'nombre' => $nombre,
			'correo' => $correo,
			'created_at' => date('Y-m-j H:i:s'),
			'updated_at' => date('Y-m-j H:i:s'),
			'estatus' => 'A'
		);
		return $this->db->insert('gl_cat_usuarios', $data);
	}

	# Resolver el Login de un usuario
	public function resolverLogin($cve_usuario, $contrasenia) {
		$this->db->select('contrasenia');
		$this->db->from('gl_cat_usuarios');
		$this->db->where('cve_usuario', $cve_usuario);
		$this->db->where('estatus', 'A');
		$hash = $this->db->get()->row('contrasenia');
		return $this->verify_password_hash($contrasenia, $hash);
	}

	# Funcion para obtener la informacion basica del usuario con su clave
	public function obtenerUsuario($cve_usuario) {
		$this->db->from('gl_cat_usuarios');
		$this->db->where('cve_usuario', $cve_usuario);
		return $this->db->get()->row();
	}

	# Funcion para setear la contraseña del usuario a un hash
	private function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	# Funcion para desencriptar una contraseña
	private function verify_password_hash($contrasenia, $hash) {
		return password_verify($contrasenia, $hash);
	}

	# Funcion para obtener la lista de usuarios
	public function obtenerClientes(){
		$this->db->select('gcu.cve_usuario, nombre, correo, facebook, twitter, instagram, paginaweb');
		$this->db->from('gl_cat_usuarios gcu');
		$this->db->join('vn_detalles_cliente vdc', 'gcu.cve_usuario = vdc.cve_usuario', 'INNER');
		$this->db->where('cve_perfil', '002');
		$query = $this->db->get();
		return $query->result();
	}

	# Metodo para editar la informacion de un cliente
	public function editarUsuario($cve_usuario, $nombre, $correo){
		$this->db->set('nombre', $nombre);
		$this->db->set('correo', $correo);
		$this->db->set('updated_at', date('Y-m-j H:i:s'));
		$this->db->where('cve_usuario', $cve_usuario);
		$this->db->limit(1);
		$this->db->update('gl_cat_usuarios');
	}

}