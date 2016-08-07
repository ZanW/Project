<?php

class pay_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function paynow()
    {
        $date = date('Y-m-d', strtotime("+1year"));

        $ID = $_SESSION['ID'];

        $query = "INSERT INTO `pog_db`.`membership_fee`( `amount`, `mid`, `payment_type`, `expiration_date`, `payment_date`) VALUES ( '400', '$ID', '1', '$date', NOW())";

        $result = $this->db->query($query);

        return $result;

    }
}