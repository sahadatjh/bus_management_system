<?php
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'./Database.php');
?>
<?php
class Staff {
    private $db;

    public function __construct(){
        $this->db=new Database();
    }

    public function get_staff(){
        $query='SELECT *FROM stafinfo';
        $result= $this->db->select($query);
        return $result;
        }
        
    public function get_staff_for_update($id){
        //$sql="SELECT * FROM stafinfo WHERE id='$id'";
         //$result=mysql_query($sql);
        //$rows=mysql_fetch_array($result);
        
        $query = "SELECT *FROM stafinfo WHERE id=$id";
        $rows = $this->db->select($query)->fetch_assoc();
        //$result=mysql_fetch_array($rows);
        return $rows;
        }
    /*---------------------
        insert Staff
    --------------------*/  
    public function staffInsert($name,$designation,$busNo,$route,$phone,$presentAddress,$permanantAddress){         
        $name = mysqli_real_escape_string($this->db->link, $name);
        $designation = mysqli_real_escape_string($this->db->link, $designation);
        $busNo = mysqli_real_escape_string($this->db->link,$busNo );
        $route = mysqli_real_escape_string($this->db->link, $route);
        $phone = mysqli_real_escape_string($this->db->link,$phone );
        $presentAddress = mysqli_real_escape_string($this->db->link,$presentAddress );
        $permanantAddress = mysqli_real_escape_string($this->db->link,$permanantAddress );
        
        if (empty($name)||empty($phone)||empty($busNo)){
            $msg= "<div class='alert alert-danger'><strong>Error!</strong> *** Field must not be empty!!!</div>";
            return $msg;
        } else {
            $stf_query="INSERT INTO stafinfo(name,designation,busNo,route,phone,presentAddress,permamantAddress)VALUES('$name','$designation','$busNo','$route','$phone','$presentAddress','$permanantAddress')";
            $stf_insert=$this->db->insert($stf_query);
            
            if ($stf_query){
                header("Location: stafInfo.php?msg=".urlencode("<div class='alert alert-success text-center'><strong>Sucess! </strong> Staff inserted sucessfully!!!</div>"));
		exit();
            } else {
                $msg= "<div class='alert alert-danger text-center'><strong>Error!</strong> *** Field must not be empty!!!</div>";
                return $msg;
            }
        }
        
    }
    //Update Staff
     public function staff_update($id,$name,$designation,$busNo,$route,$phone,$presentAddress,$permanantAddress){  
        $id=$id;
        $name = mysqli_real_escape_string($this->db->link, $name);
        $designation = mysqli_real_escape_string($this->db->link, $designation);
        $busNo = mysqli_real_escape_string($this->db->link,$busNo );
        $route = mysqli_real_escape_string($this->db->link, $route);
        $phone = mysqli_real_escape_string($this->db->link,$phone );
        $presentAddress = mysqli_real_escape_string($this->db->link,$presentAddress );
        $permanantAddress = mysqli_real_escape_string($this->db->link,$permanantAddress );
        
        if (empty($name)||empty($phone)||empty($busNo)){
            $msg= "<div class='alert alert-danger'><strong>Error!</strong> *** Field must not be empty!!!</div>";
            return $msg;
        } else {
            $update_query="UPDATE stafinfo SET name='$name',designation='$designation',busNo='$busNo',route='$route',phone='$phone',presentAddress='$presentAddress',permamantAddress='$permanantAddress' WHERE id=$id";
            $stf_update=$this->db->insert($update_query);
            
            if ($stf_update){
                header("Location: stafInfo.php?msg=".urlencode("<div class='alert alert-success text-center'><strong>Sucess! </strong> Staff Updated sucessfully!!!</div>"));
		exit();
            } else {
                $msg= "<div class='alert alert-danger text-center'><strong>Error!</strong> *** Field must not be empty!!!</div>";
                return $msg;
            }
        }
        
    }
    //Delete Staff
     public function staff_delete($id){  
       $delete_query="DELETE FROM  stafinfo WHERE id=$id";
       $stf_delete= $this->db->delete($delete_query);
       if ($stf_delete === TRUE) {
            $msg="<div class='alert alert-warning text-center'><strong>Sucess! </strong> Staff Deleted sucessfully!!!</div>";
            return $msg;
        } else {
            $msg= "<div class='alert alert-danger text-center'><strong>Error!</strong> Can not delete the record!!!</div>";
            return $msg;
        }
     }
     
    
}
?>
