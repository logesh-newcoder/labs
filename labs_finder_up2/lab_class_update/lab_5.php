<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1 Schedule</title>
    <link rel="stylesheet" href="../lab_html_code/style_normal.css">
    <link rel="stylesheet" href="../lab_html_code/style_1250px.css">
    <link rel="stylesheet" href="../lab_html_code/style_520px.css">
</head>
<body>

    <header>    
        <div class="top">
        <h2>JOBS LAB</h2>
        <a href="../index.html"><img src="../lab_html_code/home icon.png" alt=""></a>
        </div>
    </header>
    
    <main>
        <div class="table">                    
        <?php
        $db_server = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "lab";
        
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
        if (!$conn) {
            die("<p>Error: Could not connect to database. " . mysqli_connect_error() . "</p>");
        }
        
        $sql = "SELECT dayorder, class_names1, class_names2 FROM lab_5_class";
        $res = mysqli_query($conn, $sql);
        
        if ($res && mysqli_num_rows($res) > 0) {
            echo "<table border='1' cellpadding='10'>
                        <tr class='dayper'>                        
                            <th>DAYS/ PERIODS</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>                        
                        </tr>";
        
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>
                        <th class='dayper'>
                            <button onclick=\"showInfo('" . $row['dayorder'] . "', '" . $row['class_names1'] . "', '" . $row['class_names2'] . "')\">"
                            . $row['dayorder'] . 
                            "</button>
                        </th>
                        <td colspan='3'>" . $row['class_names1'] . "</td>
                        <td colspan='2'>" . $row['class_names2'] . "</td>
                      </tr>";
            }
        
            echo "</table>";
        } else {
            echo "<p>No data available in the table.</p>";
        }
        ?>
        </div>
    
        <div class="displayer">    
            <h1>Please select the class for information</h1>
            
            <form id="info-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" id="classorder" placeholder="Day Order" name="class_order" readonly>
                <input type="text" id="class1" placeholder="Class Names 1" name="class_1">
                <input type="text" id="class2" placeholder="Class Names 2" name="class_2">                                
                <input type="submit" name="submit" value="Update" id="sub">
            </form>
        </div>
    </main>

    <script src="index.js"></script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $selectedorder = $_POST["class_order"];
        $selected1 = $_POST["class_1"];
        $selected2 = $_POST["class_2"];

        if (empty($selectedorder) || empty($selected1) || empty($selected2)) {
            echo "<script>alert('Please fill in all fields');</script>";
        } else {
            $stmt = $conn->prepare("UPDATE lab_5_class SET class_names1 = ?, class_names2 = ? WHERE dayorder = ?");
            $stmt->bind_param("sss", $selected1, $selected2, $selectedorder);

            if ($stmt->execute()) {
                echo "<script>alert('Record updated successfully'); window.location.href = window.location.href;</script>";
            } else {
                echo "<p>Error updating record: " . $stmt->error . "</p>";
            }

            $stmt->close();
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>
