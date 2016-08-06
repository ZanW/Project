<?php

class Info_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('upload');
        //$this->load->library('session');
    }

    public function get_public_info()
    {
        $this->db->order_by("dop", "desc");
        $query = $this->db->get('public_info');
        return $query->result_array();
    }

    public function get_public_info_n($limit)
    {
        $this->db->order_by("dop", "desc");
        $query = $this->db->get('public_info', $limit);
        return $query->result_array();
    }

    public function create_info()
    {

        $config['upload_path'] = './images/'; //Use relative or absolute path
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->upload->initialize($config);

        //Upload file
        if( ! $this->upload->do_upload("file")){

            //echo the errors
            echo $this->upload->display_errors();
        }

        $file = $this->upload->file_name;

        $data = array(
            'post_message' => $this->input->post('post_message'),
            'post_media' =>  $file,
            'mid' => $this->input->post('mid') );

        return $this->db->insert('public_info', $data);

    }

    public function get_info_by_id($id = 0)
    {
        $query = $this->db->get_where('public_info', array('id' => $id));
        return $query->result_array();
    }

    public function delete_info()
    {
        $data = array( 'id' => $this->input->post('id') );
        return $this->db->delete('public_info', $data);
    }
    
}