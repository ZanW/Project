<?php

/**
 * Created by PhpStorm.
 * User: jaya1
 * Date: 2016-08-13
 * Time: 2:12 PM
 */
class Member_report_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();

    }

    public function add_interest($body)
    {
        $ID = $_SESSION['ID'];
        $keyword = $body;
        $query = "INSERT INTO `ioc55311`.`interest_member` (`interest_member`) VALUES ('" . $keyword . "');";
        $result = $this->db->query($query);

        $sql = "INSERT INTO `ioc55311`.`relation_interest` (`i_id`, `member_id`) VALUES ((select int_id from ioc55311.interest_member where interest_member ='" . $keyword . "'), '$ID');";
        $row = $this->db->query($sql);


        return $result;
//        $keyword = explode(",", $body);
//        $keywordSerialized = serialize($keyword);

//        $sql = ("SELECT COUNT(*) FROM `ioc55311`.`interest_member` WHERE `interest_memberid`= '" . $ID . "'  ");
//        $row = $this->db->query($sql);
//        $rownum = $row->num_rows();
//
//        if ($rownum = 0) {
//
//        } else {


//            $squery = "UPDATE `ioc55311`.`interest_member` SET `interest_member`= '" . $keywordSerialized . "' WHERE `interest_memberid`='" . $ID . "';";
//            $val = $this->db->query($squery);

    }


    public function read_interest()
    {

        $ID = $_SESSION['ID'];

        $sql = "SELECT `interest_member` FROM `ioc55311`.`interest_member`,ioc55311.relation_interest WHERE member_id=$ID AND int_id=i_id";

        $querie = $this->db->query($sql);
        $result = $querie->result_array();
        return $result;

//        $rowCount = $result->num_rows();
//
//        /**
//         * Checks if table is empty
//         */
//        if ($rowCount == 0) {
//            $returnValue = null;
//        } else {
//            $row = $result->result_array();
//            $Deserialized = unserialize($row[0]['interest_member']);
//            $returnValue = $Deserialized;
//        }
//
//        return $returnValue;
    }


    public function member_list()
    {
        $sql = "SELECT FirstName,interest_member, City FROM ioc55311.relation_interest ,ioc55311.interest_member, ioc55311.members WHERE int_id=i_id AND member_id=ID;";

        $querie = $this->db->query($sql);
        $result = $querie->result_array();
//
//        foreach ( $result as $row) {
//            $resultArray[$row->ID] = $row->FirstName;
//            $resultArray[$row->ID] = $row->interest_member;
//        }
        return $result;


    }


}