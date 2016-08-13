<?php

class Info_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
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
        $config = array(
            'upload_path'=>"./uploads/",
            'allowed_types'=>"|gif|jpg|png|jpeg|pdf",
            'overwrite'=>TRUE,
            'max_size'=>"20480000",  // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height'=>"768",
            'max_width'=>"1024") ;

        $this->load->library ( 'upload', $config ) ;
        if ( $this->upload->do_upload () )
        {
            $upload_data = $this->upload->data () ;
        }

        if ( $upload_data['file_name'] == null | $upload_data['file_name']==""  )
        {
            $file_path = "null" ;
        }
        else
        {
            $file_path = $upload_data['file_name'];
        }

        $data = array(
            'post_message'=>$this->input->post ( 'post_message' ),
            'file_path'=>$upload_data['file_name'],
            'mid'=>$this->input->post ( 'mid' ) );

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

    public function update_info()
    {
        $config = array(
            'upload_path'=>"./uploads/",
            'allowed_types'=>"|gif|jpg|png|jpeg|pdf",
            'overwrite'=>TRUE,
            'max_size'=>"20480000",  // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height'=>"768",
            'max_width'=>"1024") ;

        $this->load->library ( 'upload', $config ) ;
        if ( $this->upload->do_upload () )
        {
            $upload_data = $this->upload->data () ;
        }

        if ( $upload_data['file_name'] == null | $upload_data['file_name']==""  )
        {
            $file_path = "null" ;
        }
        else
        {
            $file_path = $upload_data['file_name'];
        }

        $data = array(
            'post_message'=>$this->input->post ( 'post_message' ),
            'file_path'=>$upload_data['file_name'],
            'mid'=>$this->input->post ( 'mid' ) );

        $this->db->where('id', $this->input->post('id'));

        return $this->db->update('public_info', $data);
    }
    
}