<?php
class Mdl_continent extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function continent_reg($data)
	{
		if($this->db->insert('continent',$data))
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
		$res=$this->db->query("select continent_uniqid from continent where continent_uniqid like '$unicode%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function check_continent_exist($data)
	{
		$res=$this->db->get_where('continent',$data);
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