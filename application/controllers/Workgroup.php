<?php
class Workgroup extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_workgroup');
  }
  public function index()
  {
    if(isset($_SESSION['userDetails']))
    {
      $this->load->view('user/header');
      $this->load->view('user/Workgroup_view');
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
  public function workgrp_ins()
  {
    if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['ss_registration']))
      {
        $ss_registered=$this->input->post('registered_ss');
        $memid=$_SESSION['userDetails']['regid'];

        $name_work=$this->input->post('name_work');
        $ucode_work =  $this->input->post('ucode_work');
        $name_workgrp =  $this->input->post('name_workgrp');
        $ucode_workgrp =  $this->input->post('ucode_workgrp');
        
        //$license = (isset($_SESSION['license_exist']) ? $this->input->post('license') : 0);

        $data=array(
          
          'ss_appointer'=>$ss_registered,
          'user_uniqid'=>$memid,

          'name_work'=>$name_work,
          'ucode_work'=>$ucode_work,
          'name_workgrp'=>$name_workgrp,
          'ucode_workgrp'=>$ucode_workgrp,
         
        );


        if($this->Mdl_workgroup->workgrp_ins($data))
        {
          echo "<center><h2>Successfully added Workgroup Details!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
?>
