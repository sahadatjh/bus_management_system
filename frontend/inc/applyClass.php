<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . './Database.php');

class ApplyClass {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insertApply($data) {
        $std_id = $data['std_id'];
        $busNo = $data['busNo'];
        $date = date("Y-n-j");
        $status = "0";

        if (empty($std_id) || empty($busNo)) {
            $msg = "<h4 class='alert alert-danger text-center'><strong>Error!</strong> * Field must not be empty!!!</h4>";
            return $msg;
        } else {
            $query = "SELECT * FROM studentinfo WHERE std_id='$std_id'";
            $results = mysqli_query($this->db->link, $query);
            if (mysqli_num_rows($results) == 1) {
                $sql = "SELECT * FROM tblapply WHERE std_id='$std_id'";
                $check_applyed = mysqli_query($this->db->link, $sql);
                if (mysqli_num_rows($check_applyed) == 1) {
                    $msg = "<h4 class='alert alert-success text-center'>You are already Appllied !!!</h4>";
                    return $msg;
                } else {
                    $std_query = "INSERT INTO tblapply(std_id,busNumber,time,status)VALUES('$std_id','$busNo','$date','$status')";
                    $std_insert = $this->db->insert($std_query);
                    if ($std_insert) {
                        $msg = "<h4 class='alert alert-success text-center'><strong>success!</strong> * Student Appllied successfully !!!</h4>";
                        return $msg;
                    } 
                }
            } else {
                $msg = "<h4 class='alert alert-danger text-center'> Student ID does not Match !!!</h4>";
                return $msg;
            }
        }
    }

}
