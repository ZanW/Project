<?php

/**
 * Created by PhpStorm.
 * User: layheng
 * Date: 7/10/2016
 * Time: 4:25 PM
 */
class Content_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public  function get_contents()
    {
       $querie = $this->db->get('content');
        return $querie->result_array();
    }
}