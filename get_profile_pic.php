<?php
function getProfilePic($id)
{
    $pic_url = 'https://web.ics.purdue.edu/~g1116887/user_data/' . $id . '/profile_picture.png';
    $pic_loc = '/home/campus/g1116887/www/user_data/' . $id . '/profile_picture.png';

    if (file_exists($pic_loc))
    {
        return $pic_url;
    }
    else
    {
        return "https://web.ics.purdue.edu/~g1116887/user_data/blankprofile.png";
    }
}
