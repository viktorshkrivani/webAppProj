<?php

try {
    
    require_once 'models/database.php';
    require_once 'models/users.php';

$email_address = htmlspecialchars(filter_input(INPUT_POST, "email_address"));
$password = htmlspecialchars(filter_input(INPUT_POST, "password"));
$password_hash = password_hash($password, PASSWORD_DEFAULT);


$is_logged_in = login($email_address, $password);
echo "is logged in: $is_logged_in";


include('views/login.php');


} catch (Exception $e) {
    $error_message = $e->getMessage();
    include('views/error.php');

}

