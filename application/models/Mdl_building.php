<?php
class Mdl_building extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function search_neighbourhood($data)
	{
		$this->db->select('unique_id');
		$this->db->like('unique_id',$data,'after');
		$res=$this->db->get('neighbourhood',0,5);

		if($row=$res->result_array())
		{
			return $row;
		}

		else
		{
			return false;
		}

	}

	public function verify_neighbourhood($data)
	{
		$query=$this->db->get_where('neighbourhood',array('unique_id'=>$data));
		$res=$query->row_array();
		return $res;
	}

	

	
	
	public function registration($master,$pseat,$aseat,$village,$policestaion,$firestation,$name,$ruleauth,$mainentrance,$otherentrance,$latitude,$longitude,$roadfacility,$distancetoroad,$road,$helipad,$nearcompound,$postalservice,$pincode,$postoffice,$ss,$dataentry,$service_name,$office,$code,$n,$o,$d,$sr,$gf,$oc,$sq,$fa,$fl)
	{
		/*if($this->check_ss_exist($ss))
		{
			return false;
		}*/

		$data=array(
			'name'=>$name,
			'neighbourhood'=>$master,
			'parliament_seat'=>$pseat,
			'assembly_seat'=>$aseat,
			'village'=>$village,
			'police_station'=>$policestaion,
			'fire_station'=>$firestation,
			'ruling_authority'=>$ruleauth,
			'main_entrance'=>$mainentrance,
			'other_entrance'=>$otherentrance,
			'latitude'=>$latitude,
			'longitude'=>$longitude,
			'road_facility'=>$roadfacility,
			'next_road_distance'=>$distancetoroad,
			'road_at_sides'=>$road,
			'helipad'=>$helipad,
			'near_compounds'=>$nearcompound,
			'postal_service'=>$postalservice,
			'pincode'=>$pincode,
			'postoffice'=>$postoffice,
			'sannadha_sevakan'=>$ss,
			'entered_by'=>$dataentry,
			'service_name'=>$service_name,
			'office'=>$office,
			'code'=>$code,

			
		);
		if($this->db->insert('building',$data))
		{
					$id=$this->db->insert_id();
				$this->db->query("UPDATE building SET unique_id=CONCAT('BUI',slno) where slno=$id;");
}
					foreach ($fl as $key => $floor) {
		$ocpn=$oc[$key];
		
		$sqft=implode('/',$sq[$key]);
		//echo "$sqft"; 
		$facility=implode('/',$fa[$key]);    
	
		$data=array(
							
						
							//'below_groundfloor'=>$bgf,
							'building_id'=>'BUI'.$id,
							'number_of_floor'=>$gf,
							'floor_ucode'=>$floor, 
							'number_of_occupation'=>$ocpn,    
							'fecilities'=>$facility,   
							'sqfts'=>$sqft

						);
	
		
		$this->db->insert('storage',$data);
		
	}
					{
						foreach ($sr as $key => $slno) {
						$number=$n[$key];
						$occupation=$o[$key];
						$department=implode('/',$d[$key]);
						$data=array(
							'building_id'=>'BUI'.$id,
							'sr_no'=>$slno,
							'phone_no'=>$number,
							'occupation'=>$occupation,
							'department'=>$department
						);
						//print_r($data);
					//	echo "<br><br>";
						$this->db->insert("landphone", $data);
					}
					}
				
					

					
	
	

		


					
					
	
	
		



	
	 
}
	public function search_pincode($data)
	{
		$this->db->select('pincode');
		$this->db->distinct(true);
		$this->db->like('pincode',$data,'after');
		$res=$this->db->get('postoffice',0,5);

		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function load_postoffice($pincode)
	{
		$this->db->select('unique_id,name');

		$query=$this->db->get_where('postoffice',array('pincode'=>$pincode));
		$res=$query->result_array();
		return $res;
	}
	

	// public function ss_check($registered_ss)
	// {
	// 	$data=array(
	// 		'ssuser_uniqid'=>$registered_ss
	// 	);

	// 	$res=$this->db->get_where('sannadha_sevakan',$data);
	// 	if($row=$res->result_array())
	// 	{
	// 		return $row;
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }
}

?>
