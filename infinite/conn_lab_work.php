<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "lab";

    // $db_server = "sql309.infinityfree.com";
    // $db_user = "if0_37959519";
    // $db_pass = "3UxpqLGGD2D";
    // $db_name = "if0_37959519_lab";

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("<p>Error: Could not connect to database. " . mysqli_connect_error() . "</p>");
    }
    
?>