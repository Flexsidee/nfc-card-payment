<?php 
session_start();
if(isset($_SESSION['username'])){
    $logged_in_user = $_SESSION['username'];
    include "../../backend/db_conn.php";
    $fetch_user_balance = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students_data where matric_number='$logged_in_user'"));
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link rel="stylesheet" href="./index.css" />
</head>

<body>
    <div class="main">
        <div class="head">
            <a href="#" class="logo">Caleb Food Service</a>
            <div>
                <p>User: <?php echo $logged_in_user; ?></p>
                <a href="../../backend/process_logout.php" style="margin-left: 5px;">
                    <button
                        style="background-color: red;color: white; padding: 5px 20px; border-radius: 5px; border: none; font-weight: bold; cursor: pointer;">
                        Logout
                    </button>
                </a>
            </div>
        </div>
        <div class="amount_container">
            <h1>Account Balance:
                <a href="#">
                    #<?php echo $fetch_user_balance['balance']; ?>
                </a>
            </h1>
        </div>
        <div class="logtable">
            <table>
                <tr id="header">
                    <th>No</th>
                    <th>Name</th>
                    <th>Transaction Type</th>
                    <th>Previous Balance</th>
                    <th>Amount</th>
                    <th>Current Balance</th>
                    <th>Time of event</th>
                </tr>

                <?php
                $fetch_logs = mysqli_query($conn, "SELECT t1.log_id, t1.card_number, t2.name, t2.matric_number, t1.transaction_type, t1.amount, t1.previous_balance, t1.balance, t1.time FROM `logs`as t1 LEFT JOIN students_data as t2 on t1.card_number = t2.card_number WHERE matric_number='$logged_in_user'");

                $sn = 1;
                while($res = mysqli_fetch_assoc($fetch_logs)){
                ?>
                <tr>
                    <td><?php echo $sn; ?></td>
                    <td><?php echo $res['name']; ?></td>
                    <td><?php echo ($res['transaction_type'] == '0') ? "Credit" : "Debit" ; ?></td>
                    <td><?php echo $res['previous_balance']; ?></td>
                    <td><?php echo $res['amount']; ?></td>
                    <td><?php echo $res['balance']; ?></td>
                    <td><?php echo $res['time']; ?></td>
                </tr>
                <?php $sn ++; } ?>
            </table>

            <!-- <div style="display: flex; justify-content: center; margin-top: 20px; ">
                <button
                    style="background-color: red; padding: 5px 20px; border-radius: 5px; border: none; font-size: 120%;">
                    <a href="../../backend/process_logout.php" style="font-weight: bold;">Logout</a>
                </button>
            </div> -->
        </div>
    </div>
</body>

</html>

<?php 
}else{
	header("location: ./index.php");
} 
?>