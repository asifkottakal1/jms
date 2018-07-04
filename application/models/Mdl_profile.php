<?php
class Mdl_profile extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	

	public function getdata()
	{
// $query = $this->db->query("select * from users"); 
	$this->db->select('userid,email,firstname,lastname,acc_opendt,user_uniqid,address,mobile,');
	$query=$this->db->get('users');

 	 return $query->result_array();
}  

}
?>