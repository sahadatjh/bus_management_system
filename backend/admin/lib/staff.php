<?php

/*
 * Class for manage student
 */
include_once 'Session.php';
include_once 'Database.php';

class Staff {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }
//get Select option Data for
    public function selectOptionData($sql) {
        $result = $this->db->link->query($sql);
        return $result;
    }

    public function getStaffAll() {
        $query = "SELECT *
            FROM stafinfo";
            // LEFT JOIN businfo ON stafinfo.busNo = businfo.busNo
            // LEFT JOIN route ON stafinfo.routeId = route.id
        $result = $this->db->link->query($query);
        return $result;
    }
//insert Staff informarion
public function insertStaff($data){
//Array ( [name] => md abdul hamid [designation] => Driver [phone] => 017777777777 [email] => hamid@gmai.com [busNo] => 20191011 [routeId] => 2 [gender] => Female [nid] => 12345 [remarks] => Test [presentAddress] => aaaa [permamantAddress] => )
    $name=$data['name'];
    $designation=$data['designation'];
    $phone=$data['phone'];
    $email=$data['email'];
    $busNo=$data['busNo'];
    $routeId=$data['routeId'];
    $gender=$data['gender'];
    $nid=$data['nid'];
    $remarks=$data['remarks'];
    $presentAddress=$data['presentAddress'];
    $permamantAddress=$data['permamantAddress'];
 
    $chkNID=$this->chkNID($nid);

    if(empty($name)|| empty($phone)||empty($nid)||empty($presentAddress)){
        $msg= "<h3 class='alert alert-warning'>Field Must not be empty!!</h3>";
        return $msg;
    }else{
        if($chkNID==TRUE){
            $msg= "<h3 class='alert alert-danger'>Staff Already Exist!!</h3>";
            return $msg;
        }else{
            $sql="INSERT INTO stafinfo(name,designation,busNo,routeId,gender,Phone,email,nid,presentAddress,permamantAddress,remarks)
                VALUES
                ('$name','$designation','$busNo','$routeId','$gender','$phone','$email','$nid','$presentAddress','$permamantAddress','$remarks')";
            $this->db->link->query($sql);
            $msg = "<h3 class='alert alert-success'>Staff information Saved Successfully</h3>";
        }
    }
    

}

//NID exist or not chech
    public function chkNID($nid) {
        $sql = "SELECT nid FROM stafinfo WHERE nid = '$nid'";
        $result = $this->db->link->query($sql);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
    }

    public function staffDelete($id){
        $delete_query="DELETE FROM  stafinfo WHERE id=$id";
        $stf_delete= $this->db->link->query($delete_query);
        if ($stf_delete === TRUE) {
                $msg="<h3 class='alert alert-danger text-center'><strong>Sucess! </strong> Staff Deleted sucessfully!!!</h3>";
                return $msg;
            } else {
                $msg= "<h3 class='alert alert-danger text-center'><strong>Error!</strong> Can not delete the record!!!</h3>";
                return $msg;
            }
    }
}