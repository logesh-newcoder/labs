<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="top">
            <h2>LAB FINDER</h2>
        </div>    
    </header> 

    <nav>
        <ul>
            <li><a href="lab_html/lab_1.php">GOSLING LAB</a></li>
            <li><a href="lab_html/lab_2.php">LINUS LAB</a></li>
            <li><a href="lab_html/lab_3.php">GATES LAB</a></li>
            <li><a href="lab_html/lab_4.php">RITCHIE LAB</a></li>
            <li><a href="lab_html/lab_5.php">JOBS LAB</a></li>
            <li class="labs" onclick="loadIncharge()"><a>INCHARGE</a></li>
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

    <div class="id">
    <?php
        // Start session
        session_start();

        // Check if user is logged in
        if (!isset($_SESSION['username'])) {
          header('Location: new.html');
          exit;
        }

        echo '<input type="hidden" id="id" value="' . $_SESSION['username'] . '">';
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>