<?php
class Mdl_npymnt extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function npymnt_reg($data)
	{
		if($this->db->insert('nonpymnt',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}