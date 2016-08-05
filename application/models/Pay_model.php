<?php
class pay_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    // Get all message and return in an array
    public function createAccount()
    {
        //$query = $this->db->get('message');

        $query ="INSERT INTO `pog_db`.`membership_fee`(`transaction_id`, `amount`, `mid`, `payment_type`, `expiration_date`, `payment_date`) VALUES ('1', '1', '1', '1', '20120618', GETDATE())";

        $result = $this->db->query($query);

        return $result;

        return $query->result_array();
    }


}