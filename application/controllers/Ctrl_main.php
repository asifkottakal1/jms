<?php
class Ctrl_main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_admin');
	}
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}

	public function requests()
	{
		if(isset($_SESSION['userDetails']))
		{
			if($res['data']=$this->Mdl_admin->get_requests())
			{
				$this->load->view('requests',$res);
			}
			else
			{
				echo "<h3 align=center>An Error Occured!</h3>";
			}
		}
		else
		{
			echo "<h3 align=center>Invalid Attempt!</h3>";
		}
	}

	public function enable_user()
	{
		if(isset($_SESSION['userDetails']))
		{
			if($this->uri->segment(3)!=false)
			{
				$uniqid=$this->uri->segment(3);
				$uniqid=stripslashes($uniqid);
				if($this->Mdl_admin->enable_user($uniqid))
				{
					echo "<center><h3>User '".$uniqid."' enabled!</h3><br><a href='javascript:history.go(-1)'>Go back</a></center>";
				}
				else
				{

				}
			}
			else
			{
				echo "<h3 align=center>Invalid Attempt!</h3>";
			}
		}
		else
		{
			echo "<h3 align=center>Invalid Attempt!</h3>";
		}
	}

}
?>
