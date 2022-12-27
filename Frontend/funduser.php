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
    <title>Caleb Payment Service | Fund User</title>
    <link rel="stylesheet" href="./styles/funduser.css" />
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
                    <a href="logs.php"><i class="fa-solid fa-book"></i>
                        <p>Logs</p>
                    </a>
                </li>
                <li>
                    <a href="users.php"><i class="fa-solid fa-users"></i>
                        <p>User Management</p>
                    </a>
                </li>
                <li>
                    <a href="funduser.php"><i class="fa-solid fa-money-bill-transfer"></i>
                        <p>Fund User</p>
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
                <h1>Fund User</h1>
            </div>
            <div class="form-box">
                <h1>Enter Funding Requirements</h1>
                <p>User ID</p>
                <div class="input-box">
                    <div class="inputs">
                        <input type="text" placeholder="Enter User ID" />
                    </div>
                </div>
                <p>Payment Made</p>
                <div class="input-box">
                    <div class="inputs">
                        <input type="number" placeholder="Enter Payment Made By User" />
                    </div>
                </div>
                <a href="#"><button type="button" class="login-btn">Fund User</button></a>
            </div>
        </div>
    </div>
    <script src="users.js"></script>
</body>

</html>

<?php 
}else{
	header("location: ./index.php");
} 
?>