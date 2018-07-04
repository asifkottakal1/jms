<?php
class Banking extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_banking');
  }

  public function index()
  {
    if(isset($_SESSION['userDetails']))
    {
      $this->load->view('templates/header');
      $this->load->view('universe/banking_reg');
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


public function verify_accholder()
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $accholder=stripslashes($this->uri->segment(3));
      if (!preg_match('/[^A-Za-z]/', $accholder))
      {
        $this->session->set_userdata('accholder_exist',1);
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

  function get_areauid($stag)
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $stag=stripslashes($this->uri->segment(3));
      $stag=preg_replace('/[^A-Za-z0-9\-]/', '', $stag);

      if($res=$this->Mdl_banking->get_areauid($stag))
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


  
  
  public function banking_reg()
  {
    if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['accholder_exist'])&&isset($_SESSION['ss_registration']))
      {
        $areauid=$this->input->post('areauid');
        $ss_registered=$this->input->post('registered_ss');
        $memid=$_SESSION['userDetails']['regid'];
        $accholder = (isset($_SESSION['accholder_exist']) ? $this->input->post('accholder') : 0);

        $date=$this->input->post('date');
        $sabha=$this->input->post('sabha');
        $time=$this->input->post('time');
        $type=$this->input->post('type');
        $amount=$this->input->post('amount');
        $balance=$this->input->post('balance');
        $discrption=$this->input->post('discrption');


        $data=array(
          'areauid'=>$areauid,
          'ss_appointer'=>$ss_registered,
          'member_uniqid'=>$memid,
          'sabha'=>$sabha,
          'date'=>$date,
          'time'=>$time,
          
          'type'=>$type,
          'amount'=>$amount,
          'balance'=>$balance,
          'discrption'=>$discrption
         
          
        );

        if($this->Mdl_banking->banking_reg($data))
        {
          echo "<center><h2>Successfully registered <b>".$accholder."</b>!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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
      if($this->Mdl_banking->verify_areauid($areauid))
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

      if($res=$this->Mdl_banking->get_sabha($sabha))
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

}
?>
