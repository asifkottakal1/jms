<?php
class Social extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_social');
  }
  public function index()
  {
    if(isset($_SESSION['userDetails']))
    {
      $this->load->view('user/header');
      $this->load->view('user/social_reg');
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

  public function verify_mobile()
  {
      if(isset($_SESSION['userDetails']))
      {
         if($this->uri->segment(3)==true&&$this->uri->segment(4)==true)
         {
            $code=$this->uri->segment(3);
            $mobile=$this->uri->segment(4);
            if(ctype_digit($mobile)&&ctype_digit($code)&&strlen($mobile)==10&&strlen($code)<=2)
            {
               $this->session->set_userdata('mobile_exist',1);
               echo true;
            }
            else
            {
               $this->clear_all();
               echo false;
            }
         }
         else
         {
            $this->clear_all();
            echo false;
         }
      }
      else
      {
         $this->clear_all();
         echo false;
      }
  }

  public function mobile_reg()
  {
    if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['mobile_exist']))
      {
        // $ss_registered=$this->input->post('registered_ss');
        $memid=$_SESSION['userDetails']['uniqid'];
        $mobile=$this->input->post('mobile');
        $code=$this->input->post('code');
        $data=array(
          // 'deo_appointer'=>$_SESSION['userDetails']['regid'],
          // 'ss_appointer'=>$ss_registered,
          'user_uniqid'=>$memid,
          'mobile'=>$mobile,
          'code'=>$code
        );

        if($this->Mdl_mobile->mobile_reg($data))
        {
          echo "<center><h2>Successfully added your mobile number!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
          $this->clear_all();
        }
        else
        {
          echo "<center><h2>An Error occured! Please check if your mobile number is already registered</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
      $this->clear_all();
      echo "<center><h2>Invalid Attempt!</h2></center>";
      return false;
    }
  }

}
?>