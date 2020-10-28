<?php
session_start();

require 'db_connection.php';
require 'account_class.php';

$account = new Account();

try
{
    $newId = $account->addAccount($_POST['username'], $_POST['password'], $_POST['email'], $_POST['telephone'], $_POST['name'], $_POST['name']);
    echo 'Account creation successfull. <br>Account ID = ' . $newId;
}
catch (Exception $e)
{
    echo 'Account creation failed.<br>';
    echo $e->getMessage();
	die();
}

// Dereferencing the object will cause PDO to close the Database connection.
// If you don't do this explicitly, PHP will automatically close the connection when your script ends.
$pdo = NULL;
