<?php
class Mdl_firm_manage extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
public function area(){
		
		$this->db->select("*");
		$this->db->from("area");
		$query=$this->db->get();
		return $query->result();
	}
	public function getexp($org){
		
		$this->db->select("*");
		$this->db->from("experience");
		$this->db->where("org",$org);
		$query=$this->db->get();
		return $query->result();
	}
	public function unicode($unicode){
		$this->db->select("*");
		$this->db->from("firm_manage");
		$this->db->where("firmcode",$unicode);
		$query=$this->db->get();
		return $query->result();

	}

	public function reason($expid,$reason){
	
		$this->db->set('reason',$reason);
		$this->db->where('expid',$expid);
		$this->db->update('experience');
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}







  
}
?>