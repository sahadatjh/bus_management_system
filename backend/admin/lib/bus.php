<?php

/*
 * Class for manage Bus
 */
include_once 'Session.php';
include_once 'Database.php';

class Bus {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    
    public function getBusAll() {
        $query = "SELECT businfo.busName, businfo.busNo, stafinfo.name, route.route, businfo.stopage
            FROM businfo
            LEFT JOIN stafinfo ON businfo.driverId = stafinfo.id
            LEFT JOIN route ON businfo.routeId = route.id";
        $result = $this->db->link->query($query);
        return $result;
    }

    //get Select option Data for
    public function selectOptionData($sql) {
        $result = $this->db->link->query($sql);
        return $result;
    }

    //Bus Insert
    public function insertBus($data){
        //busName=Fulkuri&busNo=20190201&routeId=1&stopage=Mirpur2&driverId=15&helerId=16&remarks=Test
        $busName = $data['busName'];
        $busNo   = $data['busNo'];
        $routeId = $data['routeId'];
        $stopage = $data['stopage'];
        $driverId= $data['driverId'];
        $helerId = $data['helerId'];
        $remarks = $data['remarks'];
        $startTime = date ('Y-m-d H:i:s', time());
        $endTime =  date ('Y-m-d H:i:s', time());
        //Check Bus number exist or not
        $cheched_busNo = $this->checkbusNo($busNo);

        //empty Validation
        if (empty($busName) || empty($busNo) || empty($stopage) ) {
            $msg = "<h3 class='alert alert-warning'>* Field Must not be empty!!!</h3>";
            return $msg;
        }

        //check exit or not
        if ($cheched_busNo == TRUE) {
            $msg = "<h3 class='alert alert-danger'>Bus Already Exist!!</h3>";
            return $msg;
        }else{
            $sql = "INSERT INTO businfo
                    (busName,busNo,routeId,driverId,helperId,stopage,remarks,startTime,endTime)
                    VALUES
                    ('$busName','$busNo','$routeId','$driverId','$helerId','$stopage','$remarks','$startTime','$endTime')";
                $this->db->link->query($sql);
                $msg = "<h3 class='alert alert-success'>Record inserted successfully!!!</h3>";
                return $msg;
        }
    }
    
    public function checkbusNo($busNo) {
        if(empty($busNo)){
            $msg = "<h3 class='alert alert-warning'>* Field Must not be empty!!!</h3>";
            return $msg;
        }else{
            $sql = "SELECT busNo FROM businfo WHERE busNo = $busNo";
            $result = $this->db->link->query($sql);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                //$msg = "<h3 class='alert alert-success'> ID Exist</h3>";
                return TRUE;
            } else {
                return FALSE;
            }
        }
        
    }

    public function busDelete($busNo){  
        $delete_query="DELETE FROM  businfo WHERE busNo=$busNo";
        $bus_delete= $this->db->link->query($delete_query);
        if ($bus_delete === TRUE) {
             $msg="<h3 class='alert alert-success text-center'><strong>Sucess! </strong> Bus Deleted sucessfully!!!</h3>";
             return $msg;
         } else {
             $msg= "<h3 class='alert alert-danger text-center'><strong>Error!</strong> Can not delete the record!!!</h3>";
             return $msg;
         }
      }

}
