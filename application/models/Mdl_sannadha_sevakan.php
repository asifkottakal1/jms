<?php
class Mdl_sannadha_sevakan extends CI_Model
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

	public function get_ss($userid)
	{
		$res=$this->db->query("select ssuser_uniqid from sannadha_sevakan where ssuser_uniqid like '$userid%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function check_ss_exist($appoint)
	{
		$data=array(
			'ssuser_uniqid'=>$appoint
		);
		$res=$this->db->get_where('sannadha_sevakan',$data);
		if($row=$res->result_array())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function ss_appoint($appoint,$registrar)
	{
		if($this->check_ss_exist($appoint))
		{
			return false;
		}

		$data=array(
			'ssuser_uniqid'=>$appoint,
			'ss_appointer'=>$registrar,
			'deo_appointer'=>$_SESSION['userDetails']['regid']
		);
		if($this->db->insert('sannadha_sevakan',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function ss_check($registered_ss)
	{
		$res=$this->db->query("select sannadha_sevakan.*,users.* from sannadha_sevakan,users where sannadha_sevakan.ssuser_uniqid='$registered_ss' and users.user_uniqid='$registered_ss'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function deo_check($dataoperator,$id)
	{
		$data=array(
			'regid'=>$id,
			'deoid'=>$dataoperator
		);

		$res=$this->db->get_where('dataentry_operator',$data);
		if($row=$res->result_array())
		{
			$this->session->set_userdata('deo_check',1);
			return true;
		}
		else
		{
			$this->session->set_userdata('deo_check',0);
			return false;
		}
	}

	public function check_verified()
	{
		if(isset($_SESSION['ss_check'])&&isset($_SESSION['deo_check']))
		{
			if($_SESSION['ss_check']==1&&$_SESSION['deo_check']==1)
			{
				return true;
			}
			else
				return false;
		}
		else
		{
			return false;
		}
	}

	public function get_saved_data($id)
	{
		$data=array('regid',$id);
		$res=$this->db->get_where('sannadha_sevakan',$data);
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
