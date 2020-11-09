<?php
session_start();

require 'db_connection.php';
require 'account_class.php';

$account = new Account();

try
{
    $newId = $account->editAccount($_SESSION['account_id'], $_POST['email'], $_POST['telephone'], $_POST['first_name'], $_POST['last_name']);

    if ($_POST['account_type'] == 'Student') {
        header('location: ./Profile/UserProfile.php');
    }
    elseif ($_POST['account_type'] == 'Employer') {
        header('location: ./Profile/EmployerProfile.html');
    }
    elseif ($_POST['account_type'] == 'Administration') {
        header('location: ./Profile/AdminProfile.html');
    }
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
