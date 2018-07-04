<?php
class Mdl_idcard extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert_idcard($data)
  {
      $res=$this->db->query("select *from idcard where user_uniqid='".$data['user_uniqid']."'");
      if($row=$res->result_array())
      {
         if($this->db->query("update idcard set aadhar=".$data['aadhar'].",voter='".$data['voter']."',ration='".$data['ration']."',passport='".$data['passport']."',license='".$data['license']."' where user_uniqid='".$data['user_uniqid']."'"))
         {
            return true;
         }
         else
         {
            return false;
         }
      }
      else
      {
         if($this->db->insert('idcard',$data))
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