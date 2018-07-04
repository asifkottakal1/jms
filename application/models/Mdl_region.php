<?php
class Mdl_region extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function region_reg($data)
	{
		if($this->db->insert('region',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_uniqcode($unicode)
	{
		$res=$this->db->query("select region_uniqid from region where region_uniqid like '$unicode%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function check_region_exist($data)
	{
		$res=$this->db->get_where('region',$data);
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