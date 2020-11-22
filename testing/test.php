
<?php
session_start();

require '../password.php';
include '../db_connection.php';
include '../get_profile_pic.php';

$param = $_GET['asdf'];
echo $param;
echo '<br>';
echo gettype($param);
echo '<br>';
echo intval($param);
echo '<br>';
if (string(0) == TRUE)
{
    $testing = 1;
}

echo $testing;