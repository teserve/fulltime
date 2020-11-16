<?php
session_start();

include 'db_connection.php';
include 'account_class.php';

$account = new Account();

$upload_dir = "../user_data/" . $_SESSION['account_id'];
$upload_file = "/profile_picture.png";
$upload_location = $upload_dir . $upload_file;

$upload = 1;

// Check if it is a valid image
$invalid_image = exif_imagetype($_FILES["profile_pic"]["tmp_name"]) === FALSE;
if($invalid_image) $upload = 0;

// Check file size
$file_size_exceeded = $_FILES["profile_pic"]["size"] > 500000;
if ($file_size_exceeded) $upload = 0;

try
{
    // Perform upload
    if ($upload)
    {
        $file_string = file_get_contents($_FILES["profile_pic"]["tmp_name"]);
        $img = imagecreatefromstring($file_string);
        if (!file_exists($upload_dir)) mkdir($upload_dir);
        imagepng($img, $upload_location);
        echo 'Upload successful to ' . $upload_location;
    }

    $account->editAccount($_SESSION['account_id'], $_POST['email'], $_POST['input-phone'], $_POST['input-first-name'], $_POST['input-last-name']);

    if ($_POST['account_type'] == 'Student') {
        header('location: ./Profile/UserProfile.php');
    }
    elseif ($_POST['account_type'] == 'Employer') {
        header('location: ./Profile/EmployerProfile.php');
    }
    elseif ($_POST['account_type'] == 'Administration') {
        header('location: ./Profile/AdminProfile.php');
    }
}
catch (Exception $e)
{
    echo 'Account edit failed.<br>';
    echo $e->getMessage();
	die();
}

// Dereferencing the object will cause PDO to close the Database connection.
// If you don't do this explicitly, PHP will automatically close the connection when your script ends.
$pdo = NULL;
