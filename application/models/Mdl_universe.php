<?php
class Mdl_universe extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function universe_register($data)
	{
		if($this->db->insert('universe',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function check_universe_exist($data)
	{
		$res=$this->db->get_where('universe',$data);
		if($row=$res->result_array())
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
		$res=$this->db->query("select univ_uniqid from universe where univ_uniqid like '$unicode%'");
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