<?php

class Login_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function login_query()
    {
        if (isset($_POST['name']) && isset($_POST['password'])) {
            $USERNAME = $_POST['name'];
            $PASSWORD = $_POST['password'];

            $link = database();
            if (!$link) {
                die('Could not connect: ' . mysqli_error());
            } else {
                $query = "SELECT * FROM warmup_project.persons WHERE  FirstName='" . $USERNAME . "' AND Password='" . $PASSWORD . "'";
                $result = mysqli_query($link, $query) or die (mysqli_error('try again'));
                $count = mysqli_num_rows($result);


                if ($count == 1) {
                    $_SESSION['USER_NAME'] = $USERNAME;
                    $sql = ("SELECT id FROM warmup_project.persons WHERE  FirstName='" . $USERNAME . "'");
                    $result = mysqli_query($link, $sql) or die (mysqli_error('try again'));

                    header("Location: member_profile.php");
                } else {
                    header("Location: login.php");
                }
            }
        }

    }

}