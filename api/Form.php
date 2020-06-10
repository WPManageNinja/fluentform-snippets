<?php

/*
 * Example File to access Forms, Fields, and It's entries and related fields
 * Please use the code snippets. It's recommended to prefix the function names
 */

/*
 * Get All The forms
 * @return Array - will contain object of each form
 */
function getFluentForms()
{
    return wpFluent()->table('fluentform_forms')
            ->select(['id', 'title']) // other columns status|appearance_settings|form_fields|has_payment|type|conditions|created_by|created_at|updated_at
            ->orderBy('id', 'DESC')
            ->get();
}

/**
 * Get a singe form
 * @param int $formId
 * @return stdClass|null
 */
function getFluentForm($formId)
{
    return wpFluent()->table('fluentform_forms')
            ->where('id', $formId)
            ->first();
}

/**
 * Get Form Input fields
 * Possible with fields $with = ['admin_label', 'element', 'options', 'attributes', 'raw']
 * @param int $formId
 * @param array $with
 * @return array
 */
function getFluentFormFields($formId, $with = ['admin_label'])
{
    return \FluentForm\App\Modules\Form\FormFieldsParser::getInputs($formId, ['admin_label']);
}

