<?php
session_start(); // Start the session at the top of the file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LINUS LAB</title>
    <link rel="stylesheet" href="../stylesheet/style3.css">
</head>
<body>

    <header>    
        <div class="top">
            <h2>LINUS LAB</h2>
            <div class="img">
            <a href="index.php"><img src="../imgsheet/home icon.png" alt="home"></a>
            <a href="../index.html"><img src="../imgsheet/logout.png" alt="logout"></a>
            </div>
        </div>
    </header>
    
    <main>
        <!--========== Information Display the class names from database ==========-->
        <div class="table">                    
            <?php
            include("../phpcodesheet/table/lab2.php")
             ?>
        </div>
        <!--========== Information Display Section ==========-->
         <div class="displayer">    
            <h1>Please select the class for information</h1>

            <form id="info-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <input type="text" id="classname" placeholder="Select class" name="class_name" readonly>
                <input type="hidden" id="classid" name="class_id" placeholder="id display hide">
                <input type="text" id="classupdate" placeholder="Select class for update date" name="class_date" readonly>
                <textarea id="show" placeholder="Information will be shown here" name="class_content" readonly></textarea><br>
                
                <input type="submit" name="submit" value="Update" id="sub">
                <button type="button" onclick="deleteInfo()" id="del">DELETE</button>
            </form>
        </div>
    </main>

    <!--========== Information Display the class what work is assign from database and it sould hide ==========-->
    <div class="php">
        <?php
            include("../phpcodesheet/task/lab2.php")
        ?>
    </div>
    <!--========== Position ID Section ==========-->
    <input type="hidden" id="idpos" value="<?php echo $_SESSION['username']; ?>" readonly> 

    <script src="../scriptsheet/script2.js"></script>
</body>
</html>
