<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Members extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    // Display members list
    public function index()
    {
        $data ['members'] = $this->member_model->get_member();
        $data ['title'] = 'Member and Status';

        $this->load->view('templates/header');
        $this->load->view('members/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data ['title'] = 'Create a member';

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('members/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->member_model->set_member();
            redirect('members/index');
        }
    }

    // Edit and update a member
    public function update($id = 0)
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data ['id'] = $id;
        $data ['members'] = $this->member_model->get_member_by_id($id);
        $data ['title'] = 'Change Member Status';

        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('members/update', $data);
            $this->load->view('templates/footer');
        } else {
            $this->member_model->update_member();
            redirect('members/index');
        }
    }

    // Delete a member
    public function delete($id = 0)
    {
        $this->load->helper('form', 'url');

        $data ['id'] = $id;
        $data ['members'] = $this->member_model->get_member_by_id($id);
        $data ['title'] = 'Delete Member';

        if ($this->input->post('submit')) {
            $this->member_model->delete_member($id);
            redirect('members/index');
        } else // not yet click button Delete to submit
        {
            $this->load->view('templates/header');
            $this->load->view('members/delete', $data);
            $this->load->view('templates/footer');
        }
    }

}