<?php

class chat_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();

    }

    public function get_Messages($timestamp)
    {
        $query = <<<QUERY
          SELECT 
          message,ID,MID,sent_on
                 FROM members
        JOIN `messages`
          ON `messages`.`to_id` = `members`.`ID`;
 
QUERY;

        // Execute the query
        $resultObj = $this->db->query($query);
        // Get messages from query result
        $chat_messages = array();
        foreach ($resultObj->result_array() as $value) {
            if ($value['sent_on'] > $timestamp) {
                $chat_messages[$value['MID']] = array(
                    "message" => $value['message'],
//                    "id" => $value['MID'],
                    "timestamp" => $value['sent_on']
                );
//                $message_id = $value['MID'];
//                $chat_messages["$message_id"] = $value['message'];
            }
        }

        return $chat_messages;
    }

    public function session()
    {
        if (isset($_POST['name'])) {

            $userId = (int)$_SESSION['USER_NAME'];
            // Escape the message string
            $msg = htmlentities($_POST['msg'], ENT_NOQUOTES);
            $result = $this->addMessage($userId, $msg);
            return $result;
        }
    }

    public function addMessage($userId, $message, $chatTime)
    {
        $addResult = false;

        $cUserId = (int)$userId;

        // Escape the message with mysqli real escape
//        $cMessage = $this->db->real_escape_string($message);
        $cMessage = $message;

        $query = <<<QUERY
     INSERT INTO `pog_db`.`messages` (`Message`, `to_id`, `from_id`, `sent_on`) 
      VALUES ('$cMessage', 4, $cUserId, $chatTime)
QUERY;

        $result = $this->db->query($query);

        if ($result !== false) {
            // Get the last inserted row id.
//            $addResult = $this->db->insert_id;
            $addResult = true;
        } else {
            echo $this->db->error;
        }

        return $addResult;
    }


    public function group()
    {

        $resultArray = array();
        $userName = $_SESSION['USER_NAME'];
        $sql = ("SELECT DISTINCT group_id,`name` FROM pog_db.group, pog_db.members where Firstname='$userName' ;");
        $result = $this->db->query($sql);

        foreach ($result->result() as $row) {
            $resultArray[$row->group_id] = $row->name;
        }
        $row_cnt = $result->num_rows();
        if ($row_cnt <= 0) {

            return false;
        } else {
            $this->session();
            return $resultArray;
        }
//            return $result;
    }

    public
    function member()
    {
        $resultArray = array();
        $userName = $_SESSION['USER_NAME'];
        $sql = ("   SELECT `ID`,`FirstName` FROM members JOIN `gmlist` ON `gmlist`.`gid` = `members`.`ID`");
        $result = $this->db->query($sql);

        foreach ($result->result() as $row) {
            $resultArray[$row->ID] = $row->FirstName;
        }
        $row_cnt = $result->num_rows();
        if ($row_cnt <= 0) {

            return false;
        } else {
            $this->session();
            return $resultArray;
        }
//            return $result;
    }


}