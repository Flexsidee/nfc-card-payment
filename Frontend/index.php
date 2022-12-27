<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Caleb Payment Service | Login Page</title>
    <link rel="stylesheet" href="./styles/index.css" />
    <script src="https://kit.fontawesome.com/bef2386e82.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="content">
        <p class="logo">Caleb Payment Service</p>
        <div class="form-box">
            <h1>Login Here!</h1>
            <p style="color: red; text-align:center;">
                <?php 
				if(isset($_GET['err'])) echo $_GET['err']; 
			?></p>
            <form action="../backend/process_login.php" method="POST">
                <div class="input-box">
                    <div class="inputs">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" name="username" placeholder="Username" />
                    </div>
                </div>
                <div class="input-box">
                    <div class="inputs">
                        <i class="fa-solid fa-unlock"></i>
                        <input type="password" name="password" placeholder="Password" id="input" />
                        <span class="eye" onclick="myFunction()">
                            <i id="hide1" class="fa fa-eye"></i>
                            <i id="hide2" class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("input");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");

        if (x.type === "password") {
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
    </script>
</body>

</html>