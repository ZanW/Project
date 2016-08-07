<?php

class chat_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();

    }

    public function get_Messages($userID, $groupID)
    {
        /*
         * Retrieves previous messages of chat receiver
         */
        $query = 'SELECT `message` FROM `chat` WHERE `to_user_id` = ' . $userID;

        $result = $this->db->query($query);
        $row = $result->result_array();
        $chatDeserialized = unserialize($row[0]['message']);

        /*
         * Removes chat data from message field in database
         */
        $chatJson = array();
        $chatMessageSerialized = serialize($chatJson);
        $query = "UPDATE `chat` SET `message`= '$chatMessageSerialized' WHERE `to_user_id`= $userID";
        $this->db->query($query);

        /*
         * Loop through received messages to get user id, message and group id
         * Create array to be later returned as json
         */
        $response = array();
        foreach ($chatDeserialized as $item => $value) {
            if ($value['item']['group_id'] == $groupID) {
                $tempArray['item'] = array('user_id' => $value['item']['user_id'],
                    'message' => $value['item']['message'], 'group_id' => $value['item']['group_id']);
                array_push($response, $tempArray);
            }
        }

        return $response;
    }

    public function session()
    {
        if (isset($_POST['name'])) {

            $userId = (int)$_SESSION['ID'];
            // Escape the message string
            $msg = htmlentities($_POST['msg'], ENT_NOQUOTES);
            $result = $this->addMessage($userId, $msg);
            return $result;
        }
    }

    public function addMessage($chatMessage, $userID, $memberID, $groupID)
    {
        foreach ($memberID as $member) {
            /*
             * Retrieves previous messages of chat receiver
             */
            $query = 'SELECT `message` FROM `chat` WHERE `to_user_id` = ' . $member;
            $result = $this->db->query($query);
            $row = $result->result_array();
            $chatDeserialized = unserialize($row[0]['message']);

            /*
             * Pushes new chat message to existing message array
             */
            $newChatDeserialized['item'] = array('user_id' => $userID, 'message' => $chatMessage,
                'group_id' => $groupID);
            array_push($chatDeserialized, $newChatDeserialized);
            $chatSerialized = serialize($chatDeserialized);

            /*
             * Updates message field of receiver
             */
            $query = "UPDATE `chat` SET `message`='" . $chatSerialized . "' WHERE `to_user_id`=" . $member;
            $this->db->query($query);
        }

        $data = array('message' => 'success');

        return $data;
    }


    public function group()
    {

        $resultArray = array();
        $userName = $_SESSION['FirstName'];
        $sql = ("SELECT DISTINCT group_id,`name` FROM `group`, members where Firstname='$userName' ;");
        $result = $this->db->query($sql);

        foreach ($result->result() as $row) {
            $resultArray[$row->group_id] = $row->name;
        }
        $row_cnt = $result->num_rows();
        if ($row_cnt <= 0) {

            return false;
        } else {
            return $resultArray;
        }
//            return $result;
    }

    public
    function member()
    {
        $resultArray = array();

        $sql = (" SELECT `ID`,`FirstName` FROM members JOIN `gmlist` ON `gmlist`.`mid` = `members`.`ID` ");
        $result = $this->db->query($sql);

        foreach ($result->result() as $row) {
            $resultArray[$row->ID] = $row->FirstName;
        }
        $row_cnt = $result->num_rows();
        if ($row_cnt <= 0) {

            return false;
        } else {
            return $resultArray;
        }
//            return $result;
    }


}