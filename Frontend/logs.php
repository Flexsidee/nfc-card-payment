<?php 
    include "../backend/db_conn.php";
    $fetch_logs = mysqli_query($conn, "SELECT t1.log_id, t1.card_number, t2.name, t2.matric_number, t1.transaction_type, t1.amount, t1.balance, t1.time FROM `logs`as t1 LEFT JOIN students_data as t2 on t1.card_number = t2.card_number;");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
</head>

<body>
    <table>
        <thead>
            <th>S/N</th>
            <th>Student Name</th>
            <th>Matric Number</th>
            <th>Card Number</th>
            <th>Transaction Type</th>
            <th>Amount</th>
            <th>Balance</th>
            <th>Time of event</th>
        </thead>
        <tb>
            <?php
            $sn = 1;
            while($res = mysqli_fetch_assoc($fetch_logs)){
                echo "
                <tr>
                    <td>$sn</td>
                    <td>".$res['name']."</td>
                    <td>".$res['matric_number']."</td>
                    <td>".$res['card_number']."</td>
                    <td>".$res['transaction_type']."</td>
                    <td>".$res['amount']."</td>
                    <td>".$res['balance']."</td>
                    <td>".$res['time']."</td>
                </tr>
                ";
                
                $sn ++;
            }
            ?>
        </tb>
    </table>
</body>

</html>