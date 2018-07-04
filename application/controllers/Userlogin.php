<?php
class Userlogin extends CI_Controller
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
		$this->load->view('user_login');
		$this->load->view('templates/login_footer');		
	}

	public function chk_user()
	{
		$email=$this->input->post("txtUname");
		$pass=$this->input->post("txtPass");
		if($this->Mdl_login->chk_user_login($email,$pass))
		{
			redirect('userhome');
		}
		else
		{
			echo "<script>alert('Login Failed');window.location.href='".base_url()."'</script>";
		}
	}

	public function logout()
	{
		session_unset();
		redirect(base_url().'userlogin');
	}

}
?>