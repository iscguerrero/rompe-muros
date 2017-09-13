<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TopPublicaciones extends Base_Controller{
	function __construct(){
		parent::__construct();
	}
	function Home(){
		echo $this->templates->render('TopPublicaciones/home');
	}
}