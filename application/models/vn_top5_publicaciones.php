<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vn_top5_publicaciones extends Base_Model{

	# Constructor del modelo
	function construct(){
		parent::__construct();
	}

	# Metodo para obtener el top5 de las publicaciones del cliente
	public function obtenerPublicaciones($cve_usuario, $tipo, $limit = null){
		$this->db->select('id, codigo, estatus, cve_usuario');
		$this->db->from('vn_top5_publicaciones');
		$this->db->where('cve_usuario', $cve_usuario);
		$this->db->where('tipo', $tipo);
		$this->db->where('estatus', 'A');
		$this->db->limit( $limit == null ? 5 : $limit );
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	# Metodo para dar de alta una nueva publicacion
	public function altaPublicacion($cve_usuario, $tipo, $codigo, $estatus) {
		$data = array(
			'cve_usuario' => $cve_usuario,
			'tipo' => $tipo,
			'codigo' => $codigo,
			'estatus' => $estatus,
			'created_at' => date('Y-m-j H:i:s'),
			'updated_at' => date('Y-m-j H:i:s'),
			'created_user' => $this->created_user,
			'updated_user' => $this->updated_user
		);
		$this->db->insert('vn_top5_publicaciones', $data);
	}

	# Metodo para editar la informacion de una publicacion
	public function editarPublicacion($id, $cve_usuario, $tipo, $codigo, $estatus) {
		$this->db->set('cve_usuario', $cve_usuario);
		$this->db->set('tipo', $tipo);
		$this->db->set('codigo', $codigo);
		$this->db->set('estatus', $estatus);
		$this->db->set('created_user', $this->created_user);
		$this->db->set('updated_user', $this->updated_user);
		$this->db->set('updated_at', date('Y-m-j H:i:s'));
		$this->db->where('id', $id);
		$this->db->limit(1);
		$this->db->update('vn_top5_publicaciones');
	}


}