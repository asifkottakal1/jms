<?php
class Mdl_password extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function password_update($data)
	{
		if($this->db->query("update users set password='".$data['password']."' where user_uniqid='".$data['user_uniqid']."'"))
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