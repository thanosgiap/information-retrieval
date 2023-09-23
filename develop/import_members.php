<?php

$stream = fopen('develop/resized_proceedings.csv', 'r');
$flag = true;

if ($stream) {
    while (($record = fgetcsv($stream, 1000, ',')) !== false) {
        if($flag){
            $flag = false;
            continue;
        }

        $name = $record[0];
        $politicalParty = $record[5];

        // Check if the record already exists in the database
        $existingRecord = App\Models\Member::where([
            'name' => $name,
            'political_party' => $politicalParty,
        ])->first();

        // If the record doesn't exist, create it
        if (!$existingRecord) {
            App\Models\Member::create([
                'name' => $name,
                'political_party' => $politicalParty
            ]);
        }
    }
    fclose($stream); // Close the file when done
}