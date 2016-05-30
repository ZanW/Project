<?php
class Member_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_member()
	{
		$query = $this->db->get("member");
		return $query->result_array();
	}

}