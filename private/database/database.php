<?php

require_once('db-credentials.php');

function db_connect(){

//PDO Connection
// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
//     }
// catch(PDOException $e)
//     {
//     echo $sql . "<br>" . $e->getMessage();
//     }

// $conn = null;

//MYSQLI Connection
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
db_confirm_connect();
return $connection;
}

function db_close($connection){
    if(isset($connection)){
        mysqli_close($connection);
    }
}

function db_confirm_connect(){
    if(mysqli_connect_errno()){
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .=" (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

function confirm_result_set($result_set){
    if(!$result_set){
        exit("Database query failed!");
    }
}

?>