<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('email_model');
        $this->load->helper('url_helper');
    }

    // Display all email list
    public function index()
    {
        $data['email'] = $this->email_model->get_email();
        $data['title'] = 'Email Messages';

        $this->load->view('templates/header');
        $this->load->view('email/index', $data);
        $this->load->view('templates/footer');
    }

    // Delete an email
    public function delete($id = 0)
    {
        $this->load->helper('form', 'url');

        $data['id'] = $id;
        $data['email'] = $this->email_model->get_email_by_id($id);
        $data['title'] = 'Delete email';

        if ($this->input->post('submit'))
        {
            $this->email_model->delete_email($id);
            redirect('email/index');
        }
        else // not yet click button Delete to submit
        {
            $this->load->view('templates/header');
            $this->load->view('email/delete', $data);
            $this->load->view('templates/footer');
        }
    }

}