<?php

class Chat extends CI_Controller
{
    public $chat_model;

    public function __construct()
    {

        parent::__construct();
        $this->load->model("chat_model");
        $this->load->helper('url_helper');
        $this->load->library('session');

    }

    public function index()
    {
        $group = $this->chat_model->group();
        $data['groups'] = $group;

        $member = $this->chat_model->member();
        $data['members'] = $member;

        $this->load->view('templates/header');
        $this->load->view('Chatbox/message', $data);
    }

    public function get_chats()
    {
        $userID = $_GET['userid'];
        $groupID = $_GET['groupid'];

        $response = $this->chat_model->get_Messages($userID, $groupID);

        /*
         * Returns header response as successful
         */
        header('Content-Type: application/json');

        echo json_encode($response);
    }

    public function send_chats()
    {
        $chatMessage = $_GET['message'];
        $userID = $_GET['userid'];
        $memberID = $_GET['membersids'];
        $groupID = $_GET['groupid'];
        

        $response = $this->chat_model->addMessage($chatMessage, $userID, $memberID, $groupID);

        /*
         * Returns header response as successful
         */
        header('Content-Type: application/json');

        echo json_encode($response);
    }


    public function get_groupmember()
    {

        $groupID = $_GET['groupid'];

        $group= $this->chat_model->group($groupID);
       
        if ($group) {
            $data['groups'] = $group;
            $this->load->view("templates/header");
            $this->load->view('Chatbox/message', $data);


        } else {
            $this->load->view("home/login");
        }

        return $group;


    }

    public function get_member()
    {

        $member = $this->chat_model->member();

        if ($member) {
            $data['members'] = $member;
            $this->load->view("templates/header");
            $this->load->view('Chatbox/message', $data);


        } else {
            $this->load->view("home/login");
        }

        return $member;


    }

    public function get_group_members()
    {
        $groupID = $_GET['groupid'];
        
        $members = $this->chat_model->group_members($groupID);
        
        /*
         * Returns header response as successful
         */
        header('Content-Type: application/json');

        echo json_encode($members);
    }

}
