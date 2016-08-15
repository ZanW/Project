<?php

class List_mem_con extends CI_Controller
{
    public $Member_report_model;

    public function __construct()
    {

        parent::__construct();
        $this->load->model("Member_report_model");
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }

    public function index()
    {
        $list_name = $this->Member_report_model->member_list();
        if ($list_name) {
            $data['Fname'] = $list_name;
        } else {
            $data['Fname'] = array();
        }

        $this->load->view('templates/header');
        $this->load->view('interest/list_member', $data);
    }
}