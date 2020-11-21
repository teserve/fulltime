<?php
session_start();

require 'db_connection.php';
require 'upload_picture.php';

$id = $_SESSION['account_id'];

uploadProfilePicture($id);


$cell = trim($_POST['input-phone']);
$email = trim($_POST['input-email']);
$first_name = trim($_POST['input-first-name']);
$last_name = trim($_POST['input-last-name']);
$city = trim($_POST['city']);
$Nstate = trim($_POST['Nstate']);
$country = trim($_POST['country']);
$post_code = trim($_POST['post_code']);
$university = trim($_POST['university']);
$major = trim($_POST['major']);
$gpa = trim($_POST['gpa']);
$grad_date = trim($_POST['grad_date']);
$ed_level = trim($_POST['ed_level']);
$bio = trim($_POST['bio']);
$region = trim($_POST['region']);
$job_type = trim($_POST['job_type']);
$industry = trim($_POST['industry']);
$project_title1 = trim($_POST['project_title1']);
$project_title2 = trim($_POST['project_title2']);
$project_descr1 = trim($_POST['project_descr1']);
$project_descr2 = trim($_POST['project_descr2']);
$work_employer1 = trim($_POST['work_employer1']);
$work_position1 = trim($_POST['work_position1']);
$work_duration1 = trim($_POST['work_duration1']);
$work_descr1 = trim($_POST['work_descr1']);
$work_employer2 = trim($_POST['work_employer2']);
$work_position2 = trim($_POST['work_position2']);
$work_duration2 = trim($_POST['work_duration2']);
$work_descr2 = trim($_POST['work_descr2']);

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

$course1 = trim($_POST['course1']);
$course2 = trim($_POST['course2']);
$course3 = trim($_POST['course3']);
$course4 = trim($_POST['course4']);
$course5 = trim($_POST['course5']);

$course_grade1 = trim($_POST['course_grade1']);
$course_grade2 = trim($_POST['course_grade2']);
$course_grade3 = trim($_POST['course_grade3']);
$course_grade4 = trim($_POST['course_grade4']);
$course_grade5 = trim($_POST['course_grade5']);

$user_query = 'UPDATE g1116887.User SET
fir_name = :first_name,
las_name = :last_name,
email = :email,
cell = :cell
WHERE
user_id = :user_id';

$user_values = array(
    ':user_id' => $id,
    ':email' => $email,
    ':cell' => $cell,
    ':first_name' => $first_name,
    ':last_name' => $last_name
);

$edit_student_query = 'UPDATE g1116887.Student SET
city = :city,
Nstate = :Nstate,
country = :country,
post_code = :post_code,
university = :university,
major = :major,
gpa = :gpa,
grad_date = :grad_date,
ed_level = :ed_level,
bio = :bio,
region = :region,
job_type = :job_type,
industry = :industry,
project_title1 = :project_title1,
project_title2 = :project_title2,
project_descr1 = :project_descr1,
project_descr2 = :project_descr2,
work_employer1 = :work_employer1,
work_position1 = :work_position1,
work_duration1 = :work_duration1,
work_descr1 = :work_descr1,
work_employer2 = :work_employer2,
work_position2 = :work_position2,
work_duration2 = :work_duration2,
work_descr2 = :work_descr2
WHERE
user_id = :user_id';

$main_values = array(
    ':user_id' => $id,
    ':city' => $city,
    ':Nstate' => $Nstate,
    ':country' => $country,
    ':post_code' => $post_code,
    ':university' => $university,
    ':major' => $major,
    ':gpa' => $gpa,
    ':grad_date' => $grad_date,
    ':ed_level' => $ed_level,
    ':bio' => $bio,
    ':region' => $region,
    ':job_type' => $job_type,
    ':industry' => $industry,
    ':project_title1' => $project_title1,
    ':project_title2' => $project_title2,
    ':project_descr1' => $project_descr1,
    ':project_descr2' => $project_descr2,
    ':work_employer1' => $work_employer1,
    ':work_position1' => $work_position1,
    ':work_duration1' => $work_duration1,
    ':work_descr1' => $work_descr1,
    ':work_employer2' => $work_employer2,
    ':work_position2' => $work_position2,
    ':work_duration2' => $work_duration2,
    ':work_descr2' => $work_descr2
);

$skills_query = 'REPLACE INTO g1116887.Student_skills SET
user_id = :user_id,
tech_skill1 = :tech_skill1,
tech_skill2 = :tech_skill2,
tech_skill3 = :tech_skill3,
tech_skill4 = :tech_skill4,
tech_skill5 = :tech_skill5,
tech_skill6 = :tech_skill6,
tech_skill7 = :tech_skill7,
tech_skill8 = :tech_skill8,
tech_skill9 = :tech_skill9,
tech_skill10 = :tech_skill10,
tech_rate1 = :tech_rate1,
tech_rate2 = :tech_rate2,
tech_rate3 = :tech_rate3,
tech_rate4 = :tech_rate4,
tech_rate5 = :tech_rate5,
tech_rate6 = :tech_rate6,
tech_rate7 = :tech_rate7,
tech_rate8 = :tech_rate8,
tech_rate9 = :tech_rate9,
tech_rate10 = :tech_rate10,
soft_skill1 = :soft_skill1,
soft_skill2 = :soft_skill2,
soft_skill3 = :soft_skill3,
soft_skill4 = :soft_skill4,
soft_skill5 = :soft_skill5,
soft_skill6 = :soft_skill6,
soft_skill7 = :soft_skill7,
soft_skill8 = :soft_skill8,
soft_skill9 = :soft_skill9,
soft_skill10 = :soft_skill10';

$skills_values = array(
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

$course_query = 'REPLACE INTO g1116887.Student_courses SET
user_id = :user_id,
course1 = :course1,
course2 = :course2,
course3 = :course3,
course4 = :course4,
course5 = :course5,
course_grade1 = :course_grade1,
course_grade2 = :course_grade2,
course_grade3 = :course_grade3,
course_grade4 = :course_grade4,
course_grade5 = :course_grade5';

$course_values = array(
    ':user_id' => $id,
    ':course1' => $course1,
    ':course2' => $course2,
    ':course3' => $course3,
    ':course4' => $course4,
    ':course5' => $course5,
    ':course_grade1' => $course_grade1,
    ':course_grade2' => $course_grade2,
    ':course_grade3' => $course_grade3,
    ':course_grade4' => $course_grade4,
    ':course_grade5' => $course_grade5
);


try{
    $pdo->beginTransaction();

    $res = $pdo->prepare($user_query);
    $res->execute($user_values);

    $res1 = $pdo->prepare($edit_student_query);
    $res1->execute($main_values);

    $res2 = $pdo->prepare($skills_query);
    $res2->execute($skills_values);

    $res3 = $pdo->prepare($course_query);
    $res3->execute($course_values);

    $pdo->commit();

    header('location: ./Profile/UserProfile.php');
}
catch (Exception $e)
{
    echo 'Edit Profile failed.<br>';
    echo $e->getMessage();
	die();
}
