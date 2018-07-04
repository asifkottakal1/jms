<?php
class Mdl_language extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function language_register($data)
	{
		if($this->db->insert('language',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_languages()
	{
		$this->db->where('language_uniqid IS NOT NULL', null, false);
		$res=$this->db->get('language');
		if($row=$res->result_array())
		{
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function knownLanguages_reg($data)
	{
		if($this->db->insert('known_languages',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}