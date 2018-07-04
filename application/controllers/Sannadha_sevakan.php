<?php
class Sannadha_sevakan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_sannadha_sevakan');
	}
	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/sannadha_sevakan_appoint');
			$this->load->view('templates/footer');
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

	public function get_user()
	{
		if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
		{
			$uniqid=stripslashes($this->uri->segment(3));
			$uniqid=preg_replace('/[^A-Za-z0-9\-]/', '', $uniqid);
			if($res=$this->Mdl_sannadha_sevakan->get_user($uniqid))
			{
				$data=array();
				// print_r($res);
				foreach($res as $row)
				{
					// print_r($row);
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

	public function get_ss()
	{
		if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
		{
			$uniqid=stripslashes($this->uri->segment(3));
			$uniqid=preg_replace('/[^A-Za-z0-9\-]/', '', $uniqid);
			if($res=$this->Mdl_sannadha_sevakan->get_ss($uniqid))
			{
				$data=array();
				foreach($res as $row)
				{
					array_push($data, $row['ssuser_uniqid']);
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
			$userid=stripslashes($this->uri->segment(3));
			$userid=preg_replace('/[^A-Za-z0-9\-]/', '', $userid);

			if($res=$this->Mdl_sannadha_sevakan->get_user($userid))
			{
				echo json_encode($res);
			}
			else
			{
				if(isset($_SESSION['ss_appoint']))
				{
					unset($_SESSION['ss_appoint']);
				}
				echo 'none';
			}
		}
		else
		{
			if(isset($_SESSION['ss_appoint']))
			{
				unset($_SESSION['ss_appoint']);
			}
			echo "error";
		}
	}

	public function set_appointed_session()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->session->set_userdata('ss_appoint',1);
			echo 'ok';
		}
		else
		{
			echo "error";
		}
	}

	public function sannadha_sevakan_appoint()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['ss_appoint'])&&isset($_SESSION['ss_registration']))
			{
				unset($_SESSION['ss_appoint']);
				unset($_SESSION['ss_registration']);
				$ss_appoint=$this->input->post('appointed_ss');
				$ss_registered=$this->input->post('registered_ss');
				if($this->Mdl_sannadha_sevakan->ss_appoint($ss_appoint,$ss_registered))
				{
					echo "<center><h2>Successfully appointed <b>".$ss_appoint."</b> as sannadha sevakan!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
				// print_r($_SESSION);
				unset($_SESSION['ss_appoint']);
				unset($_SESSION['ss_registration']);
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

	public function verify_registered_ss()
	{
		if(!isset($_SESSION['userDetails'])) 
		{
			echo "invalid";
			return false;
		}

		if($this->uri->segment(3)==false)
		{
			echo 'missing';
			return false;
		}

		$registered_ss=$this->uri->segment(3);

		if($res=$this->Mdl_sannadha_sevakan->ss_check($registered_ss))
		{
			$this->session->set_userdata('ss_registration',1);
			echo json_encode($res);
		}
		else
		{
			echo 'nope';
		}
	}

	public function verify_dataoperator()
	{
		if(!isset($_SESSION['userDetails'])) 
		{
			echo "invalid";
			return false;
		}

		if($this->uri->segment(3)==false)
		{
			echo 'missing';
			return false;
		}

		$dataoperator=$this->uri->segment(3);
		if(!ctype_digit($dataoperator))
		{
			echo 'missing';
			return false;
		}

		if($this->Mdl_sannadha_sevakan->deo_check($dataoperator,$_SESSION['userDetails']['regid']))
		{
			echo 'yep';
			return false;
		}
		else
		{
			echo 'nope';
			return false;
		}
	}

	public function data_operator_appoint()
	{
		unset($_SESSION['ss_check']);
		unset($_SESSION['deo_check']);
		$this->load->view('templates/header');
		$this->load->view('universe/data_operator_appoint');
		$this->load->view('templates/footer');
	}

	public function approval_authority_appoint()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/approval_authority_appoint');
		$this->load->view('templates/footer');
	}

	public function language_reg()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/language_reg');
		$this->load->view('templates/footer');
	}

	public function currency_reg()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/currency_reg');
		$this->load->view('templates/footer');
	}

	public function universe_reg()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/universe_reg');
		$this->load->view('templates/footer');
	}

	public function planet_reg()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/planet_reg');
		$this->load->view('templates/footer');
	}

	public function continent_reg()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/continent_reg');
		$this->load->view('templates/footer');
	}

	public function nation_reg()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/nation_reg');
		$this->load->view('templates/footer');
	}

	public function parliamentseat_reg()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/parliamentseat_reg');
		$this->load->view('templates/footer');
	}

	public function region_reg()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/region_reg');
		$this->load->view('templates/footer');
	}

	public function state_reg()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/state_reg');
		$this->load->view('templates/footer');
	}

	public function assemblyseat_reg()
	{
		$this->load->view('templates/header');
		$this->load->view('universe/assemblyseat_reg');
		$this->load->view('templates/footer');
	}

}
?>