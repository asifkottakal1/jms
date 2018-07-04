<?php
class Mdl_assembly extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function assemblyseat_reg($data)
	{
		if($this->db->insert('assembly',$data))
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
		$res=$this->db->query("select assembly_uniqid from assembly where assembly_uniqid like '$unicode%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function check_parl_exist($data)
	{
		$res=$this->db->get_where('parliament',$data);
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