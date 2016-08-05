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

    public function get_inbox($email_dress = "")
    {
        $query = $this->db->get_where('email', array('receiver_email' => $email_dress));
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
    
    public function update_email()
    {
        $data = array(
            'sender_email' => $this->input->post('sender_email'),
            'receiver_email' => $this->input->post('receiver_email'),
            'dts' => $this->input->post('dts'),
            'subject' => $this->input->post('subject'),
            'email_content' => $this->input->post('email_content'),
            'unread' => $this->input->post('unread')  );

        $this->db->where('id', $this->input->post('id'));

        return $this->db->update('email', $data);
    }

    public function create_email()
    {
        $now = date("Y-m-d H:i:s");

        $data = array(
            'sender_email' => $this->input->post('sender_email'),
            'receiver_email' => $this->input->post('receiver_email'),
            'dts' => $now,
            'subject' => $this->input->post('subject'),
            'email_content' => $this->input->post('email_content'));

        return $this->db->insert('email', $data);
    }

}