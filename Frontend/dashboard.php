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
    <title>Caleb Payment Service | Dashboard</title>
    <link rel="stylesheet" href="./styles/dashboard.css" />
    <script src="https://kit.fontawesome.com/bef2386e82.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Task", "Users", {
                role: "style"
            }],
            ["Active Users", 3950, "#134f84"],
            ["Inactive Users", 1410, "#2c9c41"],
        ]);

        var options = {
            title: "Users",
            width: 600,
            height: 400,
            bar: {
                groupWidth: "95%"
            },
        };

        var chart = new google.visualization.PieChart(
            document.getElementById("piechart")
        );

        chart.draw(data, options);
    }
    </script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Days", "Purchases", {
                role: "style"
            }],
            ["Week 1", 3654, "#2c9c41"],
            ["Week 2", 2234, "#134f84"],
            ["Week 3", 5342, "#10286e"],
            ["Week 4", 1234, "color: #e5e4e2"],
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([
            0,
            1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation",
            },
            2,
        ]);

        var options = {
            title: "Purchases This Month",
            width: 600,
            height: 400,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.BarChart(
            document.getElementById("barchart_values")
        );
        chart.draw(view, options);
    }
    </script>
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
                <h1>Dashboard</h1>
            </div>
            <div class="content">
                <h1>Overview</h1>
                <div class="cards_wrapper">
                    <a href="users.php">
                        <div class="card">
                            <h2><i class="fa-solid fa-users-viewfinder"></i>Total Users</h2>
                            <p class="users" id="users">5360</p>
                        </div>
                    </a>
                    <a href="users.php">
                        <div class="card">
                            <h2><i class="fa-solid fa-users-gear"></i>Active Users</h2>
                            <p class="activeUsers" id="activeUsers">3950</p>
                        </div>
                    </a>
                    <a href="newuser.php">
                        <div class="card">
                            <h2><i class="fa-solid fa-user-clock"></i>New Users</h2>
                            <p class="newUsers" id="newUsers">102</p>
                        </div>
                    </a>
                    <a href="logs.php">
                        <div class="card">
                            <h2><i class="fa-solid fa-address-book"></i>New Logs</h2>
                            <p class="newLogs" id="newLogs">567</p>
                        </div>
                    </a>
                </div>
                <div class="stats">
                    <h1>Stats</h1>
                </div>

                <div class="chartlay">
                    <div id="barchart_values" class="charts"></div>
                    <div id="piechart" class="charts"></div>
                </div>
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