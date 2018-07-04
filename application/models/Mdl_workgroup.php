<?php
class Mdl_workgroup extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function workgrp_ins($data)
  {
      $res=$this->db->query("select *from workgroup where user_uniqid='".$data['user_uniqid']."'");
      if($row=$res->result_array())
      {
         if($this->db->query("update workgroup set name_work='".$data['name_work']."',ucode_work='".$data['ucode_work']."',name_workgrp='".$data['name_workgrp']."',ucode_workgrp='".$data['ucode_workgrp']."' where user_uniqid='".$data['user_uniqid']."'"))
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
         if($this->db->insert('workgroup',$data))
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