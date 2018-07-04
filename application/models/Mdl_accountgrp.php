<?php
class Mdl_accountgrp extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function accountgrp_reg($data)
	{
		if($this->db->insert('accountgrp',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}