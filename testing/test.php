
<?php
session_start();

require '../password.php';

$servername = "mydb.itap.purdue.edu";
$username = "g1116887";
$password = "12Blueapples";


echo 'here1';
$account_id = $_SESSION['account_id'];
echo $account_id;
echo 'here3';
