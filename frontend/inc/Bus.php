<?php 
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'./Database.php');
?>
<?php
class Bus {
private $db;

    public function __construct(){
        $this->db=new Database();
    }

    public function get_bus(){
        $query='SELECT *FROM businfo 
        LEFT JOIN stafinfo ON businfo.driverId = stafinfo.id
        LEFT JOIN route ON businfo.routeId = route.id';
        $result= $this->db->select($query);
        return $result;
        }
    public function busInsert($busName,$busNo,$busRoute,$driverName,$helperName,$stopage,$remarks){         
        $busName = mysqli_real_escape_string($this->db->link, $busName);
        $busNo = mysqli_real_escape_string($this->db->link,$busNo );
        $busRoute = mysqli_real_escape_string($this->db->link, $busRoute);
        $driverName = mysqli_real_escape_string($this->db->link,$driverName );
        $helperName = mysqli_real_escape_string($this->db->link,$helperName );
        $stopage = mysqli_real_escape_string($this->db->link,$stopage );
        $remarks = mysqli_real_escape_string($this->db->link,$remarks );        
        if (empty($busName)||empty($busNo)){
            $msg= "<div class='alert alert-danger'><strong>Error!</strong> *** Field must not be empty!!!</div>";
            return $msg;
        } else {
            $bus_query="INSERT INTO businfo(busName,busNo,busRoute,driverName,helperName,stopage,remarks)VALUES('$busName','$busNo','$busRoute','$driverName','$helperName','$stopage','$remarks')";
            $bus_insert= $this->db->insert($bus_query);
            
            if ($bus_insert){
                header("Location: busInfo.php?msg=".urlencode("<div class='alert alert-success text-center'><strong>Sucess! </strong> New Bus Added, sucessfully!!!</div>"));
		exit();
            } else {
                $msg= "<div class='alert alert-danger text-center'><strong>Error!</strong> *** Field must not be empty!!!</div>";
                return $msg;
            }
        }
    } 
    //get bus for update
    public function get_bus_for_update($id){
        $query = "SELECT *FROM businfo WHERE id=$id";
        $rows = $this->db->select($query)->fetch_assoc();
        return $rows;
        }
    //Update Bus
     public function bus_update($id,$busName,$busNo,$busRoute,$driverName,$helperName,$stopage,$remarks){  
        $id=$id;
        $busName = mysqli_real_escape_string($this->db->link, $busName);
        $busNo = mysqli_real_escape_string($this->db->link,$busNo );
        $busRoute = mysqli_real_escape_string($this->db->link, $busRoute);
        $driverName = mysqli_real_escape_string($this->db->link,$driverName );
        $helperName = mysqli_real_escape_string($this->db->link,$helperName );
        $stopage = mysqli_real_escape_string($this->db->link,$stopage );
        $remarks = mysqli_real_escape_string($this->db->link,$remarks );
        
        if (empty($busName)||empty($busNo)||empty($driverName)){
            $msg= "<div class='alert alert-danger'><strong>Error!</strong> *** Field must not be empty!!!</div>";
            return $msg;
        } else {
            $update_query="UPDATE businfo SET busName='$busName',busNo='$busNo',busRoute='$busRoute',driverName='$driverName',helperName='$helperName',stopage='$stopage',remarks='$remarks' WHERE id=$id";
            $bus_update=$this->db->insert($update_query);
            
            if ($bus_update){
                header("Location: busInfo.php?msg=".urlencode("<div class='alert alert-success text-center'><strong>Sucess! </strong> Bus Information Updated sucessfully!!!</div>"));
		exit();
            } else {
                $msg= "<div class='alert alert-danger text-center'><strong>Error!</strong> *** Field must not be empty!!!</div>";
                return $msg;
            }
        }
        
    }
    //Delete Bus
     public function bus_delete($id){  
       $delete_query="DELETE FROM  businfo WHERE id=$id";
       $bus_delete= $this->db->delete($delete_query);
       if ($bus_delete === TRUE) {
            $msg="<div class='alert alert-warning text-center'><strong>Sucess! </strong> Bus Deleted sucessfully!!!</div>";
            return $msg;
        } else {
            $msg= "<div class='alert alert-danger text-center'><strong>Error!</strong> Can not delete the record!!!</div>";
            return $msg;
        }
     }
        
}
?>
