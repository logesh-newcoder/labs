<?php

    include("../conn_lab_class.php");

    $sql = "SELECT class_order, class_1, class_1_name, class_2, class_2_name, class_3, class_3_name, class_4,
            class_4_name, class_5, class_5_name FROM lab_1_class";
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
                $id_inc = 100;
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                    <th class='dayper'>" . $row["class_order"] . "</th>";
            
                    for ($i = 1; $i <= 5; $i++) {
                        $class_col = "class_" . $i;
                        $class_name_col = "class_" . $i . "_name";

                        if (!empty($row[$class_col])) {
                            $id_inc++; 
                            echo "<td colspan='" . $row[$class_col] . "'><button onclick=\"showInfo('CLA-$id_inc', this)\">" . $row[$class_name_col] . "</button></td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
    else {
        echo "<p>No data available in the table.</p>";
    }
    
    mysqli_close($conn);
?>
