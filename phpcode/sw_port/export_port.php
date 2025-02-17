<?php
    // Database connection file path
    include(__DIR__ . '/../conn_port/sw_port.php');    

    // Function to display the dropdown
    $sql = "SHOW TABLES";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo '<form method="POST" action="../phpcode/sw_port/down_port.php">';
        echo '<h3>Export Class Work</h3>';
        echo '<div class="lable">';
        echo '<label for="table">Choose Class:</label>';
        echo '<select name="table" id="table">';
        echo '<option value="" disabled selected>Please select the lab</option>';
        
        while ($row = mysqli_fetch_array($res)) {
            echo '<option value="' . $row[0] . '">' . strtoupper($row[0]) . '</option>';
        }
        
        echo '</select>';
        echo '</div>';
        echo '<div class="button">';
        echo '<input type="submit" name="export" id="export" value="Export Class">';
        echo '</div>';
        echo '</form>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
        
    mysqli_close($conn);
?>
