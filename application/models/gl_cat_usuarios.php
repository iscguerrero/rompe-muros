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

	public function obtenerUsuario($cve_usuario) {
		$this->db->from('gl_cat_usuarios');
		$this->db->where('cve_usuario', $cve_usuario);
		return $this->db->get()->row();
	}

	private function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	private function verify_password_hash($contrasenia, $hash) {
		return password_verify($contrasenia, $hash);
	}

}