<?php
class Member_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_member()
	{
		$query = $this->db->get('member');
		return $query->result_array();
	}

	public function set_member()
	{
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email') );

		return $this->db->insert('member', $data);
	}

}