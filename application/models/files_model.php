<?
class Files_model extends CI_Model{
	
	public function create_directory($nombre,$descripcion) {
		$estructura =  "./file_upload"."/".$nombre;
		mkdir($estructura, 0777, true);
		$this->db->set("id",0);
		$this->db->set("nombre",$nombre);
		$this->db->set("descripcion",$descripcion);
		return $this->db->insert("carpetas");
	}
	
	public function validate_delete($nombre) {
		$carpeta = @scandir(base_url()."file_upload/".$nombre);
		if(count($carpeta)>2) {
			return false;
		}else {
			return true;
		}
	}
	
	public function get_folders() {
		$query = $this->db->get("carpetas");
		if($query->num_rows()>0) {
			return $query->result_array();
		}else {
			return false;
		}
	}
	
	public function validate_directory($nombre){
		$query = $this->db->get_where("carpetas",array("nombre"=>$nombre));
		if($query->num_rows()>0){
			return true;
		}else {
			return false;
		}
	}
	
	public function create_file($nombre,$idcarpeta,$id_ambito) {
		$this->db->set("id",0);
		$this->db->set("id_carpeta",$idcarpeta);
		$this->db->set("nombre",$nombre);
		$this->db->set("id_ambito",$id_ambito);
		return $this->db->insert("files");
	}
	
	public function delete_file($nombre,$idcarpeta, $id) {
		$consulta = "
				SELECT carpetas.nombre as carpeta_nombre, files.nombre as nombre_archivo from files 
				INNER JOIN carpetas ON carpetas.id = files.id_carpeta
				WHERE id = '$id'";
		$query = $this->db->query($consulta);
		$detalle = $query->row_array();
		unlink(base_url()."file_upload/".$detalle["carpeta_nombre"]."/".$detalle["nombre_archivo"]);
		$this->db->delete("files",array("id"=>$id));
	}
	
	public function get_url($id_carpeta) {
		$query = $this->db->get_where("carpetas",array("id"=>$id_carpeta));
		if($query->num_rows()>0){
			$fila = $query->row_array();
			return $fila["nombre"];
		}else {
			return false;
		}
	}
	
	
	public function getFiles($id_carpeta) {
		$query = $this->db->get_where("files",array("id_carpeta"=>$id_carpeta));
		if($query->num_rows()>0){
			return $query->result_array();
		}else {
			return false;
		}
	}
	public function getAmbito(){
		$query = $this->db->get("ambito");
		if($query->num_rows()>0) {
			return $query->result_array();
		}else {
			return false;
		}
	}
		
	public function getPublic(){
		$consulta = "	
				SELECT carpetas.nombre AS carpeta_nombre, files.nombre AS nombre
				FROM files
				INNER JOIN carpetas ON carpetas.id = files.id_carpeta
				INNER JOIN ambito ON files.id_ambito = ambito.id_ambito
				WHERE ambito.id_ambito =1";
		$query = $this->db->query($consulta);
		if($query->num_rows()>0){
			return $query->result_array();
		}else {
			return false;
		}
	}
}
	