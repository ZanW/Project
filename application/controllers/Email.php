<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('email_model');
        $this->load->model('member_model');
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
    } // end of delete()

    public function create()
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data['title'] = 'Compose';

        $this->form_validation->set_rules('receiver_email', 'Receiver Email', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('email/create', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->email_model->create_email();
            redirect('email/index');
        }
    }

    public function inbox_list()
    {
        $data ['members'] = $this->member_model->get_member();
        $data ['title'] = 'Inbox List';

        $this->load->view('templates/header');
        $this->load->view('email/inbox_list', $data);
        $this->load->view('templates/footer');
    }

    public function inbox($mid = 0)
    {
        $members = $this->member_model->get_email_address($mid);
        foreach ($members as $row)
        {
            $email_address = $row['email'];
        }
        $data['inbox'] = $this->email_model->get_inbox($email_address);
        $data['owner_id'] = $mid;
        $data['email_address'] = $email_address;
        $data['title'] = 'My Inbox';

        $this->load->view('templates/header');
        $this->load->view('email/inbox', $data);
        $this->load->view('templates/footer');
    }

}
