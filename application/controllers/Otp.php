<?php
class Otp extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_otp');
  }
  public function index()
  {
    if(isset($_SESSION['userDetails']))
    {
      $this->load->view('user/header');
      $this->load->view('user/otp');
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

  public function insert_otp()
  {
    if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['ss_registration']))
      {
        $ss_registered=$this->input->post('registered_ss');
        $memid=$_SESSION['userDetails']['uniqid'];
        $otp=$this->input->post('otp');
        if(!ctype_digit($otp)||strlen((string)$otp)>6)
        {
            echo "<center><h2>Invalid OTP!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
            $this->clear_all();  
            return false;
        }

        $data=array(
          'deo_appointer'=>$_SESSION['userDetails']['regid'],
          'ss_appointer'=>$ss_registered,
          'user_uniqid'=>$memid,
          'otp'=>$otp
        );

        if($this->Mdl_otp->insert_otp($data))
        {
          echo "<center><h2>Successfully added OTP ".$otp."!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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