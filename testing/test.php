
<?php
session_start();

require '../password.php';
include '../db_connection.php';
include '../get_profile_pic.php';

getProfilePic($_SESSION['account_id']);


// foreach ($_SERVER as $key => $val)
// {
//     echo $key . ': ' . $val . '<br>';
// }