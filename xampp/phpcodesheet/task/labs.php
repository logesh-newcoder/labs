<?php
    // Database connection file path
    include(__DIR__ . '/../connection/lab_work.php');    

    if (isset($_POST['truncate'])) {
        if (isset($_POST['table'])) {
            $table = $_POST['table'];

            if (!$table) {
                echo "<script>alert('Invalid table name.');</script>";
            } else {
                $truncateQuery = "UPDATE `{$table}` SET class_info = 'Sorry, No data is update in this semester.' ,update_date=CURDATE()";
                if (mysqli_query($conn, $truncateQuery)) {
                    echo "<script>alert('Table data removed successfully');
                    location.href = '../../htmlcodesheet/classtable.html';</script>";
                } else {
                    echo "<script>alert('Failed to remove table data: " . mysqli_error($conn) . "');
                    location.href = '../../htmlcodesheet/classtable.html';</script>";
                }
            }
        } else {
            echo "<script>alert('No table selected for truncation.');
                  location.href = '../../htmlcodesheet/classtable.html';</script>";
        }
    }
    mysqli_close($conn);
?>