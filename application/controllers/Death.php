<?php
class Death extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_death');

  }
  public function index()
  {
     if(isset($_SESSION['userDetails']))
    {
    $this->load->view('user/header');
    $this->load->view('user/death_reg');
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

  public function place_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $place=$this->uri->segment(3);
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $place))
{
                echo false;
            }
            else
            {
                $this->session->set_userdata('place_exist',1);
                echo true;
            }
        }
        else
        {
            echo false;
        }
    }
    else
    {
        $this->clear_all();
        echo false;
    }
  }
public function reason_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $place=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $place))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('reason_exist',1);
                echo true;
            }
        }
        else
        {
            echo false;
        }
    }
    else
    {
        $this->clear_all();
        echo false;
    }
  }

  public function burial_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $place=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $place))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('burial_exist',1);
                echo true;
            }
        }
        else
        {
            echo false;
        }
    }
    else
    {
        $this->clear_all();
        echo false;
    }
  }

 


  public function death_reg()
  {
    if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['ss_registration'])&&isset($_SESSION['place_exist']))
      {
        $ss_registered=$this->input->post('registered_ss');
        $memid=$_SESSION['userDetails']['uniqid'];
        $date=$this->input->post('date');
        $time=$this->input->post('time');
        $place=$this->input->post('place');
        $reason = (isset($_SESSION['reason_exist']) ? $this->input->post('reason') : 0);
        $burial = (isset($_SESSION['burial_exist']) ? $this->input->post('burial') : 0);
        

        
      
        $data=array(
         
          'user_uniqid'=>$memid,
          'date'=>$date,
          'time'=>$time,
          'place'=>$place,
          'reason'=>$reason,
          'burial'=>$burial
          
        );

        if($this->Mdl_death->insert_death($data))
        {
          echo "<center><h2>Successfully added ID Details!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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