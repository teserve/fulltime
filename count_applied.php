<?php
//start session
require 'password.php';
include 'db_connection.php';


global $pdo;

$id -> $_SESSION['account_id'];

//counts total number of applicants
$query = 'SELECT COUNT(FROM g1116887.Applied) WHERE (user_id = :id)';

$values = array(':id' => $id);

try{
        $res = $pdo->prepare($query);
        $res-> execute($values);
}


  catch (Exception $e)
{
    echo 'Count Failed.<br>';
    echo $e->getMessage();
	die();
}
?>
