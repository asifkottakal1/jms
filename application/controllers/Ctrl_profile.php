<?php
class Ctrl_profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_profile');
	}
	public function profile()
	{
		$userdata=$this->Mdl_profile->getdata();
		$data=array(
			'users'=>$userdata);
		$this->load->view('templates/header');
		$this->load->view('profile',$data);
		$this->load->view('templates/footer');
	}

	
}
?>
