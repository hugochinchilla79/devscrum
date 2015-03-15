<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividades extends CI_Controller {

	public function nueva_actividad() {
		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {
			$this->load->model("actividad_model");
			$this->data["url_listado"] = "actividades/gestion_actividades";
			$this->data["url_destino"] = "actividades/nueva_actividad";
			$this->data["atributos"] = array("id"=>"form");
			$this->data['title'] ="Administrador"; 	
			$this->form_validation->set_rules('nombre_actividad','Nombre','required');
			$this->form_validation->set_rules('descripcion','Descripci&oacute;n','required');
			$this->form_validation->set_rules('fecha','Fecha','required');
			$this->form_validation->set_message('required',"El campo %s es Requerido");
			if($this->form_validation->run()===FALSE) {
				$this->load->view('templates/header',$this->data);
				$this->load->view('templates/navside',$this->data);
				$this->load->view('actividades/nueva_actividad',$this->data);
			}else {
				$nombre_actividad = $this->input->post("nombre_actividad");
				$descripcion = $this->input->post("descripcion");
				$fecha = $this->input->post("fecha");
				$ingresar = $this->actividad_model->insertaActividad($nombre_actividad,$descripcion,$fecha);
				if($ingresar==1) {
					redirect("actividades/gestion_actividades");
				}
			}
		}
	}

	public function modificar_actividad() {
		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {
			$this->load->model("actividad_model");
			$this->data["url_listado"] = "actividades/gestion_actividades";
			$this->data["url_destino"] = "actividades/modificar_actividad";
			$this->data["atributos"] = array("id"=>"form");
			if($this->uri->segment(3)) {
				$idrnum = $this->uri->segment(3);
			}else {
				$idrnum = $this->input->post("idrnum");
			}
			$this->data["registro"] = $this->actividad_model->getOneActividad($idrnum);
			$this->data['title'] ="Modificar Actividad"; 	
			$this->form_validation->set_rules('nombre_actividad','Nombre','required');
			$this->form_validation->set_rules('descripcion','Descripci&oacute;n','required');
			$this->form_validation->set_rules('fecha','Fecha','required');
			$this->form_validation->set_message('required',"El campo %s es Requerido");
			if($this->form_validation->run()===FALSE) {
				$this->load->view('templates/header',$this->data);
				$this->load->view('templates/navside',$this->data);
				$this->load->view('actividades/modificar_actividad',$this->data);
			}else {
				$nombre_actividad = $this->input->post("nombre_actividad");
				$descripcion = $this->input->post("descripcion");
				$fecha = $this->input->post("fecha");
				$ingresar = $this->actividad_model->modificaActividad($idrnum,$nombre_actividad,$descripcion,$fecha);
				if($ingresar==1) {
					redirect("actividades/gestion_actividades");
				}
			}
		}
	}

	public function gestion_actividades() {
		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {	
				$this->load->model("actividad_model");
				$this->data["ACTIVIDADES_T"] = $this->actividad_model->getActividades();
				$this->load->view('templates/header',$this->data);
				$this->load->view('templates/navside',$this->data);
				$this->load->view('actividades/gestion_actividades',$this->data);			
		}
	}


	public function deleteActividad($idrnum) {
		$idrnum = $this->uri->segment(3);
		$this->load->model("actividad_model");
		$this->actividad_model->deleteActividad($idrnum);

	}



}