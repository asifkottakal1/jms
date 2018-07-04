<?php
class Compound extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_compound');
	}


	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/compound_reg');
			$this->load->view('templates/footer');
		}
		else
			echo "<h2><center>404: Page not found</center></h2>";
	}

	public function registration()
	{

		/*foreach ($_POST as $key => $data) {
			echo '$='.'$this->input->post(\''.$key."');";
			print_r($data);
			echo "<br>";
		}*/
// print_r($_POST);
		$master=$this->input->post('txtMaster');
		$pseat=$this->input->post('txtParliamentSeat');
		$aseat=$this->input->post('txtAssemblySeat');
		$village=$this->input->post('txtVillage');
		$policestaion=$this->input->post('txtPolice');
		$firestation=$this->input->post('txtFire');
		$name=$this->input->post('txtName');
		$rulingauthorities=$this->input->post('txtRuleAuth'); //Array
		$mainentrance=$this->input->post('selMainEntrance');
		$otherentrances=$this->input->post('chkOtherEntrance');	//Array
		$lat=$this->input->post('txtLatitude');	//Array
		$lon=$this->input->post('txtLongitude'); //Array
		$roadfacility=$this->input->post('selRoadFacility');
		$distancetoroad=$this->input->post('txtDistance');
		$roads=$this->input->post('chkRoad'); //Array
		$helipad=$this->input->post('radHelipad');
		$nearcompounds=$this->input->post('txtNearCompound'); //Array
		$postalservice=$this->input->post('txtChiefPostalService');
		$pincode=$this->input->post('txtPincode');
		$postoffice=$this->input->post('selPostOffice');
		$ss=$this->input->post('registered_ss');
		$service_name=$this->input->post('service_name');
		$office=$this->input->post('office');
		$code=$this->input->post('code');
		$sr=$this->input->post('sr_no');
		$n=$this->input->post('number');//array
		$o=$this->input->post('occupation');//array
			$d=$this->input->post('Department');//array
  
		$dataentry=$_SESSION['userDetails']['regid'];
        //print_r($_POST);
		//$number=implode("/",$n);
		//$Occupation=implode("/",$o);
		//$Department=implode("/",$d);
		//$sr_no=implode("/",$sr);

			
		$ruleauth=implode("/",$rulingauthorities);
		$otherentrance=implode("/",$otherentrances);
		$road=implode("/",$roads);
		$nearcompound=implode("/",$nearcompounds);


		// $ruleauth='';
		// if($rulingauthorities)
		// foreach($rulingauthorities as $data){
		// 	if($data)
		// 	{
		// 		$ruleauth.=$data."|";
		// 	}
		// }
		//DMS to Decimal Degrees Conversion
		$latitude=$lat[0]+($lat[1]/60)+($lat[2]/3600);
		$longitude=$lon[0]+($lon[1]/60)+($lon[2]/3600);
		
		$latitude=round($latitude,6);
		$longitude=round($longitude,6);
		/*
		****Decimal Degrees to DMS conversion*** 
		$d=(int)($latitude);
		$m = (int)(($latitude - $d) * 60);
		$s = round(($latitude - $d - $m/60) * 3600,1);
		*/

		$res=$this->Mdl_compound->registration($master,$pseat,$aseat,$village,$policestaion,$firestation,$name,$ruleauth,$mainentrance,$otherentrance,$latitude,$longitude,$roadfacility,$distancetoroad,$road,$helipad,$nearcompound,$postalservice,$pincode,$postoffice,$ss,$dataentry,$service_name,$office,$code,$n,$o,$d,$sr);
		if($res)
			 echo "<center><h2>Successfully Added  Details!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
		else
			echo "<center><h2>Successfully Added  Details!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";

	}

	public function load_neighbourhood($stag=0)
	{
		$res=$this->Mdl_compound->search_neighbourhood($stag);
		$data=array();
		if($res)
		foreach($res as $row)
		{
			array_push($data, $row['unique_id']);
		}
		echo json_encode($data);
	}

	public function verify_neighbourhood($data=0)
	{
		$res=$this->Mdl_compound->verify_neighbourhood($data);
		echo json_encode($res);
	}

	// public function load_village($stag=0)
	// {
	// 	$res=$this->Mdl_compound->search_village($stag);
	// 	$data=array();
	// 	if($res)
	// 	foreach($res as $row)
	// 	{
	// 		array_push($data, $row['village']);
	// 	}
	// 	echo json_encode($data);
	// }

	// public function verify_village($data=0)
	// {
	// 	$res=$this->Mdl_compound->verify_village($data);
	// 	echo json_encode($res);
	// }



	public function search_pincode($stag=0)
	{
		$res=$this->Mdl_compound->search_pincode($stag);
		$data=array();
		if($res)
		foreach($res as $row)
		{
			array_push($data, $row['pincode']);
		}
		echo json_encode($data);
	}

	public function load_postoffice($pincode=0)
	{
		$res=$this->Mdl_compound->load_postoffice($pincode);
		echo json_encode($res);
	}
	

}

?>

