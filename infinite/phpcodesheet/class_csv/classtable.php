<?php
    // Database connection file path
    include(__DIR__ . '/../connection/lab_class.php');

    if (isset($_POST['submit'])) {
        // Handle Import button
        if (!empty($_FILES['file']['name']) && isset($_POST['table'])) {
            $table = $_POST['table'];  
            $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            if (strtolower($fileExtension) === 'csv') {
                if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    fgetcsv($csvFile); // Skip the first row (header)

                    $inserted = false; // Flag to track if any record was inserted
                    $notInserted = false; // Flag to track if any record failed to insert

                    while (($line = fgetcsv($csvFile)) !== false) {
                        $id = $line[0];
                        $dayOrder = $line[1];
                        $classtime1 = $line[2];
                        $className1 = $line[3];
                        $classtime2 = $line[4];
                        $className2 = $line[5];
                        $classtime3 = $line[6];
                        $className3 = $line[7];
                        $classtime4 = $line[8];
                        $className4 = $line[9];
                        $classtime5 = $line[10];
                        $className5 = $line[11];

                        // Check if record already exists
                        $sql = "SELECT class_id FROM {$table} WHERE class_id='{$id}'";
                        $res = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            // Record exists, perform update
                            $updateQuery = "UPDATE {$table} 
                                            SET class_1 = '{$classtime1}', class_1_name = '{$className1}', 
                                                class_2 = '{$classtime2}', class_2_name = '{$className2}',
                                                class_3 = '{$classtime3}', class_3_name = '{$className3}', 
                                                class_4 = '{$classtime4}', class_4_name = '{$className4}', 
                                                class_5 = '{$classtime5}', class_5_name = '{$className5}' 
                                            WHERE class_id = '{$id}'";

                            if (mysqli_query($conn, $updateQuery)) {
                                $updated = true;
                            } else {
                                $notUpdated = true;
                            }
                        } else {
                            // Record does not exist, perform insert
                            $insertQuery = "INSERT INTO {$table} (class_id, class_order, class_1, class_1_name, class_2, class_2_name, 
                                           class_3, class_3_name, class_4, class_4_name, class_5, class_5_name) 
                                           VALUES ('{$id}', '{$dayOrder}', '{$classtime1}', '{$className1}', 
                                                   '{$classtime2}', '{$className2}', '{$classtime3}', '{$className3}', 
                                                   '{$classtime4}', '{$className4}', '{$classtime5}', '{$className5}')";

                            if (mysqli_query($conn, $insertQuery)) {
                                $inserted = true;
                            } else {
                                $notInserted = true;
                            }
                        }
                    }

                    fclose($csvFile);

                    if ($inserted) {
                        echo "<script>
                                alert('Data(s) inserted successfully');
                                location.href = '../../htmlcodesheet/classtable.html'; 
                              </script>";
                    } elseif ($notInserted) {
                        echo "<script>
                                alert('Some Data were not inserted. Please check your data.');
                                location.href = '../../htmlcodesheet/classtable.html'; 
                              </script>";
                    } else {
                        echo "<script>
                                alert('No Data found to insert or update.');
                                location.href = '../../htmlcodesheet/classtable.html'; 
                              </script>";
                    }

                } else {
                    echo "<script>
                            alert('File upload error.');
                                location.href = '../../htmlcodesheet/classtable.html'; 
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Invalid file extension. Only CSV files are allowed.');
                        location.href = '../../htmlcodesheet/classtable.html'; 
                      </script>";
            }
        } else {
            echo "<script>
                    alert('No file uploaded or no Data selected.');
                    location.href = '../../htmlcodesheet/classtable.html'; 
                  </script>";
        }
    }

    if (isset($_POST['truncate'])) {
        // Handle Remove button
        if (isset($_POST['table'])) {
            $table = $_POST['table'];

            $truncateQuery = "TRUNCATE TABLE {$table}";
            if (mysqli_query($conn, $truncateQuery)) {
                echo "<script>
                        alert('Lab data removed successfully');
                        location.href = '../../htmlcodesheet/classtable.html'; 
                      </script>";
            } else {
                echo "<script>
                        alert('Failed to remove Lab data');
                        location.href = '../../htmlcodesheet/classtable.html'; 
                      </script>";
            }
        } else {
            echo "<script>
                    alert('No Lab selected for truncation.');
                    location.href = '../../htmlcodesheet/classtable.html'; 
                  </script>";
        }
    }
    
    mysqli_close($conn);
?>
