<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Members extends CI_Controller {
    public function __construct() {
        parent::__construct ();
        $this->load->model ( 'member_model' );
        $this->load->model ( 'login_model' );
        $this->load->helper ( 'url_helper' );
        $this->load->library ( 'session' );
    }
    
    // Display non-members list
    public function index() {
        $this->home ();
    }
    
    // Display non-members list
    public function home() {
        $data ['members'] = $this->member_model->get_member ();
        $data ['title'] = 'Membership Information';
        
        $this->load->view ( 'header' );
        $this->load->view ( 'members/index', $data );
        $this->load->view ( 'footer' );
    }
    
    public function create() {
        $this->load->helper ( 'form', 'url' );
        $this->load->library ( 'form_validation' );
        
        $data ['title'] = 'Create a member';
        
        $this->form_validation->set_rules ( 'first_name', 'First Name', 'required' );
        $this->form_validation->set_rules ( 'last_name', 'Last Name', 'required' );
        
        if ($this->form_validation->run () == FALSE) {
            $this->load->view ( 'header' );
            $this->load->view ( 'members/create', $data );
            $this->load->view ( 'footer' );
        } else {
            $this->member_model->set_member ();
            redirect ( 'members/index' );
        }
    }
    
    // Edit and update a member
    public function update($id = 0) {
        $this->load->helper ( 'form', 'url' );
        $this->load->library ( 'form_validation' );
        
        $data ['id'] = $id;
        $data ['members'] = $this->member_model->get_member_by_id ( $id );
        $data ['title'] = 'Update Member';
        
        $this->form_validation->set_rules ( 'first_name', 'First Name', 'required' );
        $this->form_validation->set_rules ( 'last_name', 'Last Name', 'required' );
        
        if ($this->form_validation->run () == FALSE) {
            $this->load->view ( 'header' );
            $this->load->view ( 'members/update', $data );
            $this->load->view ( 'footer' );
        } else {
            $this->member_model->update_member ();
            redirect ( 'members/index' );
        }
    }
    
    // Delete a member
    public function delete($id = 0) {
        $this->load->helper ( 'form', 'url' );
        
        $data ['id'] = $id;
        $data ['members'] = $this->member_model->get_member_by_id ( $id );
        $data ['title'] = 'Delete Member';
        
        if ($this->input->post ( 'submit' )) {
            $this->member_model->delete_member ( $id );
            redirect ( 'members/index' );
        } else // not yet click button Delete to submit
        {
            $this->load->view ( 'header' );
            $this->load->view ( 'members/delete', $data );
            $this->load->view ( 'footer' );
        }
    }
    
    public function forgetPassword() {
        $this->load->view ( 'home/forget_password' );
    }

    public function validateMemberLogin() {
        $data ['FirstName'] = ($_POST ["name"]);
        $data ['Password'] = ($_POST ['password']);
        // $data['Email'] = $_POST['email'];
        // get the data for the specific user
        $result = $this->login_model->login_query ( $data );
        if ($result->num_rows () == 1) 
        { 
            // valid user/ login successful
            $row = $result->row_array ();
            $member_session_data = array (
                    'FirstName' => $row ['FirstName'],
                    'Email' => $row ['Email'],
                    'ID' => $row ['ID'] 
            );
            /**
             * creating/setting  the member session
             */
            $this->session->set_userdata ( $member_session_data  );
            $this->openMemberProfile ( $row );
        } else
            //TODO wrong pass or user does not exist
            redirect ( site_url ( 'home/login' ) );
    }

    public function openMemberProfile($member_info) {
        echo "Member exist in DB and session has been created withs First name , email and ID ,TODO open his profile:";
        echo "FirstName=" . $this->session->userdata ( 'FirstName' ) .  
             " email=" . $this->session->userdata( 'Email' ) . " ID=" . $this->session->userdata( 'ID' );
        echo "Read from Database=";
        echo $member_info['FirstName'];
        $this->load->view('templates/header.php');
        $this->load->view('home/member_profile',$member_info);
    }
}