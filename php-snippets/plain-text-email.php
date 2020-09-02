<?php

/*
* If you select plain design on email feed for email. Fluent Forms does not add any additional html templating for email body.
* But your email body still may have HTML from the email body composer and smart codes. You can use this snippet to convert the body in pure-text format
*/

add_filter('fluentform_email_body', function($body, $notification) {
    if(isset($notification['asPlainText']) && $notification['asPlainText'] == 'yes') {
        return wp_strip_all_tags($body);
    }
    return $body;
}, 10, 2);


// We have to remove the html flag from email header
add_filter('fluenttform_email_header', function($headers, $notification) {
    if(isset($notification['asPlainText']) && $notification['asPlainText'] == 'yes') {
        if (($key = array_search('Content-Type: text/html; charset=utf-8', $headers)) !== false) {
            unset($headers[$key]);
        }
    }
    return $headers;
}, 10, 2);
