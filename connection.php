<?php

$host = "localhost";
$user = "root";
$password = "your_password";
$db = "your_db";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn)
{
    die("Failed to connect to MySQL.");
}
