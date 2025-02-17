<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Access</title>
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
            <div class="import">

                <!--========== Import CSV file in the database wiht their field ==========-->
                <form action="../phpcode/tt_port/import.php" method="post" enctype="multipart/form-data">
                    <h3>Import CSV File</h3>
                    
                    <div class="lable">

                        <label for="table">Choose The Lab:</label>
                        
                        <select name="table" id="table">
                            <option value="" disabled selected>Please Select The Lab</option>
                            <option value="lab_1_tt">Gosling Lab</option>
                            <option value="lab_2_tt">Linus Lab</option>
                            <option value="lab_3_tt">Gates Lab</option>
                            <option value="lab_4_tt">Ritchie Lab</option>
                            <option value="lab_5_tt">Jobs Lab</option>
                        </select>
                    </div>

                    <div class="lable">
                        <label for="file">Upload CSV File:</label>
                    
                        <input type="file" name="file" id="file" accept=".csv">
                    </div>                    

                    <div class="button">
                        <input type="submit" name="submit" value="Import Data">

                        <input type="submit" name="truncate" value="Remove Data">
                    </div>
                </form>    
            </div>

            <div class="import">
                
                <form action="../phpcode/dw_port/freeze_port.php" method="post">
                    <h3>Freeze The Work Assign Portal</h3>
                    <div class="lable">
                        <label for="date" style="margin-right: 10px;">Choose Date:</label>
                 
                        <input type="date" name="date" class="date" placeholder="Select date">
                    </div>
            
                    <div class="button">
                        <input type="submit" name="freeze" value="Add Time">
                    </div>
                </form>
            </div>

            <div class="import">
                
                <form action="../phpcode/dw_port/delete_port.php" method="post">
                    <h3 style="text-align: center;">Remove The All Daily Task</h3>
                    
                    <div class="lable">
                        <label for="table">Choose The Lab:</label>
            
                        <select name="table" id="table">
                            <option value="" disabled selected>Please Select The Lab</option>
                            <option value="lab_1_dw">Gosling Lab</option>
                            <option value="lab_2_dw">Linus Lab</option>
                            <option value="lab_3_dw">Gates Lab</option>
                            <option value="lab_4_dw">Ritchie Lab</option>
                            <option value="lab_5_dw">Jobs Lab</option>
                        </select>
                    </div>

                    <div class="button">
                        <input type="submit" name="truncate" value="Remove Task Data">
                    </div>            
                </form>
            
            </div>  
            
            <div class="search">
                <?php
                    include("../phpcode/sw_port/export_port.php")
                ?>
            </div>  
        
        </div>    
    </main>

</body>
</html>