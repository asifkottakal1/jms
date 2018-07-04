<?php
class Userdetails extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_userdetails');
	}
	public function index()
	{

	}
	public function userdetails($userid)
	{
		$userdata=$this->Mdl_userdetails->getdata($userid);
		
		$data=array(
			'userdata'=>$userdata,
			
		);
		$this->load->view('templates/header');
		$this->load->view('userdetails',$data);
		$this->load->view('templates/footer');
	}

	
}
?>
