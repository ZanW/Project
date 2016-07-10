<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    // Powon home page
    public function index()
    {
        $this->home();
    }

    // Display non-members list
    public function home()
    {
        $data['title'] = 'Welcome to POWON';

        $this->load->view('header_nonmember');
        $this->load->view('home/index', $data);
        $this->load->view('footer');
    }

    public  function login()
    {
        $data['title'] = 'Login to POWON';

        $this->load->view('header_nonmember');
        $this->load->view('home/login', $data);
        $this->load->view('footer');

    }


}