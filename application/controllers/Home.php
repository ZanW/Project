<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->helper('url_helper');
        $this->load->library ( 'session' );
    }

    // Powon home page
    public function index()
    {
        $this->home();
    }

    // Display non-members list
    public function home()

    {   $this->session->sess_destroy();
        $data['title'] = 'Welcome to POWON';

        $this->load->view('header_nonmember');
        $this->load->view('home/index', $data);
        $this->load->view('footer');
    }

    public function login()
    {
        $data['title'] = 'Login to POWON';

        $this->load->view('header_nonmember');
        $this->load->view('home/login', $data);
        $this->load->view('footer');
    }

    public function admin()
    {
        // TODO: check for administrator privilege, else skip
        // if admin
        
        $data['title'] = 'Administrator';

        $this->load->view('templates/header');
        $this->load->view('home/admin', $data);
        $this->load->view('templates/footer');
        
        //else 
        // show page that unauthorized access
    }

}