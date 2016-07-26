<?php
class Login_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database () ;
    }

    /**
     * TODO Jaya change firstname to email?
     */
    public function login_query($data)
    {
        if ( isset ( $_POST['name'] ) && isset ( $_POST['password'] ) )
        {
            $USERNAME = $data['FirstName'] ;
            $PASSWORD = $data['Password'] ;

            $result = $this->db->get_where ( 'members', array(
                    'FirstName'=>$data['FirstName'], 
                    'Password'=>$data['Password']) ) ;

                return $result;
        }
    }
}