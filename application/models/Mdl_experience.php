<?php
class Mdl_experience extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function experience($data)
	{
		      $res=$this->db->query("select *from experience where user_uniqid='".$data['user_uniqid']."'");
      if($row=$res->result_array())
      {
         if($this->db->query("update experience set wpost='".$data['wpost']."',wtype='".$data['wtype']."',wtime='".$data['wtime']."',wsdate='".$data['wsdate']."',org='".$data['org']."',stlwork='".$data['stlwork']."',wrdate='".$data['wrdate']."' where user_uniqid='".$data['user_uniqid']."'"))
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
         if($this->db->insert('experience',$data))
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