<?php
class Firm_manage extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Mdl_firm_manage');
  }

   public function index()
  {
    if(isset($_SESSION['userDetails']))
    {
      $area=$this->Mdl_firm_manage->area();
      $data["area"]=$area;

      $this->load->view('user/header');
      $this->load->view('user/firm_manage_view',$data);
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

  public function area_verify()
  {
    if(isset($_SESSION['userDetails']))
    {
        if($this->uri->segment(3)==true)
        {

            $area=$this->uri->segment(3);
            if(ctype_digit($area))
            {
                $this->session->set_userdata('area_exist',1);
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

  public function unicode_verify($unicode){
    if(ctype_alnum($unicode))
    {
       $result=$this->Mdl_firm_manage->unicode($unicode);
       if($result)
       {
        $experience=$this->Mdl_firm_manage->getexp($unicode);
        $response=array("status"=>1,"response"=>$experience);
        echo json_encode($response);
       }
       else
       {
        $response=array("status"=>0,"response"=>"Invalid firmID");
        echo json_encode($response);
       }
    }
    else {
      echo false;
    }


  }

  public function firm_manage_ins(){
   // print_r($_POST);
    $reason=$this->input->post("reason");
    $expid=$this->input->post("expid");


   $reason_details=$this->Mdl_firm_manage->reason($expid,$reason);
    if($reason_details)
    {
     echo "<center><h2>Successfully Added  Details!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
    }
    else
    {
     echo "<center><h2>An Error Occured!</h2><br><a href='javascript:history.go(-1)'>Go back</a></center>";
    }
    }
  










}
?>