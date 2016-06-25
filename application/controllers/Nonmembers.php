<?php
class Nonmembers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('nonmember_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->home();
    }

    public function home()
    {
        $data['nonmembers'] = $this->nonmember_model->get_nonmember();
        $data['title'] = 'Non-Membership Information';

        $this->load->view('templates/header');
        $this->load->view('nonmembers/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data['title'] = 'Create a non-member';

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('nonmembers/create', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->nonmember_model->set_nonmember();
            redirect('nonmembers/index');
        }

    }

    public function update($id = 0)
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data['id'] = $id;
        $data['nonmembers'] = $this->nonmember_model->get_nonmember_by_id($id);
        $data['title'] = 'Update a non-member';

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('nonmembers/update', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->nonmember_model->update_nonmember();
            redirect('nonmembers/index');
        }
    }

}