<?php
    // Database connection file path
    include(__DIR__ . '/../conn_port/dw_port.php');    

    if (isset($_POST['truncate'])) {
        if (isset($_POST['table'])) {
            $table = $_POST['table'];
            date_default_timezone_set('Asia/Kolkata'); 
            $date = date("Y-m-d");     

            if (!$table) {
                echo "<script>alert('Invalid Class name.');</script>";
            } else {
                $truncateQuery = "UPDATE `{$table}` SET class_info = 'Sorry, No data is update in this semester.' ,update_date= '$date';";
                if (mysqli_query($conn, $truncateQuery)) {
                    echo "<script>alert('Class data removed successfully');
                    location.href = '../../htmlcode/lab_access_port.php'; 
                    </script>";
                } else {
                    echo "<script>alert('Failed to remove Class data: " . mysqli_error($conn) . "');
                    location.href = '../../htmlcode/lab_access_port.php'; 
                    </script>";
                }
            }
        } else {
            echo "<script>alert('No Class selected for truncation.');
            location.href = '../../htmlcode/lab_access_port.php'; 
            </script>";
        }
    }
    
    mysqli_close($conn);
?>