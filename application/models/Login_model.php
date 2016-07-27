<?php

class Login_model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();

        $this->load->database () ;

    }

    /**
     * TODO Jaya change firstname to email?
     */
    public function Login_query()
    {
       
        if (isset($_POST['name']) && isset($_POST['password'])) {
            $USERNAME = $_POST['name'];
            $PASSWORD = $_POST['password'];

            $query = "SELECT * FROM persons WHERE  FirstName='" . $USERNAME . "' AND Password='" . $PASSWORD . "'";
            $result = $this->db->query($query);
            $row_cnt = $result->num_rows();

            if ($row_cnt <= 0) {
               
                return false;
            } else {
                $this->session();
                return $result;
            }
//            return $result;
        }
    }

    public
    function session()
    {
      
        $USERNAME = $_POST['name'];

        $this->session->set_userdata(array(
            $_SESSION['USER_NAME'] = $USERNAME));

        $sql = ("SELECT id FROM warmup_project.persons WHERE  FirstName='" . $USERNAME . "'");
        $result = $this->db->query($sql);


        return $result;

    }


    public
    function register_query()
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

            $query = ("INSERT INTO `pog_db`.`persons` ( `LastName`, `FirstName`, 
`Apt_no`, `Street`, `City`, `Postal_Code`, `Country`, `Gender`,`Email`, `Password`) 
VALUES ('" . $LASTNAME . "', '" . $FIRSTNAME . "','" . $APT . "', '" . $STREET . "','" . $CITY . "', '" . $POSTAL . "', '" . $COUNTRY . "', '" . $GENDER . "', '" . $EMAIL . "', '" . $PASSWORD . "')");

            $result = $this->db->query($query);

            return $result;
        }

    }

}