<?php
class Parliament extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_parliament');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/parliamentseat_reg');
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

	public function parliamentseat_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['nation_exist'])&&isset($_SESSION['ss_registration']))
			{
				$natid=$this->input->post('natname');
				$area=$this->input->post('areasqmtr');
				$parlcapital=$this->input->post('parlcapital');
				$registered_ss=$this->input->post('registered_ss');
				$parlname=$this->input->post('parlname');
				$data=array(
					'nation_uniqid'=>$natid,
					'parlname'=>$parlname,
					'parlcap'=>$parlcapital,
					'areasqmtr'=>$area,
					'ss_appointer'=>$registered_ss,
					'deo_appointer'=>$_SESSION['userDetails']['regid']
				);
				if($this->Mdl_parliament->parliamentseat_reg($data))
				{
					$this->clear_all();
					echo "<center><h2>Successfully registered <b>".$parlname."</b></h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
				if($res=$this->Mdl_parliament->get_uniqcode($unicode))
				{
					$data=array();
					foreach($res as $row)
					{
						array_push($data, $row['parliament_uniqid']);
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

	public function verify_parl()
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
				$data=array('parliament_uniqid'=>$unicode);
				if($this->Mdl_parliament->check_parl_exist($data))
				{
					$this->session->set_userdata('parl_exist',1);
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