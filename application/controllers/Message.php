<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//session_start();

class Message extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('message_model');
        $this->load->model('member_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    // Display all message list
    public function index()
    {
        $data['message'] = $this->message_model->get_message();
        $data['title'] = 'Messages';

        $this->load->view('templates/header');
        $this->load->view('message/index', $data);
        $this->load->view('templates/footer');
    }

	/*
    // Delete an message
    public function delete($id = 0)
    {
        $this->load->helper('form', 'url');

        $data['id'] = $id;
        $data['message'] = $this->email_model->get_email_by_id($id);
        $data['title'] = 'Delete message';

        if ($this->input->post('submit'))
        {
            $this->email_model->delete_email($id);
            redirect("message/inbox/".$_SESSION["mid"]);
        }
        else // not yet click button Delete to submit
        {
            $this->load->view('templates/header');
            $this->load->view('message/delete', $data);
            $this->load->view('templates/footer');
        }
    } // end of delete()

    public function detail($id = 0)
    {
         $this->load->helper('form', 'url');

        $data['id'] = $id;
        $data['message'] = $this->email_model->get_email_by_id($id);
        $data['title'] = 'Message';

        if ($this->input->post('submit'))
        {
            $this->email_model->update_email();
            redirect("message/inbox/".$_SESSION["mid"]);
        }
        else // not yet click button Delete to submit
        {
            $this->load->view('templates/header');
            $this->load->view('message/detail', $data);
            $this->load->view('templates/footer');
        }
    }

    public function create()
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data['title'] = 'Compose';
        $data['m_email'] = $_SESSION["m_email"];

        $this->form_validation->set_rules('receiver_email', 'Receiver Message', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('message/create', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->email_model->create_email();
            redirect("message/inbox/".$_SESSION["mid"]);
        }
    }

    public function inbox_list()
    {
        unset($_SESSION["mid"]);

        $data ['members'] = $this->member_model->get_member();
        $data ['title'] = 'Inbox List';

        $this->load->view('templates/header');
        $this->load->view('message/inbox_list', $data);
        $this->load->view('templates/footer');
    }

    public function inbox($mid = 0)
    {

        $members = $this->member_model->get_email_address($mid);
        foreach ($members as $row)
        {
            $email_address = $row['message'];
        }
        $data['inbox'] = $this->email_model->get_inbox($email_address);
        $data['owner_id'] = $mid;
        $data['email_address'] = $email_address;
        $data['title'] = "My Inbox";

        $_SESSION["mid"] = $mid;
        $_SESSION["m_email"] = $email_address;

        $this->load->view('templates/header');
        $this->load->view('message/inbox', $data);
        $this->load->view('templates/footer');
    }
*/
}
