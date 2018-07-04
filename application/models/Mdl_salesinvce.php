<?php
class Mdl_salesinvce extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function salesinvce_reg($data,$items,$quantities,$prices,$amounts)
	{
		if($this->db->insert('salesinvce',$data))	
		{
			$id=$this->db->insert_id();
			foreach ($items as $key => $item) {
				if($key<sizeof($items))
				{
				$quantity=$quantities[$key];
				$price=$prices[$key];
				$amount=$amounts[$key];
				$this->db->insert('salesdetails',array('salid'=>$id,'salesitem'=>$item,'quantity'=>$quantity,'price'=>$price,'amount'=>$amount));
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
public function get_salesuid($stag)
{
	$res=$this->db->query("select salesuid from sales where salesuid like '$stag%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
}

public function verify_salesuid($salesuid){
	$res=$this->db->query("select salesuid from sales where salesuid='$salesuid'");
		if($row=$res->result_array())
		{
			return true;
		}
		else
		{
			return false;
		}
}

public function get_sales($salesuid)
{
	$res=$this->db->query("select * from sales where salesuid = '$salesuid'");
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