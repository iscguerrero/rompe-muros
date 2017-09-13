<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Base_Model extends CI_Model{
	public $created_by = 'Hola';
	public $updated_by = 'Hola2';
	public $created_at = 'hola3';
	public $updated_at = 'hola4';
	function construct(){
		parent::__construct();
	}
}