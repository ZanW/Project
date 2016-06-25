<?php
class Nonmember_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_nonmember()
    {
        $query = $this->db->get('non_member');
        return $query->result_array();
    }

    public function set_nonmember()
    {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email') );

        return $this->db->insert('non_member', $data);
    }

    public function update_nonmember()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email') );

        return $this->db->replace('non_member', $data);
    }

}