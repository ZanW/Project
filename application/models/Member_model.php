<?php
class Member_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_member()
	{
		$query = $this->db->get('members');
		return $query->result_array();
	}

	public function get_member_by_id($id = 0)
	{
		$query = $this->db->get_where('members', array('ID' => $id));
		return $query->result_array();
	}

	public function get_email_address($mid = 0)
	{
		$query = $this->db->get_where('members', array('ID' => $mid));
		return $query->result_array();
	}

	public function set_member()
	{
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email') );

		return $this->db->insert('members', $data);
	}

	public function update_member()
	{
		$data = array(
			'status' => $this->input->post('status') );

		$this->db->where('id', $this->input->post('id'));
		
		return $this->db->update('members', $data);
	}

	public function delete_member()
	{
		$data = array( 'id' => $this->input->post('id') );

		return $this->db->delete('members', $data);
	}

}