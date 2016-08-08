<?php

class Comment_model extends CI_Model
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
    
    public function readCommentsByContentID()
    {
        $this->db->select ( '*' ) ;
        $this->db->from ( 'content AS con' ) ;
        $this->db->where ( array('con.gid'=>$_SESSION['gid']) ) ;
        $this->db->join ( 'comment AS com', 'con.id=com.content_id', 'inner' ) ;
        $querie = $this->db->get () ;
        return $querie->result_array () ;
    }
    
    public function addComment()
    {
        $data = array(
                'first_name'=>$this->input->post ( 'name' ),
                'content_id'=>$this->input->post ( 'content_id' ),
                'com_message'=>$this->input->post ( 'com_message' )
              ) ;
        
        return $this->db->insert ( 'comment', $data ) ;

    }
}
