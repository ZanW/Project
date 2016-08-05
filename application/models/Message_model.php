<?php
class Message_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    // Get all message and return in an array
    public function get_message()
    {
        $query = $this->db->get('message');
        return $query->result_array();
    }

    /*
    public function get_inbox($mid = "")
    {
        $query = $this->db->get_where('message', array('receiver_id' => $mid));
        return $query->result_array();
    }

    // Get an message by id and return it in an array
    public function get_message_by_id($id = 0)
    {
        $query = $this->db->get_where('message', array('id' => $id));
        return $query->result_array();
    }

    public function delete_message()
    {
        $data = array( 'id' => $this->input->post('id') );

        return $this->db->delete('message', $data);
    }
    
    public function update_message()
    {
        $data = array(
            'sender_id' => $this->input->post('sender_id'),
            'receiver_id' => $this->input->post('receiver_id'),
            'dts' => $this->input->post('dts'),
            'message_content' => $this->input->post('message_content'),
            'unread' => $this->input->post('unread')  );

        $this->db->where('id', $this->input->post('id'));

        return $this->db->update('message', $data);
    }

    public function create_message()
    {
        $now = date("Y-m-d H:i:s");

        $data = array(
            'sender_id' => $this->input->post('sender_id'),
            'receiver_id' => $this->input->post('receiver_id'),
            'message_content' => $this->input->post('message_content'));

        return $this->db->insert('message', $data);
    }
    */

}