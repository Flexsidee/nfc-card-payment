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
    <title>Caleb Payment Service | User Management</title>
    <link rel="stylesheet" href="./styles/users.css" />
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
                <h1>Users Management</h1>
                <a href="newuser.php">
                    <p>Create New User</p>
                    <i class="fa-solid fa-user-plus"></i>
                </a>
                <!-- <form action="" method="get" class="searchbar">
                    <input type="text" placeholder="User ID" name="usersearch" id="search" />
                    <button type="submit" onclick="openpage()">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form> -->
            </div>
            <div class="logtable">
                <table>
                    <tr id="header">
                        <th>S/N</th>
                        <th>Student Name</th>
                        <th>Matric Number</th>
                        <th>Card Number</th>
                        <th>Available Balance</th>
                        <th>Date Created</th>
                    </tr>

                    <?php
					include "../backend/db_conn.php";
    				$fetch_users = mysqli_query($conn, "SELECT * FROM students_data where matric_number != 'Admin'");
					
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

                    <!-- <tr class="user_details">
                        <td id="serial_number">1</td>
                        <td id="user_name">Eseoghene Paul Eziemefe</td>
                        <td id="user_id">20/7717</td>
                        <td id="signal">
                            <label class="switch">
                                <input type="checkbox" />
                                <span class="slider"></span>
                                <span class="slider2"></span>
                            </label>
                        </td>
                        <td id="total_amount">60000</td>
                    </tr> -->
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    const userdata = document.querySelector("[userdata]");

    function openpage() {
        if (x !== y) {}
    }
    </script>
</body>

</html>

<?php 
}else{
	header("location: ./index.php");
} 
?>