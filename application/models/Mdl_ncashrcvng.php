<?php
class Mdl_ncashrcvng extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function ncashrcvng_reg($data)
	{
		if($this->db->insert('ncashrcvng',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

public function get_areauid($stag)
{
	$res=$this->db->query("select areauid from area where areauid like '$stag%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
}

public function verify_areauid($areauid){
	$res=$this->db->query("select areauid from area where areauid='$areauid'");
		if($row=$res->result_array())
		{
			return true;
		}
		else
		{
			return false;
		}
}

public function get_sabha($areauid)
{
	$res=$this->db->query("select * from sabha where areauid = '$areauid'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
}

public function verify_user($data)
	{
		$res=$this->db->get_where('users',$data);
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