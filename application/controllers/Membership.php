<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ) ;

class Membership extends CI_Controller
{

    /*
     * public function __construct ( )
     * {
     * parent::__construct () ;
     * $this->load->helper ( 'url_helper' ) ;
     * $this->load->model('groupcrud') ;
     * }
     */
public $Pay_model;
    public function __construct()
    {
        parent::__construct () ;
        $this->load->model ( 'Pay_model' ) ;
        $this->load->helper ( 'url_helper' ) ;
        $this->load->library('session');
    }

    public function pay_now()
    {
       $pay = $this->Pay_model->paynow();

        if ($pay=true){
            $this->load->view('home/login');
        }else{
            $this->load->view('home/register');

        }

    }
}
