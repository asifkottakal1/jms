<?php
class State extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_state');
		$this->load->model('Mdl_language');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$res['data']=$this->Mdl_language->get_languages();
			$this->load->view('templates/header');
			$this->load->view('universe/state_reg',$res);
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

	public function state_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['region_exist'])&&isset($_SESSION['ss_registration'])&&isset($_SESSION['parl_exist']))
			{
				$regid=$this->input->post('regname');
				$parlid=$this->input->post('parlname');
				$area=$this->input->post('areasqmtr');
				$statename=$this->input->post('statename');
				$status=$this->input->post('status');
				$statecapital=$this->input->post('statecapital');
				$registered_ss=$this->input->post('registered_ss');
				$language=$this->input->post('language');
				$data=array(
					'region_uniqid'=>$regid,
					'parliament_uniqid'=>$parlid,
					'statename'=>$statename,
					'area'=>$area,
					'statecap'=>$statecapital,
					'status'=>$status,
					'ss_appointer'=>$registered_ss,
					'statelanguage'=>$language,
					'deo_appointer'=>$_SESSION['userDetails']['regid']
				);
				if($this->Mdl_state->state_reg($data))
				{
					$this->clear_all();
					echo "<center><h2>Successfully registered <b>".$statename."</b></h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
				$this->clear_all();
				return false;
			}
		}
		else
		{
			echo "<h2><center>404: Page not found</center></h2>";
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
				if($res=$this->Mdl_state->get_uniqcode($unicode))
				{
					$data=array();
					foreach($res as $row)
					{
						array_push($data, $row['state_uniqid']);
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

	public function verify_state()
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
				$data=array('state_uniqid'=>$unicode);
				if($this->Mdl_state->check_state_exist($data))
				{
					$this->session->set_userdata('state_exist',1);
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

}
?>