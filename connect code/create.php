<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "lab";
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Error in connection: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE lab_1 (
                class_id INT(10),
                class_info VARCHAR(500),
                update_date DATE
            );";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
