<?php
class Nonmembers extends CI_Controller {
    /*public function __construct() {
       parent::__construct ();
       $this->load->model ( 'nonmember_model' );
       $this->load->helper ( 'url_helper' );
   }

   // Display non-members list
   public function index() {
      $this->home ();
  }

  // Display non-members list

  public function home() {
      $data ['nonmembers'] = $this->nonmember_model->get_nonmember ();
      $data ['title'] = 'Non-Membership Information';

      $this->load->view ( 'header' );
      $this->load->view ( 'nonmembers/index', $data );
      $this->load->view ( 'footer' );
  }

  // Create a non-member entry

  public function create()
  {
      $this->load->helper('form', 'url');
      $this->load->library('form_validation');

      $data['title'] = 'Create a non-member';

      $this->form_validation->set_rules('first_name', 'First Name', 'required');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required');

      if ($this->form_validation->run() == FALSE)
      {
          $this->load->view('templates/header');
          $this->load->view('nonmembers/create', $data);
          $this->load->view('templates/footer');
      }
      else
      {
          $this->nonmember_model->set_nonmember();
          redirect('nonmembers/index');
      }
  }

  // Edit and update a non-member entry
 /* public function update($FirstName = 0)
  {
      $this->load->helper('form', 'url');
      $this->load->library('form_validation');

      $data['FirstName'] = $FirstName;
      $data['nonmembers'] = $this->nonmember_model->get_nonmember_by_id($FirstName);
      $data['title'] = 'Update Non-Member';

      $this->form_validation->set_rules('first_name', 'First Name', 'required');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required');


      if ($this->form_validation->run() == FALSE)
      {
          $this->load->view('templates/header');
          $this->load->view('nonmembers/update', $data);
          $this->load->view('templates/footer');
      }
      else
      {
          $this->nonmember_model->update_nonmember();
          redirect('nonmembers/index');
      }
  }

  // Delete a non-member entry
  public function delete($id = 0)
  {
      $this->load->helper('form', 'url');

      $data['id'] = $id;
      $data['nonmembers'] = $this->nonmember_model->get_nonmember_by_id($id);
      $data['title'] = 'Delete Non-Member';

      if ($this->input->post('submit'))
      {
          $this->nonmember_model->delete_nonmember($id);
          redirect('nonmembers/index');
      }
      else // not click button Delete to submit
      {
          $this->load->view('templates/header');
          $this->load->view('nonmembers/delete', $data);
          $this->load->view('templates/footer');
      }
  }*/
  
}