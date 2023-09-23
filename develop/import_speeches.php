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

        // Extract data from the CSV row
        $memberName = $record[0];
        $sittingDate = DateTime::createFromFormat('d/m/Y', $record[1])->format('Y-m-d');
        $parliamentaryPeriod = $record[2];
        $parliamentarySession = $record[3];
        $parliamentarySitting = $record[4];
        $speechContent = $record[10];

        // Find member by name
        $member = App\Models\Member::where('name', $memberName)->first();
        if (!$member) {
            // Member not found, skip this row or handle accordingly
            continue;
        }

        // Find or create session based on the parliamentary details
        $session = App\Models\Session::firstOrCreate([
            'parliamentary_period' => $parliamentaryPeriod,
            'parliamentary_session' => $parliamentarySession,
            'parliamentary_sitting' => $parliamentarySitting,
            'sitting_date' => $sittingDate,
        ]);

        // Create a new speech
        $speech = App\Models\Speech::create([
            'member_id' => $member->id, // Use the member's ID
            'session_id' => $session->id, // Use the session's ID
            'speech_content' => $speechContent,
        ]);
    }
    fclose($stream);
}
