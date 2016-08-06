<?php

class Login_con extends CI_Controller
{
    public $Login_model;
    public $MProfile_con;

    public function __construct()
    {

        parent::__construct();
        $this->load->model("Login_model");
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }

    public function index()
    {
        $this->load->view('header_nonmember');
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function register()
    {
        $this->load->view('home/register');
    }


    public function validateMemberLogin()
    {

        $data ['FirstName'] = ($_POST ["name"]);
        $data ['Password'] = ($_POST ['password']);

        $status = $this->Login_model->Login_query();
        
        if ($status) {
            $this->createUserSession($status);
            $data['user_values'] = $status;
            $this->load->view("templates/header");
            $this->load->view('home/member_profile', $data);


        } else {
            $this->load->view("home/register", $data);
        }

    }


    public function new_registration()
    {

        $FIRSTNAME = $LASTNAME = $PASSWORD = $EMAIL = $BDAY = $STREET = $APT = $CITY = $POSTAL = $COUNTRY = $GENDER = "";
        $this->Login_model->register_query();
        $this->load->view('home/login');

    }

    public function createUserSession($data)
    {
        $row = $data->row_array();
        $member_session_data = array(
            'FirstName' => $row['FirstName'],
            'Email' => $row['Email'],
            'ID' => $row['ID'],
            'gid'=>0    
        );
        $this->session->set_userdata($member_session_data);

    }
}
