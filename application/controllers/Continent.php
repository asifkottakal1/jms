<?php
class Continent extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_continent');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/continent_reg');
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

	public function continent_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['planet_exist'])&&isset($_SESSION['ss_registration']))
			{
				$planetid=$this->input->post('planame');
				$area=$this->input->post('areasqmtr');
				$contcap=$this->input->post('concapital');
				$registered_ss=$this->input->post('registered_ss');
				$contname=$this->input->post('coname');
				$data=array(
					'planet_uniqid'=>$planetid,
					'contname'=>$contname,
					'area'=>$area,
					'contcap'=>$contcap,
					'ss_appointer'=>$registered_ss,
					'deo_appointer'=>$_SESSION['userDetails']['regid']
				);
				if($this->Mdl_continent->continent_reg($data))
				{
					$this->clear_all();
					echo "<center><h2>Successfully registered <b>".$contname."</b></h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
				if($res=$this->Mdl_continent->get_uniqcode($unicode))
				{
					$data=array();
					foreach($res as $row)
					{
						array_push($data, $row['continent_uniqid']);
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

	public function verify_continent()
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
				$data=array('continent_uniqid'=>$unicode);
				if($this->Mdl_continent->check_continent_exist($data))
				{
					$this->session->set_userdata('cont_exist',1);
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