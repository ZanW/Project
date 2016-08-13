<?php

class Login_model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();

        $this->load->database();

    }

    /**
     * TODO Jaya change firstname to email?
     */
    public function Login_query()
    {

        if (isset($_POST['name']) && isset($_POST['password'])) {
            $USERNAME = $_POST['name'];
            $PASSWORD = $_POST['password'];

            $query = "SELECT * FROM members WHERE  FirstName='" . $USERNAME . "' AND Password='" . $PASSWORD . "'AND status = 0";
            $result = $this->db->query($query);
            $row_cnt = $result->num_rows();

            if ($row_cnt <= 0) {

                return false;
            } else {
                return $result;
            }
//
        }
    }
    
    /**
     * TODO this function needs to refactored
     */
    public function user_info_query()
    {
        $query = "SELECT * FROM members WHERE  FirstName='" . $_SESSION['FirstName'] . "' AND Password='" . $_SESSION['Password'] . "'AND status = 0";
        $result = $this->db->query($query);
        return $result;
    }


    /* public function session()
     {
         if (isset($_POST['name'])) {
             $USERNAME = $_POST['name'];


             $this->session->set_userdata(array(
                 $_SESSION['USER_NAME'] = $USERNAME));

             $sql = ("SELECT * FROM persons WHERE  FirstName='" . $USERNAME . "'");
             $result = $this->db->query($sql);


             return $result;
         }
     }*/


    public function register_query()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $FIRSTNAME = ($_POST["namefirst"]);
            $LASTNAME = $_POST['namelast'];
            $PASSWORD = $_POST['reg_password'];
            $EMAIL = $_POST['email'];
            $BDAY = $_POST['bday'];
            $STREET = $_POST['street'];
            $APT = $_POST['aptno'];
            $CITY = $_POST['city'];
            $POSTAL = $_POST['code'];
            $COUNTRY = $_POST['country'];
            $GENDER = $_POST['gender'];


            if (($_POST['email'])) {
                $queryemail = "SELECT `Email` FROM members WHERE Email='" . $EMAIL . "'";
                $result = $this->db->query($queryemail);
                $row_cnt = $result->num_rows();

                if ($row_cnt > 1) {
                    $errors["email"] = "Email not available.";
                } else {

                    $query = ("INSERT INTO `members` ( `LastName`, `FirstName`, 
`Apt_no`, `Street`, `City`, `Postal_Code`, `Country`, `Gender`,`Email`, `Password`,`Register_date`) 
VALUES ('" . $LASTNAME . "', '" . $FIRSTNAME . "','" . $APT . "', '" . $STREET . "','" . $CITY . "', '" . $POSTAL . "', '" . $COUNTRY . "', '" . $GENDER . "', '" . $EMAIL . "', '" . $PASSWORD . "',NOW())");

                    $result = $this->db->query($query);
                    $memberID = $this->db->insert_id();

                    /*
                     * Execute this when creating user the first time.
                     */
                    $chatJson = array();
                    $chatMessageSerialized = serialize($chatJson);
                    $queryChat = "INSERT INTO `chat` (`to_user_id`, `groups_id`, `message`) VALUES ('" . $memberID . "', '1', '$chatMessageSerialized')";
                    $this->db->query($queryChat);

                    return $result;
                }

            }


        }

    }


}