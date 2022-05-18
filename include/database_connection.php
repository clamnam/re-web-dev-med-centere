<?php
$servername = "localhost";
$dbname = "medical_centre";
$username = "root";
$password = "";



try{
    $connection = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();

    }
?>