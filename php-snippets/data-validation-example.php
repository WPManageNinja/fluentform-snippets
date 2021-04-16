<?php

/*
 * In this example, We are going to validate form data
 * Use Case: Validate speci
 */

add_filter('fluentform_validation_errors', function ($errors, $formData, $form) {
    // use only for a form; eg: only form id: 1
    if($form->id != 1) {
        return $errors;
    }

    $targetInputName = 'target_input_name'; // your target input name
    $inputValue = $formData[$targetInputName]; // target input name data value from user

    if($inputValue != 'expected_value') {
        $errors['target_input_name']['required'] = 'Please provide the right value';
    }

    return $errors;

}, 10, 3);