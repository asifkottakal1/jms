<?php
class Purchasertnin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_purchasertnin');
  }

  public function index()
  {
    if(isset($_SESSION['userDetails']))
    {
      $this->load->view('templates/header');
      $this->load->view('universe/purchasertnin_reg');
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


// public function verify_purchase()
//   {
//     if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
//     {
//       $purchase=stripslashes($this->uri->segment(3));
//       if (!preg_match('/[^A-Za-z]/', $purchase))
//       {
//         $this->session->set_userdata('purchase_exist',1);
//         echo true;
//       }
//       else
//       {
//         echo false;
//       }
//     }
//     else
//     {
//       echo false;
//     }
//   }

  function get_areauid($stag)
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $stag=stripslashes($this->uri->segment(3));
      $stag=preg_replace('/[^A-Za-z0-9\-]/', '', $stag);

      if($res=$this->Mdl_purchasertnin->get_areauid($stag))
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

 function get_purchasertnuid($stag)
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $stag=stripslashes($this->uri->segment(3));
      $stag=preg_replace('/[^A-Za-z0-9\-]/', '', $stag);

      if($res=$this->Mdl_purchasertnin->get_purchasertnuid($stag))
      {
        $data=array();
        // print_r($res);
        foreach($res as $row)
        {
          // print_r($row);
          array_push($data, $row['purchasertnuid']);
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

  
  
  public function purchasertnin_reg()
  {
    if(isset($_SESSION['userDetails']))
    {
      if(isset($_SESSION['purchasertnuid_exist'])&&isset($_SESSION['ss_registration'])&&isset($_SESSION['areauid_exist']))
      {

        // print_r($_POST);
        $areauid=$this->input->post('areauid');
         $purchasertnuid=$this->input->post('purchasertnuid');
        $ss_registered=$this->input->post('registered_ss');
        $memid=$_SESSION['userDetails']['regid'];
        $purchasertn= (isset($_SESSION['purchasertn_exist']) ? $this->input->post('purchasertn') : 0);

        $cacr=$this->input->post('cacr');
        $sabha=$this->input->post('sabha');
        $purchasertnitm=$this->input->post('purchasertnitm');
        $quantity=$this->input->post('quantity');
        $price=$this->input->post('price');
        $amount=$this->input->post('amount');


        $data=array(
          'areauid'=>$areauid,
          'purchasertnuid'=>$purchasertnuid,
          'ss_appointer'=>$ss_registered,
          'member_uniqid'=>$memid,
          'sabha'=>$sabha,
         
         
         
          
        );
      
        if($this->Mdl_purchasertnin->purchasertnin_reg($data,$purchasertnitm,$quantity,$price,$amount))
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
      if($this->Mdl_purchasertnin->verify_areauid($areauid))
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

      if($res=$this->Mdl_purchasertnin->get_sabha($sabha))
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

public function verify_purchasertnuid()
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $purchasertnuid=stripslashes($this->uri->segment(3));
      if($this->Mdl_purchasertnin->verify_purchasertnuid($purchasertnuid))
      {
        if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $purchasertnuid))
        {
          $this->session->set_userdata('purchasertnuid_exist',1);
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
  
   function get_purchasertn($purchasertn)
  {
    if(isset($_SESSION['userDetails'])&&$this->uri->segment(3)==true)
    {
      $stag=stripslashes($this->uri->segment(3));
      $stag=preg_replace('/[^A-Za-z0-9\-]/', '', $purchasertn);

      if($res=$this->Mdl_purchasertnin->get_purchasertn($purchasertn))
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
