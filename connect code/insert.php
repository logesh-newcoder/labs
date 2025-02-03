<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "lab";
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Error in connection: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO lab_5 (class_id, class_info, update_date) VALUES 
    ('101', 'info about class 101', CURDATE()), 
    ('102', 'info about class 102', CURDATE()), 
    ('103', 'info about class 103', CURDATE()), 
    ('104', 'info about class 104', CURDATE()), 
    ('105', 'info about class 105', CURDATE()), 
    ('106', 'info about class 106', CURDATE()), 
    ('107', 'info about class 107', CURDATE()), 
    ('108', 'info about class 108', CURDATE()), 
    ('109', 'info about class 109', CURDATE()), 
    ('110', 'info about class 110', CURDATE()), 
    ('111', 'info about class 111', CURDATE()), 
    ('112', 'info about class 112', CURDATE()), 
    ('113', 'info about class 113', CURDATE()), 
    ('114', 'info about class 114', CURDATE()), 
    ('115', 'info about class 115', CURDATE()), 
    ('116', 'info about class 116', CURDATE()), 
    ('117', 'info about class 117', CURDATE()), 
    ('118', 'info about class 118', CURDATE())";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
