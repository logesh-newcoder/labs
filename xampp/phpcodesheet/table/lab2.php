<?php
    // Database connection file path
    include(__DIR__ . '/../connection/lab_class.php');

    // Function to split string by commas outside of square brackets
    function splitOutsideBrackets($string) {
        $result = [];
        $buffer = '';
        $inBrackets = false;

        for ($i = 0; $i < strlen($string); $i++) {
            $char = $string[$i];

            if ($char === '[') {
                $inBrackets = true;
            } elseif ($char === ']') {
                $inBrackets = false;
            } elseif ($char === ',' && !$inBrackets) {
                $result[] = trim($buffer);
                $buffer = '';
                continue;
            }
           $buffer .= $char;
        }

        if ($buffer !== '') {
            $result[] = trim($buffer);
        }
        return $result;
    }

    $sql = "SELECT class_order, class_1, class_1_name, class_2, class_2_name, class_3, class_3_name, class_4,
            class_4_name, class_5, class_5_name FROM lab_2_class";
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

        // To display the data row by row
        $id_inc = 100;
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>
                    <th class='dayper'>" . $row["class_order"] . "</th>";
            for ($i = 1; $i <= 5; $i++) {
                $class_col = "class_" . $i;
                $class_name_col = "class_" . $i . "_name";

                if (!empty($row[$class_col])) {
                    // Split the class name by commas outside of square brackets
                    $class_names = splitOutsideBrackets($row[$class_name_col]);
                    echo "<td colspan='" . $row[$class_col] . "'>";
                    echo "<div class='outer-button'>";

                    foreach ($class_names as $name) {
                        $name = trim($name); // Trim any extra whitespace
                        $id_inc++; 
                        echo "<button onclick=\"showInfo('CLA-$id_inc', this)\">" . htmlspecialchars($name) . "</button>";
                    }
                    echo "</div>"; 
                    echo "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No data available in the table.</p>";
    }

    mysqli_close($conn);
?>
