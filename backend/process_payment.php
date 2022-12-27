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
            // $amount_to_pay = 400; //statically put the amount for testing, will be corrected later
    
            //check the database for the record of the owner of the card
            $fetch_sql = "SELECT * FROM students_data where card_number='$card_number'";
            $fetch_res = mysqli_query($conn, $fetch_sql);

            if(mysqli_num_rows($fetch_res) > 0){
                while($card = mysqli_fetch_assoc($fetch_res)){
                    $card_balance = $card['balance'];
                    $card_new_balance= $card_balance;
                    
                    $check_transation = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from payment where reads_card=0 ORDER BY `payment`.`payment_id` DESC LIMIT 1"));
                    if(!is_null($check_transation)){
                        
                        $amount_to_pay = $check_transation['amount'];
                        $transaction_id = $check_transation['transaction_id'];
                        
                        if($payment_type == "debit"){
                            if($card_balance < $amount_to_pay){
                                echo "Insufficient fund, balance = #".$card_new_balance;
                            }else{
                                $card_new_balance = $card_balance - $amount_to_pay;
                                updateBalance($conn, $card_number, $amount_to_pay, $card_balance, $card_new_balance, "Payment is successful", "1", $transaction_id );
                            }
                        }else{
                            $card_new_balance = $card_balance + $amount_to_pay;
                            updateBalance($conn, $card_number, $amount_to_pay, $card_balance, $card_new_balance, "Account credidted", "0", $transaction_id );
                        }
                    }else{
                        echo "No amount stated";
                    }
                }
            }else{
                echo "Card not registered";
            }
            
            $conn->close();
        } else{
            echo "Invalid method of sending data";
        }
    }else{
        echo "Incorrect Api Key which = ".strval($_GET["apikey"]);
    }
    
    
    //this function is used to do a little sanitizing of user input
    function sanitizeInput($input){
       return htmlspecialchars(stripslashes(trim($input)));
        
    }

    function updateBalance($dbConn, $cardNumber, $amount, $previousBalance, $currentBalance, $returnMessage, $transactionType, $transactionId){
        //update database with new balance
        $update_sql = "UPDATE students_data SET balance='$currentBalance' where card_number='$cardNumber'";
        $log_update = "INSERT into logs (card_number, transaction_type, amount, previous_balance, balance) VALUEs ('$cardNumber', '$transactionType','$amount', '$previousBalance', '$currentBalance')";
        $transaction_update = "UPDATE payment SET reads_card=1 where transaction_id='$transactionId'";

        //check if updating of balance worked
        if($dbConn->query($update_sql) === TRUE && $dbConn->query($log_update) === TRUE && $dbConn->query($transaction_update)){
            echo $returnMessage.", new balance= #".$currentBalance;
        }else{
            echo "Error: ". $update_sql . "<br>" . $dbConn->error;
        }
    }
?>