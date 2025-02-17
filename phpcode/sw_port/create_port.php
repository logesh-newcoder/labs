<?php
    // Database connection file path
    include(__DIR__ . '/../conn_port/sw_port.php');    
    
    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $className = strtolower(trim($_POST['class_name'])); // Convert to lowercase for consistency
    
        if (isset($_POST['create'])) {
            // Check if the table already exists
            $checkSql = "SHOW TABLES LIKE '$className'";
            $checkResult = mysqli_query($conn, $checkSql);
    
            if (mysqli_num_rows($checkResult) > 0) {
                echo "<script>alert('Class \"$className\" already exists.');
                location.href = '../../htmlcode/work_port.php';
                </script>";
            } else {
                $sql = "CREATE TABLE `$className` (dayorder INT NOT NULL AUTO_INCREMENT , daywork TEXT NOT NULL , PRIMARY KEY (`dayorder`));";
    
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Class \"$className\" created successfully.');
                    location.href = '../../htmlcode/work_port.php';
                    </script>";
                } else {
                    echo "<script>alert('Error creating Class: " . mysqli_error($conn) . "'); 
                    location.href = '../../htmlcode/work_port.php';
                    </script>";
                }
            }
        } elseif (isset($_POST['delete'])) {
            // SQL to check if the table exists before trying to delete
            $checkSql = "SHOW TABLES LIKE '$className'";
            $checkResult = mysqli_query($conn, $checkSql);
    
            if (mysqli_num_rows($checkResult) > 0) {
                $sql = "DROP TABLE `$className`";
    
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Class \"$className\" deleted successfully.'); 
                    location.href = '../../htmlcode/work_port.php';
                    </script>";
                } else {
                    echo "<script>alert('Error deleting Class: " . mysqli_error($conn) . "'); 
                    location.href = '../../htmlcode/work_port.php';
                    </script>";
                }
            } else {
                echo "<script>alert('Class \"$className\" does not exist.'); 
                location.href = '../../htmlcode/work_port.php';
                </script>";
            }
        }
    }
    
    mysqli_close($conn);
?>
