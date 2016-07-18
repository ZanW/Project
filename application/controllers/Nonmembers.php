<?php
class Nonmembers extends CI_Controller {
    public function __construct() {
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
    public function create() {
        $this->load->helper ( 'form', 'url' );
        $this->load->library ( 'form_validation' );
        
        $data ['title'] = 'Create a non-member';
        
        $this->form_validation->set_rules ( 'first_name', 'First Name', 'required' );
        $this->form_validation->set_rules ( 'last_name', 'Last Name', 'required' );
        
        if ($this->form_validation->run () == FALSE) {
            $this->load->view ( 'header' );
            $this->load->view ( 'nonmembers/create', $data );
            $this->load->view ( 'footer' );
        } else {
            $this->nonmember_model->set_nonmember ();
            redirect ( 'nonmembers/index' );
        }
    }
    
    // Edit and update a non-member entry
    public function update($id = 0) {
        $this->load->helper ( 'form', 'url' );
        $this->load->library ( 'form_validation' );
        
        $data ['id'] = $id;
        $data ['nonmembers'] = $this->nonmember_model->get_nonmember_by_id ( $id );
        $data ['title'] = 'Update Non-Member';
        
        $this->form_validation->set_rules ( 'first_name', 'First Name', 'required' );
        $this->form_validation->set_rules ( 'last_name', 'Last Name', 'required' );
        
        if ($this->form_validation->run () == FALSE) {
            $this->load->view ( 'header' );
            $this->load->view ( 'nonmembers/update', $data );
            $this->load->view ( 'footer' );
        } else {
            $this->nonmember_model->update_nonmember ();
            redirect ( 'nonmembers/index' );
        }
    }
    
    // Delete a non-member entry
    public function delete($id = 0) {
        $this->load->helper ( 'form', 'url' );
        
        $data ['id'] = $id;
        $data ['nonmembers'] = $this->nonmember_model->get_nonmember_by_id ( $id );
        $data ['title'] = 'Delete Non-Member';
        
        if ($this->input->post ( 'submit' )) {
            $this->nonmember_model->delete_nonmember ( $id );
            redirect ( 'nonmembers/index' );
        } else // not click button Delete to submit
{
            $this->load->view ( 'header' );
            $this->load->view ( 'nonmembers/delete', $data );
            $this->load->view ( 'footer' );
        }
    }
    public function openRegistrationPage() {
        $this->load->view ( 'home/register' );
    }
    /**
     * This methods creates new member by inserting data into mySQL
     * TODO call method
     */
    public function register_session() {
        echo "reached session";
        session_start ();
        
        /* */
        
        $FIRSTNAME = $LASTNAME = $PASSWORD = $EMAIL = $BDAY = $STREET = $APT = $CITY = $POSTAL = $COUNTRY = $GENDER = "";
        
        if ($_SERVER ["REQUEST_METHOD"] == "POST") {
            $data ['FirstName'] = ($_POST ["namefirst"]);
            $data ['LastName'] = $_POST ['namelast'];
            $data ['Password'] = $_POST ['reg_password'];
            $data ['Email'] = $_POST ['email'];
            $data ['DOB'] = $_POST ['bday'];
            $data ['Street'] = $_POST ['street'];
            $data ['Apt_no'] = $_POST ['aptno'];
            $data ['City'] = $_POST ['city'];
            $data ['Postal_Code'] = $_POST ['code'];
            $data ['Country'] = $_POST ['country'];
            $data ['Gender'] = $_POST ['gender'];
        }
        $link = mysqli_connect ( 'localhost', 'shivam', 'pass', 'warmup_project' );
        if (! $link) {
            
            echo "connecting to db..";
            
            die ( 'Could not connect: ' . mysqli_error ( '' ) );
        } 

        elseif (isset ( $_POST ['email'] )) {
            $EMAIL = $_POST ['email'];
            
            $sql = ("SELECT `Email` FROM `warmup_project`.`persons` WHERE `Email`= '$EMAIL'");
            $result = mysqli_query ( $link, $sql );
            $count = mysqli_num_rows ( $result );
            
            if ($count > 0) {
                echo "oops email already exists";
            } else {
                
                $retval = $this->nonmember_model->createNewMember ( $data );
                if (! $retval) {
                    die ( 'Could not enter data: ' . mysqli_error ( $link ) );
                } else {
                    echo "Success!! Member created";
                    redirect ( site_url ( 'home/login' ) );
                }
            }
        }
    }
}