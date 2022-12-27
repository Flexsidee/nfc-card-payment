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
    <title>Caleb Payment Service | Create New User</title>
    <link rel="stylesheet" href="./styles/newuser.css" />
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
                <h1>Create New User</h1>
            </div>
            <form action="../backend/create_user.php" method="POST">
                <div class="form-box">
                    <h1>Enter User Details</h1>
                    <p>Matric Number</p>
                    <div class="input-box">
                        <div class="inputs">
                            <input type="text" placeholder="Enter Student Matric Number" name="matric_number" />
                        </div>
                    </div>
                    <p>Students Name</p>
                    <div class="input-box">
                        <div class="inputs">
                            <input type="text" placeholder="Enter Student Full Name" name="name" />
                        </div>
                    </div>
                    <p>Card ID</p>
                    <div class="input-box">
                        <div class="inputs">
                            <input type="text" name="card_id" placeholder="Enter Student card id" />
                        </div>
                    </div>
                    <p>Starting Amount</p>
                    <div class="input-box">
                        <div class="inputs">
                            <input type="number" name="amount" placeholder="Enter Amount Paid" class="number" />
                        </div>
                    </div>

                    <p>Password</p>
                    <div class="input-box">
                        <div class="inputs">
                            <input type="text" name="password" placeholder="Enter password" class="number" />
                        </div>
                    </div>

                    <button type="submit" class="login-btn">Create User</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php 
}else{
	header("location: ./index.php");
} 
?>