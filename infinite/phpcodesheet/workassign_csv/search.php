<?php
    // Database connection file path
    include(__DIR__ . '/../connection/lab_assign.php');

    // Function to display the dropdown
    function displayDropdown($conn) {
        $sql = "SHOW TABLES";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo '<form method="POST" action="">';
            echo '<h2 style="text-align: center; margin: 0.5rem auto">Search Work</h2>';
            echo '<label for="table">Choose Class:</label>';
            echo '<select name="table" id="table">';
            echo '<option value="" disabled selected>Please Select The Lab</option>';
            while ($row = mysqli_fetch_array($res)) {
                echo '<option value="' . $row[0] . '">' . strtoupper($row[0]) . '</option>';
            }
            echo '</select>';
            echo '<div class="button"><input type="submit" name="search" id="search" value="Search"></div>';
            echo '</form>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Function to display the selected table's data
    function displayTableData($conn, $table) {
        $sql = "SELECT * FROM `$table`";
        $res = mysqli_query($conn, $sql);
    
        if ($res) {
            $numRows = mysqli_num_rows($res); 
        
            if ($numRows > 0) {
                echo "<h3>Work of class: " . strtoupper($table) . "</h3>";
                echo "<table>
                        <tr>
                            <th class='day'>Lab Days</th>
                            <th>Lab Works</th>
                        </tr>";
            
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td style='width:10%'>" . htmlspecialchars($row["dayorder"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["daywork"]) . "</td>";
                    echo "</tr>";
                }
            
                echo "</table>";
            } else {
                echo "<p>No data found in the Class ".strtoupper($table)." No updates are available.</p>";
            }
        } else {
            echo "Error fetching Class data: " . mysqli_error($conn);
        }
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
        if (!empty($_POST['table'])) {
            $selectedTable = $_POST['table'];
        } else {
            echo "No Class selected.";
        }
    }

    displayDropdown($conn);

    if (!empty($selectedTable)) {
        displayTableData($conn, $selectedTable);
    }

    mysqli_close($conn);
?>
