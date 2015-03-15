<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//Funcion para insertar los datos de la imagen de subida
	function subir($titulo,$imagen){
		$data = array(
			'titulo' => $titulo,
			'ruta' => $imagen
			);
		return $this->db->insert('imagenes',$data);
	}

	function subir_dif_archivos($titulo, $dir){
		$datos= array(
				'titulo' => $titulo, 
				'direccion'=> $dir
		);
		return $this->db->insert('documentos',$datos);
	}
}