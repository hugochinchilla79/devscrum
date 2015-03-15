<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_version extends CI_Controller {
	
	public function index(){
		$this->load->view('publico/header_public');
		$this->load->view('templates/navside_public');
		$this->load->view('publico/publico');
	}

	public function galleria(){
		$this->load->model("files_model");
		$this->data["url"] = base_url()."file_upload/";
		$this->data["files"] = $this->files_model->getPublic();
		$this->load->view('publico/header_public');
		$this->load->view('templates/navside_public');
		$this->load->view('publico/galleria', $this->data);
	}

}
?>