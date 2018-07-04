<?php
class Mdl_purchaseinvce extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function purchaseinvce_reg($data,$items,$quantities,$prices,$amounts)
	{
		if($this->db->insert('purchaseinvce',$data))	
		{
			$id=$this->db->insert_id();
			foreach ($items as $key => $item) {
				if($key<sizeof($items))
				{
					$quantity=$quantities[$key];
				$price=$prices[$key];
				$amount=$amounts[$key];
				$this->db->insert('purchasedetails',array('pinvcid'=>$id,'purchaseitem'=>$item,'quantity'=>$quantity,'price'=>$price,'amount'=>$amount));
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
public function get_purchaseuid($stag)
{
	$res=$this->db->query("select purchaseuid from purchase where purchaseuid like '$stag%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
}

public function verify_purchaseuid($purchaseuid){
	$res=$this->db->query("select purchaseuid from purchase where purchaseuid='$purchaseuid'");
		if($row=$res->result_array())
		{
			return true;
		}
		else
		{
			return false;
		}
}

public function get_purchase($purchaseuid)
{
	$res=$this->db->query("select * from purchase where purchaseuid = '$purchaseuid'");
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