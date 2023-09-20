<?php 

$inputCsvFile = 'develop\Greek_Parliament_Proceedings_1989_2020.csv';
$outputCsvFile = 'develop\resized_proceedings.csv';

$numRowsToExtract = 1000;

// Open the input CSV file for reading
if (($inputHandle = fopen($inputCsvFile, 'r')) !== false) {
    // Open the output CSV file for writing
    if (($outputHandle = fopen($outputCsvFile, 'w')) !== false) {
        // Read and write the first $numRowsToExtract rows
        for ($i = 0; $i < $numRowsToExtract; $i++) {
            // Read a row from the input CSV file
            $row = fgetcsv($inputHandle);
            
            // If the row is false, we've reached the end of the input file
            if ($row === false) {
                break;
            }
            
            // Check if the last column is empty (assuming the last column is at index count($row) - 1)
            if (!empty($row[count($row) - 1]) && !empty($row[0])) {
                // Write the row to the output CSV file
                fputcsv($outputHandle, $row);
            }
        }
        
        // Close the output CSV file
        fclose($outputHandle);
       
    } else {
        echo "Error: Unable to open the output CSV file for writing\n";
    }
    
    // Close the input CSV file
    fclose($inputHandle);
} else {
    echo "Error: Unable to open the input CSV file for reading\n";
}