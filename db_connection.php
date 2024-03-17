<?php
$server = '127.0.0.1';
$username = 'root';
$password = 'hashir123@';
$db_name = 'amazon_shop';
$conn = new mysqli($server, $username, $password, $db_name);
if ($conn->connect_error) {
    echo "Connection Error" . $conn->connect_error;
}
?>