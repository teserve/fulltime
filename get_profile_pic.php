<?php
session_start();

$upload_dir = "../user_data/" . $id;
$upload_file = "/profile_picture.png";
$upload_location = $upload_dir . $upload_file;

if (!file_exists($upload_location))
{
    echo "Profile/images/blankprofile.jpg";
}
else
{
    echo $upload_location;
}
