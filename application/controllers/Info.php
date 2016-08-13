<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('info_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    // Display all email list
    public function index()
    {
        $data['public_info'] = $this->info_model->get_public_info();
        $data['title'] = 'Public Info';

        $this->load->view('templates/header');
        $this->load->view('info/index', $data);
        $this->load->view('templates/footer');
    }

    // Delete an info
    public function delete($id = 0)
    {
        $this->load->helper('form', 'url');

        $data['id'] = $id;
        $data['public_info'] = $this->info_model->get_info_by_id($id);
        $data['title'] = 'Delete a public post';

        if ($this->input->post('submit'))
        {
            $this->info_model->delete_info($id);
            redirect("info/index");
        }
        else // not yet click button Delete to submit
        {
            $this->load->view('templates/header');
            $this->load->view('info/delete', $data);
            $this->load->view('templates/footer');
        }
    } // end of delete()

    // Delete an info
    public function update($id = 0)
    {
        $this->load->helper('form', 'url');

        $data['id'] = $id;
        $data['public_info'] = $this->info_model->get_info_by_id($id);
        $data['title'] = 'Update a public post';

        if ($this->input->post('submit'))
        {
            $this->info_model->update_info($id);
            redirect("info/index");
        }
        else // not yet click button Delete to submit
        {
            $this->load->view('templates/header');
            $this->load->view('info/update', $data);
            $this->load->view('templates/footer');
        }
    } // end of delete()

    public function create($mid = 0)
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data['title'] = 'Post a new public information';
        $data['mid'] = $mid;

        $this->form_validation->set_rules('mid', 'Owner ID', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('info/create', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->info_model->create_info();
            redirect("info/index");
        }
    }




}
