<?php
class Email_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    // Get all email message and return in an array
    public function get_email()
    {
        $query = $this->db->get('email');
        return $query->result_array();
    }

    // Get an email by id and return it in an array
    public function get_email_by_id($id = 0)
    {
        $query = $this->db->get_where('email', array('id' => $id));
        return $query->result_array();
    }

    public function delete_email()
    {
        $data = array( 'id' => $this->input->post('id') );

        return $this->db->delete('email', $data);
    }
}