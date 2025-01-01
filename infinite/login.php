<?php
    // Database configuration
    $db_server = "sql309.infinityfree.com";
    $db_user = "if0_37959519";
    $db_pass = "3UxpqLGGD2D";
    $db_name = "if0_37959519_lab_login";

    // Connect to the database
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("<p>Error: Could not connect to database. " . mysqli_connect_error() . "</p>");
    }

    // Retrieve form data and sanitize inputs
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $password = $_POST['password'];  

    $sql = "SELECT * FROM lablogin WHERE id = '$position'";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful and if the user exists
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check if password matches
        if ($password === $row['password']) {
            session_start();
            $_SESSION['username'] = $position;  
            header('Location: person-position/index.php');  
            exit;
        } else {
            echo "<script>alert('Invalid password.');
            location.href = 'index.html'; </script>";  
        }

    } else {
        echo "<script>alert('Invalid username or password.');
        location.href = 'index.html'; </script>";  
    }

    // Close the connection
    mysqli_close($conn);
?>
