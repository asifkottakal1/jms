<?php
class Creditors extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_creditors');
  }

  public function index()
  {
    if(isset($_SESSION['userDetails']))
    {
      $this->load->view('templates/header');
      $this->load->view('universe/creditors_reg');
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


public function verify_credtname()
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $credtname=stripslashes($this->uri->segment(3));
      if (!preg_match('/[^A-Za-z]/', $credtname))
      {
        $this->session->set_userdata('credtname_exist',1);
        echo true;
      }
      else
      {
        echo false;
      }
    }
    else
    {
      echo false;
    }
  }

  function get_agrphname($stag)
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $stag=stripslashes($this->uri->segment(3));
      $stag=preg_replace('/[^A-Za-z0-9\-]/', '', $stag);

      if($res=$this->Mdl_debtors->get_agrphname($stag))
      {
        $data=array();
        // print_r($res);
        foreach($res as $row)
        {
          // print_r($row);
          array_push($data, $row['agrphname']);
        }
        echo json_encode($data);
      }
      else
      {
        echo false;
      }
    }
    else
    {
      echo false;
    }
  }


  
  
  public function creditors_reg()
  {
    if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['credtname_exist'])&&isset($_SESSION['ss_registration']))
      {
        $grphname=$this->input->post('grphname');
        $ss_registered=$this->input->post('registered_ss');
        $memid=$_SESSION['userDetails']['regid'];
        $credtname=$this->input->post('credtname');
        $credtuid=$this->input->post('credtuid');

        $data=array(

          'grphname'=>$grphname,
          'ss_appointer'=>$ss_registered,
          'member_uniqid'=>$memid,
          'credtname'=>$credtname,
          'credtuid'=>$credtuid,
          
        );

        if($this->Mdl_creditors->creditors_reg($data))
        {
          echo "<center><h2>Successfully registered <b>".$credtname."</b>!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
          $this->clear_all();
        }
        else
        {
          echo "<center><h2>This user is already a sannadha sevakan!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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


  public function verify_agrphname()
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $agrphname=stripslashes($this->uri->segment(3));
      if($this->Mdl_creditors->verify_agrphname($agrphname))
      {
        if (!preg_match('/[^A-Za-z]/', $agrphname))
        {
          $this->session->set_userdata('agrphname_exist',1);
          echo true;
        }
        else
        {
          echo false;
        }
      }
      else
      {
        echo "no";
      }
      
    }
    else
    {
      echo false;
    }
  }

}
?>

