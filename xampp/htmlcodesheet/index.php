<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Finder</title>
    <link rel="stylesheet" href="../stylesheet/style2.css">
</head>
<body>
    <header>
        <div class="top">
            <h2>LAB FINDER</h2>
            <a href="../index.html"><img src="../imgsheet/logout.png"></a>
        </div>    
    </header> 

    <nav>
        <ul>
            <li><a href="lab1.php">GOSLING LAB</a></li>
            <li><a href="lab2.php">LINUS LAB</a></li>
            <li><a href="lab3.php">GATES LAB</a></li>
            <li><a href="lab4.php">RITCHIE LAB</a></li>
            <li><a href="lab5.php">JOBS LAB</a></li>
            <li><a href="work.php">WORK ASSIGN</a></li>
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
        <a href="classtable.html"></a>
    </footer>

    <div class="id">
        <?php
            session_start();// Start session

            if (!isset($_SESSION['username']))// Check if user is logged in
            {
              exit;
            }
            echo '<input type="hidden" id="id" value="' . $_SESSION['username'] . '">';
        ?>
    </div>
<script src="../scriptsheet/script1.js"></script>
</body>
</html>