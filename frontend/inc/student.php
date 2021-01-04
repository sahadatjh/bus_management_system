<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . './Database.php');
?>
<?php

class Student {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function get_students() {
        $query = 'SELECT *FROM studentinfo';
        $result = $this->db->select($query);
        return $result;
    }

    //insert Student
    public function insertStudent($data) {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $std_id = mysqli_real_escape_string($this->db->link, $data['std_id']);
        $depertment = mysqli_real_escape_string($this->db->link, $data['depertment']);
        $semester = mysqli_real_escape_string($this->db->link, $data['semester']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $batch = mysqli_real_escape_string($this->db->link, $data['batch']);
        $gender = mysqli_real_escape_string($this->db->link, $data['gender']);
        $relegion = mysqli_real_escape_string($this->db->link, $data['relegion']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $route = mysqli_real_escape_string($this->db->link, $data['route']);
        $remarks = mysqli_real_escape_string($this->db->link, $data['remarks']);
        $presentAddress = mysqli_real_escape_string($this->db->link, $data['presentAddress']);
        $permanantAddress = mysqli_real_escape_string($this->db->link, $data['permanantAddress']);

        $check_std_id = $std_id;
        $sql = "SELECT std_id FROM studentNew WHERE std_id='$check_std_id'";
        $result = $this->db->link->query($sql);
        $yes = count($result);
        if ($yes > 0) {
            $std_update_query = "UPDATE studentNew SET name='$name',depertment='$depertment',semester='$semester',type='$type',batch='$batch',gender='$gender',religion='$relegion',email='$email',phone='$phone',route='$route',remarks='$remarks',presentAddress='$presentAddress',permanantAddress='$permanantAddress' WHERE std_id=$std_id";
            $std_update = $this->db->update($std_update_query);
            if ($std_update) {
                $msg = "<div class='alert alert-success text-center'><strong>Sucess! </strong> Student Applied sucessfully!!!</div>";
                return $msg;
            }
        } else {
            $msg = "<div class='alert alert-danger text-center'><strong>Error!</strong> Student Id Does not match</div>";
            return $msg;
        }
    }

}

?>