<?php
//start session
session_start();

require 'db_connection.php';

$id = $_SESSION['account_id'];

$city = trim($_POST['city']);
$Nstate = trim($_POST['Nstate']);
$country = trim($_POST['country']);
$post_code = trim($_POST['post_code']);
$university = trim($_POST['university']);
$position_type = $_POST['position_type'];

//edit admin basic informations
$edit_admin_query = 'REPLACE INTO g1116887.Admin SET
user_id = :user_id,
city = :city,
Nstate = :Nstate,
country = :country,
post_code = :post_code,
university = :university,
position_type = :position_type';

$main_values = array(
    ':user_id' => $id,
    ':city' => $city,
    ':Nstate' => $Nstate,
    ':country' => $country,
    ':post_code' => $post_code,
    ':university' => $university,
    ':position_type' => $position_type
);

try{
    $pdo->beginTransaction();
    //perform edit values & update values in database
    $res1 = $pdo->prepare($edit_admin_query);
    $res1->execute($main_values);

    $pdo->commit();

    header('location: ./Profile/AdminProfile.php');
}
catch (Exception $e)
{
    echo 'Edit Profile failed.<br>';
    echo $e->getMessage();
	die();
}
