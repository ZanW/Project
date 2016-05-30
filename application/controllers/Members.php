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
}