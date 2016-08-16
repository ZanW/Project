<?php

class Event extends CI_Controller
{
    public $Event_model;

    public function __construct()
    {

        parent::__construct();
        $this->load->model("Event_model");
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }

    public function index()
    {
        $group = $this->Event_model->group();
        $data['groups'] = $group;

        $this->load->view('templates/header');
        $this->load->view('event/Create_event', $data);
        $this->load->view('footer');


    }

    public function create_event()
    {

        $event = $data ['event_name'] = ($_POST ["event"]);
        $group = $data ['group_name'] = ($_POST ["g_name"]);
        $event_d_one = $data ['date_option_one'] = ($_POST ['date_one']);
        $event_d_two = $data ['date_option_two'] = ($_POST ['date_two']);

        $this->Event_model->add_event($event_d_one, $event_d_two, $event, $group);
        redirect('/Login_con/displayHomePage');

    }

    public function after_voting()
    {
        if ($_POST['vote'] == 'Vote') {
            $selectedDate = $_POST['selectedDate'];
            $eventID = $_POST['eventID'];
            $dateOne = $_POST['dateOne'];
            $dateTwo = $_POST['dateTwo'];

            $this->Event_model->vote_date($eventID, $selectedDate, $dateOne, $dateTwo);

            $data['confirmation'] = 'Vote registered!';

            $this->load->view('templates/header');
            $this->load->view('event/voting_done', $data);
        } elseif ($_POST['vote'] == 'Close Voting') {
            $eventID = $_POST['eventID'];
            $dateOne = $_POST['dateOne'];
            $dateTwo = $_POST['dateTwo'];

            $votingDate = $this->Event_model->stop_voting($eventID, $dateOne, $dateTwo);

            $data['confirmation'] = "Voting Closed. Event will be held at " . $votingDate;

            $this->load->view('templates/header');
            $this->load->view('event/voting_done', $data);
        }
    }

}