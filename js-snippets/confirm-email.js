/*
* JS snippet to match two fields value as same
* Example: Email and Confirm Email need to be same
* Placement: Place the following code in your form -> Settings & Integrations -> Custom CSS/JS -> Custom Javascript BOX
 */

var $email = $form.find('input[name=email]'); // Name of the first Email Address
var $confirmEmail = $form.find('input[name=confirm_email]'); // Name of the Confirm Email Address

$confirmEmail.on('blur', function() {
    if($(this).val() != $email.val()) {
        alert('Email not matching');
        // Or you can show the custom message somewhere
    }
});

// Additional code to check if user fixed the type in the primary email
$email.on('blur', function() {
    if($confirmEmail.val() && $(this).val() != $confirmEmail.val()) {
        alert('Email not matching');
        // Or you can show the custom message somewhere
    }
});
