<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_img extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	function obtener_img(){
		$query = $this->db->get('imagenes');
		if($query->num_rows() > 0){
			return $query;
		}
		else{
			return false;
		}
	}

	function obtener_docs(){
		$query = $this->db->get('documentos');
		if($query->num_rows() > 0){
			return $query;
		}
		else{
			return false;
		}
	}
}