<?php
class Mdl_payment extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_payment($uniqid)
	{
		$data=array('user_uniqid'=>$uniqid);
		$row=$this->db->get_where('payments',$data);
		if($res=$row->result_array())
		{
			return $res;
		}
		else
		{
			return false;
		}
	}

	public function get_userinfo($uniqid)
	{
		$row=$this->db->query("select email,Firstname,Lastname,address,paystatus,mobile from users where user_uniqid='$uniqid'");
		if($res=$row->result_array())
		{
			return $res;
		}
		else
		{
			return false;
		}
	}

	public function add_payment($data)
	{
		if($this->db->insert('payments',$data))
		{
			$this->db->query("update users set paystatus=1 where user_uniqid='".$data['user_uniqid']."'");
			return true;
		}
		else
		{
			return false;
		}
	}

}