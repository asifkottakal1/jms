<?php
class Mdl_otp extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_otp($data)
	{
		if($this->db->query("update users set otp=".$data['otp']." where user_uniqid='".$data['user_uniqid']."'"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
?>