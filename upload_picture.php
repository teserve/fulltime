<?php
//start session
session_start();

function uploadProfilePicture($id)
{
    $pic_location = '/home/campus/g1116887/www/user_data/' . $id . '/profile_picture.png';

    $upload = 1;

    // Check if it is a valid image
    $invalid_image = exif_imagetype($_FILES["profile_pic"]["tmp_name"]) === FALSE;
    if($invalid_image) $upload = 0;

    // Check file size - removed for now but the option is there in case
    //      you don't want someone uploading a 50 TB file
    // $file_size_exceeded = $_FILES["profile_pic"]["size"] > 1000000000;
    // if ($file_size_exceeded) $upload = 0;

    // Perform upload
    if ($upload)
    {
        $file_string = file_get_contents($_FILES["profile_pic"]["tmp_name"]);
        $img = imagecreatefromstring($file_string);
        if (!file_exists($pic_location)) mkdir(dirname($pic_location));
        imagepng($img, $pic_location);
    }
}
