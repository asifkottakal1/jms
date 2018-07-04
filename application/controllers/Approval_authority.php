<?php
class Approval_authority extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_approval_authority');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/approval_authority_appoint');
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

	public function aa_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['ss_registration']))
			{
				$appointed_ss=$this->input->post('appointed_ss');
				$duty=$this->input->post('duty');
				$registered_ss=$this->input->post('registered_ss');
				$data=array(
					'appointed_ss'=>$appointed_ss,
					'duty'=>$duty,
					'ss_appointer'=>$registered_ss,
					'deo_appointer'=>$_SESSION['userDetails']['regid']
				);
				if($this->Mdl_approval_authority->aa_exists($appointed_ss))
				{
					echo "<center><h2>This Sannadha Sevakan is already an approval authority!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
					return false;
				}
				else
				{
					if($this->Mdl_approval_authority->aa_register($data))
					{
						$this->clear_all();
						echo "<center><h2>Successfully appointed <b>".$appointed_ss."</b></h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
					}
					else
					{
						echo "<center><h2>An error occured!</h2></center>";
					}
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
			return false;
		}
	}

}