<?php
class Mdl_purchasertn extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function purchasertn_reg($data)
	{
		if($this->db->insert('purchasertn',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

public function get_agrphname($stag)
{
	$res=$this->db->query("select agrphname from accountgrp where agrphname like '$stag%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
}

public function verify_agrphname($agrphname){
	$res=$this->db->query("select agrphname from accountgrp where agrphname='$agrphname'");
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