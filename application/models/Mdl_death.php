<?php
class Mdl_death extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

 public function insert_death($data)
  {
      $res=$this->db->query("select *from death where user_uniqid='".$data['user_uniqid']."'");
      if($row=$res->result_array())
      {
         if($this->db->query("update death set date='".$data['date']."',time='".$data['time']."',place='".$data['place']."',reason='".$data['reason']."',burial='".$data['burial']."' where user_uniqid='".$data['user_uniqid']."'"))
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
         if($this->db->insert('death',$data))
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