<?php

define("SITE_NAME", "Our Website!"); // I added that

$subject = "Thank you for registering to " . SITE_NAME;

$mail_content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<div>
        <p>' . $user->first_name . ' ' . $user->lastname_name . ', thank you for registering to ' . SITE_NAME . '.</p>
        <p>Please click the following link to proceed to the Questionnaire "<a href ="http://www.example.com">www.example.com</a>"</p>


</div>
</body>
</html>';

echo $mail_content;
