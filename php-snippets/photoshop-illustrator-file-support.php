<?php
/*
* The following functions will add additional file types option to your file upload element
* In this case, You can enable psd/ai/eps file format
* Just add this snippet to your theme's functions.php file or relevant place.
*/

add_filter('fluentform_file_type_options', function ($types) {
    $types[] = [
        'label' => __('Graphics Files (psd, ai, eps)', 'fluentform'),
        'value' => 'psd|ai|eps|bin',
    ];
    return $types;
});
    
add_action('fluentform_starting_file_upload', function () {
    add_filter('fluentform_uploader_args', function ($args) {
        $args['test_type'] = false;
        return $args;
    });
    add_filter('upload_mimes', function ($mime_types) {
        $mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
        $mime_types['eps'] = 'application/postscript'; //Adding ai files
        $mime_types['ai'] = 'application/postscript'; //Adding ai files
        return $mime_types;
    }, 1, 1);
});
