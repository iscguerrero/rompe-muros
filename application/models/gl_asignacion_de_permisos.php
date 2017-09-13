<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gl_Asignacion_De_Permisos extends Base_Model{
	function construct(){
		parent::__construct();
	}
	function get_rows(){
		$query = $this->db->get('gl_asignacion_de_permisos');
		return $query->result();
	}
}