<?php
class Mdl_login extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function chk_user_data($uname,$pass)
	{
		$res=$this->db->get_where('admin','username="'.$uname.'"');
		if($row=$res->result_array())
		{
			if(password_verify($pass,$row[0]['password']))
			{
				$set=array('regid'=>$row[0]['adminid'],'username'=>$row[0]['username']);
				$this->set_user_data($set);
				return true;
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

	public function chk_user_login($email,$pass)
	{
		$res=$this->db->get_where('users',array('email'=>$email,'userstatus'=>'enabled'));
		if($row=$res->result_array())
		{
			if(password_verify($pass,$row[0]['password']))
			{
				$set=array('regid'=>$row[0]['userid'],'email'=>$row[0]['email'],'uniqid'=>$row[0]['user_uniqid']);
				$this->set_user_data($set);
				return true;
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

	public function set_user_data($data)
	{
		$this->session->set_userdata('userDetails',$data);
	}

	public function register($data)
	{
		if($this->db->insert('users',$data))
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
