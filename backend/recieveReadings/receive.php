<?php
    //include the file with the database connection
    include "../db_conn.php";
    
    //this must be the same api key with the one in the arduino
    $api_key = "somade_daniel";

    //check if the api key declared up is the same with the one from microcontroller
    if($api_key == strval($_GET["apikey"])){
        //check is method of recieving data is GET
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            //get all the readings from the microcontroller
            $card_number = sanitizeInput($_GET["card_number"]);
    
            //query to insert the data into the database
            $sql = "INSERT INTO input_card (card_number) VALUES ('.$card_number.')";
            
            //check if data is inserted properly into the database
            if($conn->query($sql) === TRUE){
                echo "New record created successfully";
            }else{
                echo "Error: ". $sql . "<br>" . $conn->error;
            }
    
            $conn->close();
        } else{
            echo "No GET data sent to the page";
        }
    }else{
        echo "Incorrect Api Key which = ".strval($_GET["apikey"]);
    }
    
    
    //this function is used to do a little sanitizing of user input
    function sanitizeInput($input){
       return htmlspecialchars(stripslashes(trim($input)));
        
    }

?>