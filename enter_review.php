<?php
session_start();

require 'db_connection.php';
require 'leave_review.php';

$account = new Account();

try
{
    $newId = $account->insert_review($_POST['company'], $_POST['industry'], $_POST['e_type'], $_POST['rating'], $_POST['review'], $_POST['creat_time']);

    $_SESSION['account_id'] = $newId;

        // header('location: ./Profile/UserProfile.php');

}
catch (Exception $e)
{
    echo 'Enter Review failed.<br>';
    echo $e->getMessage();
	die();
}

// Dereferencing the object will cause PDO to close the Database connection.
// If you don't do this explicitly, PHP will automatically close the connection when your script ends.
// $pdo = NULL;
?>