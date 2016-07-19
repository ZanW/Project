<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('content_model');
        $this->load->helper('url_helper');
    }


    public function index()
    {
       // $data['members'] = $this->member_model->get_member();
        $data['records'] = $this->content_model->get_contents();
        $data['title'] = 'Content Information';

        $this->load->view('templates/header');
        $this->load->view('content/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data['title'] = 'Create a content';

        $this->form_validation->set_rules('postmessage', 'Postmessage', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('content/create', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->member_model->set_content();
            redirect('content/index');
        }
    }

    // Edit and update the content
    public function update($id = 0)
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data['id'] = $id;
        $data['records'] = $this->content_model->get_content_by_id($id);
        $data['title'] = 'Update Content';

        $this->form_validation->set_rules('postmessage', 'Postmessage', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('content/update', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->content_model->update_content();
            redirect('content/index');
        }
    }

    // Delete a content
    public function delete($id = 0)
    {
        $this->load->helper('form', 'url');

        $data['id'] = $id;
        $data['records'] = $this->content_model->get_content_by_id($id);
        $data['title'] = 'Delete Content';

        if ($this->input->post('submit'))
        {
            $this->content_model->delete_content($id);
            redirect('content/index');
        }
        else // not yet click button Delete to submit
        {
            $this->load->view('templates/header');
            $this->load->view('content/delete', $data);
            $this->load->view('templates/footer');
        }
    }
}