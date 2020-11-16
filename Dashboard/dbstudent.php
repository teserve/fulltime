<!DOCTYPE html>
<html lang="en-US">

<head>

  <?php
    session_start();

    if (!isset($_SESSION['account_id'])) header('location: ../index.html');

    include '../account_class.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);

    $account2 = new Account();
    $account2->getInfoStudent($_SESSION['account_id']);

    $account3 = new Account();
    $account3->getInfoStuSkills($_SESSION['account_id']);

  ?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile Page</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="styles/main.css" rel="stylesheet">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

</head>

<body id="top">

  <section class="preloader">
    <div class="spinner">
      <span class="spinner-rotate"></span>
    </div>
  </section>


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
  <div class="page-content">
    <div>
      <div class="profile-page">
        <div class="wrapper">
          <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url('images/fulltime.jpg');">
            </div>
            <div class="container">
              <div class="content-center">
                <div class="cc-profile-image"><img src="images/blankprofile.jpg" alt="Image" /></div>
                <div class="h2 title"><?php echo $account->first_name?> <?php echo $account->last_name?></div>
                <p class="category text-white"><?php echo $account2->university?>, <?php echo $account2->major?>
                <p class="small text-white"><?php echo $account2->bio?></p><a
                  class="btn btn-primary smooth-scroll mr-2" href="../Profile/UserProfile.php" data-aos="zoom-in"
                  data-aos-anchor="data-aos-anchor">Edit Profile</a>
              </div>
          </div>
            <!--
            <div class="section">
              <div class="container">
                <div class="button-container"><a class="btn btn-default btn-round btn-lg btn-icon"
                    href="https://www.facebook.com/" rel="tooltip" title="Follow me on Facebook"><i
                      class="fa fa-facebook"></i></a><a class="btn btn-default btn-round btn-lg btn-icon"
                    href="https://twitter.com/?lang=en" rel="tooltip" title="Follow me on Twitter"><i
                      class="fa fa-twitter"></i></a><a class="btn btn-default btn-round btn-lg btn-icon"
                    href="https://myaccount.google.com/" rel="tooltip" title="Follow me on Google+"><i
                      class="fa fa-google-plus"></i></a><a class="btn btn-default btn-round btn-lg btn-icon"
                    href="https://www.instagram.com/" rel="tooltip" title="Follow me on Instagram"><i
                      class="fa fa-instagram"></i></a></div>
              </div>
            </div>
          -->
          </div>
        </div>
      </div>
      <div class="section" id="about">
        <div class="h4 text-center mb-4 title">Basic Profile</div>
        <div class="container">
          <div class="card" data-aos="fade-up" data-aos-offset="10" style="background-color: #e0e0e0;">
            <div class="row">
              <div class="col-lg-10 col-md-5">
                <div class="card-body">
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                    <div class="col-sm-8"><?php echo $account->email?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Phone:</strong></div>
                    <div class="col-sm-8"><?php echo $account->cell?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Address:</strong></div>
                    <div class="col-sm-8"><?php echo $account2->city?> <?php echo $account2->Nstate?>, <?php echo $account2->country?> <?php echo $account2->post_code?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Major</strong></div>
                    <div class="col-sm-8"><?php echo $account2->major?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Education Level:</strong></div>
                    <div class="col-sm-8"><?php echo $account2->ed_level?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Graduation Date:</strong></div>
                    <div class="col-sm-8"><?php echo $account2->grad_date?></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">GPA:</strong></div>
                    <div class="col-sm-8"><?php echo $account2->gpa?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="section" id="techskill">
        <div class="container">
          <div class="h4 text-center mb-4 title">Technical Skills and Proficiency Level</div>
          <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account3->tech_skill1?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style=  <?php if($account3->tech_skill1 === "5: Expert") {echo "width:"100%"; background-color: #ffbc6e;"} elseif ($account3->tech_skill1 === "4: Advanced") {echo "width:"80%"; background-color: #ffbc6e;"} elseif ($account3->tech_skill1 === "3: Intermediate") {echo "width:"60%"; background-color: #ffbc6e;"}
                        elseif ($account3->tech_skill1 ==="2: Basic"){echo "width:"40%"; background-color: #ffbc6e;"} elseif ($account3->tech_skill1 ==="1: Beginner") {echo "width:"20%"; background-color: #ffbc6e;"}?>></div><span class="progress-value" style="color: #949494;"><?php echo $account3->tech_rate1?></span>
                    </div>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account3->tech_skill2?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%; background-color: #ffbc6e;"></div><span class="progress-value" style="color: #949494;"><?php echo $account3->tech_rate2?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account3->tech_skill3?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%; background-color: #ffbc6e;"></div><span class="progress-value" style="color: #949494;"><?php echo $account3->tech_rate3?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account3->tech_skill4?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%; background-color: #ffbc6e;"></div><span class="progress-value" style="color: #949494;"><?php echo $account3->tech_rate4?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account3->tech_skill5?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%; background-color: #ffbc6e;"></div><span class="progress-value" style="color: #949494;"><?php echo $account3->tech_rate5?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account3->tech_skill6?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%; background-color: #ffbc6e;"></div><span class="progress-value" style="color: #949494;"><?php echo $account3->tech_rate6?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account3->tech_skill7?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%; background-color: #ffbc6e;"></div><span class="progress-value" style="color: #949494;"><?php echo $account3->tech_rate7?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account3->tech_skill8?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%; background-color: #ffbc6e;"></div><span class="progress-value" style="color: #949494;"><?php echo $account3->tech_rate8?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account3->tech_skill9?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%; background-color: #ffbc6e;"></div><span class="progress-value" style="color: #949494;"><?php echo $account3->tech_rate9?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="progress-container progress-primary"><span class="progress-badge" style="color: #949494;"><?php echo $account3->tech_skill10?></span>
                    <div class="progress" style="background-color: #737373;">
                      <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10"
                        data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%; background-color: #ffbc6e;"></div><span class="progress-value" style="color: #949494;"><?php echo $account3->tech_rate10?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="section" id="softskill">
        <div class="container cc-experience">
          <div class="h4 text-center mb-4 title">Soft Skills</div>
          <div class="card2">
              <div class="row">
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account3->soft_skill1?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account3->soft_skill2?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account3->soft_skill3?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account3->soft_skill4?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account3->soft_skill5?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account3->soft_skill6?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account3->soft_skill7?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account3->soft_skill8?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account3->soft_skill9?></div>
                  </div>
                </div>
                <div class="col-sm-6" style="background-color:#ededed;" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                  <div class="card-body cc-experience-header2">
                    <div class="h5" style="color:#ffbc6e;"><?php echo $account3->soft_skill10?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="section" id="experience">
        <div class="container cc-experience">
          <div class="h4 text-center mb-4 title">Certifications and Awards</div>
          <div class="card">
            <div class="row">
              <div class="col-md-3" style="background-color:#ffbc6e;" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body cc-experience-header">
                  <div class="h5">Certifications and Awards</div>
                </div>
              </div>
              <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body">
                  <div class="h6 small"><?php echo $account2->award1?></div>
                  <div class="h6"><?php echo $account2->award2?></div>
                  <div class="h6"><?php echo $account2->award3?></div>
                  <div class="h6"><?php echo $account2->award4?></div>
                  <div class="h6"><?php echo $account2->award5?></div>
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
                  <p><?php echo $account2->work_duration1?></p>
                  <div class="h5"><?php echo $account2->work_employer1?></div>
                </div>
              </div>
              <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body">
                  <div class="h5"><?php echo $account2->work_position1?></div>
                  <p><?php echo $account2->work_descr1?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="row">
              <div class="col-md-3" style="background-color:#ffbc6e;" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body cc-experience-header">
                  <p><?php echo $account2->work_duration2?></p>
                  <div class="h5"><?php echo $account2->work_employer2?></div>
                </div>
              </div>
              <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body">
                  <div class="h5"><?php echo $account2->work_position2?></div>
                  <p><?php echo $account2->work_descr2?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--
      <div class="section">
        <div class="container cc-education">
          <div class="h4 text-center mb-4 title">Education</div>
          <div class="card">
            <div class="row">
              <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body cc-education-header">
                  <p>2018 - 2020</p>
                  <div class="h5">Bachelor's Degree</div>
                </div>
              </div>
              <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body">
                  <div class="h5">Purdue University</div>
                  <p class="category">Industrial Engineering</p>
                  <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis,
                    tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend
                    primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros
                    pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium
                    molestie ultricies sollicitudin dui.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="row">
              <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body cc-education-header">
                  <p>2015 - 2018</p>
                  <div class="h5">High School</div>
                </div>
              </div>
              <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                <div class="card-body">
                  <div class="h5">School of Secondary board</div>
                  <p class="category">Science and Mathematics</p>
                  <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis,
                    tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend
                    primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros
                    pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium
                    molestie ultricies sollicitudin dui.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    -->
      <!--
<div class="section" id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-md-6 ml-auto mr-auto">
        <div class="h4 text-center mb-4 title">Projects</div>
        <div class="nav-align-center">
          <ul class="nav nav-pills nav-pills-primary" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#web-development" role="tablist"><i class="fa fa-laptop" aria-hidden="true"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#graphic-design" role="tablist"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Photography" role="tablist"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="tab-content gallery mt-5">
      <div class="tab-pane active" id="web-development">
        <div class="ml-auto mr-auto">
          <div class="row">
            <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#web-development">
                  <figure class="cc-effect"><img src="images/project-1.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Recent Project</div>
                      <p>Web Development</p>
                    </figcaption>
                  </figure></a></div>
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#web-development">
                  <figure class="cc-effect"><img src="images/project-2.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Startup Project</div>
                      <p>Web Development</p>
                    </figcaption>
                  </figure></a></div>
            </div>
            <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#web-development">
                  <figure class="cc-effect"><img src="images/project-3.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Food Order Project</div>
                      <p>Web Development</p>
                    </figcaption>
                  </figure></a></div>
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#web-development">
                  <figure class="cc-effect"><img src="images/project-4.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Web Advertising Project</div>
                      <p>Web Development</p>
                    </figcaption>
                  </figure></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="graphic-design" role="tabpanel">
        <div class="ml-auto mr-auto">
          <div class="row">
            <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#graphic-design">
                  <figure class="cc-effect"><img src="images/graphic-design-1.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Triangle Pattern</div>
                      <p>Graphic Design</p>
                    </figcaption>
                  </figure></a></div>
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#graphic-design">
                  <figure class="cc-effect"><img src="images/graphic-design-2.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Abstract Umbrella</div>
                      <p>Graphic Design</p>
                    </figcaption>
                  </figure></a></div>
            </div>
            <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#graphic-design">
                  <figure class="cc-effect"><img src="images/graphic-design-3.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Cube Surface Texture</div>
                      <p>Graphic Design</p>
                    </figcaption>
                  </figure></a></div>
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#graphic-design">
                  <figure class="cc-effect"><img src="images/graphic-design-4.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Abstract Line</div>
                      <p>Graphic Design</p>
                    </figcaption>
                  </figure></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="Photography" role="tabpanel">
        <div class="ml-auto mr-auto">
          <div class="row">
            <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#Photography">
                  <figure class="cc-effect"><img src="images/photography-1.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Photoshoot</div>
                      <p>Photography</p>
                    </figcaption>
                  </figure></a></div>
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#Photography">
                  <figure class="cc-effect"><img src="images/photography-3.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Wedding Photoshoot</div>
                      <p>Photography</p>
                    </figcaption>
                  </figure></a></div>
            </div>
            <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#Photography">
                  <figure class="cc-effect"><img src="images/photography-2.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Beach Photoshoot</div>
                      <p>Photography</p>
                    </figcaption>
                  </figure></a></div>
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#Photography">
                  <figure class="cc-effect"><img src="images/photography-4.jpg" alt="Image"/>
                    <figcaption>
                      <div class="h4">Nature Photoshoot</div>
                      <p>Photography</p>
                    </figcaption>
                  </figure></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
-->
      <!--
<div class="section" id="reference">
  <div class="container cc-reference">
    <div class="h4 mb-4 text-center title">References</div>
    <div class="card" data-aos="zoom-in">
      <div class="carousel slide" id="cc-Indicators" data-ride="carousel">
        <ol class="carousel-indicators">
          <li class="active" data-target="#cc-Indicators" data-slide-to="0"></li>
          <li data-target="#cc-Indicators" data-slide-to="1"></li>
          <li data-target="#cc-Indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-lg-2 col-md-3 cc-reference-header"><img src="images/reference-image-1.jpg" alt="Image"/>
                <div class="h5 pt-2">Aiyana</div>
                <p class="category">CEO / WEBM</p>
              </div>
              <div class="col-lg-10 col-md-9">
                <p> Habitasse venenatis commodo tempor eleifend arcu sociis sollicitudin ante pulvinar ad, est porta cras erat ullamcorper volutpat metus duis platea convallis, tortor primis ac quisque etiam luctus nisl nullam fames. Ligula purus suscipit tempus nascetur curabitur donec nam ullamcorper, laoreet nullam mauris dui aptent facilisis neque elementum ac, risus semper felis parturient fringilla rhoncus eleifend.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-lg-2 col-md-3 cc-reference-header"><img src="images/reference-image-2.jpg" alt="Image"/>
                <div class="h5 pt-2">Braiden</div>
                <p class="category">CEO / Creativem</p>
              </div>
              <div class="col-lg-10 col-md-9">
                <p> Habitasse venenatis commodo tempor eleifend arcu sociis sollicitudin ante pulvinar ad, est porta cras erat ullamcorper volutpat metus duis platea convallis, tortor primis ac quisque etiam luctus nisl nullam fames. Ligula purus suscipit tempus nascetur curabitur donec nam ullamcorper, laoreet nullam mauris dui aptent facilisis neque elementum ac, risus semper felis parturient fringilla rhoncus eleifend.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-lg-2 col-md-3 cc-reference-header"><img src="images/reference-image-3.jpg" alt="Image"/>
                <div class="h5 pt-2">Alexander</div>
                <p class="category">CEO / Webnote</p>
              </div>
              <div class="col-lg-10 col-md-9">
                <p> Habitasse venenatis commodo tempor eleifend arcu sociis sollicitudin ante pulvinar ad, est porta cras erat ullamcorper volutpat metus duis platea convallis, tortor primis ac quisque etiam luctus nisl nullam fames. Ligula purus suscipit tempus nascetur curabitur donec nam ullamcorper, laoreet nullam mauris dui aptent facilisis neque elementum ac, risus semper felis parturient fringilla rhoncus eleifend.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
-->
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

      <script src="js/core/jquery.3.2.1.min.js"></script>
      <script src="js/core/popper.min.js"></script>
      <script src="js/core/bootstrap.min.js"></script>
      <script src="js/now-ui-kit.js?v=1.1.0"></script>
      <script src="js/aos.js"></script>
      <script src="scripts/main.js"></script>
</body>

</html>
