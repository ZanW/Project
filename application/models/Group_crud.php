<?php
if ( ! defined ( 'BASEPATH' ) )
    exit ( 'No direct script access allowed' ) ;

class Group_crud extends CI_Model
{

    public function __construct()
    {
        $this->load->database () ;
    }

    function add()
    {
        $data = array('group_name'=>$this->input->post('gn'), 'POWON_id'=>$_SESSION['ID']) ;
        $this->db->insert ( 'group', $data ) ;
    }

    /**
     * return groups that logger in user is the owner of
     */
    function view()
    {
        $rows = $this->db->get_where ( 'group', array('POWON_id'=>$_SESSION['ID']) );
        if ( $rows->num_rows () > 0 )
        {
            foreach ( $rows->result () as $data )
            {
                $row_array[] = $data ;
            }
            return $row_array ;
        }
    }
    
    /**
     * return groups that logged in user is the owner as well as member of the groups
     */
    function viewAllGroupsOfMember()
    {
        $this->db->select ( '*' ) ;
        $this->db->from ( 'gm_memberof AS gm' ) ;
        $this->db->where ( array('gm.m_id'=>$_SESSION['ID']) ) ;
        $this->db->join ( 'group as g', 'g.group_id=gm.g_id', 'inner' ) ;
        $querie = $this->db->get () ;
        return $querie->result_array () ;
    }

    //TODO add try catch clause
    function edit($id)
    {
        $result = $this->db->get_where ( 'group', array('POWON_id'=>$id) )
            ->row () ;
        return $result ;
    }
    //TODO add try catch clause
    function delete($gid)
    {
        $this->db->delete ( 'group', array('group_id'=>$gid) ) ;
        return ;
    }
    //TODO add try catch clause
    function update($gid)
    {
/*      $gid = 4 ;
        $gn = 'skiing' ;
        $mid = 3 ; */
        $data= array('group_name'=>$this->input->post('gn'));
        //$data = array('group_id'=>$gid, 'group_name'=>$gn, 'POWON_id'=>$mid) ;
        $this->db->where ( 'group_id', $gid) ;
        $this->db->update ( 'group', $data ) ;
    }
}