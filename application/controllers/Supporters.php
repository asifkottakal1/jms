<?php
class Supporters extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_supporters');
		$this->load->model('Mdl_userhome');
	}
	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('user/header');
			$this->load->view('user/supporters_reg');
			$this->load->view('user/footer');
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

	public function get_pref2()
	{
		if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true&&$this->uri->segment(4)==true)
		{
			$uniqid=stripslashes($this->uri->segment(3));
			$pref1=stripslashes($this->uri->segment(4));
			if($res=$this->Mdl_supporters->get_pref2($uniqid,$pref1))
			{
				$data=array();
				foreach($res as $row)
				{
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

	public function get_pref3()
	{
		if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true&&$this->uri->segment(4)==true&&$this->uri->segment(5)==true)
		{
			$uniqid=stripslashes($this->uri->segment(3));
			$pref1=stripslashes($this->uri->segment(4));
			$pref2=stripslashes($this->uri->segment(5));
			if($res=$this->Mdl_supporters->get_pref3($uniqid,$pref1,$pref2))
			{
				$data=array();
				foreach($res as $row)
				{
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

	public function get_pref4()
	{
		if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true&&$this->uri->segment(4)==true&&$this->uri->segment(5)==true&&$this->uri->segment(6)==true)
		{
			$uniqid=stripslashes($this->uri->segment(3));
			$pref3=stripslashes($this->uri->segment(4));
			$pref2=stripslashes($this->uri->segment(5));
			$pref1=stripslashes($this->uri->segment(6));
			if($res=$this->Mdl_supporters->get_pref4($uniqid,$pref3,$pref2,$pref1))
			{
				$data=array();
				foreach($res as $row)
				{
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

	public function verify_pref1()
	{
		if(isset($_SESSION['userDetails']))
		{
			$pref1=$this->uri->segment(3);
			$data=array('user_uniqid'=>$pref1);
			if($res=$this->Mdl_userhome->verify_user($data))
			{
				echo json_encode($res);
			}
			else
			{
				echo false;
			}
		}
		else
		{

		}
	}

	public function verify_pref12()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->session->set_userdata('pref1_exist',1);
			echo true;
		}
		else
		{
			echo false;
		}
	}

	public function verify_pref2()
	{
		if(isset($_SESSION['userDetails']))
		{
			$pref2=$this->uri->segment(3);
			$pref1=$this->uri->segment(4);
			if($res=$this->Mdl_supporters->verify_pref2($pref2,$pref1))
			{
				echo json_encode($res);
			}
			else
			{
				echo false;
			}
		}
		else
		{

		}
	}

	public function verify_pref22()
	{
		if(isset($_SESSION['userDetails'])&&isset($_SESSION['pref1_exist']))
		{
			$this->session->set_userdata('pref2_exist',1);
			echo true;
		}
		else
		{
			echo false;
		}
	}

	public function verify_pref3()
	{
		if(isset($_SESSION['userDetails']))
		{
			$pref3=$this->uri->segment(3);
			$pref2=$this->uri->segment(4);
			$pref1=$this->uri->segment(5);
			if($res=$this->Mdl_supporters->verify_pref3($pref3,$pref2,$pref1))
			{
				echo json_encode($res);
			}
			else
			{
				echo false;
			}
		}
		else
		{

		}
	}

	public function verify_pref32()
	{
		if(isset($_SESSION['userDetails'])&&isset($_SESSION['pref1_exist'])&&isset($_SESSION['pref2_exist']))
		{
			$this->session->set_userdata('pref3_exist',1);
			echo true;
		}
		else
		{
			echo false;
		}
	}

	public function verify_pref4()
	{
		if(isset($_SESSION['userDetails']))
		{
			$pref4=$this->uri->segment(3);
			$pref3=$this->uri->segment(4);
			$pref2=$this->uri->segment(5);
			$pref1=$this->uri->segment(6);
			if($res=$this->Mdl_supporters->verify_pref4($pref4,$pref3,$pref2,$pref1))
			{
				echo json_encode($res);
			}
			else
			{
				echo false;
			}
		}
		else
		{

		}
	}

	public function verify_pref42()
	{
		if(isset($_SESSION['userDetails'])&&isset($_SESSION['pref1_exist'])&&isset($_SESSION['pref2_exist'])&&isset($_SESSION['pref3_exist']))
		{
			$this->session->set_userdata('pref4_exist',1);
			echo true;
		}
		else
		{
			echo false;
		}
	}

	public function supporters_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['member_exist'])&&isset($_SESSION['ss_registration']))
			{
				if(isset($_SESSION['pref1_exist']))
				{
					$pref1=$this->input->post('pref1');
					if(isset($_SESSION['pref2_exist']))
					{
						$pref2=$this->input->post('pref2');
					}
					else
					{
						$pref2=0;
					}
					if(isset($_SESSION['pref3_exist']))
					{
						$pref3=$this->input->post('pref3');
					}
					else
					{
						$pref3=0;
					}
					if(isset($_SESSION['pref4_exist']))
					{
						$pref4=$this->input->post('pref4');
					}
					else
					{
						$pref4=0;
					}
				}
				else
				{
					$this->clear_all();
					echo "<center><h2>Atleast enter 1 preference!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
					return false;
				}

				$ss_registered=$this->input->post('registered_ss');
				$memid=$this->input->post('memid');
				$data=array(
					'deo_appointer'=>$_SESSION['userDetails']['regid'],
					'ss_appointer'=>$_SESSION['ss_registration'],
					'member_uniqid'=>$memid,
					'pref1'=>$pref1,
					'pref2'=>$pref2,
					'pref3'=>$pref3,
					'pref4'=>$pref4
				);

				if($this->Mdl_supporters->supporters_reg($data))
				{
					echo "<center><h2>Successfully registered supporters for <b>".$memid."</b>!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
					$this->clear_all();
				}
				else
				{
					echo "<center><h2>An Error occured!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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