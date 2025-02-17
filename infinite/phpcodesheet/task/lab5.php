<?php
    // Database connection file path
    include(__DIR__ . '/../connection/lab_task.php');    

    if ($_SERVER["REQUEST_METHOD"] === "POST") { 
        $selectid = $_POST["class_id"];
        $selectinfo = $_POST["class_content"];
        date_default_timezone_set('Asia/Kolkata'); 
        $date = date("Y-m-d"); 

        if (empty($selectinfo)) {
            echo "<script>alert('Please enter the information');</script>";       
        } 
        else {
            // Update the data in respected field in table which is selected
            $date=date("Y-m-d");
            $stmt ="UPDATE lab_5 SET class_info = '$selectinfo' ,update_date='$date' WHERE class_id = '$selectid' ;";
                if (mysqli_query($conn,$stmt)) {
                    echo "<script>alert('Data updated successfully');</script>";
                } 
                else {
                    echo "Error updating Data: " . $conn->error;
                }
            }
        }
            
    // Fetching class data from database to display
    $sql = "SELECT * FROM lab_5";
    $res = mysqli_query($conn, $sql);
    
    echo "<table>
            <tr>
                <th>Class_id</th>
                <th>Class_info</th>
            </tr>";
            if (mysqli_num_rows($res) > 0) {
                $id_inc = 100;
                while ($row = mysqli_fetch_assoc($res)) {
                    $id_inc++;
                    echo "<tr><td>".$row["class_id"]."</td><td id='CLA-$id_inc'>".$row["class_info"]."</td><td>".$row["update_date"]."</td></tr>";
                }
                echo "</table>";
            }
    mysqli_close($conn);
?>