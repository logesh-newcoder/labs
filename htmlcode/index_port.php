<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Finder</title>
    <link rel="stylesheet" href="../style_codes/head_foot1.css">
    <link rel="stylesheet" href="../style_codes/main2.css">
</head>
<body>

    <header>
        <div class="top">
            <h2>LAB FINDER</h2>
            
            <a href="../index.html">
                <img src="../image/logout.png">
            </a>
        </div>    
    </header> 

    <nav>
        <ul>
            <li>
                <a href="lab_port1.php">Gosling Lab</a>
            </li>
            <li>
                <a href="lab_port2.php">Linus Lab</a>
            </li>
            <li>
                <a href="lab_port3.php">Gates Lab</a>
            </li>
            <li>
                <a href="lab_port4.php">Ritchie Lab</a>
            </li>
            <li>
                <a href="lab_port5.php">Jobs Lab</a>
            </li>
            <li>
                <a href="work_port.php">Work Assign</a>
            </li>
            <li class="labs" onclick="loadIncharge()">
                <a>Incharge</a>
            </li>
        </ul>
    </nav>

    <footer>
        <div class="footer">
            <div class="copy">
                &copy; 2024 Lab Finder.
            </div>
            
            <div class="details">
                Developed By : LOGESH, BSC.CS, 2022 - 2025 
            </div>    
        </div>
    </footer>

    <!-- Start session for person id pass in the portal access -->
    <div class="id">
        <?php
            session_start();
            if (!isset($_SESSION['username']))// Check if user is logged in
            {
              exit;
            }
            echo '<input type="hidden" id="id" value="' . $_SESSION['username'] . '">';
        ?>
    </div>

    <script src="../script_codes/script2.js"></script>
</body>
</html>