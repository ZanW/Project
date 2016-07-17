<?php
class Nonmembers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('nonmember_model');
        $this->load->helper('url_helper');
    }

    // Display non-members list
    public function index()
    {
        $this->home();
    }

    // Display non-members list
    public function home()
    {
        $data['nonmembers'] = $this->nonmember_model->get_nonmember();
        $data['title'] = 'Non-Membership Information';

        $this->load->view('templates/header');
        $this->load->view('nonmembers/index', $data);
        $this->load->view('templates/footer');
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
    public function update($id = 0)
    {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');

        $data['id'] = $id;
        $data['nonmembers'] = $this->nonmember_model->get_nonmember_by_id($id);
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
    }
    
    public function openRegistrationPage()
    {
        $this->load->view('home/register');
    }
    /**
     * This methods creates new member by inserting data into mySQL
     * TODO call method
     */
    public function register_session()
    {
     
        session_start();
        
        /**/
        
        $FIRSTNAME=$LASTNAME=$PASSWORD= $EMAIL=$BDAY=$STREET =$APT=$CITY=$POSTAL= $COUNTRY= $GENDER ="";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $FIRSTNAME = ($_POST["namefirst"]);
            $LASTNAME = $_POST['namelast'];
            $PASSWORD = $_POST['reg_password'];
            $EMAIL = $_POST['email'];
            $BDAY = $_POST['bday'];
            $STREET = $_POST['street'];
            $APT = $_POST['aptno'];
            $CITY = $_POST['city'];
            $POSTAL = $_POST['code'];
            $COUNTRY = $_POST['country'];
            $GENDER = $_POST['gender'];
        }
        $link = mysqli_connect('127.0.0.1:3306', 'root', '', 'warmup_project');
        if (!$link) {
        
            echo "connectn to db";
        
            die('Could not connect: ' . mysqli_error(''));
        }
        
        elseif (isset($_POST['email'])) {
            $EMAIL = $_POST['email'];
        
            $sql = ("SELECT `Email` FROM `warmup_project`.`persons` WHERE `Email`= '$EMAIL'");
            $result = mysqli_query($link, $sql);
            $count = mysqli_num_rows($result);
        
            if ($count > 0) {
                echo "oops email already exists";
            } else {
                $query = ("INSERT INTO `warmup_project`.`persons` ( `LastName`, `FirstName`,
`Apt_no`, `Street`, `City`, `Postal_Code`, `Country`, `Gender`,`Email`, `Password`)
VALUES ('" . $LASTNAME . "', '" . $FIRSTNAME . "','" . $APT . "', '" . $STREET . "','" . $CITY . "', '" . $POSTAL . "', '" . $COUNTRY . "', '" . $GENDER . "', '" . $EMAIL . "', '" . $PASSWORD . "')");
        
        
                mysqli_select_db($link, 'warmup_project');
                $retval = mysqli_query($link, $query);
        
                if (!$retval) {
                    die('Could not enter data: ' . mysqli_error($link));
                } else {
                    header("Location: member_profile.php");
                }
        
            }
        }
    
    }
}