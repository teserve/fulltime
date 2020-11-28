<?php
//start session
session_start();

require 'db_connection.php';
require 'account_class.php';

$account = new Account();

//login verification
try
{
    $res = $account->login($_POST['email'], $_POST['password']);

    //if login failed, direct back to index page
    if ($res == FALSE) header('location: index.html');

    $_SESSION['account_id'] = $account->id;
    //if login success, directs to dashboard according to account types
    if ($res === 'student') {
        header('location: ./Dashboard/dbstudent.php');
    }
    elseif ($res === 'employee') {
        header('location: ./Dashboard/dbemployer.php');
    }
    elseif ($res === 'admin') {
        header('location: ./Dashboard/dbadmin.php');
    }
}
catch (Exception $e)
{
    echo $e->getMessage();
	die();
}

// Dereferencing the object will cause PDO to close the Database connection.
// If you don't do this explicitly, PHP will automatically close the connection when your script ends.
$pdo = NULL;
?>
