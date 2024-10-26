<?php

$servername = "localhost";
$username = "root";
$passowrd = "";
$dbname = "quizapp";

$conn = new mysqli($servername, $username, $passowrd, $dbname);

if ($conn->connect_error) {
    echo "Failed to connect";
}
