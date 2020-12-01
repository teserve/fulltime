<?php
//get profile pic from user's specific folder
function getProfilePic($id)
{
    $pic_url = 'https://web.ics.purdue.edu/~g1116887/user_data/' . $id . '/profile_picture.png';
    $pic_loc = '/home/campus/g1116887/www/user_data/' . $id . '/profile_picture.png';
    //if the user has uploaded their profile pic, return the picture file
    if (file_exists($pic_loc))
    {
        return $pic_url . '?' . filemtime($pic_loc);
    }
    //if the user hasn't uploaded their profile pic, return the blank profile picture
    else
    {
        return "https://web.ics.purdue.edu/~g1116887/user_data/blankprofile.png";
    }
}
