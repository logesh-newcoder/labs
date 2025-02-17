<?php
session_start(); // Start the session at the top of the file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB WORK ASSIGN</title>
    <link rel="stylesheet" href="../stylesheet/style3.css">
    <link rel="stylesheet" href="../stylesheet/style5.css">
</head>
<body>
    <header>
        <div class="top">
            <h2>LAB FINDER</h2>
            <div class="img">
                <a href="index.php"><img src="../imgsheet/home icon.png" alt="home"></a>
                <a href="../index.html"><img src="../imgsheet/logout.png" alt="logout"></a>
            </div>
        </div>    
    </header> 

    <div class="heads">
        <div class="form">
            <div class="create">
                <form action="../phpcodesheet/workassign_csv/create.php" method="POST">
                <h2 style="text-align: center; margin: 0.5rem auto;">ADD AND DELETE A CLASS</h2>
                    <div class="lable">
                        <label for="class">CLASS NAME:
                            <input type="text" name="class_name" placeholder="Enter the class name" required>
                        </label>
                    </div>
                    <div class="button">
                        <input type="submit" name="create" value="Create">
                        <input type="submit" name="delete" value="Delete">
                    </div>
                </form>
            </div>
            <div class="csv">
                <?php
                    include("../phpcodesheet/workassign_csv/import.php")
                ?>
            </div>
        </div>
    </div>
    <div class="student">
            <div class="search">
                <?php
                    include("../phpcodesheet/workassign_csv/search.php")
                ?>
            </div>
    </div>
    <input type="hidden" id="idpos" value="<?php echo $_SESSION['username']; ?>" readonly> 

    <script src="../scriptsheet/script3.js"></script>
</body>
</html>