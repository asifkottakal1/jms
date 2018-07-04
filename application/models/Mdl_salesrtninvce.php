<?php
class Mdl_salesrtninvce extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function salesrtninvce_reg($data,$items,$quantities,$prices,$amounts)
	{
		if($this->db->insert('salesrtnin',$data))	
		{
			$id=$this->db->insert_id();
			foreach ($items as $key => $item) {
				if($key<sizeof($items))
				{
				$quantity=$quantities[$key];
				$price=$prices[$key];
				$amount=$amounts[$key];
				$this->db->insert('salesrtndetails',array('salesrtnid'=>$id,'salesrtnitem'=>$item,'quantity'=>$quantity,'price'=>$price,'amount'=>$amount));
				}
				

			}
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
public function get_salesrtnuid($stag)
{
	$res=$this->db->query("select salesrtnuid from salesrtn where salesrtnuid like '$stag%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
}

public function verify_salesrtnuid($salesrtnuid){
	$res=$this->db->query("select salesrtnuid from salesrtn where salesrtnuid='$salesrtnuid'");
		if($row=$res->result_array())
		{
			return true;
		}
		else
		{
			return false;
		}
}

public function get_salesrtn($salesrtnuid)
{
	$res=$this->db->query("select * from salesrtn where salesrtnuid = '$salesrtnuid'");
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