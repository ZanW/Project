<?php
class memberof_m extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_memberoflist()
	{
		//$sql = "SELECT g_id,g_name,owner_id,owner_firstname FROM  yipeng.group, yipeng.member WHERE owner_id = id";
        
		//$query1 = mysql_query($sql);
		
		$query = $this->db->get("gmlist_view");
		/*
        if($query2 && mysql_fetch_array($query2)){
            while($row = mysql_fetch_assoc($query2)) {
                $row_data[] = $row;
             }
	     } else {
          $row_data = array();
             }
		*/
		//$query = $this->db->get("gmlist");
		
		return $query->result_array();
	}

}