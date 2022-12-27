<?php
include "./db_conn.php";

if(isset($_POST)){
    $matric_number= $_POST['matric_number'];
    $name= $_POST['name'];
    $card_id= $_POST['card_id'];
    $amount = $_POST['amount'];
    $password = $_POST['password'];
    
    mysqli_query($conn, "INSERT into students_data (matric_number, name, card_number, balance, password) VALUES ('$matric_number', '$name', '$card_id', '$amount', '$password' )");

    header("Location: ../Frontend/users.php");
}
?>