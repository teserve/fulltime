<?php
// Starts session and loads in data base connection files
session_start();

include '../db_connection.php';

echo var_dump($_POST);
// Runs insert query to data base for applied applicants
$app_insert_statement = 'INSERT INTO g1116887.Applied VALUES (:job_id, :employer_id, CURDATE())';

$app_insert_values = array(':employer_id' => $_SESSION['account_id'], ':job_id' => $_POST['hidden_job_id_label']);

// Runs query on values and executes command 
try
{
    $res = $pdo->prepare($app_insert_statement);
    $res->execute($app_insert_values);
}
catch (PDOException $e)
{
    echo $e->getMessage();
}



$_SESSION['app_done'] = 1;
header('location: Userjobs.php');
