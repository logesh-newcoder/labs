<?php
session_start(); // Start the session at the top of the file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Work Assigner</title>
    <link rel="stylesheet" href="../style_codes/head_foot1.css">
    <link rel="stylesheet" href="../style_codes/main4.css">
</head>
<body>
    
    <header>
        <div class="top">
            <h2>LAB FINDER</h2>

            <div class="img">
                <a href="index_port.php"><img src="../image/home icon.png" alt="home"></a>
                <a href="../index.html"><img src="../image/logout.png" alt="logout"></a>
            </div>
        </div>    
    </header> 

    <main>
        <div class="form">
            <div class="create">
                <form action="../phpcode/sw_port/create_port.php" method="POST">
                    <h3>Add And Delete A Class</h3>
                   
                    <div class="lable">
                        <label for="class">Class Name:
                            <input type="text" name="class_name" placeholder="Enter the class name" required>
                        </label>
                    </div>
                        
                    <div class="button">
                        <input type="submit" name="create" value="Create">          
                        <input type="submit" name="delete" value="Delete">
                    </div>
                </form>
            </div>
            
            <div class="import">
                <?php
                    include("../phpcode/sw_port/import_port.php")
                ?>
            </div>

            <div class="search">
                <?php
                    include("../phpcode/sw_port/search_port.php")
                ?>
            </div>
        </div>
    </main>
    
    <input type="hidden" id="idpos" value="<?php echo $_SESSION['username']; ?>" readonly> 

    <script src="../script_codes/script4.js"></script>
</body>
</html>