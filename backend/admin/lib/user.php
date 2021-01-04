<?php

/*
 * Class for manage USER
 */
include_once 'Session.php';
include_once 'Database.php';

class User {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

  
    public function getUsrAll() {
        $query = "SELECT * FROM tbl_user";
        $result = $this->db->link->query($query);
        return $result;
    }
    //inser user
    public function insertUser($data){
        //type=Admin&username=sahadat&email=sahadat%40gmail.com&password1=12345&password2=12345
            $type=$data['type'];
            $username=$data['username'];
            $email=$data['email'];
            $password1=$data['password1'];
            $password2=$data['password2'];
         
            $chkUsername=$this->checkUsername($username);
            $chkEmail=$this->checkEmail($email);
        
            if(empty($username)|| empty($email)||empty($password1)||empty($password2)){
                $msg= "<h3 class='alert alert-warning'>Field Must not be empty!!</h3>";
                return $msg;
            }

            if ($password1 != $password2) {
                $msg = "<h3 class='alert alert-danger'>Two passwords do not match!!!</h3>";
                return $msg;
            }
            if($chkUsername == TRUE){
                $msg = "<h3 class='alert alert-warning'>Username Already Exist!!!</h3>";
                return $msg;
            }
            if($chkEmail == TRUE){
                $msg = "<h3 class='alert alert-warning'>Email Already Exist!!!</h3>";
                return $msg;
            }
            $password = md5($password1);
            $sql = "INSERT INTO tbl_user (username,email,password,type)VALUES('$username','$email','$password','$type')";
            $this->db->link->query($sql);
            $msg = "<h3 class='alert alert-success'>User Added Successfully!!!</h3>";
            return $msg;
        }
    
 
    public function checkUsername($username) {
        $sql = "SELECT username FROM tbl_user WHERE username = '$username'";
        $result = $this->db->link->query($sql);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }

    public function checkEmail($email) {
        $sql = "SELECT email FROM tbl_user WHERE email = '$email'";
        $result = $this->db->link->query($sql);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //Delete User  
    public function userDelete($id){  
        $delete_query="DELETE FROM  tbl_user WHERE id=$id";
        $delete= $this->db->link->query($delete_query);
        if ($delete === TRUE) {
             $msg="<h3 class='alert alert-danger text-center'><strong>Sucess! </strong> User Deleted sucessfully!!!</h3>";
             return $msg;
         } else {
             $msg= "<h3 class='alert alert-danger text-center'><strong>Error!</strong> Can not delete the record!!!</h3>";
             return $msg;
         }
      }

}
