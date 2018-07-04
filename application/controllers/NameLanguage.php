<?php
class NameLanguage extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_namelanguage');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('user/header');
			$this->load->view('user/namelanguage_reg');
			$this->load->view('user/footer');
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

	public function verify_engname()
	{
		if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
		{
			$engname=stripslashes($this->uri->segment(3));
			if (!preg_match('/[^A-Za-z]/', $engname))
			{
				$this->session->set_userdata('engname_exist',1);
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

	public function get_motherlanguage_name()
	{
		if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true&&$this->uri->segment(4)==true)
		{
			$engname=stripslashes($this->uri->segment(3));
			$motherlang=stripslashes($this->uri->segment(4));
			if (!preg_match('/[^A-Za-z]/', $engname)&&!preg_match('/[^A-Za-z]/', $motherlang))
			{
				if($res=$this->Mdl_namelanguage->translate_name($engname,$motherlang))
				{
					echo $res;
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
		else
		{
			echo false;
		}
	}

	public function namelanguage_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['member_exist'])&&isset($_SESSION['ss_registration']))
			{
				$ss_registered=$this->input->post('registered_ss');
				$memid=$this->input->post('memid');
				$engname=$this->input->post('engname');
				$motherlangname=$this->input->post('motherlangname');
				$statelang=$this->input->post('statelang');
				$nationlang=$this->input->post('nationlang');
					$otherlang=$this->input->post('otherlang');
				$data=array(
					'deo_appointer'=>$_SESSION['userDetails']['regid'],
					'ss_appointer'=>$ss_registered,
					'member_uniqid'=>$memid,
					'member_name'=>$engname,
					'member_motherlangname'=>$motherlangname,
					'member_statelangname'=>$statelang,
					'member_nationlangname'=>$nationlang,
					'member_otherlangname'=>$otherlang,
				);

				if($this->Mdl_namelanguage->namelanguage_reg($data))
				{
					echo "<center><h2>Successfully registered <b>".$engname."</b>!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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