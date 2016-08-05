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
        $timestamp = $_GET['timestamp'];
        $messages = $this->chat_model->get_Messages($timestamp);
//        $message_chat = array();

        if ($messages) {
//            $message_chat[] = '<table>';
//            foreach ($messages as $message) {
//                $msg = htmlentities($message['message'], ENT_NOQUOTES);
//                $sent = date('F j, Y, g:i a', $message['sent_on']);
//                $fp = fopen("log.json", 'a');
//                $message_chat = fwrite($fp, "<div class='msgln'>(" . $sent . ") <b>" . $_SESSION['USER_NAME'] . "</b>: " . stripslashes(htmlspecialchars($msg)) . "<br><hr></div>");
//                           }
//            $message_chat[] = '</table>';
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($messages, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
            exit;
        } else {
            $response = array('status_message' => 'error');
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
            exit;
        }

//        echo implode('', $message_chat);

    }

    public function send_chats()
    {
        $user_id = $_GET['userid'];
        $chat_message = $_GET['text'];
        $chat_time = $_GET['timestamp'];
        $messages = $this->chat_model->addMessage($user_id, $chat_message, $chat_time);
        $response = array();

        if ($messages) {
            $response = array('status_message' => 'success');
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
            exit;
        } else {
            $response = array('status_message' => 'error');
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
            exit;
        }
    }


    public function get_groupmember()
    {

        $group = $this->chat_model->group();


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


}
