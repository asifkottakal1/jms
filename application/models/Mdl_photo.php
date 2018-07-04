<?php
class Mdl_photo extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function photo_reg($data)
	{
		$data1=array('member_uniqid'=>$data['member_uniqid']);
		$res=$this->db->get_where('photos',$data1);
		if($res->result_array($res))
		{
			if($this->db->query("update photos set userpic='".$data['userpic']."',ss_appointer='".$data['ss_appointer']."',deo_appointer='".$data['deo_appointer']."' where member_uniqid='".$data['member_uniqid']."'"))
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
			if($this->db->insert('photos',$data))
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