<?php

//database server type, location, database name
$data_source_name = 'mysql:host=localhost; dbname=stock';
$username =  'stockuser';
$password = 'test';
$database = new PDO($data_source_name, $username, $password);
   