<?php
class Mdl_freelance extends CI_Model
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
		
		$this->db->select("free.freelance_id,exp.expid,exp.wpost");
		$this->db->from("experience exp");
		$this->db->join("freelance free", "free.user_uniqid = exp.user_uniqid");
		
		//$this->db->where("user_uniqid",$org);
		$query=$this->db->get();
		return $query->result();
	}

	public function mui($mui){
		$this->db->select("*");
		$this->db->from("freelance");
		$this->db->where("user_uniqid",$mui);
		$query=$this->db->get();
		return $query->result();

	}

	public function insert(){
		$data=array(
			'expid'=>$this->input->post("ucode"),
    		'wpost'=>$this->input->post("work")
		);

		//print_r($data);
		$this->db->insert("freelance", $data);

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