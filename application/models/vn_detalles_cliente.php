<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vn_detalles_cliente extends Base_Model{

	# Constructor del modelo
	function construct(){
		parent::__construct();
	}

	# Metodo para crear un nuevo registro en los detalles del cliente
	public function altaDetalles($cve_usuario, $facebook, $twitter, $instagram, $paginaweb) {
		$data = array(
			'cve_usuario' => $cve_usuario,
			'facebook' => $facebook,
			'twitter' => $twitter,
			'instagram' => $instagram,
			'paginaweb' => $paginaweb,
			'created_at' => date('Y-m-j H:i:s'),
			'updated_at' => date('Y-m-j H:i:s'),
		);
		$this->db->insert('vn_detalles_cliente', $data);
	}

	# Metodo para editar los detalles del cliente
	public function editarDetalles($cve_usuario, $facebook, $twitter, $instagram, $paginaweb) {
		$this->db->set('facebook', $facebook);
		$this->db->set('twitter', $twitter);
		$this->db->set('instagram', $instagram);
		$this->db->set('paginaweb', $paginaweb);
		$this->db->set('updated_at', date('Y-m-j H:i:s'));
		$this->db->where('cve_usuario', $cve_usuario);
		$this->db->limit(1);
		$this->db->update('vn_detalles_cliente');
	}


}