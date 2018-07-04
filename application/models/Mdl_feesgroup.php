<?php
class Mdl_feesgroup extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function feesgroup_reg($data)
	{
		if($this->db->insert('feesgroup',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}