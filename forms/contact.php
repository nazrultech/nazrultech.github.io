<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'nazrultech@gmail.com';

$php_email_form = '../assets/vendor/php-email-form/php-email-form.php';
if (file_exists($php_email_form)) {
    include($php_email_form);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Unable to load the PHP Email Form Library!']);
    exit;
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'] ?? 'No Name';
$contact->from_email = $_POST['email'] ?? 'noemail@example.com';
$contact->subject = $_POST['subject'] ?? 'No Subject';

$contact->smtp = array(
  'host' => 'smtp.gmail.com',
  'username' => 'nazrultech@gmail.com',
  'password' => 'dzlg bepf ftab cell', // replace this with your regenerated Gmail App Password
  'port' => '587',
  'encryption' => 'tls'
);

$contact->add_message($_POST['name'] ?? '', 'From');
$contact->add_message($_POST['email'] ?? '', 'Email');
$contact->add_message($_POST['message'] ?? '', 'Message', 10);

if ($contact->send()) {
    echo json_encode(['success' => 'Message sent successfully.']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to send message.']);
}
?>
