<?php
session_start();

require 'db_connection.php';

$id = $_SESSION['account_id'];

$company = trim($_POST['company']);
$position_type = trim($_POST['position_type']);
$industry = trim($_POST['industry']);
$city= trim($_POST['city']);
$country = trim($_POST['country']);
$post_code = trim($_POST['post_code']);

$edit_employee_query = 'REPLACE INTO g1116887.Employee SET 
user_id = :user_id, 
company = :company, 
position = :position, 
industry = :industry, 
city = :city, 
country = :country,
post_code = :post_code';

$main_values = array(
    ':user_id' => $id,
    ':company' => $company,
    ':position_type' => $position_type,
    ':industry' => $industry,
    ':city' => $city,
    ':country' => $country,
    ':post_code' => $post_code
);

try{
    $pdo->beginTransaction();

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

