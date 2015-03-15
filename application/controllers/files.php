<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files extends CI_Controller {
	
	public function create_folder() {
		
		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {
			$this->load->model("files_model");
			$this->data["url_listado"] = "files/folder_management/";
			$this->data["url_destino"] = "files/create_folder";
			$this->data["atributos"] = array("id"=>"form");
			$this->data['title'] ="Create Folder"; 	
			$this->form_validation->set_rules('nombre','Nombre','required');
			$this->form_validation->set_rules('descripcion','Descripci&oacute;n','required');
			$this->form_validation->set_message('required',"El campo %s es Requerido");
			if($this->form_validation->run()===FALSE) {
				$this->load->view('templates/header',$this->data);
				$this->load->view('templates/navside',$this->data);
				$this->load->view('file_upload/create_folder',$this->data);
			}else {
				$nombre = $this->input->post("nombre");
				$descripcion = $this->input->post("descripcion");
				$validate = $this->files_model->validate_directory($nombre);
				if($validate==false) {
					$ingresar = $this->files_model->create_directory($nombre,$descripcion);
					if($ingresar==1) {
						redirect("files/folder_management");
					}
				}else {
					$this->data["error"] = "Ya existe una carpeta asociada al nombre ".$nombre;
					$this->load->view('templates/header',$this->data);
					$this->load->view('templates/navside',$this->data);
					$this->load->view('file_upload/create_folder',$this->data);
				}
				
				
			}
		}
		
		
	}


	public function folder_management() {
		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {
			$this->load->model("files_model");
			$this->data['title'] ="Folder Management"; 	
			$this->data["folders"] = $this->files_model->get_folders();
			$this->load->view('templates/header',$this->data);
			$this->load->view('templates/navside',$this->data);
			$this->load->view('file_upload/folder_management',$this->data);
			
		}
	}
	
	
	public function upload_file() {
			if(!$this->session->userdata('login_status')==1) {
				$this->data['mensaje'] = "No est&aacute;s autenticado";
				$this->load->view('inicio',$this->data);
			}else {
				if($this->uri->segment(3)){
					$id_carpeta = $this->uri->segment(3);
				}else {
					$id_carpeta = $this->input->post("id_carpeta");
				}
				
				if($id_carpeta=="" or $id_carpeta==0){
					redirect("files/folder_management");
				}
				$this->data["id_carpeta"] = $id_carpeta;
				$this->load->model("files_model");
				$url = $this->files_model->get_url($id_carpeta);
				$this->data["url"] = base_url()."file_upload/".$url;
				$this->data["files"] = $this->files_model->getFiles($id_carpeta);
				$this->data["ambito"] = $this->files_model->getAmbito();
				$this->data['title'] ="Folder"; 	
				$this->data["url_listado"] = "files/folder_management/";
				$this->data["url_destino"] = "files/upload_file";
				$this->data["atributos"] = array("id"=>"form");
				$this->form_validation->set_rules('id_carpeta','Carpeta','required');
				if($this->form_validation->run()===FALSE) {
					$this->load->view('templates/header',$this->data);
					$this->load->view('templates/navside',$this->data);
					$this->load->view('file_upload/upload_file',$this->data);
				}else {
					$id_carpeta = $this->input->post("id_carpeta");
					$nombre_archivo =$this->generate_key();
					$ambito = $this->input->post("ambito");
					$nombre_original = $_FILES['file']['name'];
					$array_name = explode(".",$nombre_original);
					$extension = end($array_name); 
					$config['upload_path'] = './file_upload/'.$url;
					$config['allowed_types'] = 'gif|jpg|png|pdf|doc|xls';
					$config['file_name'] = $nombre_archivo.".".$extension;
					$config['max_size']	= 0;
					$config['max_width']  = 0;
					$config['max_height']  = 0;
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload("file"))
					{
						$error = array('error' => $this->upload->display_errors());
						foreach($error as $value) {
							echo $value;
						}
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$this->files_model->create_file($nombre_archivo.".".$extension,$id_carpeta,$ambito);
						redirect("files/upload_file/".$id_carpeta);
					}
					
					
				}
				
			}
		
		
		
	}



	private function generate_key() {
		

		$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
		$numerodeletras=10; //numero de letras para generar el texto
		$cadena = ""; //variable para almacenar la cadena generada
		for($i=0;$i<$numerodeletras;$i++)
		{
		    $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
		entre el rango 0 a Numero de letras que tiene la cadena */
		}
		return $cadena;

		
	}

	
	
}
