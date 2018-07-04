<?php
class Mdl_social extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function mobile_reg($data)
  {
    $res=$this->db->query("select *from mobile where user_uniqid='".$data['user_uniqid']."' and mobile=".$data['mobile']." and code='".$data['code']."'");
      if($row=$res->result_array())
      {
         return false;
      }
      else
      {
         if($this->db->insert('mobile',$data))
         {
            return true;
         }
         else
         {
            return false;
         }
      }
  }

}
?>