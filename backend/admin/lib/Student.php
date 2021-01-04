<?php

/*
 * Class for manage student
 */
include_once 'Session.php';
include_once 'Database.php';

class Student {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insertStudentId($data) {
        $id = $data['std_id'];

        if (empty($id)) {
            $msg = "<h3 class='alert alert-danger'>Field must not be empty</h3>";
            return $msg;
        } else {
            $checkedId = $this->checkID($id);
            if ($checkedId == TRUE) {
                $msg = "<h3 class='alert alert-danger'>Student ID Already Exist!!</h3>";
                return $msg;
            } else {
                $sql = "INSERT INTO studentinfo (std_id)VALUES('$id')";
                $this->db->link->query($sql);
                $msg = "<h3 class='alert alert-success'>Successfully Assigned Student ID</h3>";
                return $msg;
            }
        }
    }

    public function getStudentAll() {
        $query = "SELECT *
            FROM studentinfo
            LEFT JOIN department ON studentinfo.dept_id = department.id
            LEFT JOIN semester ON studentinfo.sem_id = semester.id";
        $result = $this->db->link->query($query);
        return $result;
    }
    //get applied student 
    public function getAppliedStudent(){
        $query = "SELECT *
            FROM tblapply
            INNER JOIN studentinfo ON tblapply.std_id = studentinfo.std_id AND tblapply.status=0";
        $result = $this->db->link->query($query);
        return $result;
    }

    //get Select option Data for
    public function selectOptionData($sql) {
        $result = $this->db->link->query($sql);
        return $result;
    }

    //
    //get data from database for update
    public function getStudentForUpdate($id) {
        $query = "SELECT *FROM studentinfo WHERE std_id=$id";
        $rows = $this->db->link->query($query)->fetch_assoc();
        return $rows;
    }

    //insert Student informarion
    public function insertStudent($data) {
        $std_id = mysqli_real_escape_string($this->db->link, $data['std_id']);
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $batch = mysqli_real_escape_string($this->db->link, $data['batch']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $depertment = mysqli_real_escape_string($this->db->link, $data['department']);
        $semester = mysqli_real_escape_string($this->db->link, $data['semester']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $relegion = mysqli_real_escape_string($this->db->link, $data['religion']);
        $gender = mysqli_real_escape_string($this->db->link, $data['gender']);
        $remarks = mysqli_real_escape_string($this->db->link, $data['remarks']);
        $presentAddress = mysqli_real_escape_string($this->db->link, $data['presentAddpess']);
        $permanantAddress = mysqli_real_escape_string($this->db->link, $data['permanantAddpess']);
        $grphone = mysqli_real_escape_string($this->db->link, $data['grphone']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $username = mysqli_real_escape_string($this->db->link, $data['username']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        $fname = mysqli_real_escape_string($this->db->link, $data['fname']);

        //Check ID exist or not
        $cheched_id = $this->checkID($std_id);

        //Encription password
        $password = md5($password);

        //Empty Validation
        if (empty($name) || empty($phone) || empty($std_id) || empty($batch) || empty($gender) || empty($presentAddress)) {
            $msg = "<h3 class='alert alert-warning'>* Field Must not be empty!!!</h3>";
            return $msg;
        } else {
            if ($cheched_id == TRUE) {
                $msg = "<h3 class='alert alert-danger'>Student ID Already Exist!!</h3>";
                return $msg;
            } else {
                $sql = "INSERT INTO 
                    studentinfo
                    (std_id,name,phone,batch,dept_id,sem_id,type,region,gender,remarks,present_address,parmanant_address,grphone,email,username,password,fname)
                    VALUES
                    ('$std_id','$name','$phone','$batch','$depertment','$semester','$type','$relegion','$gender','$remarks','$presentAddress','$permanantAddress','$grphone','$email','$username','$password','$fname')";
                $this->db->link->query($sql);
                $msg = "<h3 class='alert alert-success'>Record inserted successfully!!!</h3>";
                return $msg;
            }
        }
    }

    //Update Student
    public function updateStudent($data) {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $std_id = mysqli_real_escape_string($this->db->link, $data['std_id']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $fname = mysqli_real_escape_string($this->db->link, $data['fname']);
        $grphone = mysqli_real_escape_string($this->db->link, $data['grphone']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $batch = mysqli_real_escape_string($this->db->link, $data['batch']);
        $depertment = mysqli_real_escape_string($this->db->link, $data['department']);
        $semester = mysqli_real_escape_string($this->db->link, $data['semester']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $relegion = mysqli_real_escape_string($this->db->link, $data['religion']);
        $gender = mysqli_real_escape_string($this->db->link, $data['gender']);
        $remarks = mysqli_real_escape_string($this->db->link, $data['remarks']);
        $presentAddress = mysqli_real_escape_string($this->db->link, $data['presentAddpess']);
        $permanantAddress = mysqli_real_escape_string($this->db->link, $data['permanantAddpess']);

        //Empty Validation
        if (empty($name) || empty($phone)  || empty($batch) || empty($presentAddress)) {
            $msg = "<h3 class='alert alert-warning'>* Field Must not be empty!!!</h3>";
            return $msg;
        } else {
            $sql = "UPDATE studentinfo SET
                   name='$name',
                   dept_id='$depertment',
                   sem_id='$semester',
                   type='$type',
                   phone='$phone',
                   present_address='$presentAddress',
                   parmanant_address='$permanantAddress',
                   
                   region='$relegion',
                   gender='$gender',
                   remarks='$remarks',
                   batch='$batch',
                   fname='$fname'
                   WHERE std_id='$std_id'
                    ";
            
            $this->db->link->query($sql);
            $msg = "<h3 class='alert alert-success'>Record Updated successfully!!!</h3>";
            return $msg;
        }
    }
    //Delete Student studentinfo table
     public function studentDelete($id){  
       $delete_query="DELETE FROM  studentinfo WHERE std_id=$id";
       $std_delete= $this->db->link->query($delete_query);
       if ($std_delete === TRUE) {
            $msg="<h3 class='alert alert-danger text-center'><strong>Sucess! </strong> Student Deleted sucessfully!!!</h3>";
            return $msg;
        } else {
            $msg= "<h3 class='alert alert-danger text-center'><strong>Error!</strong> Can not delete the record!!!</h3>";
            return $msg;
        }
     }

     public function allowApplyedStudent($std_id){
       $sql = "UPDATE tblapply SET status='1' WHERE std_id=$std_id";
        $this->db->link->query($sql);
        //create new user after allow
        $sql="SELECT * FROM studentinfo WHERE std_id='$std_id'";
        $userData = $this->db->link->query($sql);
        $data=$userData->fetch_assoc();
        $username=$data['username'];
        $email=$data['email'];
        $pass=$data['password'];
        $type="User";
        $createUserQuery="INSERT INTO tbl_user (username,email,password,type)VALUES('$username','$email','$pass','$type')";
        $this->db->link->query($createUserQuery);
     }
     /***************** 
     *for Applyed student start
     *******************/
     public function applyedStudentDelete($id){  
        $delete_query="DELETE FROM  tblapply WHERE id=$id";
        $std_delete= $this->db->link->query($delete_query);
        if ($std_delete === TRUE) {
             $msg="<h3 class='alert alert-danger text-center'><strong>Sucess! </strong> Student Deleted sucessfully!!!</h3>";
             return $msg;
         } else {
             $msg= "<h3 class='alert alert-danger text-center'><strong>Error!</strong> Can not delete the record!!!</h3>";
             return $msg;
         }
      }

      /***************** 
     *for Applyed student end
     *******************/
    public function checkID($id) {
        $sql = "SELECT std_id FROM studentinfo WHERE std_id = $id";
        $result = $this->db->link->query($sql);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            //$msg = "<h3 class='alert alert-success'> ID Exist</h3>";
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //insert semeter***********************

    public function insertSemester($data) {
        $semester = $data['semester'];

        if (empty($semester)) {
            $msg = "<h3 class='alert alert-danger'>Field must not be empty</h3>";
            return $msg;
        } else {
            $checkedSemester = $this->checkSemester($semester);
            if ($checkedSemester == TRUE) {
                $msg = "<h3 class='alert alert-warning'>This semester Already Exist!!</h3>";
                return $msg;
            } else {
                $sql = "INSERT INTO semester (semester)VALUES('$semester')";
                $this->db->link->query($sql);
                $msg = "<h3 class='alert alert-success'>Semester Inserted Successfully </h3>";
                return $msg;
            }
        }
    }

    public function checkSemester($semester) {
        $sql = "SELECT semester FROM semester WHERE semester = '$semester'";
        $result = $this->db->link->query($sql);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //End Semeter insert
    //insert Department***********************
    public function insertdepartment($data) {
        $department = $data['department'];

        if (empty($department)) {
            $msg = "<h3 class='alert alert-danger'>Field must not be empty</h3>";
            return $msg;
        } else {
            $checkDept = $this->checkDepartment($department);
            if ($checkDept == TRUE) {
                $msg = "<h3 class='alert alert-warning'>This Department Already Exist!!</h3>";
                return $msg;
            } else {
                $sql = "INSERT INTO department (department)VALUES('$department')";
                $this->db->link->query($sql);
                $msg = "<h3 class='alert alert-success'>Department Inserted Successfully </h3>";
                return $msg;
            }
        }
    }

    public function checkDepartment($department) {
        $sql = "SELECT department FROM department WHERE department = '$department'";
        $result = $this->db->link->query($sql);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //End Department insert
}
