<?php

try{
    
require_once 'models/database.php';
require_once 'models/transactions.php';
require_once 'models/users.php';
require_once 'models/stocks.php';
    
    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));
    
    
    $id = htmlspecialchars(filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT)); 
    $user_id = htmlspecialchars(filter_input(INPUT_POST, "user_id", FILTER_VALIDATE_INT));
    $stock_id = htmlspecialchars(filter_input(INPUT_POST, "stock_id", FILTER_VALIDATE_INT));
    $quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_FLOAT); //decimal place
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT); //decimal place
    
    
    if ( $user_id != "0" && $stock_id != 0 && $quantity != 0) {
    $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');

    if ( $insert_or_update == "insert") {
        
        $users = list_users();
        $user_name = "";
        $user_email_address = "";
        $users_cash_balance = 0;
            foreach ( $users as $user ) {
              if ( $user['id'] == $user_id ) {
                  $user_name = $user['name'];
                  $user_email_address = $user['email_address'];
                   $users_cash_balance = $user['cash_balance'];
            }
        }
        
         $stocks = list_stocks();
            $stock_price = 0;
            foreach ($stocks as $stock ) {
                if ( $stock['id'] == $stock_id) {
                    $stock_price = $stock['current_price'];
                }
            }

               $total_cost = $stock_price * $quantity;

               if ( $users_cash_balance >= $total_cost) {
                   insert_transaction($user_id, $stock_id, $quantity, $stock_price);
                   $new_balance = $users_cash_balance - $total_cost;
                   update_user($user_name, $email_address, $new_balance);
                   
               } else {
                   $error_message = "No Money.";
                   include('views/error.php');
               }
        
        
    } else if ( $insert_or_update == "update") {
        update_transaction($user_id, $stock_id, $quantity, $price);
    }

    header("Location: transactions.php");
    } else if ($action == "delete" && $id != 0 ) {
    delete_transaction($id);
    header("Location: transactions.php");
    } else if ( $action != "" ) {
    $error_message = "Missing stock_id, user_id, or quantity";
    include('views/error.php');
    }

    $transactions = list_transactions();
    include('views/transactions.php');
    
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include ('views/error.php');
}





