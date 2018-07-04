<?php
class Experience extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_experience');

  }
  public function index()
  {
     if(isset($_SESSION['userDetails']))
    {
    $this->load->view('user/header');
    $this->load->view('user/experience_reg');
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
  public function experience()
  {
     if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['ss_registration']))
      {
      $memid=$_SESSION['userDetails']['uniqid'];
    $wpost=$this->input->post('wpost');
    $wtype=$this->input->post('wtype');
  $wtime=$this->input->post('wtime');
    $wsdate=$this->input->post('wsdate');
     $org=$this->input->post('org');
     $stlwork=$this->input->post('stlwork');
     $wrdate=$this->input->post('wrdate');
    $data=array(
     'user_uniqid'=>$memid,
      'wpost'=>$wpost, 
      'wtype'=>$wtype,
      'wtime'=>$wtime,
       'wsdate'=>$wsdate,
       'org'=>$org,
       'stlwork'=>$stlwork,
       'wrdate'=>$wrdate
       
    );
    if($this->Mdl_experience->experience($data))
    {
          echo "<center><h2>Successfully added experience Details!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
      $this->clear_all();
      echo "<center><h2>Invalid Attempt!</h2></center>";
      return false;
    }
  }
  }