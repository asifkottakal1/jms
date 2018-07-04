<?php
class Mdl_planet extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function planet_reg($data)
	{
		if($this->db->insert('planet',$data))
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
		$res=$this->db->query("select planet_uniqid from planet where planet_uniqid like '$unicode%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function check_planet_exist($data)
	{
		$res=$this->db->get_where('planet',$data);
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