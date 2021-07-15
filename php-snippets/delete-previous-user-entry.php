<?php

/*
 * In this example, We are going to see how you can delete existing submission on new submission
 * Imagine, You want to just keep only one entry from a user. So whenever a user submit a new entry
 * the old entry will be deleted automatically.
 * Use the action and place it in your theme's functions.php file or your custom plugin file.
 */

/*
 * Snippet: 1
 * This will apply for only form id: 12
 */
add_action('fluentform_before_submission_confirmation', function ($entryId, $formData, $form) {
    if($form->id != 12) { // Say your target form is 12
        return;
    }
    $currentUserId = get_current_user_id();
    if(!$currentUserId) {
        return; // user is not logged in so no further action
    }

    // Let's get existing entries by this user
    $submissions = wpFluent()->table('fluentform_submissions')
        ->where('user_id', $currentUserId)
        ->where('form_id', $form->id)
        ->get();
    if(!$submissions) {
        return; // This is the first submission
    }

    $entryClass = new \FluentForm\App\Modules\Entries\Entries();
    foreach ($submissions as $submission) {
        $entryClass->deleteEntryById($submission->id, $form->id);
    }
}, 10, 3);

/*
 * Snippet: 2
 * This will apply for all the forms in your site
 *
 */
add_action('fluentform_before_submission_confirmation', function ($entryId, $formData, $form) {
    $currentUserId = get_current_user_id();
    if(!$currentUserId) {
        return; // user is not logged in so no further action
    }

    // Let's get existing entries by this user
    $submissions = wpFluent()->table('fluentform_submissions')
        ->where('user_id', $currentUserId)
        ->where('form_id', $form->id)
        ->get();
    if(!$submissions) {
        return; // This is the first submission
    }

    $entryClass = new \FluentForm\App\Modules\Entries\Entries();
    foreach ($submissions as $submission) {
        $entryClass->deleteEntryById($submission->id, $form->id);
    }
}, 10, 3);
