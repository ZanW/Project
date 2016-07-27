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
            $data['user_values'] = $status;
            $this->load->view("header");
            $this->load->view('home/member_profile', $data);


        } else {
            $this->load->view("home/register", $data);
        }

//        if (($this->session->userdata('FirstName') != "")) {
//          
//            $this->load->view('home/member_profile');
//        } else {
//            $data['title'] = 'Home';
//            $this->load->view("home/register", $data);
//        }
//

    }


    public function new_registration()
    {

        $FIRSTNAME = $LASTNAME = $PASSWORD = $EMAIL = $BDAY = $STREET = $APT = $CITY = $POSTAL = $COUNTRY = $GENDER = "";
        $this->Login_model->register_query();
        error_log('after register', 3, 'C:\Users\jaya1\xampp\htdocs\pog\error_log.txt');
        $this->load->view('home/member_profile');


    }


}
