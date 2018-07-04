<?php
class Language extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_language');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/language_reg');
			$this->load->view('templates/footer');
		}
		else
		{
			echo "<h2><center>404: Page not found</center></h2>";
		}
	}

	public function knownLanguages()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('user/header');
			$this->load->view('user/knownLanguage_reg');
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

	public function language_reg()
	{
		$language=$this->input->post('lang_name');
		$registered_ss=$this->input->post('registered_ss');
		$data=array(
			'language_name'=>$language,
			'ss_appointer'=>$registered_ss,
			'deo_appointer'=>$_SESSION['userDetails']['regid']
		);
		if($this->Mdl_language->language_register($data))
		{
			$this->clear_all();
			echo "<center><h2>Successfully registered <b>".$language."</b></h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
		}
		else
		{
			echo "<center><h2>An error occured!</h2></center>";
		}
	}

	public function knownLanguages_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			$language=$this->input->post('language');
			$fluent = (isset($_POST['fluent']) ? $this->input->post('fluent') : '');
			$just = (isset($_POST['just']) ? $this->input->post('just') : '');
			$read = (isset($_POST['read']) ? $this->input->post('read') : '');
			$write = (isset($_POST['write']) ? $this->input->post('write') : '');
			$essay = (isset($_POST['essay']) ? $this->input->post('essay') : '');
			$oral = (isset($_POST['oral']) ? $this->input->post('oral') : '');
			// $registered_ss=$this->input->post('registered_ss');
			$data=array(
				'langname'=>$language,
				'fluent'=>$fluent,
				'just'=>$just,
				'reading'=>$read,
				'writing'=>$write,
				'essay'=>$essay,
				'oral'=>$oral,
				'user_uniqid'=>$_SESSION['userDetails']['uniqid']
				// 'ss_appointer'=>$registered_ss,
				// 'deo_appointer'=>$_SESSION['userDetails']['regid']
			);
			if($this->Mdl_language->knownLanguages_reg($data))
			{
				$this->clear_all();
				echo "<center><h2>Successfully registered known languages.</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
			}
			else
			{
				echo "<center><h2>An error occured!</h2></center>";
			}
		}
		else
		{
			echo "<h2><center>404: Page not found</center></h2>";
		}
	}

}