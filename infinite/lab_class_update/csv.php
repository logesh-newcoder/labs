<?php
    include("../conn_lab_class.php");

    if (isset($_POST['submit'])) {

        if (!empty($_FILES['file']['name']) && isset($_POST['table'])) {

            $table = $_POST['table'];  
            $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            if (strtolower($fileExtension) === 'csv') {

                if (is_uploaded_file($_FILES['file']['tmp_name'])) {

                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    fgetcsv($csvFile); // Skip the first row (header)

                    $updated = false; // Flag to track if any record was updated
                    $notUpdated = false; // Flag to track if any record failed to update

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
                        $sql = "SELECT class_id FROM {$table} WHERE class_id='{$id}'";
                        $res = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            $updateQuery = "UPDATE {$table} 
                                            SET class_1 = '{$classtime1}', class_1_name = '{$className1}', class_2 = '{$classtime2}', class_2_name = '{$className2}',
                                            class_3 = '{$classtime3}', class_3_name = '{$className3}', class_4 = '{$classtime4}', class_4_name = '{$className4}',
                                            class_5 = '{$classtime5}', class_5_name = '{$className5}'
                                            WHERE class_id = '{$id}'";
                            
                            if (mysqli_query($conn, $updateQuery)) {
                                $updated = true;
                            } else {
                                $notUpdated = true;
                            }
                        }
                    }

                    fclose($csvFile);

                    if ($updated) {
                        echo "<script>
                                alert('Record(s) updated successfully');
                                location.href = 'index.html'; 
                              </script>";
                    } elseif ($notUpdated) {
                        echo "<script>
                                alert('Some records were not updated. Please check your data.');
                                location.href = 'index.html'; 
                              </script>";
                    } else {
                        echo "<script>
                                alert('No records found to update.');
                                location.href = 'index.html'; 
                              </script>";
                    }

                } else {
                    echo "<script>
                            alert('File upload error.');
                            location.href = 'index.html'; 
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Not good - file extension is not CSV.');
                        location.href = 'index.html'; 
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Not good - no file uploaded or no table selected.');
                    location.href = 'index.html'; 
                  </script>";
        }
    }
?>
