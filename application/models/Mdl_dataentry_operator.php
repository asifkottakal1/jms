<?php
class Mdl_dataentry_operator extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function deo_appoint($appoint,$registrar)
	{
		if($this->check_deo_exist($appoint))
		{
			return false;
		}

		$data=array(
			'deouser_uniqid'=>$appoint,
			'ss_appointer'=>$registrar,
			'deo_appointer'=>$_SESSION['userDetails']['regid']
		);
		if($this->db->insert('dataentry_operator',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function check_deo_exist($appoint)
	{
		$data=array(
			'deouser_uniqid'=>$appoint
		);
		$res=$this->db->get_where('dataentry_operator',$data);
		if($row=$res->result_array())
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