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
            echo "<table>
                        <tr class='dayper'>                        
                            <th>DAYS/ PERIODS</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>                        
                        </tr>";
        
            $id_inc1 = 99; // Initialize ID incrementor for unique IDs
            $id_inc2 = 100;
        
            while ($row = mysqli_fetch_assoc($res)) {
                $id_inc1 += 2; // Increment ID for class_names1
                $id_inc2 += 2; // Increment ID for class_names2
        
                echo "<tr>
                        <th class='dayper'>" . $row["dayorder"] . "</th>
                        <td colspan='3'>
                            <button onclick=\"showInfo('CLA-$id_inc1', this)\">" . $row["class_names1"] . "</button>
                        </td>
                        <td colspan='2'>
                            <button onclick=\"showInfo('CLA-$id_inc2', this)\">" . $row["class_names2"] . "</button>
                        </td>
                      </tr>";
            }
        
            echo "</table>";
        } else {
            echo "<p>No data available in the table.</p>";
        }
        
        mysqli_close($conn);
?>
