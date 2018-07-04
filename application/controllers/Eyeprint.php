<?php
class Eyeprint extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_eyeprint');
	}
	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('user/header');
			$this->load->view('user/eyeprint_reg');
			$this->load->view('user/footer');
		}
		else
			echo "<h2><center>404: Page not found</center></h2>";
	}

	public function clear_all()
	{
		foreach($_SESSION as $key => $val)
		{
		    if ($key !== 'userDetails')
		    {
		      unset($_SESSION[$key]);
		    }
		}
	}

	public function eyeprint_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['member_exist'])&&isset($_SESSION['ss_registration']))
			{
				$ss_registered=$this->input->post('registered_ss');
				$memid=$this->input->post('memid');
				$finger=$this->input->post('eye');
				$data=array(
					'deo_appointer'=>$_SESSION['userDetails']['regid'],
					'ss_appointer'=>$ss_registered,
					'member_uniqid'=>$memid,
					'eye'=>$finger
				);

				if($this->Mdl_eyeprint->eyeprint_reg($data))
				{
					echo "<center><h2>Successfully registered <b>".$memid."'s eye</b>!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
					$this->clear_all();
				}
				else
				{
					echo "<center><h2>An Error occured!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
					$this->clear_all();
				}
			}
			else
			{
				$this->clear_all();
				echo "<center><h2>Verify and confirm your entry before submitting!</h2>
				<br><a href='javascript:history.go(-1)'>Go back</a></center>";
				return false;
			}
		}
		else
		{
			unset($_SESSION['ss_appoint']);
			unset($_SESSION['ss_registration']);
			echo "<center><h2>Invalid Attempt!</h2></center>";
			return false;
		}
	}

}
?>