<?php

    include("conn_lab_class.php");

    $sql = "CREATE TABLE lab_1_class (class_id INT(10) NOT NULL , class_order VARCHAR(20) NOT NULL , class_1 INT(10) NOT NULL , class_1_name VARCHAR(100) NOT NULL , class_2 INT(10) NOT NULL , class_2_name VARCHAR(100) NOT NULL , class_3 INT(10) NOT NULL , class_3_name VARCHAR(100) NOT NULL , class_4 INT(10) NOT NULL , class_4_name VARCHAR(100) NOT NULL , class_5 INT(10) NOT NULL , class_5_name VARCHAR(100) NOT NULL , PRIMARY KEY (class_id));";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Table created successfully";
    } 
    else {
        echo "Error creating table: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
