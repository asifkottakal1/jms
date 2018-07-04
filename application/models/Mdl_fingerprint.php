<?php
class Mdl_fingerprint extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function fingerprint_reg($data)
	{
		if($this->db->insert('fingerprint',$data))
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