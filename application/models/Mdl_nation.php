<?php
class Mdl_nation extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function nation_reg($data)
	{
		if($this->db->insert('nation',$data))
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
		$res=$this->db->query("select nation_uniqid from nation where nation_uniqid like '$unicode%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function check_nation_exist($data)
	{
		$res=$this->db->get_where('nation',$data);
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