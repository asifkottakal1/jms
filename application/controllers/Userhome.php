<?php
class Userhome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_login');
		$this->load->model('Mdl_userhome');
	}

	public function index()
	{
		// $this->load->view('templates/login_header');
		$this->load->view('user/home');
		// $this->load->view('templates/login_footer');		
	}

	public function get_uniqid()
	{
		if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
		{
			$uniqid=stripslashes($this->uri->segment(3));
			$uniqid=preg_replace('/[^A-Za-z0-9\-]/', '', $uniqid);
			if($res=$this->Mdl_userhome->get_user($uniqid))
			{
				$data=array();
				foreach($res as $row)
				{
					array_push($data, $row['user_uniqid']);
				}
				echo json_encode($data);
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}

	public function verify_user()
	{
		if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
		{	
			$uniqid=stripslashes($this->uri->segment(3));
			$uniqid=preg_replace('/[^A-Za-z0-9\-]/', '', $uniqid);
			$data=array('user_uniqid'=>$uniqid,'userstatus'=>'enabled');
			if($res=$this->Mdl_userhome->verify_user($data))
			{
				echo json_encode($res);
			}
			else
			{
				echo false;
			}
		}
		else
		{
			echo false;
		}
	}

	public function verify_user2()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->session->set_userdata('member_exist',1);
			echo true;
		}
		else
		{
			echo false;
		}
	}

}
?>