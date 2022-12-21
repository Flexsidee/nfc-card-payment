<?php 
    include "../backend/db_conn.php";
    $fetch_users = mysqli_query($conn, "SELECT * FROM students_data");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>
    <table>
        <thead>
            <th>S/N</th>
            <th>Student Name</th>
            <th>Matric Number</th>
            <th>Card Number</th>
            <th>Available Balance</th>
            <th>Date Created</th>
        </thead>
        <tb>
            <?php
            $sn = 1;
            while($res = mysqli_fetch_assoc($fetch_users)){
                echo "
                <tr>
                    <td>$sn</td>
                    <td>".$res['name']."</td>
                    <td>".$res['matric_number']."</td>
                    <td>".$res['card_number']."</td>
                    <td>".$res['balance']."</td>
                    <td>".$res['date_created']."</td>
                </tr>
                ";
                
                $sn ++;
            }
            ?>
        </tb>
    </table>
</body>

</html>