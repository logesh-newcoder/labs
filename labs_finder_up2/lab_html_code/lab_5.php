<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_normal.css">
    <link rel="stylesheet" href="style_1250px.css">
    <link rel="stylesheet" href="style_520px.css">
</head>
<body>

    <header>    
        <div class="top">
            <h2>JOBS LAB</h2>
            <a href="../index.html"><img src="home icon.png" alt=""></a>
        </div>
    </header>
    
    <main>
        <div class="table">                    
        <?php
            include("../lab_class_details/lab_5.php")
         ?>
        </div>
    
        
        <!-- Information Display Section -->
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
    
    <div class="php">
         <?php
            include("../lab_php_code/lab5_php.php")
         ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
