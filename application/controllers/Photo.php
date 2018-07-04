<?php
class Photo extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_photo');
	}
	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$this->load->view('user/header');
			$this->load->view('user/photo_reg');
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

	public function photo_reg()
	{
		if(isset($_SESSION['userDetails']))
		{
			if(isset($_SESSION['ss_registration']))
			{
				$ss_registered=$this->input->post('registered_ss');
				$memid=$_SESSION['userDetails']['uniqid'];
				// echo $memid;
				if (!file_exists('./uploads/userpic/'.$memid)) {
			    	mkdir('./uploads/userpic/'.$memid, 0777, true);
				}
				$config['upload_path']          = './uploads/userpic/'.$memid;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 50;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['overwrite']           = true;

          		$config['file_name']           = 'userpic.jpg';
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('pic'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                }
                else
                {

                  	$data1 = array('upload_data' => $this->upload->data());
                  	echo $data1['upload_data']['file_name'];
                  	$image="uploads/userpic/".$memid."/".$data1['upload_data']['file_name'];
                  	$data=array(
					'deo_appointer'=>$_SESSION['userDetails']['regid'],
					'ss_appointer'=>$ss_registered,
					'member_uniqid'=>$memid,
					'userpic'=>$image
					);
                   	if($this->Mdl_photo->photo_reg($data))
					{
						echo "<center><h2>Successfully registered <b>".$memid."'s photo</b>!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
						$this->clear_all();
					}
					else
					{
						echo "<center><h2>An Error occured!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
						$this->clear_all();
					}
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