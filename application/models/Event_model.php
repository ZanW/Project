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

    public function get_events()
    {
        $query = "SELECT Distinct * FROM ioc55311.`event` Join gm_memberof ON `event`.group_id= gm_memberof.g_id AND created_by_memid=m_id ;";

        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }

    public function vote_date($eventID, $selectedDate, $dateOne, $dateTwo)
    {
        if ($selectedDate == $dateOne) {
            $voteQuery = "SELECT date_one_votes FROM ioc55311.vote_event WHERE event_id='" . $eventID . "';";
            $result = $this->db->query($voteQuery);
            $voteResult = $result->row();
            $voteCount = $voteResult->date_one_votes;
            $voteCount += 1;
            $query = "UPDATE `ioc55311`.`vote_event` SET `date_one_votes`='" . $voteCount . "' WHERE `event_id`='" . $eventID . "';";
            $this->db->query($query);
        } else if ($selectedDate == $dateTwo) {
            $voteQuery = "SELECT date_two_votes FROM ioc55311.vote_event WHERE event_id='" . $eventID . "';";
            $result = $this->db->query($voteQuery);
            $voteResult = $result->row();
            $voteCount = $voteResult->date_two_votes;
            $voteCount += 1;
            $query = "UPDATE `ioc55311`.`vote_event` SET `date_two_votes`='" . $voteCount . "' WHERE `event_id`='" . $eventID . "';";
            $this->db->query($query);
        }
    }

    public function stop_voting($eventID, $dateOne, $dateTwo)
    {
        $voteQuery = "SELECT date_one_votes,date_two_votes FROM ioc55311.vote_event WHERE event_id='" . $eventID . "';";
        $result = $this->db->query($voteQuery);
        $voteResult = $result->row();
        $dateOneVoteCount = $voteResult->date_one_votes;
        $dateTwoVoteCount = $voteResult->date_two_votes;

        if ($dateOneVoteCount > $dateTwoVoteCount) {
            $query = "UPDATE `ioc55311`.`event` SET `date_final`='" . $dateOne . "' WHERE `event_id`='" . $eventID . "';";
            $this->db->query($query);
            return $dateOne;
        } elseif ($dateTwoVoteCount > $dateOneVoteCount) {
            $query = "UPDATE `ioc55311`.`event` SET `date_final`='" . $dateTwo . "' WHERE `event_id`='" . $eventID . "';";
            $this->db->query($query);
            return $dateTwo;
        } elseif ($dateOneVoteCount == $dateTwoVoteCount) {
            $query = "UPDATE `ioc55311`.`event` SET `date_final`='" . $dateOne . "' WHERE `event_id`='" . $eventID . "';";
            $this->db->query($query);
            return $dateOne;
        }
    }
}