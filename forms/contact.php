<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'nazrultech@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];       // Assuming 'name' is the name attribute of the input field for sender's name
$contact->from_email = $_POST['email'];     // Assuming 'email' is the name attribute of the input field for sender's email
$contact->subject = $_POST['subject'];      // Assuming 'subject' is the name attribute of the input field for email subject

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
$contact->smtp = array(
  'host' => 'smtp.gmail.com',
  'username' => 'nazrultech@gmail.com',
  'password' => 'rvxb ohcf ekal ezf',
  'port' => '587',
  'encryption' => 'tls'
);

// Adding messages to the email body
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10); // Assuming 'message' is the name attribute of the textarea for the message body

// Sending the email
echo $contact->send();
?>
