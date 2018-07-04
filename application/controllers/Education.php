<?php
class Education extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_education');

  }
  public function index()
  {
     if(isset($_SESSION['userDetails']))
    {
    $this->load->view('user/header');
    $this->load->view('user/education');
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
  
public function education()
  {
     if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['ss_registration']))
      {
      $memid=$_SESSION['userDetails']['uniqid'];
    $qualification=$this->input->post('qualification');
    $startp=$this->input->post('startp');
  $institution=$this->input->post('institution');
    $cissued=$this->input->post('cissued');
     $stlstuding=$this->input->post('stlstuding');
    $data=array(
      'user_uniqid'=>$memid,
      'qualification'=>$qualification, 
      'startp'=>$startp,
      'institution'=>$institution,
       'cissued'=>$cissued,
       'stlstuding'=>$stlstuding,
    );
    if($this->Mdl_education->education($data))
    {
          echo "<center><h2>Successfully added qualification Details!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
 

    
 