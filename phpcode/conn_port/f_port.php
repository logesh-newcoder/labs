<?php
    $db_server = "sql104.infinityfree.com";
    $db_user = "if0_38234885";
    $db_pass = "wxqagkBTNepnL";
    $db_name = "if0_38234885_lab_l_f";

    // Connect to the database
    $conn1 = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn1) {
        die("<p>Error: Could not connect to database. " . mysqli_connect_error() . "</p>");
    }

?>
