<?php

/**
 * Created by PhpStorm.
 * User: jaya1
 * Date: 2016-08-13
 * Time: 2:12 PM
 */
class Member_report_con extends CI_Controller
{
    public $Member_report_model;
    public $Login_model;

    public function __construct()
    {

        parent::__construct();
        $this->load->model("Member_report_model");
        $this->load->model("Login_model");
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('interest/member_interest');
   
    }

    public function interest()
    {
        $message = $_POST["name"];
        $body = "$message";
        $this->Member_report_model->add_interest($body);
        $this->dis_profile();
    }

    public function dis_profile()
    {
//        $interest = $this->Member_report_model->read_interest();
//
//        if ($interest) {
//            $status = $this->Login_model->user_info_query();
//            $data['inte'] = $interest;
//            $data['user_values'] = $status;
//            $this->load->view("templates/header");
//            $this->load->view('home/member_profile', $data);
//
//
//        } else {
//            $this->load->view("home/login");
//        }
//
//        return $interest;
        redirect('/Login_con/displayHomePage');

    }
}