<?php

function deleteFormAssests($formId)
{
    // Now Let's delete associate items
    wpFluent()->table('fluentform_submissions')
        ->where('form_id', $formId)
        ->delete();
    
     wpFluent()->table('fluentform_draft_submissions')
        ->where('form_id', $formId)
        ->delete();

    wpFluent()->table('fluentform_submission_meta')
        ->where('form_id', $formId)
        ->delete();

    wpFluent()->table('fluentform_entry_details')
        ->where('form_id', $formId)
        ->delete();

    wpFluent()->table('fluentform_form_analytics')
        ->where('form_id', $formId)
        ->delete();

    wpFluent()->table('fluentform_logs')
        ->where('parent_source_id', $formId)
        ->whereIn('source_type', ['submission_item', 'form_item'])
        ->delete();

    ob_start();
    if (defined('FLUENTFORMPRO')) {
        try {
            wpFluent()->table('fluentform_order_items')
                ->where('form_id', $formId)
                ->delete();
            wpFluent()->table('fluentform_subscriptions')
                ->where('form_id', $formId)
                ->delete();
            wpFluent()->table('fluentform_transactions')
                ->where('form_id', $formId)
                ->delete();
        } catch (\Exception $exception) {

        }
    }
    $errors = ob_get_clean();

    return true;
}
