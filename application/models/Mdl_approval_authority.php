<?php
class Mdl_approval_authority extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function aa_register($data)
	{
		if($this->db->insert('approval_authority',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function aa_exists($appointed_ss)
	{
		$data=array('appointed_ss'=>$appointed_ss);
		$res=$this->db->get_where('approval_authority',$data);
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