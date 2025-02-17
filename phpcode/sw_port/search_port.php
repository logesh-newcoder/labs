<?php
    // Database connection file path
    include(__DIR__ . '/../conn_port/sw_port.php');    

    $sql = "SHOW TABLES";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo '<form method="POST" action="">';
        echo '<h3>Search Work</h3>';
        echo '<div class="lable">';
        echo '<label for="table">Choose Class:</label>';
        echo '<select name="table" id="table">';
        echo '<option value="" disabled selected>Please Select The Lab</option>';
        
        while ($row = mysqli_fetch_array($res)) {
            echo '<option value="' . $row[0] . '">' . strtoupper($row[0]) . '</option>';
        }
        
        echo '</select>';
        echo '</div>';
        echo '<div class="button">';
        echo '<input type="submit" name="search" id="search" value="Search">';
        echo '</div>';
        echo '</form>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
        if (!empty($_POST['table'])) {
            $selectedTable = $_POST['table'];
            $sql = "SELECT * FROM `$selectedTable`";
            $res = mysqli_query($conn, $sql);
        
            if ($res) {
                $numRows = mysqli_num_rows($res); 
            
                if ($numRows > 0) {
                    echo '<div class="button">';
                    echo '<h4>Work of class: ' . strtoupper($selectedTable) . '</h4>';
                    echo '</div>';
                    echo "<table>
                    <tr>
                        <th class='day'>Lab Days</th>
                        <th>Lab Works</th>
                    </tr>";
                
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["dayorder"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["daywork"]) . "</td>";
                        echo "</tr>";
                    }
                
                    echo "</table>";
                } else {
                    echo '<div class="button">';
                    echo '<h4>No data found in the Class '.strtoupper($selectedTable).'</h4>';
                    echo '</div>';
                }
            } else {
                echo "Error fetching Class data: " . mysqli_error($conn);
            }    
        } else {
            echo '<div class="button">';
            echo '<h4>No Class selected.</h4></div>';
        }
    }

    mysqli_close($conn);
?>
