<?php

session_start();

require 'db_connection.php';
require 'account_class.php';

$account = new Account();

try
{
    $res = $account->login($_POST['email'], $_POST['password']);

    if ($res == FALSE) header('location: index.html');

    $_SESSION['account_id'] = $account->id;

    if ($res === 'student') {
        header('location: ./Dashboard/dbstudent.php');
    }
    elseif ($res === 'employee') {
        header('location: ./Dashboard/dbemployer.html');
    }
    elseif ($res === 'admin') {
        header('location: ./Dashboard/dbadmin.html');
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
