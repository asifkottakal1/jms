<?php
class Assembly extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_assembly');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/assemblyseat_reg');
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

	public function assemblyseat_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['state_exist'])&&isset($_SESSION['ss_registration']))
			{
				$stateid=$this->input->post('statename');
				$area=$this->input->post('areasqmtr');
				$assemcapital=$this->input->post('assemcapital');
				$registered_ss=$this->input->post('registered_ss');
				$assemname=$this->input->post('assemname');
				$data=array(
					'assemname'=>$assemname,
					'assemcap'=>$assemcapital,
					'area'=>$area,
					'state_uniqid'=>$stateid,
					'ss_appointer'=>$registered_ss,
					'deo_appointer'=>$_SESSION['userDetails']['regid']
				);
				if($this->Mdl_assembly->assemblyseat_reg($data))
				{
					$this->clear_all();
					echo "<center><h2>Successfully registered <b>".$assemname."</b></h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
				if($res=$this->Mdl_region->get_uniqcode($unicode))
				{
					$data=array();
					foreach($res as $row)
					{
						array_push($data, $row['region_uniqid']);
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

	public function verify_region()
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
				$data=array('region_uniqid'=>$unicode);
				if($this->Mdl_region->check_region_exist($data))
				{
					$this->session->set_userdata('region_exist',1);
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