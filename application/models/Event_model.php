<?php

class Event_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();

    }


    public function group()
    {
        $ID = $_SESSION['ID'];
        $sql = ("SELECT group_id,group_name FROM gm_memberof AS gm,`group` AS g WHERE m_id=$ID AND g.group_id=gm.g_id ");

        $querie = $this->db->query($sql);
        $result = $querie->result_array();
        return $result;

    }

    public function add_event($event_d_one, $event_d_two, $event, $group)
    {
        $ID = $_SESSION['ID'];

        $query = ("INSERT INTO `ioc55311`.`event` 
                 (`event_name`, `created_by_memid`, `group_id`,`date_option_one`,`date_option_two`,`group_name`)
                  VALUES ( '" . $event . "', '" . $ID . "', 
                 (select group_id from  ioc55311.`group` where group_name ='" . $group . "'),'" . $event_d_one . "','" . $event_d_two . "','" . $group . "'); ");

        $result = $this->db->query($query);
        return $result;

    }
}