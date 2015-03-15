<?
class Admin_model extends CI_Model{

	public function getUsuarios(){
		$numempleado = $this->session->userdata('numempleado');
		$consulta = "
		SELECT * FROM `usuarios`
		WHERE numempleado !='$numempleado'";

		$query = $this->db->query($consulta);

		if($query->num_rows()>0) {
			return $query->result_array();
		}else {
			return false;
		}
	}

	//public function ingresarAdministrador($nombres,$apellidos,$email,$pwd,$imagen,$estatus,$tipousuario) {
	public function ingresarAdministrador($numempleado,$nombres,$apellidos,$email,$pwd,$estatus,$imagen,$tipousuario,$electo) {
		$this->db->set("numempleado",$numempleado);
		$this->db->set("nombres",$nombres);
		$this->db->set("apellidos",$apellidos);
		//$this->db->set("telefono",$telefono);
		$this->db->set("email",$email);
		$this->db->set("pwd",$pwd);
		$this->db->set("foto",$imagen);
		$this->db->set("status",$estatus);
		$this->db->set("tipo",$tipousuario);
		$this->db->set("electo",$electo);
		$query = $this->db->insert("usuarios");
		return $query;
	}

	public function getOneAdmin($id){
		$query = $this->db->get_where("usuarios",array("numempleado"=>$id));
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//public function modificarAdmin($id,$nombres,$apellidos,$email,$pwd,$icono,$estatus,$tipousuario){
	public function modificarAdmin($id,$nombres,$apellidos,$email,$pwd,$estatus,$imagen,$tipousuario,$electo){
		$this->db->set("nombres",$nombres);
		$this->db->set("apellidos",$apellidos);
		$this->db->set("email",$email);
		$this->db->set("pwd",$pwd);
		$this->db->set("foto",$imagen);
		$this->db->set("status",$estatus);
		$this->db->set("tipo",$tipousuario);
		$this->db->set("electo",$electo);
		$this->db->where("numempleado",$id);
		$this->db->update("usuarios");
	}

	public function verificarEmail($email){

		$consulta = "
		SELECT * FROM `usuarios`
		WHERE email = '$email'";

		$query = $this->db->query($consulta);

		if($query->num_rows()>0) {
			return true;
		}else {
			return false;
		}
	}

	public function verificarNumeroEmpleado($numempleado){

		$consulta = "
		SELECT * FROM `usuarios`
		WHERE numempleado = '$numempleado'";

		$query = $this->db->query($consulta);

		if($query->num_rows()>0) {
			return true;
		}else {
			return false;
		}
	}

	public function verificarNombreEmpleado($nombres,$apellidos){

		$consulta = "
		SELECT * FROM `usuarios`
		WHERE nombres = '$nombres' and apellidos = '$apellidos'";

		$query = $this->db->query($consulta);

		if($query->num_rows()>0) {
			return true;
		}else {
			return false;
		}
	}

	public function eliminar_usuario($numempleado) {
		$consulta = "
				DELETE from usuarios
				WHERE numempleado = '$numempleado'";
		$query = $this->db->query($consulta);

		return $query;
	}

}