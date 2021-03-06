<?php

namespace Repository;
use Model\Employee;
class EmployeeRepository { 
    private $server; private $username; private $password; private $database; private $conn;

    public function __construct(){
        $this->server = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "z_qa";
        $this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);
    }
    public function getAllJsonWithMetaInformation() {
        $result = mysqli_query($this->conn, "SELECT id, name FROM Employee");
        $employees = array();
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($employees, new Employee($row['id'], $row['name']));
            }
            array_push($employees, ["count"=>count($employees)]);
        }
        mysqli_close($this->conn);
        return $employees;
    }
 
}
