<?php
class Mdl_admin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_requests()
	{
		$data=array('userstatus'=>'disabled');
		if($row=$this->db->get_where('users',$data))
		{
			if($res=$row->result_array())
			{
				return $res;
			}
			else
			{
				return true;
			}
		}
		else
		{
			return false;
		}
	}

	public function enable_user($uniqid)
	{
		if($this->db->query("update users set userstatus='enabled' where userid='$uniqid'"))
		{
			$this->db->query("call add_user_uniqid($uniqid)");
			return true;
		}
		else
		{
			return false;
		}
	}

}
?>