<?php
    // Database connection file path
    include(__DIR__ . '/../connection/lab_assign.php');

    $sql = "SHOW TABLES";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<form method="POST" enctype="multipart/form-data" class="show">';
        echo '<h2 style="text-align: center; margin: 0.5rem auto;">Add AND Delete A Class Work</h2>';
        echo '<div class="lable"><label for="table">Choose CLASS:</label>';
        echo '<select name="table" id="table">';
        echo '<option value="" disabled selected>Please Select The Lab</option>';

        while ($row = mysqli_fetch_array($res)) {
            echo '<option value="' . $row[0] . '">' . strtoupper($row[0]) . '</option>';
        }

        echo '</select></div>';
        echo '<div class="lable"><label for="file">Choose CSV file: </label>';
        echo '<input type="file" name="file" id="file" accept=".csv"><div>';
        echo '<div class="button"><input type="submit" name="submit" value="Import Data">';
        echo '<input type="submit" name="truncate" value="Truncate Data"></div>';
        echo '</form>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Handle Table Truncation
    if (isset($_POST['truncate'])) {
        if (isset($_POST['table'])) {
            $table = $_POST['table'];

            if (!$table) {
                echo "<script>alert('Invalid Class name.');</script>";
            } else {
                $truncateQuery = "TRUNCATE TABLE `{$table}`";
                if (mysqli_query($conn, $truncateQuery)) {
                    echo "<script>alert('Class data removed successfully');</script>";
                } else {
                    echo "<script>alert('Failed to remove Class data: " . mysqli_error($conn) . "');</script>";
                }
            }
        } else {
            echo "<script>alert('No Class selected for truncation.');</script>";
        }
    }

    // Handle CSV file import
    if (isset($_POST['submit'])) {
        if (isset($_POST['table'])) {
            $table = $_POST['table'];
            if (!empty($_FILES['file']['name'])) {
                $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

                if (strtolower($fileExtension) === 'csv') {
                    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                        fgetcsv($csvFile); // Skip header row

                        $inserted = false;
                        $notInserted = false;

                        while (($line = fgetcsv($csvFile)) !== false) {
                            $id = $line[0];
                            $work = $line[1];

                            $sql = "SELECT dayorder FROM `{$table}` WHERE dayorder='{$id}'";
                            $res = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($res) > 0) {
                                // Update record if exists
                                $updateQuery = "UPDATE `{$table}` SET daywork = '{$work}' WHERE dayorder = '{$id}'";
                                if (mysqli_query($conn, $updateQuery)) {
                                    $updated = true;
                                } else {
                                    $notUpdated = true;
                                }
                            } else {
                                // Insert new record if not found
                                $insertQuery = "INSERT INTO `{$table}` (`dayorder`, `daywork`) VALUES ('$id', '$work')";
                                if (mysqli_query($conn, $insertQuery)) {
                                    $inserted = true;
                                } else {
                                    $notInserted = true;
                                }
                            }
                        }

                        fclose($csvFile);

                        if ($inserted) {
                            echo "<script>alert('Data(s) inserted successfully');</script>";
                        } elseif ($notInserted) {
                            echo "<script>alert('Some Data were not inserted. Please check your data.');</script>";
                        } else {
                            echo "<script>alert('No records found to insert or update.');</script>";
                        }
                    } else {
                        echo "<script>alert('File upload error.');</script>";
                    }
                } else {
                    echo "<script>alert('Invalid file extension. Only CSV files are allowed.');</script>";
                }
            } else {
                echo "<script>alert('No file uploaded or no Class selected.');</script>";
            }
        }
    }

    mysqli_close($conn);
?>
