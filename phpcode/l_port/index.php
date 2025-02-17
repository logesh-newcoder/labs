<?php
    // Database connection file path
    include(__DIR__ . '/../conn_port/l_port.php');

    // Retrieve form data and sanitize inputs
        $userid = $_POST['userid'];  
        $password = $_POST['password'];  

        $sql = "SELECT * FROM login WHERE user_id = '$userid'";
        $result = mysqli_query($conn, $sql);

        // Check if query was successful and if the user exists
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Check if password matches
            if ($password === $row['user_password'] && $userid === $row['user_id']) {
                session_start();
                $_SESSION['username'] = $userid;  
                header('Location: ../../htmlcode/index_port.php');  
                exit;
            } else {
                echo "<script>alert('Invalid username or password.');
                location.href = '../../index.html'; </script>";  
            }

        } else {
            echo "<script>alert('Invalid username or password.');
            location.href = '../../index.html'; </script>";  
        }

    mysqli_close($conn);
?>