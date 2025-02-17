<?php
    // Database connection file path
    include(__DIR__ . '/../conn_port/f_port.php');    

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['freeze'])) {
        if (!empty($_POST['date'])) {
            $selectedDate = $_POST['date'];

            // Sanitize the input to prevent SQL injection
            $selectedDate = mysqli_real_escape_string($conn1, $selectedDate);
            $sql1 = "UPDATE freeze SET deadline='$selectedDate' WHERE id = 101";
            $res1 = mysqli_query($conn1, $sql1);

            if ($res1) {
                echo "<script>
                alert('Date is updated successfully!');
                location.href = '../../htmlcode/lab_access_port.php'; 
                </script>";
            } else {
                echo "<script>
                alert('Failed to update the date.');
                location.href = '../../htmlcode/lab_access_port.php'; 
                </script>";
            }
        } else {
            echo "<script>
            alert('No date selected!');
            location.href = '../../htmlcode/lab_access_port.php'; 
          </script>";
        }
    }

    mysqli_close($conn1);
?>
