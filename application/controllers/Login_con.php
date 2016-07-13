<?php

class Login_con extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
      $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->view('header_nonmember');
        $this->load->view('login');
        $this->load->view('footer');
    }




}