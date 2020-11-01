<?php

session_start();

require 'db_connection.php';
require 'account_class.php';

$account = new Account();

try
{
    $res = $account->login($_POST['email'], $_POST['password']);
    if ($res) header('location: ./Student%20Profile%20Documents/User%20Profile.html');
    else header('location: index.html');
}
catch (Exception $e)
{
    echo $e->getMessage();
	die();
}

// Dereferencing the object will cause PDO to close the Database connection.
// If you don't do this explicitly, PHP will automatically close the connection when your script ends.
$pdo = NULL;
