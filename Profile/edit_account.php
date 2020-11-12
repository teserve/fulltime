<?php
session_start();

include 'db_connection.php';
include 'account_class.php';

// $account = new Account();

echo var_dump($_POST) . "<br>";
echo $_FILES['profile_pic']['name'];

$target_file = "../../user_data/" . $_SESSION['account_id'] . "/profile_picture.png";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if it is a valid image
if(exif_imagetype($_FILES["profile_pic"]["tmp_name"]) === FALSE)
{
    $uploadOk = 0;
    echo 'not a valid image';
}

// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}

// Check file size
if ($_FILES["profile_pic"]["size"] > 500000)
{
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}

// Perform upload
// if ($uploadOk)
// {
//     $file_string = file_get_contents($_FILES["profile_pic"]["tmp_name"]);
//     $img = imagecreatefromstring($file_string);
//     imagepng($img, "output.png");
// }


try
{
    // $newId = $account->editAccount($_SESSION['account_id'], $_POST['email'], $_POST['telephone'], $_POST['first_name'], $_POST['last_name']);

    // if ($_POST['account_type'] == 'Student') {
    //     header('location: ./Profile/UserProfile.php');
    // }
    // elseif ($_POST['account_type'] == 'Employer') {
    //     header('location: ./Profile/EmployerProfile.php');
    // }
    // elseif ($_POST['account_type'] == 'Administration') {
    //     header('location: ./Profile/AdminProfile.php');
    // }
}
catch (Exception $e)
{
    echo 'Account creation failed.<br>';
    echo $e->getMessage();
	die();
}

// Dereferencing the object will cause PDO to close the Database connection.
// If you don't do this explicitly, PHP will automatically close the connection when your script ends.
$pdo = NULL;
