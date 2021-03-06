<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ) ;

class Content extends CI_Controller
{

    public function __construct()
    {
        parent::__construct () ;
        $this->load->model ( 'content_model' ) ;
        $this->load->model ( 'comment_model' ) ;
        $this->load->helper ( 'url_helper' ) ;
        $this->load->library ( 'session' ) ;
        $this->load->helper ( array('form', 'url') ) ;
    }

    public function index($gid = 0)
    {
        // $data['members'] = $this->member_model->get_member();
        // $data['records'] = $this->content_model->get_contents();get_contents_by_POWON_id
        $group_id = $this->uri->segment ( 3 ) ;
        
        $this->session->set_userdata ( "gid", $group_id ) ;
        
        $gid = array('gid'=>$group_id) ;
        $data['records'] = $this->content_model->get_contents_by_group_id ( $gid ) ;
        $data['records_comments'] = $this->comment_model->readCommentsByContentID () ;
        $data['title'] = 'Contents and Comments Information' ;
        $data['group_id'] = $group_id ;
        $this->load->view ( 'templates/header' ) ;
        $this->load->view ( 'content/index', $data ) ;
        $this->load->view ( 'templates/footer' ) ;
    }

    public function create()
    {
        /*
         * upload the pictures in path upload inside following model
         */
        
        $this->content_model->set_content () ;
        redirect ( 'content/index/' . $this->input->post ( 'gid' ) ) ;
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
            $this->content_model->update_content () ;
            redirect ( 'content/index/'. $_SESSION['gid'] ) ;
    }
    
    public function openEditMessage($id = 0)
    {
        $data['id'] = $id;
        $this->load->view ( 'templates/header' ) ;
        $this->load->view ( 'content/update',$data ) ;
        $this->load->view ( 'templates/footer' ) ;
    }
    
    
    // Delete a content
    public function delete($id = 0)
    {
        
        // $this->load->helper('form', 'url');
        
        // $data['id'] = $id;
        // $data['records'] = $this->content_model->get_content_by_id($id);
        // $data['title'] = 'Delete Content';
        
        // if ($this->input->post('submit'))
        
        $this->content_model->delete_content ( $id ) ;
        redirect ( 'content/index/' . $_SESSION['gid'] ) ;
        
        // else // not yet click button Delete to submit
        // {
        // $this->load->view('templates/header');
        // $this->load->view('content/delete', $data);
        // $this->load->view('templates/footer');
        // }
    }

    public function openCommentForm()
    {
        $data['title'] = 'Add a comment' ;
        $data['content_id'] = $this->uri->segment ( 3 ) ;
        echo "content_id=" . $this->uri->segment ( 3 ) ;
        $this->load->view ( 'templates/header' ) ;
        $this->load->view ( 'comment/addCommentForm', $data ) ;
        $this->load->view ( 'templates/footer' ) ;
    
    }

    public function addComment()
    {
        $this->comment_model->addComment () ;
        //$this->getComments();
        redirect ( 'content/index/' . $_SESSION['gid'] ) ;
    }

    /**
     * Keep this method for testing
     * This query needs to be improved as at the moment
     * we are reading all the comments in a content 
     */
    public function getComments()
    {
        $records = $this->comment_model->readCommentsByContentID () ;
        foreach ( $records as $record_item ):
            echo $record_item['com_message'] ;
            echo $record_item['first_name'] ;
            echo $record_item['content_id'] ;
        endforeach;
    }

}