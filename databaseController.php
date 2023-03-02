<?php

class database {
    private $serverName = "localhost";
    private $username = "root";
    private $password = "";
    private $databaseName = "edugep-data";

    public function makeConnection(){
        $conn = new mysqli($this->serverName, $this->username, $this->password, $this->databaseName);
        if($conn->connect_error)
        {
            die("Connection to DB failed !" . $conn->connect_error);
        }
    return $conn;
    }

    public function closeConnection($conn){
        mysqli_close($conn);
    }

    public function modifyTableData($table, $condition){
        $args = array_slice(func_get_args(), 2);
        $arrCount = count($args);

        if($arrCount % 2 == 0){
            exit("ERROR: insufficient arguments");
        }

        $db = $this->makeConnection();
        
        for ($i=0; $i <= $arrCount ; $i++) { 
        
            $arg1 = $args[$i];
            $arg2 = $args[$i + 1];
            $sql = "UPDATE '$table' SET '$arg1' = '$arg2' WHERE '$condition';";
            $res = $db->query($sql);
        }
        $this->closeConnection($db);
    }
}