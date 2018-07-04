<?php
class Mdl_currency extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function currency_reg($data)
	{
		if($this->db->insert('currency',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_currency()
	{
		$this->db->where('currency_uniqid IS NOT NULL', null, false);
		$res=$this->db->get('currency');
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