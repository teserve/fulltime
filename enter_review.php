<?php
//start session
session_start();

require 'db_connection.php';


$id = $_SESSION['account_id'];

global $pdo;

$company = trim($_POST['company']);
$industry = trim($_POST['industry']);
$job_type = trim($_POST['job_type']);
$review_rating = trim($_POST['review_rating']);
$review_bio = trim($_POST['review_bio']);

//insert reviewer's information, message, and ratings
$review_query = 'INSERT INTO g1116887.Reviews (user_id, company, industry, job_type, review_rating, review_bio, review_date) VALUES (:user_id,:company, :industry, :job_type, :review_rating, :review_bio, CURDATE())';

$main_values = array(':user_id'=> $id, ':company' => $company,':industry' => $industry, ':job_type' => $job_type, ':review_rating' => $review_rating, ':review_bio' => $review_bio);


try{

    $pdo->beginTransaction();
    //perform insert informations to database
    $res1 = $pdo->prepare($review_query);
    $res1->execute($main_values);

    $pdo->commit();
    //directs to submit confirmation page
    header('location: ./Reviews/submitted.php');
}

catch (Exception $e)
{
    echo 'Enter Review failed.<br>';
    echo $e->getMessage();
	die();
}

// Dereferencing the object will cause PDO to close the Database connection.
// If you don't do this explicitly, PHP will automatically close the connection when your script ends.
?>
