<?php

class profile_update_model extends CI_Model
{
    public function __construct()
    {

        parent::__construct();

        $this->load->database();

    }

    public function after_update()
    {

        $userName = $_SESSION['ID'];

        $sql = ("SELECT * FROM members WHERE  ID='" . $userName . "'");
        $result = $this->db->query($sql);
        $row_cnt = $result->num_rows();

        if ($row_cnt <= 0) {

            return false;
        } else {
            return $result;
        }
//           
    }


//    public function session()
//    {
//        if (isset($_POST['name'])) {
//            $USERNAME = $_POST['name'];
//
//
//            $this->session->set_userdata(array(
//                $_SESSION['USER_NAME'] = $USERNAME));
//
//            $sql = ("SELECT * FROM members WHERE  FirstName='" . $USERNAME . "'");
//            $result = $this->db->query($sql);
//
//
//            return $result;
//        }
//    }


    public function get_profile()
    {
        $ID = $_SESSION['ID'];

        $sql = ("SELECT * FROM members WHERE  `ID`='" . $ID . "'");
        $result = $this->db->query($sql);

        return $result;

    }

    public function account_status()
    {
        $ID = $_SESSION['ID'];

        $sql = ("UPDATE `members` SET `status`='1'  WHERE  `ID`='" . $ID . "'");
        $result = $this->db->query($sql);

        return $result;

    }



    public function update_query()
    {

        $ID = $_SESSION['ID'];
        
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

            $query = "UPDATE `members` SET `LastName`='" . $LASTNAME . "', `FirstName`='" . $FIRSTNAME . "',
                `Apt_no`='" . $APT . "', `Street`='" . $STREET . "', `City`='" . $CITY . "', `Postal_Code`='" . $POSTAL . "',`Country`='" . $COUNTRY . "', `Gender`='" . $GENDER . "',`Email`='" . $EMAIL . "', `Password`='" . $PASSWORD . "' 
                Where `ID`=$ID " ;
            $result = $this->db->query($query);

            return $result;

        }
    }


}