<?php
class Members extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$this->home();
	}	

	public function home()
	{
		$data['members'] = $this->member_model->get_member();
		$data['title'] = 'Membership Information';

		$this->load->view('templates/header');
		$this->load->view('members/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');

		$data['title'] = 'Create a member';

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('members/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->member_model->set_member();
			redirect('members/index');
		}

	}

}