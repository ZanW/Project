<?php

class Login_con extends CI_Controller
{
    public $Login_model;
    public $Content_model;
    public $Member_report_model;

    public function __construct()
    {

        parent::__construct();
        $this->load->model("Login_model");
        $this->load->model("content_model");
        $this->load->model("Member_report_model");
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

            $interest = $this->Member_report_model->read_interest();
          
            /**
             * Checks if returned interests are NULL
             */
            if ($interest == null) {
                $data['interest'] = array();
            } else {
                $data['interest'] = $interest;
            }

            /*
             * send the contents of the group that he belong to his homepage
             */
            //
//            $data['content_data'] = $this->Content_model->get_contents_by_member_id();

            $this->load->view("templates/header");
            $this->load->view('home/member_profile', $data);
            $this->load->view("templates/footer");

        } else {
            $this->load->view("home/register", $data);
        }

    }

    /**
     * TODO THis function needs to be refactored
     */
    public function displayHomePage()
    {
        $status = $this->Login_model->user_info_query();
        $data['user_values'] = $status;

        $interest = $this->Member_report_model->read_interest();
        $data['interest'] = $interest;
        /*
         * send the contents of the group that he belong to his homepage
         */
        //
//        $data['content_data'] = $this->content_model->get_contents_by_member_id () ;

        $this->load->view("templates/header");
        $this->load->view('home/member_profile', $data);
        $this->load->view("templates/footer");
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
            'Password' => $row['Password'],
            'gid' => 0,
            'privilege' => $row['priviledge']
        );
        $this->session->set_userdata($member_session_data);

    }
}
