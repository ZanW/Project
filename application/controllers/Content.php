<?php


class Content extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('content_model');
        $this->load->helper('url_helper');
    }

    // Display non-members list
    public function index()
    {
       // $data['members'] = $this->member_model->get_member();
        $data['records'] = $this->content_model->get_contents();
        $data['title'] = 'Content Information';

        $this->load->view('header');
        $this->load->view('content/index', $data);
        $this->load->view('footer');
    }
}