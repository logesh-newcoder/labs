<?php

    include("conn_lab_work.php");

    $sql = "CREATE TABLE lab_2 (class_id INT(10), class_info VARCHAR(600), update_date DATE );";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Table created successfully";
    } 
    else {
        echo "Error creating table: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
