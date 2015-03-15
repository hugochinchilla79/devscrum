<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{	
		if($this->session->userdata('login_status')==FALSE) {
			$this->data['title'] = "..:: Comité de Seguridad y Riesgos ::..";
			$this->load->view('inicio',$this->data);
		}else {
			
			redirect('inicio/menu');
		}
	}

	public function login() {

		$username = $this->input->post('userName');
		$password = $this->input->post('userPassword');

		//echo "---".$username . "---" . $password. "---";
		$this->load->model('login_model');

		
		$user = $this->login_model->verificaExistencia($username,$password);
		
		if(($user->num_rows()!=1) || ($this->login_model->verificaExistenciaEmail($username) == false) || ($this->login_model->verificaExistenciaContra($password) == false)) {

			
		if(($username=="") || ($password=="")){
			$this->data['mensaje'] = "Ingresa tu Usuario y Contraseña";
			

			}elseif(($this->login_model->verificaExistenciaEmail($username)==false) && ($this->login_model->verificaExistenciaContra($password) == true)){
				$this->data['mensaje'] = "Este Usuario No se encuentra Registrado";
			}elseif(($this->login_model->verificaExistenciaEmail($username)==true) && ($this->login_model->verificaExistenciaContra($password) == false)){
				$this->data['mensaje'] = "Contraseña Invalida";
			}elseif(($this->login_model->verificaExistenciaEmail($username)==false) && ($this->login_model->verificaExistenciaContra($password) == false)){
				$this->data['mensaje'] = "Usuario y Contraseña invalidos";
			}

			//$this->data['mensaje'] = "Usuario y/o contraseña invalidos";
			$this->load->view('inicio',$this->data);
			
		}else{

			$usuario = $user->row_array();

			if($usuario['email']==$username and $usuario['pwd']==$password) {
			//$this->data['nombres'] = $usuario['nombres'];
			//$this->data['apellidos'] = $usuario['apellidos'];

				if($this->login_model->verificaEstadoUsuario($username)=="1"){
					date_default_timezone_set('America/El_Salvador');

					$dat_user = array(
						'numempleado' => $usuario['numempleado'],
						'userName' => $usuario['nombres'],
						'lastName' => $usuario['apellidos'],
						'last_access' => date("d-m-Y H:i:s"),
						'optionpict'=>$usuario['foto'],
						'login_status' => TRUE,
						'userType'=>$usuario['tipo']
						);

					$this->session->set_userdata($dat_user);
					redirect('inicio/menu');

				}else{
					$this->data['mensaje'] = "Usuario en Estado Inactivo";
					$this->load->view('inicio',$this->data);
				}


			
			}else {
			
				$this->data['mensaje'] = "Usuario y/o contraseña invalidos";
				$this->load->view('inicio',$this->data);
			}

		}
	}

	public function logout() {
		$data_user = array(
			'numempleado' => '',
	        'userName'  => '',
	        'lastName' => '',
	        'last_access' => '',
	        'optionpict'=> '',
	      	'login_status' => FALSE,
	      	'userType'=>''
	    );
		$this->session->unset_userdata($data_user);
	    $this->session->sess_destroy();
	    
	    $this->load->view('inicio');


	}

	public function menu() {

		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {
		
				/*$this->data['title'] = "Comité de Seguridad y Riesgos";
				$this->load->view('templates/header');
				$this->load->view('templates/navside');
				$this->load->view('templates/body');*/
				//redirect('admin/');
				if($this->session->userdata('userType')==1){
		
					$this->data['title'] = "Comité de Seguridad y Riesgos";
					$this->load->view('templates/header');
					$this->load->view('templates/navside');
					$this->load->view('templates/body');

				}elseif($this->session->userdata('userType')==0){

					$this->data['title'] = "Comité de Seguridad y Riesgos";
					$this->load->view('templates/header');
					$this->load->view('templates/navsideMiembros');
					$this->load->view('templates/body');

				}

		}		
	}

	public function registro(){

		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('apellidos','Apellidos','required');
		$this->form_validation->set_rules('email','Correo','required');
		$this->form_validation->set_rules('pwd','Contraseña','required');
		$this->form_validation->set_rules('cpwd','Confirmación de Contraseña','required');
		$this->form_validation->set_message('required',"El campo %s es Requerido");
	
						$nombre = $this->input->post('nombre');
						$apellidos = $this->input->post('apellidos');
						$email = $this->input->post('email');
						$pwd = $this->input->post('pwd');
						$cpwd = $this->input->post('cpwd');		

						if($pwd==$cpwd){
							$registro = array(
							'nombre'=>$nombre,
							'apellidos'=>$apellidos,
							'email'=>$email,
							'pwd'=>$pwd,
							'cpwd'=>$cpwd
						);
						}else{
							$registro = array(
							'nombre'=>$nombre,
							'apellidos'=>$apellidos,
							'email'=>$email,
							'pwd'=>"",
							'cpwd'=>""
						);
						}

		if($this->form_validation->run()===FALSE) {
						
						$this->data['registro'] = $registro;
						$this->load->view('registro',$this->data);

				}else{

					if($pwd != $cpwd){
						$this->data['registro'] = $registro;
						$this->data['mensaje'] = "Las contraseñas no coinciden";
						$this->load->view('registro',$this->data);
						//redirect('inicio/registro',$this->data);
						//break;
					}else{

							$this->load->model('login_model');					
							$user = $this->login_model->verificaExistenciaEmail($email);
							
							if($user->num_rows()>=1) {

								$this->data['registro'] = $registro;
								$this->data['mensaje'] = "El correo ingresado ya pertenece a una cuenta";
								$this->load->view('registro',$this->data);
								
							}else{



								$this->load->model('alumno_model');
								$tpusuario = "3";
								$optionpict = "default-system.png";
								$estatus = "1";
								$ingreso = $this->alumno_model->ingresarAlumno($nombre,$apellidos,$email,$pwd,$optionpict,$estatus,$tpusuario);
							

								if($ingreso==1) {
									

									$dat_user = array(
										'userName' => $nombre,
										'lastName' => $apellidos,
										'last_access' => date("d-m-Y H:i:s"),
										'optionpict'=>$optionpict,
										'login_status' => TRUE,
										'userType'=>$tpusuario
										);

									$this->session->set_userdata($dat_user);

									$data['msg'] = "Ingreso correcto";
									$data['tipo_error'] = "alert alert-info";
									redirect('inicio/menu');

								}else {
									$this->data['registro'] = $registro;
									$data['msg'] = "Ingreso incorrecto";
									$data['tipo_error'] = "alert alert-danger";
									$this->load->view('registro',$this->data);
								}

								

						}
				  }

			}

	}

	public function resetpasswd(){

		$this->load->view('resetpasswd');
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */