<?php

/*
 * This snippet will for your emails field where You can limit the specific domain emails as valid
 * Please check both available snippet and use which is applicable for you.
 * Don't forget to change the values where it mentioned
 */

/*
 * Snippet: 1
 * This will apply for all the forms in your site
 */
add_filter('fluentform_validate_input_item_input_email', function ($error, $field, $formData, $fields, $form) {
    /*
     * add your accepted domains here
     * Other domains will be failed to submit the form
     */
    $acceptedDomains = ['gmail.com', 'hotmail.com', 'test.com']; // You may change here
    $errorMessage = 'The provided email domain is not accepted'; // You may change here

    $fieldName = $field['name'];
    if (empty($formData[$fieldName])) {
        return $error;
    }

    $valueArray = explode('@', $formData[$fieldName]);
    $inputDomain = array_pop($valueArray);

    if (!in_array($inputDomain, $acceptedDomains)) {
        return $errorMessage;
    }
    return $error;

}, 10, 5);

/*
 * Snippet: 2
 * This will apply for only form id: 12
 */
add_filter('fluentform_validate_input_item_input_email', function ($error, $field, $formData, $fields, $form) {
    /*
     * add your accepted domains here
     * Other domains will be failed to submit the form
     */
    // You may change the following 3 lines
    $targetFormId = 12;
    $acceptedDomains = ['gmail.com', 'hotmail.com', 'test.com'];
    $errorMessage = 'The provided email domain is not accepted';

    if ($form->id != $targetFormId) {
        return $error;
    }

    $fieldName = $field['name'];
    if (empty($formData[$fieldName])) {
        return $error;
    }

    $valueArray = explode('@', $formData[$fieldName]);
    $inputDomain = array_pop($valueArray);

    if (!in_array($inputDomain, $acceptedDomains)) {
        return $errorMessage;
    }
    return $error;

}, 10, 5);

