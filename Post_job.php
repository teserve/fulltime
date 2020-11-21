<?php
session_start();

require 'db_connection.php';


$id = $_SESSION['account_id'];

global $pdo;


$industry = trim($_POST['industry']);
$position = trim($_POST['position']);
$job_type = trim($_POST['job_type']);
$ed_level = trim($_POST['ed_level']);
$gpa = trim($_POST['gpa']);
$region = trim($_POST['region']);
$company = trim($_POST['company']);
$date_closed = trim($_POST['date_closed']);
$date_post = trim($_POST['date_post']);
$job_descr = trim($_POST['job_descr']);


$tech_skill1 = trim($_POST['tech_skill1']);
$tech_skill2 = trim($_POST['tech_skill2']);
$tech_skill3 = trim($_POST['tech_skill3']);
$tech_skill4 = trim($_POST['tech_skill4']);
$tech_skill5 = trim($_POST['tech_skill5']);
$tech_skill6 = trim($_POST['tech_skill6']);
$tech_skill7 = trim($_POST['tech_skill7']);
$tech_skill8 = trim($_POST['tech_skill8']);
$tech_skill9 = trim($_POST['tech_skill9']);
$tech_skill10 = trim($_POST['tech_skill10']);

$tech_rate1 = trim($_POST['tech_rate1']);
$tech_rate2 = trim($_POST['tech_rate2']);
$tech_rate3 = trim($_POST['tech_rate3']);
$tech_rate4 = trim($_POST['tech_rate4']);
$tech_rate5 = trim($_POST['tech_rate5']);
$tech_rate6 = trim($_POST['tech_rate6']);
$tech_rate7 = trim($_POST['tech_rate7']);
$tech_rate8 = trim($_POST['tech_rate8']);
$tech_rate9 = trim($_POST['tech_rate9']);

$tech_rate10 = trim($_POST['tech_rate10']);
$soft_skill1 = trim($_POST['soft_skill1']);
$soft_skill2 = trim($_POST['soft_skill2']);
$soft_skill3 = trim($_POST['soft_skill3']);
$soft_skill4 = trim($_POST['soft_skill4']);
$soft_skill5 = trim($_POST['soft_skill5']);
$soft_skill6 = trim($_POST['soft_skill6']);
$soft_skill7 = trim($_POST['soft_skill7']);
$soft_skill8 = trim($_POST['soft_skill8']);
$soft_skill9 = trim($_POST['soft_skill9']);
$soft_skill10 = trim($_POST['soft_skill10']);


$job_query = 'INSERT INTO g1116887.Job_posting (user_id, industry, position, job_type, ed_level, gpa, region, company, date_closed, date_post, job_descr) VALUES (:user_id, :industry, :position, :job_type, :ed_level, :gpa, :region, :company, :date_closed, CURDATE(), :job_descr)';

$main_values = array(':user_id'=> $id, ':industry' => $industry, ':job_type' => $job_type,':position'=>$position, ':ed_level' => $ed_level, ':gpa' => $gpa, ':region' => $region, ':company' => $company, ':date_closed'=>$date_closed, ':job_descr' => $job_descr);

$job_skills_query = 'INSERT INTO g1116887.Job_skills (
job_id,
user_id,
tech_skill1,
tech_skill2,
tech_skill3,
tech_skill4,
tech_skill5,
tech_skill6,
tech_skill7,
tech_skill8,
tech_skill9,
tech_skill10,
tech_rate1,
tech_rate2,
tech_rate3,
tech_rate4,
tech_rate5,
tech_rate6,
tech_rate7,
tech_rate8,
tech_rate9,
tech_rate10,
soft_skill1,
soft_skill2,
soft_skill3,
soft_skill4,
soft_skill5,
soft_skill6,
soft_skill7,
soft_skill8,
soft_skill9,
soft_skill10) VALUES (
LAST_INSERT_ID(),
:user_id,
:tech_skill1,
:tech_skill2,
:tech_skill3,
:tech_skill4,
:tech_skill5,
:tech_skill6,
:tech_skill7,
:tech_skill8,
:tech_skill9,
:tech_skill10,
:tech_rate1,
:tech_rate2,
:tech_rate3,
:tech_rate4,
:tech_rate5,
:tech_rate6,
:tech_rate7,
:tech_rate8,
:tech_rate9,
:tech_rate10,
:soft_skill1,
:soft_skill2,
:soft_skill3,
:soft_skill4,
:soft_skill5,
:soft_skill6,
:soft_skill7,
:soft_skill8,
:soft_skill9,
:soft_skill10)';


$job_skills_values = array(
    ':user_id' => $id,
    ':tech_skill1' => $tech_skill1,
    ':tech_skill2' => $tech_skill2,
    ':tech_skill3' => $tech_skill3,
    ':tech_skill4' => $tech_skill4,
    ':tech_skill5' => $tech_skill5,
    ':tech_skill6' => $tech_skill6,
    ':tech_skill7' => $tech_skill7,
    ':tech_skill8' => $tech_skill8,
    ':tech_skill9' => $tech_skill9,
    ':tech_skill10' => $tech_skill10,
    ':tech_rate1' => $tech_rate1,
    ':tech_rate2' => $tech_rate2,
    ':tech_rate3' => $tech_rate3,
    ':tech_rate4' => $tech_rate4,
    ':tech_rate5' => $tech_rate5,
    ':tech_rate6' => $tech_rate6,
    ':tech_rate7' => $tech_rate7,
    ':tech_rate8' => $tech_rate8,
    ':tech_rate9' => $tech_rate9,
    ':tech_rate10' => $tech_rate10,
    ':soft_skill1' => $soft_skill1,
    ':soft_skill2' => $soft_skill2,
    ':soft_skill3' => $soft_skill3,
    ':soft_skill4' => $soft_skill4,
    ':soft_skill5' => $soft_skill5,
    ':soft_skill6' => $soft_skill6,
    ':soft_skill7' => $soft_skill7,
    ':soft_skill8' => $soft_skill8,
    ':soft_skill9' => $soft_skill9,
    ':soft_skill10' => $soft_skill10
);


try{

    $pdo->beginTransaction();

    $res1 = $pdo->prepare($job_query);
    $res1->execute($main_values);

    $res2 = $pdo->prepare($job_skills_query);
    $res2->execute($job_skills_values);

    $pdo->commit();

    header('location: ./JobSearch/Postjobs.php');
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
