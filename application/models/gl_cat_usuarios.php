<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class gl_cat_usuarios extends Base_Model{
	public $keycrypt;
	function construct(){
		parent::__construct();
		$this->keycrypt = $this->config->item("aes_encryption_key");

	}
	# Metodo para devolver la existencia de un usuario y contraseña
	function ComprobarUsuario($cve_usuario, $contrasenia){
		#$cve_usuario = $this->db->escape($cve_usuario);
		#$contrasenia = $this->db->escape($contrasenia);
		$this->db->select('cve_usuario, nombre, cve_perfil');
		$this->db->from('gl_cat_usuarios');
		$this->db->where('cve_usuario', $cve_usuario);
		$this->db->where("AES_DECRYPT(contrasenia, '$this->keycrypt')", $contrasenia);
		/*$query = $this->db->get();
		$result = $query->row();
		return $result;*/
		return $this->db->get_compiled_select();
	}
	# Metodo para cambiar la contraseña de un usuario
	function CambiarContrasenia($cve_usuario, $contrasenia){
		$this->db->limit(1);
		$this->db->set('contrasenia', $this->encrypt->encode($contrasenia));
		$this->db->where('cve_usuario', $cve_usuario);
		$result = $this->db->update('gl_cat_usuarios');
		return $result;
	}
}