<?php

session_start();

require 'db_connection.php';
require 'account_class.php';

$account = new Account();

try
{
	$newId = $account->addAccount($_POST['username'], $_POST['password']);
}
catch (Exception $e)
{
    echo 'Account creation failed.';
    echo $e->getMessage();
	die();
}

echo 'Account creation successfull.';