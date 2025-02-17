<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "labs";

    // Connect to the database
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("<p>Error: Could not connect to database. " . mysqli_connect_error() . "</p>");
    }

?>