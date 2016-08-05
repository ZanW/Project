<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('content_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }


    public function index($gid = 0)
    {
       // $data['members'] = $this->member_model->get_member();
        //$data['records'] = $this->content_model->get_contents();get_contents_by_POWON_id       
        $group_id = $this->uri->segment(3);
        $gid = array('gid' => $group_id);
        $data['records'] = $this->content_model->get_contents_by_group_id($gid);
        $data['title'] = 'Content Information';
        $data['group_id'] = $group_id;
        $this->load->view('templates/header');
        $this->load->view('content/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->content_model->set_content() ;
        redirect ( 'content/index/'.$this->input->post('gid') ) ;
       
    }
    
    public function openAddGroupMessageForm()
    {
        $this->load->helper ( 'form', 'url' ) ;
        $this->load->library ( 'form_validation' ) ;
        
        $data['title'] = 'Create a content' ;
        $data['group_id'] = $this->uri->segment ( 3 ) ;
        $this->load->view ( 'templates/header' ) ;
        $this->load->view ( 'content/create', $data ) ;
        $this->load->view ( 'templates/footer' ) ;
    }

    // Edit and update the content
    public function update($id = 0)
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data['id'] = $id;
        $data['records'] = $this->content_model->get_content_by_id($id);
        $data['title'] = 'Update Content';

        $this->form_validation->set_rules('post_message', 'Post message', 'required');

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