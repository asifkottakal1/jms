<?php
class Mdl_eyeprint extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function eyeprint_reg($data)
	{
		if($this->db->insert('eyeprint',$data))
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