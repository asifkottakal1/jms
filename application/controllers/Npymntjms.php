<?php
class Npymntjms extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_npymntjms');
  }

  public function index()
  {
    if(isset($_SESSION['userDetails']))
    {
      $this->load->view('templates/header');
      $this->load->view('universe/npymntjms_reg');
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


  function get_areauid($stag)
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $stag=stripslashes($this->uri->segment(3));
      $stag=preg_replace('/[^A-Za-z0-9\-]/', '', $stag);

      if($res=$this->Mdl_npymntjms->get_areauid($stag))
      {
        $data=array();
        // print_r($res);
        foreach($res as $row)
        {
          // print_r($row);
          array_push($data, $row['areauid']);
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


  
  
  public function npymntjms_reg()
  {
    if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['member_exist'])&&isset($_SESSION['ss_registration'])&&isset($_SESSION['areauid_exist']))
      {
       $areauid=$this->input->post('areauid');
       
        $memid=$this->input->post('memid');
        $ss_appointer=$_SESSION['userDetails']['regid'];
        $sabha =$this->input->post('sabha');
        $nexpacc=$this->input->post('nexpacc');
        $npaidmode=$this->input->post('npaidmode');
        $pitem=$this->input->post('pitem');
        $quantity=$this->input->post('quantity');
        $valuation=$this->input->post('valuation');

        $date=$this->input->post('date');


        $data=array(
          'areauid'=>$areauid,
          'ss_appointer'=>$ss_appointer,
          'member_uniqid'=>$memid,
          'sabha'=>$sabha,
          'nexpacc'=>$nexpacc,
          'npaidmode'=>$npaidmode,
          
          'pitem'=>$pitem,
          'quantity'=>$quantity,
          'valuation'=>$valuation,

          'date'=>$date,
         
          
        );

        if($this->Mdl_npymntjms->npymntjms_reg($data))
        {
          echo "<center><h2>Successfully registered </h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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


  public function verify_areauid()
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $areauid=stripslashes($this->uri->segment(3));
      if($this->Mdl_npymntjms->verify_areauid($areauid))
      {
        if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $areauid))
        {
          $this->session->set_userdata('areauid_exist',1);
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


  function get_sabha($sabha)
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $stag=stripslashes($this->uri->segment(3));
      $stag=preg_replace('/[^A-Za-z0-9\-]/', '', $sabha);

      if($res=$this->Mdl_npymntjms->get_sabha($sabha))
      {
        echo json_encode($res);
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

  public function verify_user()
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    { 
      $uniqid=stripslashes($this->uri->segment(3));
      $uniqid=preg_replace('/[^A-Za-z0-9\-]/', '', $uniqid);
      $data=array('user_uniqid'=>$uniqid,'userstatus'=>'enabled');
      if($res=$this->Mdl_npymntjms->verify_user($data))
      {
        $this->session->set_userdata('member_exist',1);
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

}
?>
