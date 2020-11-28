<?php
//start session
session_start();

require 'db_connection.php';
require 'account_class.php';

$account = new Account();

//add new account into database upon sign up
try
{
    $newId = $account->addAccount($_POST['password'], $_POST['email'], $_POST['telephone'], $_POST['first_name'], $_POST['last_name'], $_POST['account_type']);

    $_SESSION['account_id'] = $newId;

    //direct into its specific profile page based on account type
    if ($_POST['account_type'] == 'Student') {
        header('location: ./Profile/UserProfile.php');
    }
    elseif ($_POST['account_type'] == 'Employer') {
        header('location: ./Profile/EmployerProfile.php');
    }
    elseif ($_POST['account_type'] == 'Administration') {
        header('location: ./Profile/AdminProfile.php');
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
