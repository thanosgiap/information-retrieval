<?php

$csvFilePath = 'develop/resized_proceedings.csv';
$stopWordsPath = 'develop/stopwords.txt';

// Define the column index you want to clean (e.g., 10 for the 11th column)
$columnIndex = 10;

// Read the stopwords list
$stopwords = file_get_contents($stopWordsPath);
$stopwordsArray = explode(',', $stopwords);
$stopwordsArray = array_map('trim', $stopwordsArray); // Remove whitespace around stopwords

// Read the CSV file into an array
$csvData = array_map('str_getcsv', file($csvFilePath));

function unaccent($str)
{
    $transliteration = array(
        'ώ' => 'ω', 'ά' => 'α', 'ή' => 'η',
        'ό' => 'ο', 'ί' => 'ι', 'έ' => 'ε',
        'ύ' => 'υ'
    );
    $str = str_replace(
        array_keys($transliteration),
        array_values($transliteration),
        $str
    );
    return $str;
}


// Loop through each row and process the specified column
foreach ($csvData as &$rowData) {
    if (isset($rowData[$columnIndex])) {
        // Convert to lowercase and remove punctuation
        $rowData[$columnIndex] = mb_strtolower($rowData[$columnIndex], 'UTF-8');
        $rowData[$columnIndex] = preg_replace('/[[:punct:]]/', '', $rowData[$columnIndex]);

        // Remove excess whitespace
        $rowData[$columnIndex] = preg_replace('/\s+/', ' ', $rowData[$columnIndex]);
        $rowData[$columnIndex] = trim($rowData[$columnIndex]);

        // Remove accents
        $rowData[$columnIndex] = unaccent($rowData[$columnIndex]);

        // Remove stopwords
        $words = explode(' ', $rowData[$columnIndex]);
        $filteredWords = array_diff($words, $stopwordsArray);
        $rowData[$columnIndex] = implode(' ', $filteredWords);
    }
}

// Open the CSV file for writing
$handle = fopen($csvFilePath, 'w');

// Write the modified data back to the CSV file
foreach ($csvData as $rowData) {
    fputcsv($handle, $rowData);
}

// Close the file handle
fclose($handle);
