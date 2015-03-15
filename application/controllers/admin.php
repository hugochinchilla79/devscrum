<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {
			$this->load->model("admin_model");

			$this->data['usuarios'] = $this->admin_model->getUsuarios();
			
			$this->data['title'] ="Usuarios"; 
			$this->load->view('templates/header',$this->data);
			$this->load->view('templates/navside',$this->data);
			$this->load->view('admin/gestion_admin',$this->data);

		}

	}

	public function crear_admin(){
		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {
		$this->data['title'] ="Crear Nuevo Usuario"; 
		$this->data['url_destino'] = "admin/crear_admin";
		$this->data['url_listado'] = "admin/";
		$this->data['atributos'] = array('id' => 'form');

		//$this->load->model('variables_model');
		//$this->data['estados'] = $this->variables_model->getDatosVariables('gv_status');

		$this->form_validation->set_rules('nempleado','N° Empleado','required');
		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('apellidos','Apellidos','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('pwd','Password','required');
		$this->form_validation->set_rules('tipo','Tipo Usuario','required');
		$this->form_validation->set_rules('electo','Elegido por','required');
		$this->form_validation->set_message('required',"El campo %s es Requerido");
		

		if($this->form_validation->run()===FALSE) {

						$nempleado = $this->input->post('nempleado');
						$nombre = $this->input->post('nombre');
						$apellidos = $this->input->post('apellidos');
						$email = $this->input->post('email');
						$pwd = $this->input->post('pwd');
						//$tel = $this->input->post('tel');
						$optionpict = $this->input->post('optionpict');
						$estatus = $this->input->post('estatus');
						$tipo = $this->input->post('tipo');
						$electo = $this->input->post('electo');

						
						
						$registro = array(
							'nempleado'=>$nempleado,
							'nombre'=>$nombre,
							'apellidos'=>$apellidos,
							'email'=>$email,
							'pwd'=>$pwd/*,
							'estatus'=>$estatus,
							'tipo'=>$tipo,
							'electo'=>$electo,
							'foto'=>$optionpict*/
						);
						$this->data['registro'] = $registro;

						$this->load->view('templates/header',$this->data);
						$this->load->view('templates/navside',$this->data);
						$this->load->view('admin/crear_admin',$this->data);

				}else {

						$this->load->model('admin_model');
						$nempleado = $this->input->post('nempleado');
						$nombre = $this->input->post('nombre');
						$apellidos = $this->input->post('apellidos');
						$email = $this->input->post('email');
						$pwd = $this->input->post('pwd');
						//$tel = $this->input->post('tel');
						$optionpict = $this->input->post('optionpict');
						$estatus = $this->input->post('estatus');
						$tipo = $this->input->post('tipo');
						$electo = $this->input->post('electo');
						
						
						

						$optpic = "";
						if($optionpict==""){
							$optionpict = "default-system.png";
							$optpic = "default-system.png";
							$nombre_servidor = $optpic;
						}else {
							$extension = explode(".",$optionpict);
							$length = count($extension);
							$_extension = $extension[$length-1];
							$optpic = 'usuario_'.$nempleado.".".$_extension;
							$nombre_servidor = 'usuario_'.$nempleado;
						}

						if(($this->admin_model->verificarNumeroEmpleado($nempleado) == true) || ($this->admin_model->verificarEmail($email) == true) || ($this->admin_model->verificarNombreEmpleado($nombre,$apellidos) == true)){

							if($this->admin_model->verificarNumeroEmpleado($nempleado)==true && $this->admin_model->verificarEmail($email)==false){
								$this->data['mensaje'] = "Este número de Empleado ya se encuentra registrado";
							}elseif($this->admin_model->verificarNumeroEmpleado($nempleado)==false && $this->admin_model->verificarEmail($email)==true){
								$this->data['mensaje'] = "Este Email ya se encuentra registrado";
							}elseif($this->admin_model->verificarNombreEmpleado($nombre,$apellidos)){
								$this->data['mensaje'] = "Este Nombre y Apellido Ya se encuentra asociado a una cuenta";
						
							}else{
								$this->data['mensaje'] = "<ul><li>Este Email ya se encuentra registrado</li><li>Este número de Empleado ya se encuentra registrado</li></ul>";
							}

								$data['tipo_error'] = "alert alert-danger";
								$registro = array(
									'nempleado'=>$nempleado,
									'nombre'=>$nombre,
									'apellidos'=>$apellidos,
									'email'=>$email,
									'pwd'=>$pwd,
									'estatus'=>$estatus
								);
								$this->data['registro'] = $registro;
								$this->load->view('templates/header',$this->data);
								$this->load->view('templates/navside',$this->data);
								$this->load->view('admin/crear_admin',$this->data);
							

						}else{

						//$ingreso = $this->admin_model->ingresarAdministrador($nombre,$apellidos,$email,$pwd,$optionpict,$estatus,$tpusuario);
						$ingreso = $this->admin_model->ingresarAdministrador($nempleado,$nombre,$apellidos,$email,$pwd,$estatus,$optpic,$tipo,$electo);
																			
						if($ingreso==1) {
							/*$data['msg'] = "Ingreso correcto";
							$data['tipo_error'] = "alert alert-info";
							redirect('admin/');*/

							$image = "optionpic";
							$config['upload_path'] = "./uploads/usuarios";
							$config['file_name'] = $nombre_servidor;
				    		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
				    		$config['max_size']    = '2000';
			    			$config['max_width']  = '2024';
			    			$config['max_height']  = '2008';
				    		$this->load->library('upload', $config);

				    		
				    		if ( ! $this->upload->do_upload($image)){
				  	        	$error = array('error' => $this->upload->display_errors());
				  	        	redirect('admin/');
				  	        
				  	        	}
				    		else{
						    		$data['msg'] = "Ingreso correcto";
									$data['tipo_error'] = "alert alert-info";
						        	$this->data['data'] = array('upload_data' => $this->upload->data());
						        	redirect('admin/');

					        	}
						}else {
							$data['msg'] = "Ingreso incorrecto";
							$data['tipo_error'] = "alert alert-danger";
							$this->load->view('templates/header',$this->data);
							$this->load->view('templates/navside',$this->data);
							$this->load->view('admin/crear_admin',$this->data);
						}
					}	
				}
			}	
	}

	public function editar_admin() {
		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {

			$id = $this->uri->segment(3);

			if($id=="") {
				$id = $this->input->post('id');
			}
	
		$this->load->model('admin_model');
		$this->data['registro'] = $this->admin_model->getOneAdmin($id);

		//$this->load->model('variables_model');
		//$this->data['estados'] = $this->variables_model->getDatosVariables('gv_status');
		//$this->data['tipousuario'] = $this->variables_model->getDatosVariables('gv_usuario');

		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('apellidos','Apellidos','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('pwd','Password','required');
		$this->form_validation->set_rules('tipo','Tipo Usuario','required');
		$this->form_validation->set_rules('electo','Elegido por','required');
		$this->form_validation->set_message('required',"El campo %s es Requerido");

		$this->data['title'] = "Editar Usuario";
		$this->data['url_destino'] = "admin/editar_admin";
		$this->data['url_listado'] = "admin/";
		$this->data['atributos'] = array('id' => 'form');

		if($this->form_validation->run()===FALSE) {

						$this->load->view('templates/header',$this->data);
						$this->load->view('templates/navside',$this->data);
						$this->load->view('admin/editar_admin',$this->data);

				}else{

						$id = $this->input->post('id');
						$nombres = $this->input->post('nombre');
						$apellidos = $this->input->post('apellidos');
						$email = $this->input->post('email');
						$pwd = $this->input->post('pwd');
						$optionpict = $this->input->post('optionpict');
						$estatus = $this->input->post('estatus');
						$tipo = $this->input->post('tipo');
						$electo = $this->input->post('electo');

						$optpic = "";
						if($optionpict==""){
							$optionpict = "default-system.png";
							$optpic = "default-system.png";
							$nombre_servidor = $optpic;
						}else {
							$extension = explode(".",$optionpict);
							$length = count($extension);
							$_extension = $extension[$length-1];
							$optpic = 'usuario_'.$id.".".$_extension;
							$nombre_servidor = 'usuario_'.$id;
						}

						$is_available = true;

					if($is_available==true){

						//$modificar = $this->admin_model->modificarAdmin($id,$nombres,$apellidos,$email,$pwd,$optpic,$estatus,$tpusuario);
						$modificar = $this->admin_model->modificarAdmin($id,$nombres,$apellidos,$email,$pwd,$estatus,$optpic,$tipo,$electo);
						
			    		$image = "optionpic";
						$config['upload_path'] = "./uploads/usuarios";
						$config['file_name'] = $nombre_servidor;
						$config['overwrite'] = TRUE;
			    		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
			    		$config['max_size']    = '2000';
			    		$config['max_width']  = '2024';
			    		$config['max_height']  = '2008';
			    		$this->load->library('upload', $config);

			    		if ( ! $this->upload->do_upload($image)){
			  	        	$error = array('error' => $this->upload->display_errors());
			  	        	redirect('admin');
			  	        
			  	        	}
			    		else{
					    		
					    		//$this->upload->data();

					        	$this->data['error'] ="";
					        	$this->data['data'] = array('upload_data' => $this->upload->data());
					        	redirect('admin');

				        	}
			    			
			    		//	redirect('admin');
				    }else {

						$this->data['error'] = "El Usuario ". $nombres ." no pudo ser actulizado en la base de Datos";
						$this->data['tipo_error'] = "alert alert-danger";
						$this->load->view('templates/header',$this->data);
						$this->load->view('templates/navside',$this->data);
						$this->load->view('admin/editar_admin',$this->data);					
					
					}
				}
		}
	}

	private function crear_miniatura($path,$filename,$width,$height){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        
        $config['source_image'] = $path.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        //$config['new_image']=$path."thumbs/";
        $config['new_image']=$path;
        $config['thumb_marker'] = "";	
        $config['width'] = $width;
        $config['height'] = $height;
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
       	$this->image_lib->resize();
        
        /*if (!$this->image_lib->resize())
         {
                     echo $this->image_lib->display_errors();
           }*/
         
    }

    public function eliminar_usuario(){

		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {

			$id = $this->uri->segment(3);

			$this->load->model('admin_model');
			$this->admin_model->eliminar_usuario($id);
			redirect('admin');
			
		}

	}


}
