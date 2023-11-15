<?php
$dsn = 'mysql:host=localhost;dbname=ecommerce_website';
$username = 'root';
$password = 'sesame';

try{
    $db = new PDO($dsn, $username, $password);
}catch (PDOException $e){
    $error = "Database Error: ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
}


?>