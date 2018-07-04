<?php
class Mdl_education extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function education($data)
	{
				      $res=$this->db->query("select *from qualification where user_uniqid='".$data['user_uniqid']."'");
      if($row=$res->result_array())
      {
         if($this->db->query("update qualification set qualification='".$data['qualification']."',startp='".$data['startp']."',institution='".$data['institution']."',cissued='".$data['cissued']."',stlstuding='".$data['stlstuding']."' where user_uniqid='".$data['user_uniqid']."'"))
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
         if($this->db->insert('qualification',$data))
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