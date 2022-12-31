<?php 
include "./db_conn.php";

// Check if the form has been submitted
if (isset($_POST) && isset($_POST['password'])) {
  // Get the form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check the credentials against the database
  $result = mysqli_query($conn, "SELECT * FROM students_data WHERE matric_number = '$username'");
  if(mysqli_num_rows($result)==1){
        $rec=mysqli_fetch_assoc($result);
        $dbpword=$rec['password'];
        if($password === $dbpword){
            session_start();
            $_SESSION['username']=$rec['matric_number'];
            $_SESSION['logged_in'] = true;
            if($rec['name'] == "admin"){
                header("Location: ../Frontend/dashboard.php");
            }else{
                header("Location: ../Frontend/students");
            }
        } else{
            header("location: ../Frontend/index.php?err=Invalid Login Details!!");
            echo "Invalid login detail";
            die();
        } 
    }else{
        header("location: ../Frontend/index.php?err=User does not exist!!");
        die();
    }
}

?>