<?
class Login_model extends CI_Model{

	public function verificaExistencia($username,$password) {
	 	$query = $this->db->get_where('usuarios',array('email' => $username, 'pwd'=>$password));
	 	return $query;
	}


	public function verificaExistenciaContra($pwd){

		$consulta = "
		SELECT * FROM `usuarios`
		WHERE pwd = '$pwd'";

		$query = $this->db->query($consulta);

		if($query->num_rows()>0) {
			return true;
		}else {
			return false;
		}
	}

	public function verificaExistenciaEmail($email){

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

	public function verificaEstadoUsuario($email){

		$consulta = "
		SELECT status FROM `usuarios`
		WHERE email = '$email'";

		$query = $this->db->query($consulta);

		if($query->num_rows()>0) {
			$valor = $query->row_array();
			return $valor['status'];
		}else {
			return false;
		}
	}

	/*public function setFechaLog($username, $date) {

		$this->db->set('last_login',$date);
		$this->db->where('email',$username);
		$this->db->update('administracion');

	}*/

}