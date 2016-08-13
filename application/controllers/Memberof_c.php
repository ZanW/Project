<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ) ;

class memberof_c extends CI_Controller 
{
    

	public function __construct()
	{
		parent::__construct();
		$this->load->model('memberof_m');
		$this->load->model('member_model');
		$this->load->helper('url_helper');
		$this->load->helper('form');
        $this->load->library('session');
	}

	public function index()
	{
	   echo "Reached memberc";
	   $this->home();
	}	

// homepage
	public function home()
	{
		$data['memberoflist'] = $this->memberof_m->get_memberoflist();
		$data['title'] = 'Group Members';

		$this->load->view('templates/header');
		$this->load->view('memberof/memberof_v', $data);
		$this->load->view('templates/footer');
	}
	
	/*public function member_profile($id = 0)
	{
		$this->load->view('grouplist/member_profile');
	}
	*/
	// link to grouplist
	/*public function grouplist($id = 0)
	{
		$this->load->helper('url_helper');
	
		$data['grouplist'] = $this->memberof_m->get_group();
		$data['title'] = 'Group List';

		$this->load->view('header');
		$this->load->view('memberof/group_v', $data);
		$this->load->view('footer');
	}
	*/

	/*
	 public function groupdetail($id = 0)
	{
		$data['id'] = $id;
		$data['group_detail'] = $this->memberof_m->get_group_by_id($id);
		$data['title'] = 'Group Detail';
		//$data['groupdetail'] = $this->memberof_m->get_groupdetail();

		$this->load->view('header');
		$this->load->view('memberof/groupdetail_v', $data);
		$this->load->view('footer');
	}
	*/

	// after clicking group ID
	public function groupdetail_by_id($id = 0)
	{
		$data['id'] = $id;
		$data['group_detail'] = $this->memberof_m->get_groupdetail_by_id($id);
		$data['title1'] = 'Group';
		$data['title2'] = 'Detail';
		//$data['groupdetail'] = $this->memberof_m->get_groupdetail();

		$this->load->view('templates/header');
		$this->load->view('memberof/groupdetail_v', $data);
		$this->load->view('templates/footer');
	}
 
   public function create_memberof($id = 0)
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data['memberid'] = $this->memberof_m->get_memberid_list();

        $data['title'] = 'Add a Member-of';
        $data['groupid'] = $id;

        $this->form_validation->set_rules('group_id', 'Group ID', 'is_natural');
        $this->form_validation->set_rules('selete_mid', 'Member ID', 'is_natural');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('templates/header');
            $this->load->view('memberof/create_v', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->memberof_m->create_memberof();
            redirect('memberof_c/index');
        }
    }

    public function delete_memberof($gid = 0, $mid = 0) {
        $this->load->helper ( 'form', 'url' );
        
        $data ['id'] = $gid;
        $data ['memberoflist'] = $this->memberof_m->get_memberof_by_gmid ( $gid, $mid );
        $data ['title'] = 'Delete MemberOf';
        
        if ($this->input->post ( 'submit' )) {
            $this->memberof_m->delete_memberof ($gid, $mid);
            redirect ( 'memberof_c/index' );
        } else 
        {
            $this->load->view ( 'templates/header' );
            $this->load->view ( 'memberof/delete_v', $data );
            $this->load->view ( 'templates/footer' );
        }
    }


     public function update_memberof($id = 0) 
     {
        $this->load->helper ( 'form', 'url' );
        $this->load->library ( 'form_validation' );
        
        $data ['id'] = $id;
        $data ['members'] = $this->memberof_m->get_memberof_by_id ( $id );
        $data ['title'] = 'Update MemberOf';
        
        $this->form_validation->set_rules('group_id', 'Group ID', 'is_natural');
        $this->form_validation->set_rules('Member ID', 'Group Name', 'is_natural');

        
        if ($this->form_validation->run () == FALSE) {
             $this->load->view('templates/header');
            $this->load->view('memberof/update_v', $data);
            $this->load->view('templates/footer');
        } else {
            $this->member_model->update_member ();
            redirect ( 'members/index' );
        }
    }
    
}