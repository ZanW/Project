<?php
class Login_model extends CI_Model {
    public function __construct() {
        $this->load->database ();
    }
    
    /**
     * TODO Jaya change firstname to email?
     */
    public function login_query($data) {
         if (isset($_POST['name']) && isset($_POST['password']))
        {
            $USERNAME = $data ['FirstName'];
            $PASSWORD = $data ['Password'];
            
            $sql_query = "SELECT * FROM warmup_project.persons WHERE  FirstName='" . $USERNAME . "' AND Password='" . $PASSWORD . "'";
            $result = $this->db->query ( $sql_query );
            return $result;
        }
    }
}