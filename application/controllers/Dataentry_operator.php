<?php
class Dataentry_operator extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_dataentry_operator');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/dataentry_operator_appoint');
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

	public function dataentry_operator_appoint()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['ss_appoint'])&&isset($_SESSION['ss_registration']))
			{
				unset($_SESSION['ss_appoint']);
				unset($_SESSION['ss_registration']);
				$ss_appoint=$this->input->post('appointed_ss');
				$ss_registered=$this->input->post('registered_ss');
				if($this->Mdl_dataentry_operator->deo_appoint($ss_appoint,$ss_registered))
				{
					echo "<center><h2>Successfully appointed <b>".$ss_appoint."</b> as dataentry operator!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
					$this->clear_all();
				}
				else
				{
					echo "<center><h2>This user is already a dataentry operator!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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

}
?>