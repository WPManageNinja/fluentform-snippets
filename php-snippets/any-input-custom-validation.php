<?php

/*
 * You can implement validate any input in your form easily.
 * This snippet will show how you can validate single line input text
 */

/*
 * Common Filter hook names
 * text/Mask: fluentform_validate_input_item_input_text
 * email: fluentform_validate_input_item_input_email
 * textarea: fluentform_validate_input_item_textarea
 * numeric: fluentform_validate_input_item_input_number
 * numeric: fluentform_validate_input_item_input_number
 * Range Slider: fluentform_validate_input_item_rangeslider
 * Range Slider: fluentform_validate_input_item_rangeslider
 * Address: fluentform_validate_input_item_address
 * Address: fluentform_validate_input_item_address
 * Country Select: fluentform_validate_input_item_select_country
 * Country Select: fluentform_validate_input_item_select_country
 * Select: fluentform_validate_input_item_select
 * Radio: fluentform_validate_input_item_input_radio
 * Checkbox: fluentform_validate_input_item_input_checkbox
 * Checkbox: fluentform_validate_input_item_input_checkbox
 * Website URL: fluentform_validate_input_item_input_input_url
 * Website URL: fluentform_validate_input_item_input_input_url
 * Date: fluentform_validate_input_item_input_input_date
 * Image Upload: fluentform_validate_input_item_input_image
 * File Upload: fluentform_validate_input_item_input_file
 * Phone Filed: fluentform_validate_input_item_phone
 * Phone Filed: fluentform_validate_input_item_phone
 * Color Picker: fluentform_validate_input_item_color_picker
 * Net Promoter Score: fluentform_validate_input_item_net_promoter_score
 * Password: fluentform_validate_input_item_input_password
 * Ratings: fluentform_validate_input_item_ratings
 * Ratings: fluentform_validate_input_item_ratings
 */

/*
 * Snippet: 1
 * This will apply for all the forms in your site
 * $errorMessage: String
 * $field: Array - Contains the fill field settings
 * $formData: Array - Contains all the user input values as key pair
 * $fields: Array - All fields of the form
 * $form: Object - The Form Object
 */
add_filter('fluentform_validate_input_item_input_text', function ($errorMessage, $field, $formData, $fields, $form) {
    $fieldName = $field['name'];
    if (empty($formData[$fieldName])) {
        return $errorMessage;
    }
    $value = $formData[$fieldName]; // This is the user input value

    /*
     * You can validate this value and return $errorMessage
     * If $error is empty then it's valid. Otherwise you can return the $errorMessage message as string
     */

    return $errorMessage;

}, 10, 5);


/*
 * Snippet: 2
 * This will apply for all the forms in your site
 */
add_filter('fluentform_validate_input_item_input_text', function ($errorMessage, $field, $formData, $fields, $form) {

    /*
     * Validate only for form id 12
     */
    $targetFormId = 12;
    if ($form->id != $targetFormId) {
        return $errorMessage;
    }

    $fieldName = $field['name'];
    if (empty($formData[$fieldName])) {
        return $errorMessage;
    }
    $value = $formData[$fieldName]; // This is the user input value

    /*
     * You can validate this value and return $errorMessage
     * If $error is empty then it's valid. Otherwise you can return the $errorMessage message as string
     */

    return [$errorMessage];

}, 10, 5);
