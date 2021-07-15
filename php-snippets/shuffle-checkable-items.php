<?php

/*
 * Shuffle the Checkable items items on render.
 * For checkbox: fluenform_rendering_field_data_input_checkbox
 * For Radio: fluentform_rendering_field_data_input_radio
 * For Select: fluentform_rendering_field_data_select
 */

/*
 * Snippet: 1
 * This will apply for all the forms in your site
 */
add_filter('fluentform_rendering_field_data_input_checkbox', function ($data, $form) {
    $options = $data['settings']['advanced_options'];
    shuffle($options);
    $data['settings']['advanced_options'] = $options;
    return $data;
}, 10, 2);


/*
 * Snippet: 2
 * This will apply for only form id: 12
 */

add_filter('fluentform_rendering_field_data_input_checkbox', function ($data, $form) {
    $targetFormId = 12;
    if ($form->id != $targetFormId) {
        return $data;
    }
    $options = $data['settings']['advanced_options'];
    shuffle($options);
    $data['settings']['advanced_options'] = $options;
    return $data;
}, 10, 2);

