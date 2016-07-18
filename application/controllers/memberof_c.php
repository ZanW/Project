<?php
class memberof_c extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('memberof_m');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$this->home();

	}	

	public function home()
	{
		$data['memberoflist'] = $this->memberof_m->get_memberoflist();
		$data['title'] = 'Member Of';

		$this->load->view('header');
		$this->load->view('memberof/memberof_v', $data);
		$this->load->view('footer');
	}
	
	/*public function member_profile($id = 0)
	{
		$this->load->view('grouplist/member_profile');
	}
	*/
}