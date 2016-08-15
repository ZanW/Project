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
        /*
         *Insert into groupmember of also  
         */
        $group_array = $this->db->get_where ( 'group', array('group_name'=>$this->input->post('gn')) ) ;
        $group_result = $group_array->row_array () ;
        $group_data = array('g_id'=>$group_result['group_id'], 'm_id'=>$_SESSION['ID']) ;
        $this->db->insert ('gm_memberof',$group_data);
    }

    /**
     * return groups that logger in user is the owner of
     */
    function view($mid = 0)
    {
        $rows = $this->db->get_where ( 'group', array('POWON_id'=>$mid) );
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
    function viewAllGroupsOfMember($mid)
    {
        $this->db->select ( '*' ) ;
        $this->db->from ( 'gm_memberof AS gm' ) ;
        $this->db->where ( array('gm.m_id'=>$mid) ) ;
//        $this->db->where ( array('members.status'=>0) ) ;
        $this->db->join ( 'group as g', 'g.group_id=gm.g_id', 'inner' ) ;
        $this->db->join ( 'members as m', 'm.ID=g.POWON_id', 'inner' ) ;
        $querie = $this->db->get () ;
        return $querie->result_array () ;
    }

    /**
     * returns groups that logged in user is onlt the member of the groups and not the owner
     * 
     */
    
    function otherGroupsOfMember($mid)
    {
        $sql = "SELECT * FROM (SELECT * FROM `gm_memberof` AS gm  LEFT JOIN `group` AS g
                                ON gm.m_id = g.POWON_id AND gm.g_id = g.group_id 
                                WHERE  g.group_id IS NULL AND gm.m_id=".$mid.")
                         AS other_group, `group` AS gp, `members` AS m
                         WHERE other_group.g_id = gp.group_id AND m.ID = gp.POWON_id";
        $querie = $this->db->query($sql);
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
    
    function deleteMemberFromGroup($g_id,$m_id)
    {
        $this->db->delete ( 'gm_memberof', array('g_id'=>$g_id, 'm_id'=>$m_id) ) ;
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
