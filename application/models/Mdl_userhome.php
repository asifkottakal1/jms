<?php
class Mdl_userhome extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user($userid)
	{
		$res=$this->db->query("select user_uniqid from users where userstatus='enabled' and user_uniqid like '$userid%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function verify_user($data)
	{
		$res=$this->db->get_where('users',$data);
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

}
?>