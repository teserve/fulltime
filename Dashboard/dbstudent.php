<!-- Template
Author: templateflip
Author URL:https://templateflip.com/demo/templates/creative-cv/
-->

<!DOCTYPE html>
<html lang="en-US">

<head>
<!-- Begins session and loads in necessary php,css, and bootstrap files for visual display and functionality -->
  <?php
    session_start();

    if (!isset($_SESSION['account_id'])) header('location: ../index.html');

    include '../get_profile_pic.php';
    include '../account_class.php';

    $account = new Account();
    $account->id = $_SESSION['account_id'];

    $account->getInfo($_SESSION['account_id']);
    $account->getInfoStudent($_SESSION['account_id']);
    $account->getInfoStuSkills($_SESSION['account_id']);
    $account->getInfoStuCourses($_SESSION['account_id']);
  ?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="styles/main.css" rel="stylesheet">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

</head>
<!-- Begins html and in line php that allows for visual display of base template and saved user inputs -->
<body id="top">

  <!-- PRE LOADER -->
  <section class="preloader">
    <div class="spinner">
      <span class="spinner-rotate"></span>
    </div>
  </section>


  <!-- MENU -->
  <!-- Color of navigation bar -->
  <section class="navbar custom-navbar navbar-fixed-top" role="navigation"
    style="background-color:rgba(207, 207, 207, 1);">
    <div class="container">

      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
        </button>

        <!-- lOGO TEXT HERE -->
        <a href="../index.html" class="navbar-brand">FullTime</a>
      </div>

      <!-- MENU LINKS -->
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../Matches/StudentMatches.php">Matches</a></li>
          <li><a href="../JobSearch/Userjobs.php">Jobs</a></li>
          <li><a href="../Reviews/reviewsfinal.php">Reviews</a></li>
          <li><form action="../logout.php">
          <input type='submit' class="btn btn-primary" name='submit' value='Log Out'>
          </form></li>
        </ul>
      </div>

  </section>
<!-- Profile Header -->
  <div class="page-content">
    <div>
      <div class="profile-page">
        <div class="wrapper">
          <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url('images/fulltime.jpg');">
            </div>
            <div class="container">
              <div class="content-center">
                <div class="cc-profile-image"><img src=<?php echo getProfilePic($account->id); ?> alt="Image" /></div>
                <div class="h2 title"><?php echo $account->first_name?> <?php echo $account->last_name?></div>
                <p class="category text-white"><?php echo $account->university?>, <?php echo $account->major?>
                <p class="small text-white"><?php echo $account->bio?></p><a
                  class="btn btn-primary smooth-scroll mr-2" href="../Profile/UserProfile.php" data-aos="zoom-in"
                  data-aos-anchor="data-aos-anchor">Edit Profile</a>
              </div>
          </div>
          </div>
        </div>
      </div>
<!-- Profile Informations -->
      <!-- Basic Profile -->
      <div class="section" id="about">
        <div class="h4 text-center mb-4 title">Basic Profile</div>
        <div class="container">
          <div class="card" data-aos="fade-up" data-aos-offset="10" style="background-color: #e0e0e0;">
            <div class="row">
              <div class="col-lg-10 col-md-5">
                <div class="card-body">
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                    <div class="col-sm-8"><?php echo $account->email?>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Phone:</strong></div>
                    <div class="col-sm-8"><?php echo $account->cell?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Address:</strong></div>
                    <div class="col-sm-8"><?php echo $account->city?> <?php echo $account->Nstate?>, <?php echo $account->country?> <?php echo $account->post_code?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Major</strong></div>
                    <div class="col-sm-8"><?php echo $account->major?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Education Level:</strong></div>
                    <div class="col-sm-8"><?php echo $account->ed_level?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Graduation Date:</strong></div>
                    <div class="col-sm-8"><?php echo $account->grad_date?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">GPA:</strong></div>
                    <div class="col-sm-8"><?php echo $account->gpa?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Tech skill section -->
      <div class="section" id="techskill">
        <div class="container">
          <div class="h4 text-center mb-4 title">Technical Skills and Proficiency Level</div>
          <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account->tech_skill1?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="<?php
                          if($account->tech_rate1 === "5: Expert") {
                            echo "width: 100%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate1 === "4: Advanced") {
                            echo "width: 80%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate1 === "3: Intermediate") {
                            echo "width: 60%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate1 ==="2: Basic"){
                            echo "width: 40%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate1 === "1: Beginner") {
                            echo "width: 20%; background-color: #ffbc6e;";
                          }?>"></div><span class="progress-value" style="color: #949494;"><?php echo $account->tech_rate1?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account->tech_skill2?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="<?php
                          if($account->tech_rate2 === "5: Expert") {
                            echo "width: 100%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate2 === "4: Advanced") {
                            echo "width: 80%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate2 === "3: Intermediate") {
                            echo "width: 60%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate2 ==="2: Basic"){
                            echo "width: 40%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate2 === "1: Beginner") {
                            echo "width: 20%; background-color: #ffbc6e;";
                          }?>"></div><span class="progress-value" style="color: #949494;"><?php echo $account->tech_rate2?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account->tech_skill3?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="<?php
                          if($account->tech_rate3 === "5: Expert") {
                            echo "width: 100%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate3 === "4: Advanced") {
                            echo "width: 80%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate3 === "3: Intermediate") {
                            echo "width: 60%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate3 ==="2: Basic"){
                            echo "width: 40%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate3 === "1: Beginner") {
                            echo "width: 20%; background-color: #ffbc6e;";
                          }?>"></div><span class="progress-value" style="color: #949494;"><?php echo $account->tech_rate3?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account->tech_skill4?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="<?php
                          if($account->tech_rate4 === "5: Expert") {
                            echo "width: 100%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate4 === "4: Advanced") {
                            echo "width: 80%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate4 === "3: Intermediate") {
                            echo "width: 60%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate4 ==="2: Basic"){
                            echo "width: 40%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate4 === "1: Beginner") {
                            echo "width: 20%; background-color: #ffbc6e;";
                          }?>"></div><span class="progress-value" style="color: #949494;"><?php echo $account->tech_rate4?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account->tech_skill5?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="<?php
                          if($account->tech_rate5 === "5: Expert") {
                            echo "width: 100%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate5 === "4: Advanced") {
                            echo "width: 80%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate5 === "3: Intermediate") {
                            echo "width: 60%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate5 ==="2: Basic"){
                            echo "width: 40%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate5 === "1: Beginner") {
                            echo "width: 20%; background-color: #ffbc6e;";
                          }?>"></div><span class="progress-value" style="color: #949494;"><?php echo $account->tech_rate5?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account->tech_skill6?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="<?php
                          if($account->tech_rate6 === "5: Expert") {
                            echo "width: 100%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate6 === "4: Advanced") {
                            echo "width: 80%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate6 === "3: Intermediate") {
                            echo "width: 60%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate6 ==="2: Basic"){
                            echo "width: 40%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate6 === "1: Beginner") {
                            echo "width: 20%; background-color: #ffbc6e;";
                          }?>"></div><span class="progress-value" style="color: #949494;"><?php echo $account->tech_rate6?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account->tech_skill7?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="<?php
                          if($account->tech_rate7 === "5: Expert") {
                            echo "width: 100%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate7 === "4: Advanced") {
                            echo "width: 80%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate7 === "3: Intermediate") {
                            echo "width: 60%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate7 ==="2: Basic"){
                            echo "width: 40%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate7 === "1: Beginner") {
                            echo "width: 20%; background-color: #ffbc6e;";
                          }?>"></div><span class="progress-value" style="color: #949494;"><?php echo $account->tech_rate7?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account->tech_skill8?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="<?php
                          if($account->tech_rate8 === "5: Expert") {
                            echo "width: 100%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate8 === "4: Advanced") {
                            echo "width: 80%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate8 === "3: Intermediate") {
                            echo "width: 60%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate8 ==="2: Basic"){
                            echo "width: 40%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate8 === "1: Beginner") {
                            echo "width: 20%; background-color: #ffbc6e;";
                          }?>"></div><span class="progress-value" style="color: #949494;"><?php echo $account->tech_rate8?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account->tech_skill9?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="<?php
                          if($account->tech_rate9 === "5: Expert") {
                            echo "width: 100%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate9 === "4: Advanced") {
                            echo "width: 80%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate9 === "3: Intermediate") {
                            echo "width: 60%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate9 ==="2: Basic"){
                            echo "width: 40%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate9 === "1: Beginner") {
                            echo "width: 20%; background-color: #ffbc6e;";
                          }?>"></div><span class="progress-value" style="color: #949494;"><?php echo $account->tech_rate9?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account->tech_skill10?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="<?php
                          if($account->tech_rate10 === "5: Expert") {
                            echo "width: 100%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate10 === "4: Advanced") {
                            echo "width: 80%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate10 === "3: Intermediate") {
                            echo "width: 60%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate10 ==="2: Basic"){
                            echo "width: 40%; background-color: #ffbc6e;";
                          }
                          elseif ($account->tech_rate10 === "1: Beginner") {
                            echo "width: 20%; background-color: #ffbc6e;";
                          }?>"></div><span class="progress-value" style="color: #949494;"><?php echo $account->tech_rate10?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Soft Skill Section -->
      <div class="section" id="softskill">
        <div class="container cc-experience">
          <div class="h4 text-center mb-4 title">Soft Skills</div>
          <div class="card2">
              <div class="row">
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account->soft_skill1?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account->soft_skill2?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account->soft_skill3?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account->soft_skill4?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account->soft_skill5?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account->soft_skill6?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account->soft_skill7?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account->soft_skill8?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account->soft_skill9?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account->soft_skill10?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="section" id="softskill">
        <div class="container cc-experience">
          <div class="h4 text-center mb-4 title">Courses</div>
          <div class="card2">
              <div class="row">
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;" align="right">Course: <?php echo $account->course1?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;" align="left">Grade: <?php echo $account->course_grade1?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;" align="right">Course: <?php echo $account->course2?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;" align="left">Grade: <?php echo $account->course_grade2?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;" align="right">Course: <?php echo $account->course3?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;" align="left">Grade: <?php echo $account->course_grade3?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;" align="right">Course: <?php echo $account->course4?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;" align="left">Grade: <?php echo $account->course_grade4?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;" align="right">Course: <?php echo $account->course5?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;" align="left">Grade: <?php echo $account->course_grade5?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


<!-- Experience Section  -->
      <div class="section" id="experience">
        <div class="container cc-experience">
          <div class="h4 text-center mb-4 title">Projects</div>
          <div class="card">
            <div class="row">
              <div class="col-md-3" style="background-color:#ffbc6e;" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body cc-experience-header">
                  <div class="h5"><?php echo $account->project_title1?></div>
                </div>
              </div>
              <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                <div class="h6">
                  <p><?php echo $account->project_descr1?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="row">
              <div class="col-md-3" style="background-color:#ffbc6e;" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body cc-experience-header">
                  <div class="h5"><?php echo $account->project_title2?></div>
                </div>
              </div>
              <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body">
                  <p><?php echo $account->project_descr2?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Work Experience -->
      <div class="section" id="experience">
        <div class="container cc-experience">
          <div class="h4 text-center mb-4 title">Work Experience</div>
          <div class="card">
            <div class="row">
              <div class="col-md-3" style="background-color:#ffbc6e;" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body cc-experience-header">
                  <p><?php echo $account->work_duration1?></p>
                  <div class="h5"><?php echo $account->work_employer1?></div>
                </div>
              </div>
              <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body">
                  <div class="h5"><?php echo $account->work_position1?></div>
                  <p><?php echo $account->work_descr1?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="row">
              <div class="col-md-3" style="background-color:#ffbc6e;" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body cc-experience-header">
                  <p><?php echo $account->work_duration2?></p>
                  <div class="h5"><?php echo $account->work_employer2?></div>
                </div>
              </div>
              <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body">
                  <div class="h5"><?php echo $account->work_position2?></div>
                  <p><?php echo $account->work_descr2?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- FOOTER -->
      <footer data-stellar-background-ratio="0.5" style="background-color:black;">
        <div class="container">
          <div class="row" style="color:white;">

            <div class="col-md-9 col-sm-16">
              <div class="footer-thumb footer-info">
                <h2>FullTime</h2>
                <p>FullTime is a professional services provider for students, faculty, and employers. Our site creates
                  an immersive experience that enables students with the power to leverage available job postings and
                  find their next step.</p>
                <br></br>
                <p>Copyright &copy; 2020 FullTime</p>
              </div>
            </div>

            <div class="col-md-3 col-sm-4">
              <div class="footer-thumb">
                <h2>Find us</h2>
                <p>1245 West State Street, <br> West Lafayettte, IN 47906</p>
                <br></br>
                <p>Call us <span>(765) Get-Jobs</span></p>
                <p><a href="https://www.facebook.com/" class="fa fa-facebook-square" attr="facebook icon"></a> <a
                    href="https://twitter.com/?lang=en" class="fa fa-twitter"></a> <a href="https://www.instagram.com/"
                    class="fa fa-instagram"></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>

<!-- Javascript that animates page -->
      <script src="js/core/jquery.3.2.1.min.js"></script>
      <script src="js/core/popper.min.js"></script>
      <script src="js/core/bootstrap.min.js"></script>
      <script src="js/now-ui-kit.js?v=1.1.0"></script>
      <script src="js/aos.js"></script>
      <script src="scripts/main.js"></script>

</body>
</html>
