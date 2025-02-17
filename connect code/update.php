<?php
            // Database connection
            $db_server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $db_name = "lab";
            $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
            if(!$conn){
                echo "Error in connection";
            }
            // Update functionality on POST request
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $selectid = filter_input(INPUT_POST, "class_id", FILTER_SANITIZE_SPECIAL_CHARS);
                $selectinfo = filter_input(INPUT_POST, "class_content", FILTER_SANITIZE_SPECIAL_CHARS);
                if (empty($selectinfo)) {
                    echo "<script>alert('Please enter the information');</script>";
                } else {
                    $stmt = $conn->prepare("UPDATE lab_1 SET class_info = ? WHERE class_id = ?");
                    $stmt->bind_param("ss", $selectinfo, $selectid);
                    if ($stmt->execute()) {
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                    $stmt->close();
                }
            }
            mysqli_close($conn);
        ?>
