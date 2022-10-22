<?php

$servername = getenv('DIABETES_SERVER');
$dbname = getenv('DIABETES_DATABASE');
$user = getenv('DIABETES_USER');
$password = getenv('DIABETES_PASSWORD');

$conn = new mysqli($servername, $user, $password, $dbname);

if ($conn->connect_error) {
    echo "connection failed";
    die("Connection failed: " . $conn->connect_error);
}

?>