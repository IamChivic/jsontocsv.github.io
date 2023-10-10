<?php
// Your PHP code for JSON to CSV conversion

// Read JSON data from a file
$jsonString = file_get_contents('input.json');

// Decode the JSON data
$data = json_decode($jsonString, true);

if ($data !== null) {
    // Open a CSV file for writing
    $csvFile = fopen('output.csv', 'w');

    // Write the header row to the CSV file
    fputcsv($csvFile, array_keys(current($data)));

    // Write the data rows to the CSV file
    foreach ($data as $row) {
        fputcsv($csvFile, $row);
    }

    // Close the CSV file
    fclose($csvFile);

    echo "JSON data has been successfully converted to CSV.";
} else {
    echo "Error decoding JSON data.";
}


// Redirect back to the HTML page after conversion
header("Location: index.html");
?>
