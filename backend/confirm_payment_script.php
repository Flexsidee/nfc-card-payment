<?php
include "./db_conn.php";


// Check for a record
$result = mysqli_query($conn, "SELECT * from payment where reads_card=0 ORDER BY `payment`.`payment_id` DESC LIMIT 1");
$row = $result->fetch_assoc();

if (!$row) {
  // Record was found
  $response = array("status" => "success", "message" => "Payment successful");
}

// Return the response as JSON
echo json_encode($response);

?>