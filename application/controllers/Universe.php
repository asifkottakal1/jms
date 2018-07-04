<?php
class Universe extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_universe');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/universe_reg');
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

	public function universe_register()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['ss_registration']))
			{
				$uniname=$this->input->post('uniname');
				$areasqmtr=$this->input->post('areasqmtr');
				$unicapital=$this->input->post('unicapital');
				$registered_ss=$this->input->post('registered_ss');
				$data=array (
					'uniname'=>$uniname,
					'unicapital'=>$unicapital,
					'ss_appointer'=>$registered_ss,
					'areasqmtr'=>$areasqmtr,
					'deo_appointer'=>$_SESSION['userDetails']['regid']
				);

				if($this->Mdl_universe->universe_register($data))
				{
					$this->clear_all();
					echo "<center><h2>Successfully registered <b>".$uniname."</b></h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
				}
				else
				{
					echo "<center><h2>An error occured!</h2></center>";
				}
			}
			else
			{
				echo "<center><h2>Verify and confirm your entry before submitting!</h2>
				<br><a href='javascript:history.go(-1)'>Go back</a></center>";
				return false;
			}
		}
		else
		{
			echo "<center><h2>Invalid Attempt!</h2></center>";
		}
	}

	public function verify_universe()
	{
		if(isset($_SESSION['userDetails']))
		{
			if($this->uri->segment(3)===false)
			{
				echo "<center><h2>Invalid Attempt!</h2></center>";
			}
			else
			{
				$unicode=$this->uri->segment(3);
				$data=array('univ_uniqid'=>$unicode);
				if($this->Mdl_universe->check_universe_exist($data))
				{
					$this->session->set_userdata('univ_exist',1);
					echo 'ok';
				}
				else
				{
					echo 'no';
				}
			}
		}
		else
		{
			echo "<center><h2>Invalid Attempt!</h2></center>";
		}
	}

	public function get_uniqid()
	{
		if(isset($_SESSION['userDetails']))
		{
			if($this->uri->segment(3)===false)
			{
				echo "<center><h2>Invalid Attempt!</h2></center>";
			}
			else
			{
				$unicode=$this->uri->segment(3);
				if($res=$this->Mdl_universe->get_uniqcode($unicode))
				{
					$data=array();
					foreach($res as $row)
					{
						array_push($data, $row['univ_uniqid']);
					}
					echo json_encode($data);
				}
				else
				{
					echo 'no';
				}
			}
		}
		else
		{
			echo "<center><h2>Invalid Attempt!</h2></center>";
		}
	}

}
?>