<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ) ;

class Group extends CI_Controller
{

    /*
     * public function __construct ( )
     * {
     * parent::__construct () ;
     * $this->load->helper ( 'url_helper' ) ;
     * $this->load->model('groupcrud') ;
     * }
     */
    
    public function __construct()
    {
        parent::__construct () ;
        $this->load->model ( 'group_crud' ) ;
        $this->load->helper ( 'url_helper' ) ;
        $this->load->library('session');
    }

    public function index($mid)
    {
        $data['data_get'] =     $this->group_crud->view ($mid) ;
        $data['data_get_all'] = $this->group_crud->viewAllGroupsOfMember($mid);
     //   $data_get_all = $this->group_crud->viewAllGroupsOfMember();
        $this->load->view ( 'group/group_header', $data ) ;
        $this->load->view ('templates/header.php');
        $this->load->view ( 'group/group_view', $data ) ;
        $this->load->view ( 'group/group_footer', $data ) ;

        
    }

    public function openEditForm($gid=0)
    {   
        $gid = $this->uri->segment(3);
        $data = array('gid' => $gid);
        $this->load->view('group/group_edit_form', $data);
    }

    public function edit()
    {   $gid = $this->input->post('gid');
        $this->group_crud->update ($gid) ;
        $this->index () ;
    }

    public function delete($g_id)
    {
        $this->group_crud->delete ( $g_id ) ;
        $this->index () ;
    }
    
    // TODO memberID
    public function add()
    
    {
        $this->group_crud->add () ;
        $this->index () ;
    }

    public function openGroupForm()
    
    {
        $this->load->view ( 'group/group_add_form' ) ;
    }

}