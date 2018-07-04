<?php
class Idcard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_idcard');
  }
  public function index()
  {
    if(isset($_SESSION['userDetails']))
    {
      $this->load->view('user/header');
      $this->load->view('user/idcard_reg');
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

  public function aadhar_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $aadhar=$this->uri->segment(3);
            if(ctype_digit($aadhar))
            {
                $this->session->set_userdata('aadhar_exist',1);
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
    else
    {
        $this->clear_all();
        echo false;
    }
  }

  public function voter_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $aadhar=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $aadhar))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('voter_exist',1);
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

  public function passport_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $aadhar=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $aadhar))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('passport_exist',1);
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

  public function ration_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $aadhar=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $aadhar))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('ration_exist',1);
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

  public function license_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $aadhar=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $aadhar))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('license_exist',1);
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

  public function idcard_reg()
  {
    if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['ss_registration'])&&isset($_SESSION['aadhar_exist']))
      {
        $ss_registered=$this->input->post('registered_ss');
        $memid=$_SESSION['userDetails']['uniqid'];
        $aadhar=$this->input->post('aadhar');
        $voter = (isset($_SESSION['voter_exist']) ? $this->input->post('voter') : 0);
        $passport = (isset($_SESSION['passport_exist']) ? $this->input->post('passport') : 0);
        $ration = (isset($_SESSION['ration_exist']) ? $this->input->post('ration') : 0);
        $license = (isset($_SESSION['license_exist']) ? $this->input->post('license') : 0);

        $data=array(
          'deo_appointer'=>$_SESSION['userDetails']['regid'],
          'ss_appointer'=>$ss_registered,
          'user_uniqid'=>$memid,
          'aadhar'=>$aadhar,
          'voter'=>$voter,
          'ration'=>$ration,
          'license'=>$license,
          'passport'=>$passport
        );

        if($this->Mdl_idcard->insert_idcard($data))
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