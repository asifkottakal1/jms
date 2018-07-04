<?php
class Mdl_marriage extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

 public function insert_marriage($data)
  {
      $res=$this->db->query("select *from marriage where user_uniqid='".$data['user_uniqid']."'");
      if($row=$res->row_array())
      {
         if($this->db->query("update marriage set fpuid='".$data['fpuid']."',spuid='".$data['spuid']."',venue='".$data['venue']."',cdate='".$data['cdate']."',witness1='".$data['witness1']."',witness2='".$data['witness2']."',authorityid='".$data['authorityid']."',stltogether='".$data['stltogether']."',retairdate='".$data['retairdate']."',rcuid='".$data['rcuid']."' where user_uniqid='".$data['user_uniqid']."'"))
         {
            $mrgid=$row['marid'];
            $mrgid=$this->db->last_query();
            return $mrgid;
         }
         else
         {
            return false;
         }
      }
      else
      {
         if($this->db->insert('marriage',$data))
         {
            return $this->db->insert_id();
         }
         else
         {
            return false;
         }
      }
  }

}
?>