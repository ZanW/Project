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

    public function __construct()
    {
        parent::__construct () ;
        $this->load->model ( 'pay_model' ) ;
        $this->load->helper ( 'url_helper' ) ;
        $this->load->library('session');
    }

    public function pay_now()
    {
        echo "PAYED";
    }
}
