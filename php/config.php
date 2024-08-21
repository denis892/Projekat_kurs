<?php
$db_host = 'localhost';
$port = '3308';  
$db_user = 'root';
$db_password = '';
$db_name = 'online_kurs';


$conn = new mysqli($db_host, $db_user, $db_password, $db_name, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>