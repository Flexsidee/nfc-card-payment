<?php 
include "./db_conn.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $amount = $_POST['amount']; //get the amount from the form
    $transaction_id = time();
    $reads_card = 0; //card read is false here

    mysqli_query($conn, "INSERT into payment (transaction_id, amount, reads_card) VALUES ('$transaction_id', '$amount', '0')");

    header("Location: ../Frontend/approved_transaction_page.html");
}
?>