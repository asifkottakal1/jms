<?php
class Mdl_supporters extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function supporters_reg($data)
	{
		if($this->db->insert('supporters',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_user($userid)
	{
		$res=$this->db->query("select user_uniqid from users where userstatus='enabled' and user_uniqid like '$userid%' and user_uniqid!='".$_SESSION['userDetails']['uniqid']."'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function get_pref2($pref2,$pref1)
	{
		$res=$this->db->query("select user_uniqid from users where userstatus='enabled' and user_uniqid like '$pref2%' and user_uniqid!='$pref1'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function get_pref3($pref3,$pref2,$pref1)
	{
		$res=$this->db->query("select user_uniqid from users where userstatus='enabled' and user_uniqid like '$pref3%' and user_uniqid!='$pref1' and user_uniqid!='$pref2'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function get_pref4($pref4,$pref3,$pref2,$pref1)
	{
		$res=$this->db->query("select user_uniqid from users where userstatus='enabled' and user_uniqid like '$pref4%' and user_uniqid!='$pref1' and user_uniqid!='$pref2' and user_uniqid!='$pref3'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function verify_pref2($pref2,$pref1)
	{
		if($res=$this->db->query("select *from users where user_uniqid='$pref2' and user_uniqid!='$pref1'"))
		{
			if($row=$res->result_array())
			{
				return $row;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public function verify_pref3($pref3,$pref2,$pref1)
	{
		if($res=$this->db->query("select *from users where user_uniqid='$pref3' and user_uniqid!='$pref1' and user_uniqid!='$pref2'"))
		{
			if($row=$res->result_array())
			{
				return $row;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public function verify_pref4($pref4,$pref3,$pref2,$pref1)
	{
		if($res=$this->db->query("select *from users where user_uniqid='$pref4' and user_uniqid!='$pref1' and user_uniqid!='$pref2' and user_uniqid!='$pref3'"))
		{
			if($row=$res->result_array())
			{
				return $row;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

}
?>