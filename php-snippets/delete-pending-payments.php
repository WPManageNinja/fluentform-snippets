<?php

/*
 * Delete Pending Payment status entries automatically if 10 minutes exceeded
 */
add_action('fluentform_do_scheduled_tasks', function () {
    $formIds = [1, 2, 3]; // add your target form ids
    $thresholdSeconds = 10 * 60 * 60; // 10 minutes
    $thresholdDate = date('Y-m-d H:i:s', strtotime(current_time('mysql') - $thresholdSeconds));
    $pendingEntries = wpFluent()->table('fluentform_submissions')
                        ->whereNotNull('payment_total')
                        ->where('payment_status', 'pending')
                       // ->whereIn('form_id', $formIds) // if you want to target specific forms. Uncomment this line
                        ->where('created_at', '<', $thresholdDate)
                        ->get();

    if($pendingEntries) {
        $entryClass = new FluentForm\App\Modules\Entries\Entries();
        foreach ($pendingEntries as $entry) {
            $entryClass->deleteEntryById($entry->id, $entry->form_id);
        }
    }
});


/*
 * Move to trash for Pending Payment status entries automatically if 10 minutes exceeded
 */
add_action('fluentform_do_scheduled_tasks', function () {
    $formIds = [1, 2, 3]; // add your target form ids
    $thresholdSeconds = 10 * 60 * 60; // 10 minutes
    $thresholdDate = date('Y-m-d H:i:s', strtotime(current_time('mysql') - $thresholdSeconds));
    $pendingEntries = wpFluent()->table('fluentform_submissions')
        ->whereNotNull('payment_total')
        ->where('payment_status', 'pending')
        // ->whereIn('form_id', $formIds) // if you want to target specific forms. Uncomment this line
        ->where('created_at', '<', $thresholdDate)
        ->update([
            'status' => 'trashed'
        ]);
});
