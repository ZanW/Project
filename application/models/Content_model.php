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
        $this->load->database () ;
        $this->load->library ( 'session' ) ;
    }

    /**
     * get the content of a specific member session, add member name
     */
    public function get_contents_by_group_id($gid = 0)
    {
        $this->db->select ( '*' ) ;
        $this->db->from ( 'content AS c' ) ;
        $this->db->where ( array('c.gid'=>$gid['gid']) ) ;
        $this->db->join ( 'members AS m', 'c.POWON_id=m.ID', 'inner' ) ;
        $this->db->join ( 'group AS g', 'c.$gid=g.group_id', 'inner' ) ;
        // $querie = $this->db->get_where('content',array('gid'=>$gid['gid']));
        $querie = $this->db->get () ;
        return $querie->result_array () ;
    }

    public function get_contents()
    {
        $querie = $this->db->get ( 'content' ) ;
        return $querie->result_array () ;
    }

    public function get_content_by_id($id = 0)
    {
        $query = $this->db->get_where ( 'content', array('id'=>$id) ) ;
        return $query->result_array () ;
    }

    public function set_content()
    {
        // $data['post_message'] = $this->input->post('post_message');
        // $data['auto_delete'] = $this->input->post('auto_delete');
        // $data['gid'] = $this->input->post('gid');
        // echo $this->input->post('userfile');
        
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
            // $this->load->view('upload_success', $file_details);
        
        }
             
        if ( $upload_data['file_name'] == null | $upload_data['file_name']==""  )
        {
            $file_path = "null" ;
        }
        else
            $file_path = $upload_data['file_name'] ;
        
        $data = array(
                'post_message'=>$this->input->post ( 'post_message' ), 
                'auto_delete'=>$this->input->post ( 'auto_delete' ), 
                'gid'=>$this->input->post ( 'gid' ), 
                'POWON_id'=>$_SESSION['ID'], 
               // 'comment_id'=>1,
                'file_path'=>$upload_data['file_name']) ;
        
        return $this->db->insert ( 'content', $data ) ;
    }

    public function update_content()
    {
        $data = array('post_message'=>$this->input->post ( 'post_message' )) ;
        
        $this->db->where ( 'id', $this->input->post ( 'id' ) ) ;
        
        return $this->db->update ( 'content', $data ) ;
    }

    public function delete_content($cid)
    {
        // $this->db->delete ( 'group', array('group_id'=>$cid) ) ;
        // $data = array( 'id' => $this->input->post('id') );
        
        return $this->db->delete ( 'content', array('id'=>$cid) ) ;
    }
}