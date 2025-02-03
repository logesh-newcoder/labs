<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "lab";
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Error in connection: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM lab_2;";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo $row["class_id"] . " " . $row["class_info"] . " " . $row["update_date"] . "<br>";
            }
        } else {
            echo "No records found.";
        }
    } else {
        echo "Error in query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
