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
            <h2>LAB 3</h2>
            <a href="mailto:logeshakn45@gmail.com"><img src="mail.svg" alt=""></a>
        </div>
    </header>
    
    <main>
        <div class="table">                    
            <table>

                <tr class="dayper">                        
                    <th>DAYS/ PERIODS</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>                        
                </tr>
           
                <!-- Each day of the week with class buttons -->
                <tr>
                    <th class="dayper">MON</th>
                    <td colspan="3"><button onclick="showInfo('CLA-101',this)">BSC.CS-3-B</button></td>
                    <!-- <td><button onclick="showInfo('CLA-102',this)"></button></td> -->
                    <td colspan="2"><button onclick="showInfo('CLA-103',this)">BSC.CS-3-A</button></td>
                </tr>

                <tr>
                    <th class="dayper">TUE</th>
                    <td colspan="2"><button onclick="showInfo('CLA-104',this)">BSC.IT-2-A</button></td>
                    <!-- <td><button onclick="showInfo('CLA-105',this)"></button></td> -->
                    <td colspan="3"><button onclick="showInfo('CLA-106',this)">BSC.IT-3-A</button></td>
                </tr>
                
                <tr>
                    <th class="dayper">WED</th>
                    <td colspan="3"><button onclick="showInfo('CLA-107',this)">FREE</button></td>
                    <!-- <td><button onclick="showInfo('CLA-108',this)"></button></td> -->
                    <td colspan="2"><button onclick="showInfo('CLA-109',this)">BSC.CS-2-A</button></td>
                </tr>
                
                <tr>
                    <th class="dayper">THU</th>
                    <td colspan="3"><button onclick="showInfo('CLA-110',this)">BSC.CS-2-B</button></td>
                    <!-- <td><button onclick="showInfo('CLA-111',this)"></button></td> -->
                    <td colspan="2"><button onclick="showInfo('CLA-112',this)">FREE</button></td>
                </tr>
                
                <tr>
                    <th class="dayper">FRI</th>
                    <td colspan="3"><button onclick="showInfo('CLA-113',this)">BSC.CS-1-A</button></td>
                    <!-- <td><button onclick="showInfo('CLA-114',this)"></button></td> -->
                    <td colspan="2"><button onclick="showInfo('CLA-115',this)">BSC.IT-2-A</button></td>
                </tr>
                
                <tr>
                    <th class="dayper">SAT</th>
                    <td colspan="3"><button onclick="showInfo('CLA-116',this)">BSC.IT-1-A</button></td>
                    <!-- <td><button onclick="showInfo('CLA-117',this)"></button></td> -->
                    <td colspan="2"><button onclick="showInfo('CLA-118',this)">BSC.CS-3-B</button></td>
                </tr>
            
            </table>
        </div>
    
        <!-- Information Display Section -->
         <div class="displayer">    
            <h1>Please select the class for information</h1>
            
            <form id="info-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
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
            include("../lab_php_code/lab3_php.php")
         ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
