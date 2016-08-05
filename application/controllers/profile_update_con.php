<?php

class profile_update_con extends CI_Controller
{

    public $profile_update_model;

    public function __construct()
    {

        parent::__construct();
        $this->load->model("profile_update_model");
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }

    public function edit_profile()
    {

        $update = $this->profile_update_model->get_profile();

        if ($update) {
            $data['user_info'] = $update;
            $this->load->view('home/update_profile', $data);

        }

    }

    public function update_info()
    {
        $this->profile_update_model->update_query();
        $this->new_profile();
    }

    public function new_profile(){

        $status = $this->profile_update_model->after_update();

        if ($status) {
            $data['user_values'] = $status;
            $this->load->view("templates/header");
            $this->load->view('home/member_profile', $data);


        } else {
            $this->edit_profile();
        }
        return $status;

    }
}