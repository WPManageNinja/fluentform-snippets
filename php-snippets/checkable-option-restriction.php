<?php

/*
 * Fluent Forms Snippet for showing only less than max items selected/checked from the previous responses
 * Say, You have item 1, item 2, item 3... and so on. And you want to show the options which are not
 * selected more than 2 times in the previous responses. This is the snippet for you.
 *
 * This example is for checkbox. For other inputs just replace the filter name
 * radio: fluenform_rendering_field_data_input_radio
 * select/dropdown: fluenform_rendering_field_data_select
 */
add_filter('fluenform_rendering_field_data_input_checkbox', function ($field, $form) {

    $formId = 10; // change your form ID
    $targetElementName = 'checkbox'; // check with your input name
    $maxValueSubmit = 2; // How many max response you want for each option

    if($form->id != $formId) {
        return $field;
    }

    $fieldName = $field['attributes']['name'];

    if($fieldName != $targetElementName) {
        return $field;
    }

    $options = $field['settings']['advanced_options'];


    $keyedOptions = [];
    foreach ($options as $option) {
        $keyedOptions[$option['value']] = $option;
    }

    $submittedItems = wpFluent()->table('fluentform_entry_details')
        ->select(wpFluent()->raw('field_value, COUNT(*) as count'))
        ->where('form_id', $form->id)
        ->where('field_name', $fieldName)
        ->groupBy('field_value')
        ->having('count', '>=', $maxValueSubmit)
        ->get();

    foreach ($submittedItems as $item) {
        unset($keyedOptions[$item->field_value]);
    }

    $field['settings']['advanced_options'] = array_values($keyedOptions);
    return $field;
}, 10, 2);
