<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EnviarCorreo extends CI_Controller {

	public function index()
	{	
		if($this->session->userdata('login_status')==FALSE) {
			$this->data['title'] = "..:: Comité de Seguridad y Riesgos ::..";
			$this->load->view('inicio',$this->data);
		}else {
			
			redirect('inicio/menu');
		}
	}


	public function Envio()
	{
		 $this->load->library("email");
         $this->load->model("pwd_model");
         $newpass = $this->generarCodigo(8);
 		 $userName=$this->input->post('userName');
         $this->pwd_model->change_pwd($newpass, $userName);
        //configuracion para gmail
        $configGmail = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_auth' => true,
            'smtp_user' => 'comitederiesgosudb@gmail.com',
            'smtp_pass' => 'comiteudb',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        ); 

        //$this->load->library('email', $configGmail);
        
 
        //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
 
        $this->email->from('comitederiesgosudb@gmail.com','Comite de Seguridad y Riesgos UDB');
        $this->email->to($userName);
        $this->email->subject('Reestablecer Contraseña');
        $this->email->message('<h5>Buenas tardes<h5><br>Su contraseña nueva es: '.$newpass.'Recuerde cambiarla, ya que esta es solo temporal.');
        $this->email->send();
        //con esto podemos ver el resultado
        var_dump($this->email->print_debugger());

	}

    private function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890@#$*+abcdefghijklmnopqrstuvwxyz@#$*+ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++){
            $key .= $pattern{mt_rand(0,$max)};
        }
        return $key;
    }

}
