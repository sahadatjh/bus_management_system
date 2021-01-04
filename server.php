<?php

session_start();

// variable declaration
$username = "";
$email = "";
$errors = array();
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', 'sahadat', 'db_bus_management_system');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the register form
    
    $std_id = mysqli_real_escape_string($db, $_POST['std_id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $batch = mysqli_real_escape_string($db, $_POST['batch']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $depertment = mysqli_real_escape_string($db, $_POST['department']);
    $semester = mysqli_real_escape_string($db, $_POST['semester']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $relegion = mysqli_real_escape_string($db, $_POST['religion']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $remarks = mysqli_real_escape_string($db, $_POST['remarks']);
    $presentAddress = mysqli_real_escape_string($db, $_POST['presentAddpess']);
    $permanantAddress = mysqli_real_escape_string($db, $_POST['permanantAddpess']);
    $grphone = mysqli_real_escape_string($db, $_POST['grphone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);

    // form validation: ensure that the form is correctly filled
    if(empty($name)||empty($username)||empty($std_id)||empty($phone)||empty($password_1)){
        array_push($errors, "*** Field must not be Empty");
    }

    if ($password_1 != $password_2) {
        array_push($errors, "Two passwords do not match");
    }
   
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "SELECT * FROM studentinfo WHERE std_id ='$std_id' ";
        $results = mysqli_query($db, $query);
        if(mysqli_num_rows($results) == 1){
          
            $password = md5($password_1); //encrypt the password before saving in the database
            $sql = "UPDATE studentinfo SET 
                name='$name',
                username='$username',
                dept_id='$depertment',
                sem_id='$semester',
                type='$type',
                phone='$phone',
                present_address='$presentAddress',
                parmanant_address='$permanantAddress',
                password='$password',
                region='$relegion',
                gender='$gender',
                remarks='$remarks',
                batch='$batch',
                fname='$fname',
                grphone='$grphone',
                email='$email'
                WHERE std_id='$std_id'";
            mysqli_query($db, $sql);
            array_push($errors, "Applyed Successfully");
            //header('location: login.php');
              
        } else {
            array_push($errors, "Student ID does not match");
        }
        
    }
}

// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($type)) {
        array_push($errors, "Please Select Type");
    }
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM tbl_user WHERE type='$type' AND username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['type'] = $type;
            if ("User" == $type){
                header ('location: frontend/home.php');
            }elseif ("Admin" == $type) {
              header ('location: backend/admin/home.php');      
            }
        } else {
            array_push($errors, "Wrong type/username/password combination");
        }
    }
}
?>