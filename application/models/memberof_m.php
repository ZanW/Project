<?php
class memberof_m extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

//invoking by homepage
	public function get_memberoflist()
	{		
		
		$query = $this->db->get("gm_member_of");	
		
		return $query->result_array();

	}
	

	public function get_group_by_id($id = 0)
    {
    	$query = $this->db->get_where('group', array('group_id' => $id));
        return $query->result_array();
    }

//used by clicking group ID
    public function get_groupdetail_by_id($id = 0)
    {
    	$query = $this->db->get_where('gm_memberof', array('g_id' => $id));
		return $query->result_array();
    }

//gmid for specific group member to delete
     public function get_memberof_by_gmid($gid = 0, $mid = 0)
    {
    	//$query = $this->db->get_where('memberof', array('g_id' => $gid, 'm_id' => $mid));
    	$query = $this->db->get_where('gm_memberof', array('g_id' => $gid, 'm_id' => $mid));
		return $query->result_array();
    }


    public function get_memberof_by_id($id = 0)
    {
        $query = $this->db->get_where('gm_memberof', array('g_id' => $id));
        return $query->result_array();
    }

  
	public function get_member_by_id($id = 0)
	{
		$query = $this->db->get_where('member', array('id' => $id));
		return $query->result_array();
	}

		public function get_memberid_list($id = 0)
	{
		//$this->db->select('ID');
		//$query = $this->db->get('member_jaya');
		$query = $this->db->query('SELECT ID FROM members');
		return $query->result_array();
	}

	 public function create_memberof($id = 0)
    {
        $data = array(
            'g_id' => $this->input->post('group_id'),
            //'group_name' => $this->input->post('group_name'),
            'm_id' => $this->input->post('selete_mid'),
        	//'FirstName' => $this->input->post('FirstName'));
            );
        return $this->db->insert('gm_memberof', $data);
    }

	public function delete_memberof($gid = 0, $mid = 0)
	{
		//$data = array( 'g_id' => $gid, 'm_id' => $mid);
		$data = array( 'g_id' => $this->input->post('gid'), 'm_id' => $this->input->post('mid') );
		return $this->db->delete('gm_memberof', $data);
		
	}


}