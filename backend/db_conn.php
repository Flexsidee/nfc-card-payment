<?php
    //set configuration to the database
    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "nfc_payment";
    
    //start connection to the database
    $conn = new mysqli($host, $user, $password, $db_name);
    
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
?>