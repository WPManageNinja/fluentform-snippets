<?php

/*
 * In this example, We are going to see how you can add your own custom validation for a particular
 * input type.
 * Use Case: We want to prevent form submission if any textarea contain any url. So basically if it contains 'http' / 'www'
 * We will prevent the form submission.
 */


/*
 * Snippet: 1
 * This will apply for only form id: 12
 */
add_filter('fluentform_validate_input_item_input_email', function ($error, $field, $formData, $fields, $form) {
    /*
     * add your banned sub-strings and form it here
     * If the textarea has any match it will make the form submission failed
     */
    // You may change the following 3 lines
    $targetFormId = 12;
    $bannedStrings = ['http', 'www'];
    $errorMessage = 'No Url is allowed in textarea';

    if ($form->id != $targetFormId) {
        return $error;
    }

    $fieldName = $field['name'];
    if (empty($formData[$fieldName])) {
        return $error;
    }

    foreach ($bannedStrings as $string) {
        if(strpos($formData[$fieldName], $string) !== false) {
            return [$errorMessage];
        }
    }

    return $error;

}, 10, 5);



/*
 * Snippet: 2
 * This will apply for all the forms in your site
 *
 */
add_filter('fluentform_validate_input_item_textarea', function ($error, $field, $formData, $fields, $form) {
    $bannedStrings = ['http', 'www'];
    $errorMessage = 'No Url is allowed in textarea';

    $fieldName = $field['name'];
    if (empty($formData[$fieldName])) {
        return $error;
    }

    foreach ($bannedStrings as $string) {
        if(strpos($formData[$fieldName], $string) !== false) {
            return [$errorMessage];
        }
    }

    return $error;

}, 10, 5);

