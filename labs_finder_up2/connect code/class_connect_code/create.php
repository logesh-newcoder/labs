<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "lab";
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Error in connection: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE lab_1_class (class_id int , dayorder varchar(15),class_names1 varchar (50),class_names2 varchar (50));";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
