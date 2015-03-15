<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ver_docs extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {
			$this->load->model("admin_model");
			$this->data['usuarios'] = $this->admin_model->getAdministradores();
			$this->data['title'] ="Usuarios"; 
			$this->load->view('templates/header',$this->data);
			$this->load->view('templates/navside',$this->data);
			$this->load->model("view_img");
			$this->load->library("upload_lib");
			$this->load->helper("directory");
			$this->load->helper("funciones");
	}	
	}

	function index(){
		$data['img'] = $this->view_img->obtener_docs();
		$this->load->view('Subir/ver_documents', $data);	
		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/navside',$this->data);
	}
}