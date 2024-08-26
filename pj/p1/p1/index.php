<?php


$data_source_name = 'mysql:host=localhost;dbname=stock';
$username = 'stockuser';
$password = 'test';

try{
    $database = new PDO($data_source_name, $username, $password);
    echo "<p>Database connection successful</p>";
} catch (Exception $e){
    
    $error_message = $e->getMessage();
    echo "<p>Error message: $error_message </p>";

}
?>
<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php

?>
</body>
</html>
