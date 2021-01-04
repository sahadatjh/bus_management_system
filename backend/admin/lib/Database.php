<?php

Class Database {

    public $host = "localhost";
    public $user = "root";
    public $pass = "sahadat";
    public $dbname = "db_bus_management_system";
    public $link;
    public $error;

    public function __construct() {
        $this->connectDB();
    }

    private function connectDB() {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->link) {
            $this->error = "Connection fail" . $this->link->connect_error;
            return false;
        }
    }

}
