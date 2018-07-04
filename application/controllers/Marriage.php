<?php
class Marriage extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_marriage');

  }
  public function index()
  {
     if(isset($_SESSION['userDetails']))
    {
    $this->load->view('user/header');
    $this->load->view('user/marriage_reg');
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

  public function fpuid_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $fpuid=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fpuid))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('fpuid_exist',1);
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

public function spuid_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $fpuid=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fpuid))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('spuid_exist',1);
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

  public function venue_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $fpuid=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fpuid))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('venue_exist',1);
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

  public function witness1_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $fpuid=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fpuid))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('witness1_exist',1);
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

  public function witness2_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $fpuid=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fpuid))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('witness2_exist',1);
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
 public function authorityid_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {
            $fpuid=stripslashes($this->uri->segment(3));
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fpuid))
            {
                echo false;
            }
            else
            {
                $this->session->set_userdata('authorityid_exist',1);
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
  public function marriage_reg()
  {
    if(isset($_SESSION['userDetails']))
    {
       if(isset($_SESSION['ss_registration'])&&isset($_SESSION['fpuid_exist']))
      if(true)
      {
        $ss_registered=$this->input->post('registered_ss');
        $memid=$_SESSION['userDetails']['uniqid'];
        $fpuid=$this->input->post('fpuid');
        $cdate=$this->input->post('cdate');
        $spuid = (isset($_SESSION['spuid_exist']) ? $this->input->post('spuid') : 0);
        $venue = (isset($_SESSION['venue_exist']) ? $this->input->post('venue') : 0);
        

        $witness1 = (isset($_SESSION['witness1_exist']) ? $this->input->post('witness1') : 0);
        $witness2 = (isset($_SESSION['witness2_exist']) ? $this->input->post('witness2') : 0);
 $authorityid = (isset($_SESSION['authorityid_exist']) ? $this->input->post('authorityid') : 0);

   $stltogether=$this->input->post('stltogether');
    $retairdate=$this->input->post('retairdate');
  $rcuid=$this->input->post('rcuid');

        $data=array(
         
          'user_uniqid'=>$memid,
          'fpuid'=>$fpuid,
          'spuid'=>$spuid,
          'venue'=>$venue,
          'cdate'=>$cdate,
          'witness1'=>$witness1,
          'witness2'=>$witness2,
          'authorityid'=>$authorityid,
          'stltogether'=>$stltogether,
          'retairdate'=>$retairdate,
          'rcuid'=>$rcuid,
        );
       
       
        if($mrgid=$this->Mdl_marriage->insert_marriage($data))
        {
          if (!file_exists('./uploads/marriage/'.$mrgid))
          {
            mkdir('./uploads/marriage/'.$mrgid, 0777, true);
          }

          $config['upload_path']          = './uploads/marriage/'.$mrgid;
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 0;
          $config['max_width']            = 1024;
          $config['max_height']           = 768;
          $config['overwrite']           = true;

          $config['file_name']           = 'contract.jpg';

          $this->load->library('upload', $config);

          if (!$this->upload->do_upload('pic')) 
          {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            echo "<center><h2>An Error occured!1</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
              $this->clear_all();
              return false;
          }
          else
          {
            $this->upload->data();
            if($stltogether=='no')
            {
              $config['file_name']           = 'retire.jpg';
              $this->upload->initialize($config);
              if(!$this->upload->do_upload('retpic'))
              {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                echo "<center><h2>An Error occured!2</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
                $this->clear_all();
                return false;
              }
              else
              {
                $this->upload->data();
              }
            }
            echo "<center><h2>Successfully registered <b>".$memid."'s marriage details</b>!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
                $this->clear_all();
          }
        }
        else
        {
          echo "<center><h2>An Error occured!3</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
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