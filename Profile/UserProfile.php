<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="../css/templatemo-style.css">

  <?php
    session_start();
    include '../account_class.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);

    function showTechRatingInput($n)
    {
      echo '<option value="">Rate Technical Skill &num;' . $n . '</option>';
      echo '<option value="5">5: Expert </option>';
      echo '<option value="4">4: Advanced </option>';
      echo '<option value="3">3: Intermediate </option>';
      echo '<option value="2">2: Basic </option>';
      echo '<option value="1">1: Beginner </option>';
    }
  ?>

</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="images/blankprofile.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $account->first_name?> <?php echo $account->last_name?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
      style="min-height: 600px; background-image: url(fulltime.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $account->first_name;?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can add your skills, build your portfolio,
              and express your creative endeavors.</p>
            <a href="../Dashboard/dbstudent.php" class="btn btn-info">Dashboard</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="images/blankprofile.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
               <!-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>  -->
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Matches</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Applications</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Skills</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo $account->first_name?> <?php echo $account->last_name?><span class="font-weight-light">, 21</span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Valparaiso, Indiana
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Purdue University
                </div>
                <hr class="my-4">
                <p>Insert User Bio.</p>
                <a href="#">Show more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <form action="edit_account.php" method="post">
                    <input type='submit' class="btn btn-sm btn-primary" name='submit' value='Save'>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Phone Number</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative"
                        value=<?= $account->cell?>>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative"
                          value=<?php echo $account->email; ?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"
                          value=<?= $account->first_name?>>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative"
                        value=<?= $account->last_name?>>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative"
                          placeholder="Home Address" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative"
                          placeholder="City">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative"
                          placeholder="Country">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-postal-code">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative"
                          placeholder="Postal code">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">

                <!-- Academics -->

                <h6 class="heading-small text-muted mb-4">Academic Background</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-institution">University</label>
                        <input type="text" id="input-institution" class="form-control form-control-alternative"
                          placeholder="Enter Institution">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-major">Major</label>
                        <input type="text" id="input-major" class="form-control form-control-alternative"
                          placeholder="Enter Major">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-gpa">GPA</label>
                        <input type="text" id="input-gpa" class="form-control form-control-alternative"
                          placeholder="Enter GPA">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-grad-date">Graduation Date</label>
                        <input type="text" id="input-grad-date" class="form-control form-control-alternative"
                          placeholder="Enter Date">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">

                <!-- Skills -->

                <h6 class="heading-small text-muted mb-4">Skills</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-tech">Enter up to 10 Technical Skills</label>
                        <input type="text" id="input-tech1" class="form-control form-control-alternative"
                          placeholder="Enter Technical Skill #1">
                        <select id="input-tech1" class="form-control form-control-alternative">
                          <?php showTechRatingInput(1)?>
                        </select>
                        <input type="text" id="input-tech" class="form-control form-control-alternative"
                          placeholder="Enter Technical Skill #2">
                          <select id="input-tech2" class="form-control form-control-alternative">
                            <?php showTechRatingInput(2)?>
                          </select>
                        <input type="text" id="input-tech" class="form-control form-control-alternative"
                          placeholder="Enter Technical Skill #3">
                          <select id="input-tech3" class="form-control form-control-alternative">
                            <?php showTechRatingInput(3)?>
                          </select>
                        <input type="text" id="input-tech" class="form-control form-control-alternative"
                          placeholder="Enter Technical Skill #4">
                          <select id="input-tech4" class="form-control form-control-alternative">
                            <?php showTechRatingInput(4)?>
                          </select>
                        <input type="text" id="input-tech" class="form-control form-control-alternative"
                          placeholder="Enter Technical Skill #5">
                          <select id="input-tech5" class="form-control form-control-alternative">
                            <?php showTechRatingInput(5)?>
                          </select>
                        <input type="text" id="input-tech" class="form-control form-control-alternative"
                          placeholder="Enter Technical Skill #6">
                          <select id="input-tech6" class="form-control form-control-alternative">
                            <?php showTechRatingInput(6)?>
                          </select>
                        <input type="text" id="input-tech" class="form-control form-control-alternative"
                          placeholder="Enter Technical Skill #7">
                          <select id="input-tech7" class="form-control form-control-alternative">
                              <?php showTechRatingInput(7)?>
                          </select>
                        <input type="text" id="input-tech" class="form-control form-control-alternative"
                          placeholder="Enter Technical Skill #8">
                          <select id="input-tech8" class="form-control form-control-alternative">
                            <?php showTechRatingInput(8)?>
                          </select>
                        <input type="text" id="input-tech" class="form-control form-control-alternative"
                          placeholder="Enter Technical Skill #9">
                          <select id="input-tech9" class="form-control form-control-alternative">
                            <?php showTechRatingInput(9)?>
                          </select>
                        <input type="text" id="input-tech" class="form-control form-control-alternative"
                          placeholder="Enter Technical Skill #10">
                          <select id="input-tech10" class="form-control form-control-alternative">
                            <?php showTechRatingInput(10)?>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-certif">Certifications</label>
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          placeholder="Enter Certification #1">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          placeholder="Enter Certification #2">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          placeholder="Enter Certification #3">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          placeholder="Enter Certification #4">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          placeholder="Enter Certification #5">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-soft">Soft Skills</label>
                        <input type="text" id="input-soft" class="form-control form-control-alternative"
                          placeholder="Enter Soft Skill #1">
                        <input type="text" id="input-soft" class="form-control form-control-alternative"
                          placeholder="Enter Soft Skill #2">
                        <input type="text" id="input-soft" class="form-control form-control-alternative"
                          placeholder="Enter Soft Skill #3">
                        <input type="text" id="input-soft" class="form-control form-control-alternative"
                          placeholder="Enter Soft Skill #4">
                        <input type="text" id="input-soft" class="form-control form-control-alternative"
                          placeholder="Enter Soft Skill #5">
                        <input type="text" id="input-soft" class="form-control form-control-alternative"
                          placeholder="Enter Soft Skill #6">
                        <input type="text" id="input-soft" class="form-control form-control-alternative"
                          placeholder="Enter Soft Skill #7">
                        <input type="text" id="input-soft" class="form-control form-control-alternative"
                          placeholder="Enter Soft Skill #8">
                        <input type="text" id="input-soft" class="form-control form-control-alternative"
                          placeholder="Enter Soft Skill #9">
                        <input type="text" id="input-soft" class="form-control form-control-alternative"
                          placeholder="Enter Soft Skill #10">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name"> Awards</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative"
                          placeholder="Enter Awards">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">


                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative"
                      placeholder="A few words about you ..."></textarea>
                  </div>
                </div>
              </form>
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

        <div class="col-md-5 col-sm-12">
          <div class="footer-thumb footer-info">
            <h2>FullTime</h2>
            <p>FullTime is a professional services provider for students, faculty, and employers. Our site creates
              an immersive experience that enables students with the power to leverage available job postings and
              find their next step.</p>
              <br></br>
              <p>Copyright &copy; 2020 FullTime</p>
              </div>
          </div>
      </div>
    </div>
  </footer>
</body>
