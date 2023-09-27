<?php

$stream = fopen('develop/resized_proceedings.csv', 'r');

if ($stream) {
    $isFirstRow = true;
    while (($record = fgetcsv($stream, 1000, ',')) !== false) {
        // Skip first row
        if ($isFirstRow) {
            $isFirstRow = false;
            continue; 
        }

        if (count($record) < 3 || !$record[3] || !$record[4] || !$record[2]) {
            continue;
        }

        $parliamentaryPeriod = $record[2];
        $parliamentarySession = $record[3];
        $parliamentarySitting = $record[4];
        $sittingDate = DateTime::createFromFormat('d/m/Y', $record[1])->format('Y-m-d');

        // Find or create the session based on attributes
        $session = App\Models\Session::firstOrCreate(
            [
                'parliamentary_period' => $parliamentaryPeriod,
                'parliamentary_session' => $parliamentarySession,
                'parliamentary_sitting' => $parliamentarySitting,
            ],
            [
                'sitting_date' => $sittingDate,
            ]
        );
    }
    fclose($stream);
}
