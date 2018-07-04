<?php
class Currency extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_currency');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('templates/header');
			$this->load->view('universe/currency_reg');
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

	public function currency_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['ss_registration']))
			{
				$cname=$this->input->post('name');
				$registered_ss=$this->input->post('registered_ss');
				 $config['upload_path']   = './uploads/currency/'; 
		         $config['allowed_types'] = 'jpg|png|jpeg'; 
		         $config['max_size']      = 100; 
		         // $config['max_width']     = 1024; 
		         // $config['max_height']    = 768;  
		         $this->load->library('upload', $config);
		         if(!$this->upload->do_upload('symbol'))
			        { 
			            $data['imageError'] =  $this->upload->display_errors();
			            echo $data['imageError']."<br><a href='javascript:history.go(-1)'>Try Again</a>";
			        }
			        else
			        {
			        	$fdata=$this->upload->data();
			        	$fname=$fdata['file_name'];
			        	$data=array(
			        		'curname'=>$cname,
			        		'csymbol'=>$fname,
			        		'ss_appointer'=>$registered_ss,
							'deo_appointer'=>$_SESSION['userDetails']['regid']
			        	);
			            if($this->Mdl_currency->currency_reg($data))
				        {
				        	$this->clear_all();
							echo "<center><h2>Successfully registered <b>".$cname."</b></h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
		}
	}

}
?>