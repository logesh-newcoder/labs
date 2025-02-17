<?php
    // Include database connection
    include(__DIR__ . '/../conn_port/sw_port.php');    

    if (isset($_POST['export']) && isset($_POST['table']) && !empty($_POST['table'])) {
        $selectedTable = $_POST['table'];

        // Set headers for CSV file download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $selectedTable . '_data.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Open output stream for CSV
        $output = fopen('php://output', 'w');

        // Add column headers to the CSV
        $columnHeaders = ['Lab Days', 'Lab Works'];
        fputcsv($output, $columnHeaders);

        // Fetch data from the database table
        $sql = "SELECT dayorder, daywork FROM `$selectedTable`";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            // Write each row to the CSV
            while ($row = mysqli_fetch_assoc($res)) {
                fputcsv($output, [$row['dayorder'], $row['daywork']]);
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the output stream
        fclose($output);
    }

    mysqli_close($conn);    
?>
