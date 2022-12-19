<?php
    //include the file with the database connection
    include "./db_conn.php";
    
    //this must be the same api key with the one in the arduino
    $api_key = "somade_daniel";

    //check if the api key declared up is the same with the one from microcontroller
    if($api_key == strval($_GET["apikey"])){
        //check is method of recieving data is GET
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            //get all the readings from the microcontroller
            $card_number = sanitizeInput($_GET["card_number"]);
            $payment_type = sanitizeInput($_GET["paymentType"]);
    
            //check the database for the record of the owner of the card
            $fetch_sql = "SELECT * FROM students_data where card_number='$card_number'";
            $fetch_res = mysqli_query($conn, $fetch_sql);

            while($card = mysqli_fetch_assoc($fetch_res)){
                $card_balance = $card['balance'];
                //get the amount and set the new card balance
                $amount_to_pay = 1000; //statically put the amount for testing, will be corrected later
                $card_new_balance= 0;
                
                if($payment_type == "debit"){
                    $card_new_balance = $card_balance - $amount_to_pay;
                }else{
                    $card_new_balance = $card_balance + $amount_to_pay;
                }
                
                //update database with new balance
                $update_sql = "UPDATE students_data SET balance='$card_new_balance' where card_number='$card_number'";

                //check if updating of balance worked
                if($conn->query($update_sql) === TRUE){
                    echo "Payment is successfull, balcance = ".$card_new_balance;
                }else{
                    echo "Error: ". $sql . "<br>" . $conn->error;
                }
            }
           
            
    
            // $conn->close();
        } else{
            echo "Method of";
        }
    }else{
        echo "Incorrect Api Key which = ".strval($_GET["apikey"]);
    }
    
    
    //this function is used to do a little sanitizing of user input
    function sanitizeInput($input){
       return htmlspecialchars(stripslashes(trim($input)));
        
    }

?>