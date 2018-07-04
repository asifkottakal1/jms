<?php
class Accountgrp extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_accountgrp');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/accountgrp_reg');
			$this->load->view('templates/footer');
		}
		else
		{
			echo "<h2><center>404: Page not found</center></h2>";
		}
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


public function verify_agrphname()
	{
		if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
		{
			$agrphname=stripslashes($this->uri->segment(3));
			if (!preg_match('/[^A-Za-z]/', $agrphname))
			{
				$this->session->set_userdata('agrphname_exist',1);
				echo true;
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

	
	
	public function accountgrp_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['agrphname_exist'])&&isset($_SESSION['ss_registration']))
			{
				$ss_registered=$this->input->post('registered_ss');
				$memid=$_SESSION['userDetails']['regid'];
				$agrphname=$this->input->post('agrphname');
 
				$agrphuid=$this->input->post('agrphuid');

				$data=array(
					
					'ss_appointer'=>$ss_registered,
					'member_uniqid'=>$memid,
					'agrphname'=>$agrphname,
					'agrphuid'=>$agrphuid,
					
				);

				if($this->Mdl_accountgrp->accountgrp_reg($data))
				{
					echo "<center><h2>Successfully registered <b>".$agrphname."</b>!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
					$this->clear_all();
				}
				else
				{
					echo "<center><h2>This user is already a sannadha sevakan!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
