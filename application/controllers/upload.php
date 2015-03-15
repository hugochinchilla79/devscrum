<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	function __construct(){
		parent::__construct();
			$this->load->model("upload_model");
			$this->load->library("upload_lib");
			$this->load->helper("directory");
			$this->load->helper("funciones");
			$this->load->model("admin_model");
			$this->data['title'] ="Usuarios"; 
	}	

	function index(){
		if(!$this->session->userdata('login_status')==1) {
			$this->data['mensaje'] = "No est&aacute;s autenticado";
			$this->load->view('inicio',$this->data);
		}else {
			$dato['param'] = isset($_GET['v'])? $_GET['v']:"";
		$dato['dir'] = directory_map("uploads/".$dato['param']);
		$dato['ruta'] = "uploads/".$dato['param'];
		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/navside',$this->data);
		$this->load->view("Subir/subida_vista",$dato);
	}
		//Cargamos la vista del formulario
	}
	/*function crear_directorio(){
		$dato['param'] = isset($_GET['v'])? $_GET['v']:"";
		$dato['dir'] = directory_map("uploads/".$dato['param']);
		$dato['ruta'] = "uploads/".$dato['param'];
		$nombre_carpeta=isset($_GET['n'])? $_GET['n']:"";
		$ruta_completa=isset($_GET['r'])? $_GET['r']:"";
		$ruta_nuevo = $ruta_completa.$nombre_carpeta;
		$ruta_nuevo = str_replace(".", "", $ruta_nuevo);
		if(mkdir(getcwd().$ruta_nuevo)){
			$dato['prueba'] = "Directorio creado exitosamente";
		}else{
			$dato['prueba'] = "Error en la creacion del directorio";
		}
		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/navside',$this->data);
		$this->load->view("Subir/subida_vista",$dato);
	}
	function eliminar_directorio(){
		$dato['param'] = "";
		$dato['dir'] = directory_map("uploads/".$dato['param']);
		$dato['ruta'] = "uploads/".$dato['param'];
		$ruta_completa=isset($_GET['r'])? $_GET['r']:"";
		$ruta_eliminar = str_replace(".", "", $ruta_completa);
		if (rmdir(getcwd().$ruta_eliminar)) {
			$dato['prueba'] = "Directorio eliminado exitosamente";
		}else{
			$dato['prueba'] = "Error en la eliminacion del directorio";
		}
		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/navside',$this->data);
		$this->load->view("Subir/subida_vista",$dato);
	}*/
	function do_upload(){
		$this->form_validation->set_rules('titulo','titulo','required|min_lenght[5]|max_lenght[10]|trim|xss_clean');
		$this->form_validation->set_message('required','El campo no puede ir vacio');
		$this->form_validation->set_message('min_lenght','El campo debe tener al menos %s caracteres');
		$this->form_validation->set_message('max_lenght','El campo no puede tenes mas de %s caracteres');
		//Si el form pasa la validacion hacemos todo lo que sigue
		if ($this->form_validation->run()==true) {
			$config['upload_path'] = $this->input->post('ruta');
			$config['allowed_types'] = "gif|jpg|png|jpeg";
			$config['max_size'] = "2000";
			$config['max_width'] = "2024";
			$config['max_height'] = "2008";

			$this->load->library('upload',$config);
			//Si la imagen falla al subir mostramos el error en la vista Subida_vista
			if (!$this->upload->do_upload()) {
				$error = array('error'=>$this->upload->display_errors());
				$this->load->view('Subir/subida_vista',$error);
			}else{
				//En otro caso subimos la imagen, creamos la miniatura y hacemos 
				//Enviamos los datos al modelo para hacer la insercion
				$file_info = $this->upload->data();
				//Usamos la funcion create_thumbnail y le pasamos el nombre de la imagen,
				//Asi ya tenemos la imagen redimensionada
				$this->_create_thumbnail($file_info['file_name']);
				$dato = array('upload_data'=>$this->upload->data());
				$titulo = $this->input->post('titulo');
				$imagen = $this->input->post('ruta');
				$imagen .= $file_info['file_name'];
				$dif = pathinfo($imagen);
				$subir = $this->upload_model->subir($titulo,$imagen);
				//$data['titulo'] = $titulo;
				$dato['imagen'] = $imagen;
				$dato['extension'] = $dif['extension'];
				$dato['titulo'] = $this->upload->get_extension($file_info['file_path']);
				$this->load->view('templates/header',$this->data);
				$this->load->view('templates/navside',$this->data);
				$this->load->view('Subir/subida_completa_vista',$dato);
			}
		}else{
		//Si el formulario no se valida lo mostramos de nuevo con los errores
			$this->index();
		}
	}
	//Funcion para crea la miniatura a la medida que le digamos
	function _create_thumbnail($filename){
		 $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = 'uploads/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']='uploads/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
	}

	//Funcion para que acepte n numero de parametros por URL despues de el modulo /upload/
	//le pasamos un array como segundo argumento, estos son los parámetros
  public function _remap($method, $params = array())
  {
    //comprobamos si existe el método, no queremos que al llamar
    //a un método codeigniter crea que es un parámetro del index
    if(!method_exists($this, $method))
      {
       $this->index($method, $params);
    }else{
      return call_user_func_array(array($this, $method), $params);
    }
  }
}