<?php

/*
* You can use this code snippet to validate email field and cofirm email field. 
*/

add_filter('fluentform_validation_errors', function ($errors, $data, $form) {
  $targetFormId = 1; // 1 is your target form ID
  if($form->id != $targetFormId) {
      return $targetFormId;
  }

  $primaryInputName = 'email'; // Your primary email input name
  $conformInputName = 'confirm_email'; // Your confirm email input name

  if($data[$primaryInputName] != $data[$conformInputName]) {
      if(!isset( $errors[$conformInputName])) {
          $errors[$conformInputName] = [];
      }
      $errors[$conformInputName][] = 'Confirm Email needs to be matched with primary email';
  }
  return $errors;
}, 10, 3);
