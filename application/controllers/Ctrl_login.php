<?php
class Ctrl_login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_login');
	}
	public function index()
	{
		$this->load->view('templates/login_header');
		$this->load->view('login');
		$this->load->view('templates/login_footer');
		
	}
	public function chk_user()
	{
		$uname=$this->input->post('txtUname');
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $uname))
		{
		    echo("Invalid Username");
  			return false;
		}

		$pass=$this->input->post('txtPass');
		// $dat1=array('username'=>$uname,'password'=>$pass);
		if($this->Mdl_login->chk_user_data($uname,$pass))
		{
			redirect(base_url().'Ctrl_main');
		}
		else
		{
			redirect(base_url().'ctrl_login', 'refresh'); 
		}
	}
	public function register_user()
	{
		$this->load->view('templates/login_header');
		$this->load->view('register');
		$this->load->view('templates/login_footer');
	}
	public function logout()
	{
		$this->session->set_userdata('userDetails','');
		unset($_SESSION['userDetails']);
		$this->index();
	}

	public function registration()
	{
		$fname=$this->input->post('fname');
		$lname=$this->input->post('lname');
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fname))
		{
		    echo("Invalid Details. Make sure you are entering valid details.");
  			return false;
		}
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lname))
		{
		    echo("Invalid Details. Make sure you are entering valid details.");
  			return false;
		}

		$email=$this->input->post('email');
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
  			echo("Invalid Email address");
  			return false;
  		}

		$mobile=$this->input->post('mobile');
		if(!preg_match('/^\d{10}$/',$mobile))
	    {
	      	echo 'Invalid Mobile Number!';
	      	return false;
	    }
	    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $mobile))
	    {
	    	echo 'Invalid Mobile Number!';
	      	return false;
	    }

		$pass=$this->input->post('pass');
		$pass=password_hash($pass,PASSWORD_DEFAULT);

		$uname=$this->input->post('uname');
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $uname))
		{
		    echo("Invalid Username");
  			return false;
		}

		$address=$this->input->post('address');

		/*$city=$this->input->post('city');
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $city))
		{
		    echo("Invalid City");
  			return false;
		}*/

		// $pin=$this->input->post('pin');
		// if (!preg_match('/^\d{6}$/', $pin))
		// {
		//     echo("Invalid PIN");
  // 			return false;
		// }

		$data=array(
			'Firstname'=>$fname,
			'Lastname'=>$lname,
			'email'=>$email,
			'mobile'=>$mobile,
			'password'=>$pass,
			'address'=>$address
		);
		if($this->Mdl_login->register($data))
		{
			echo "<center><h2>Successfully Registered</h2><br><a href='".base_url()."userlogin'>Login</a></center>";
		}
		else
		{
			echo "<center><h2>Registration Failed</h2><br><a href='".base_url()."userlogin'>Try Again </a><br></center>";
		}

	}
}
?>
