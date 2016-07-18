<?php
class Nonmember_model extends CI_Model
{
    public function __construct()
    {
        //$this->load->database();
        $this->load->database('warmup_project');
    }

    public function get_nonmember()
    {
        $query = $this->db->get('non_member');
        return $query->result_array();
    }

    public function get_nonmember_by_id($id = 0)
    {
        $query = $this->db->get_where('non_member', array('id' => $id));
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
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email') );

        $this->db->where('id', $this->input->post('id'));

        return $this->db->update('non_member', $data);
    }

    public function delete_nonmember()
    {
        $data = array( 'id' => $this->input->post('id') );

        return $this->db->delete('non_member', $data);
    }
    
    /**
     * This method creates a new member from registration page
     * this funciton is applicalbe to database 'warmup_project'
     */
    public function createNewMember($data)
    {
        echo print_r ($data);
        echo "Inserting data into the table";
        return $this->db->insert('persons', $data);
    }

}