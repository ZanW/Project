<?php

class Info_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        //$this->load->library('session');
    }

    public  function get_public_info()
    {
        $this->db->order_by("dop", "desc");
        $query = $this->db->get('public_info', 10);
        return $query->result_array();
    }

}