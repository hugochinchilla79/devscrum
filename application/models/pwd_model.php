<?
class Pwd_model extends CI_Model{
	public function change_pwd($npwd,$mail){
		$data = array('pwd' => $npwd);
		$this->db->where("email",$mail);
		$this->db->update('usuarios',$data);
	}
}
?>