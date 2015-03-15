<?
class Actividad_model extends CI_Model{

	public function insertaActividad($nombre_actividad,$descripcion,$fecha) {
		$fecha = date_format(date_create($fecha),"Y-m-d");
		$this->db->set("idrnum",0);
		$this->db->set("nombre_actividad",$nombre_actividad);
		$this->db->set("descripcion",$descripcion);
		$this->db->set("fecha",$fecha);
		return $this->db->insert("actividades");
	}

	public function modificaActividad($idrnum,$nombre_actividad,$descripcion,$fecha) {
		$fecha = date_format(date_create($fecha),"Y-m-d");
		$this->db->set("idrnum",0);
		$this->db->set("nombre_actividad",$nombre_actividad);
		$this->db->set("descripcion",$descripcion);
		$this->db->set("fecha",$fecha);
		$this->db->where("idrnum",$idrnum);
		return $this->db->update("actividades");
	}

	public function getActividades() {
		$query = $this->db->get("actividades");
		if($query->num_rows()>0) {
			return $query->result_array();
		}else {
			return false;
		}
	}

	public function getOneActividad($idrnum) {
		$query = $this->db->get_where("actividades",array("idrnum"=>$idrnum));
		if($query->num_rows()>0) {
			return $query->row_array();
		}else {
			return false;
		}
	}

	public function deleteActividad($idrnum) {
		$query = $this->db->delete("actividades",array("idrnum"=>$idrnum));
	}

}