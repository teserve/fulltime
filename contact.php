<!--gets input from html page to be pasted to email-->
<?php $name = $_POST['name']; //user's full name
$email = $_POST['email']; //user's email
$phone = $_POST['number']; //user's phone number
$message = $_POST['message']; //user's message or question
//create message that are going to be sent to our email
$formcontent="From: $name \nEmail: $email \nPhone Number: $phone \nMessage: $message";
//our email
$recipient = "fulltime.inc.2020@gmail.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
//perforrm send email
mail($recipient, $subject, $formcontent, $mailheader);
//direct user to confirmation page
header('Location: ./Reviews/submittedcontact.html')?>
