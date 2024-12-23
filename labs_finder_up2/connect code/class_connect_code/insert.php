<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "lab";
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Error in connection: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO lab_1_class(class_id, dayorder, class_names1, class_names2) VALUES 
    ('101','MON','II BSC IT','III BCA'),
    ('102','TUE','III BCA','I BCOM'),
    ('103','WED','III BSC CS A','II BSC MAT'),
    ('104','THU','III BSC CS B','III BSC CS A'),
    ('105','FRI','III BSC.IT','III BSC CS B'),
    ('106','SAT','I BCOM CA','III BSC IT'); ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
