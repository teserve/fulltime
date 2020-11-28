<?php
//start session 
session_start();

require 'db_connection.php';

$id = $_SESSION['account_id'];

$city = trim($_POST['city']);
$country = trim($_POST['country']);
$post_code = trim($_POST['post_code']);
$company = trim($_POST['company']);
$industry = trim($_POST['industry']);
$position_type = $_POST['position_type'];

//edit employer basic information
$edit_employee_query = 'REPLACE INTO g1116887.Employee SET
user_id = :user_id,
city = :city,
country = :country,
post_code = :post_code,
company = :company,
industry = :industry,
position_type = :position_type';


$main_values = array(
    ':user_id' => $id,
    ':city' => $city,
    ':country' => $country,
    ':post_code' => $post_code,
    ':company' => $company,
    ':industry' => $industry,
    ':position_type' => $position_type
);

try{
    $pdo->beginTransaction();
    //perform edit values & update values in database
    $res1 = $pdo->prepare($edit_employee_query);
    $res1->execute($main_values);

    $pdo->commit();

    header('location: ./Profile/EmployerProfile.php');
}
catch (Exception $e)
{
    echo 'Edit Profile failed.<br>';
    echo $e->getMessage();
	die();
}
