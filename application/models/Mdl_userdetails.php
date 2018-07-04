<?php
class Mdl_userdetails extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	

	public function getdata($userid)
	{

	$data=array();

	$this->db->select('userpic');
	$this->db->where('member_uniqid',$userid);
	$query=$this->db->get('photos');
	$data['photos']=$query->row_array();

	$this->db->select('firstname,lastname,mobile,address,email');
	$this->db->where('user_uniqid',$userid);
	$query=$this->db->get('users');
	$data['users']=$query->row_array();
    
    $this->db->select('aadhar,passport,ration,license,voter');
    $this->db->where('user_uniqid',$userid);
    $query=$this->db->get('idcard');
    $data['idcard']=$query->row_array();

    $this->db->select('fpuid,spuid,venue,witness1,witness2,authorityid,ltcopy,stltogether,ltrcopy,rcuid');
    $this->db->where('user_uniqid',$userid);
    $query=$this->db->get('marriage');
    $data['marriage']=$query->row_array();
    
    $this->db->select('code,mobile,date');
    $this->db->where('user_uniqid',$userid);
    $query=$this->db->get('mobile');
    $data['mobile']=$query->row_array();
    
    $this->db->select('qualification,startp,institution,cissued,stlstuding');
    $this->db->where('user_uniqid',$userid);
    $query=$this->db->get('qualification');
    $data['qualification']=$query->row_array();

    $this->db->select('wpost,wtype,wtime,wsdate,org,stlwork,wrdate,');
    $this->db->where('user_uniqid',$userid);
    $query=$this->db->get('experience');
    $data['experience']=$query->row_array();

    $this->db->select('date,time,place,reason,burial');
    $this->db->where('user_uniqid',$userid);
    $query=$this->db->get('death');
    $data['death']=$query->row_array();


 	 return $data;
}  

}
?>