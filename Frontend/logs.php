<?php 
session_start();

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Caleb Payment Service | Logs</title>
    <link rel="stylesheet" href="./styles/logs.css" />
    <script src="https://kit.fontawesome.com/bef2386e82.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header">
        <div class="side-nav">
            <a href="#" class="logo">Caleb Payment Service</a>
            <ul class="nav-links">
                <li>
                    <a href="dashboard.php"><i class="fa-solid fa-gauge"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="funduser.php"><i class="fa-solid fa-money-bill-transfer"></i>
                        <p>Make Payment</p>
                    </a>
                </li>
                <li>
                    <a href="users.php"><i class="fa-solid fa-users"></i>
                        <p>User Management</p>
                    </a>
                </li>
                <li>
                    <a href="logs.php"><i class="fa-solid fa-book"></i>
                        <p>Logs</p>
                    </a>
                </li>
                <div class="logout">
                    <a href="../backend/process_logout.php">
                        <p>Log-Out</p>
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                </div>
            </ul>
        </div>
        <div class="main">
            <div class="head">
                <h1>Logs</h1>
            </div>
            <div class="logtable">
                <table>
                    <tr id="header">
                        <th>S/N</th>
                        <th>Student Name</th>
                        <th>Matric Number</th>
                        <th>Card Number</th>
                        <th>Transaction Type</th>
                        <th>Previous Balance</th>
                        <th>Amount</th>
                        <th>Current Balance</th>
                        <th>Time of event</th>
                    </tr>

                    <?php
					include "../backend/db_conn.php";
					$fetch_logs = mysqli_query($conn, "SELECT t1.log_id, t1.card_number, t2.name, t2.matric_number, t1.transaction_type, t1.amount, t1.previous_balance, t1.balance, t1.time FROM `logs`as t1 LEFT JOIN students_data as t2 on t1.card_number = t2.card_number;");
	
					$sn = 1;
					while($res = mysqli_fetch_assoc($fetch_logs)){
					?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $res['name']; ?></td>
                        <td><?php echo $res['matric_number']; ?></td>
                        <td><?php echo $res['card_number']; ?></td>
                        <td><?php echo ($res['transaction_type'] == '0') ? "Credit" : "Debit" ; ?></td>
                        <td><?php echo $res['previous_balance']; ?></td>
                        <td><?php echo $res['amount']; ?></td>
                        <td><?php echo $res['balance']; ?></td>
                        <td><?php echo $res['time']; ?></td>
                    </tr>
                    <?php $sn ++; } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
}else{
	header("location: ./index.php");
} 
?>