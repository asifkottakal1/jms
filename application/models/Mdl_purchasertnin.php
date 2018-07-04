<?php
class Mdl_purchasertnin extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
public function purchasertnin_reg($data,$items,$quantities,$prices,$amounts)
	{
		if($this->db->insert('purchasertnin',$data))	
		{
			$id=$this->db->insert_id();
		

			foreach ($items as $key => $item) {

				if($key<sizeof($items))
				{
					$quantity=$quantities[$key];
				$price=$prices[$key];
				$amount=$amounts[$key];
				$this->db->insert('purchasertndetails',array('prchrtid'=>$id,'purchasertnitem'=>$item,'quantity'=>$quantity,'price'=>$price,'amount'=>$amount));
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
public function get_purchasertnuid($stag)
{
	$res=$this->db->query("select purchasertnuid from purchasertn where purchasertnuid like '$stag%'");
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
}

public function verify_purchasertnuid($purchasertnuid){
	$res=$this->db->query("select purchasertnuid from purchasertn where purchasertnuid='$purchasertnuid'");
		if($row=$res->result_array())
		{
			return true;
		}
		else
		{
			return false;
		}
}

public function get_purchasertn($purchasertnuid)
{
	$res=$this->db->query("select * from purchasertn where purchasertnuid = '$purchasertnuid'");
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