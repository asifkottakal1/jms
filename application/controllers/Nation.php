<?php
class Nation extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_nation');
		$this->load->model('Mdl_language');
		$this->load->model('Mdl_currency');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$res['data']=$this->Mdl_language->get_languages();
			$res['data2']=$this->Mdl_currency->get_currency();
			$this->load->view('universe/nation_reg',$res);
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

	public function nation_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['cont_exist'])&&isset($_SESSION['ss_registration']))
			{
				$contid=$this->input->post('contname');
				$area=$this->input->post('areasqmtr');
				$natcap=$this->input->post('natcapital');
				$registered_ss=$this->input->post('registered_ss');
				$natname=$this->input->post('natname');
				$language=$this->input->post('language');
				$currency=$this->input->post('currency');
				$data=array(
					'natname'=>$natname,
					'natcap'=>$natcap,
					'natlanguage'=>$language,
					'natcurrency'=>$currency,
					'area'=>$area,
					'continent_uniqid'=>$contid,
					'ss_appointer'=>$registered_ss,
					'deo_appointer'=>$_SESSION['userDetails']['regid']
				);
				if($this->Mdl_nation->nation_reg($data))
				{
					$this->clear_all();
					echo "<center><h2>Successfully registered <b>".$natname."</b></h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
				if($res=$this->Mdl_nation->get_uniqcode($unicode))
				{
					$data=array();
					foreach($res as $row)
					{
						array_push($data, $row['nation_uniqid']);
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

	public function verify_nation()
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
				$data=array('nation_uniqid'=>$unicode);
				if($this->Mdl_nation->check_nation_exist($data))
				{
					$this->session->set_userdata('nation_exist',1);
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