<?php
    $host = "localhost";
    $username = "root";
    $password = "rahasia";
    $database = "case 4";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

