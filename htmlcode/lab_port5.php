<?php
session_start(); // Start the session at the top of the file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs Lab</title>
    <link rel="stylesheet" href="../style_codes/head_foot1.css">
    <link rel="stylesheet" href="../style_codes/main3.css">
</head>
<body>

    <header>    
        <div class="top">
            <h2>Jobs Lab</h2>

            <div class="img">
                <a href="index_port.php"><img src="../image/home icon.png" alt="home"></a>
                <a href="../index.html"><img src="../image/logout.png" alt="logout"></a>
            </div>
        </div>
    </header>
    
    <main>
        <!--========== Information Display the class names from database ==========-->
        <div class="table">                    
            <?php
                include("../phpcode/tt_port/lab_port5.php");
            ?>
        </div>       

        <!--========== Information Display Section ==========-->
        <div class="displayer">    
            <h1>Click the Class Name</h1>

            <form id="info-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <input type="text" id="classname" placeholder="Class Name" name="class_name" readonly>

                <input type="hidden" id="classid" name="class_id" placeholder="id display hide">

                <input type="text" id="classupdate" placeholder="Class Update Date" name="class_date" readonly>

                <textarea id="show" placeholder="Class Information" name="class_content" readonly></textarea><br>
                                
                <button type="button" onclick="deleteInfo()" id="del">Delete</button>

                <input type="submit" name="submit" value="Update" id="sub">
            </form>
        </div>
    </main>

    <!--========== Information Display the class what work is assign from database and it sould hide ==========-->
    <div class="php">
        <?php
        ?>
    </div>

    <!--========== Position ID Section ==========-->
    <input type="hidden" id="idpos" value="<?php echo $_SESSION['username']; ?>" readonly> 
    
    <script src="../script_codes/script3.js"></script>
</body>
</html>
