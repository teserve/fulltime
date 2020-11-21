<!DOCTYPE html>
<html lang="en">
<head>

  <?php
  session_start();

  if (!isset($_SESSION['account_id'])) header('location: ../index.html');

  include '../account_class.php';
  $account = new Account();

  $account->getInfo($_SESSION['account_id']);
  $account->getInfoEmployer($_SESSION['account_id']);
  ?>

  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="../css/templatemo-style.css">
</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Form -->
        <!--
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
        -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
              <a href="../examples/profile.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.php" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.php" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.php" class="dropdown-item">
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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(fulltime.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $account->first_name;?>,</h1>
            <p class="text-white mt-0 mb-5">This is your edit profile page. You can add your personal and company information.</p>
            <a href="../Dashboard/dbemployer.php" class="btn btn-info">Dashboard</a>
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
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
<!--
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
                  -->
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                <?php echo $account->first_name?> <?php echo $account->last_name?><span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $account->city?>, <?php echo $account->country?> <?php echo $account->post_code?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $account->company?> - <?php echo $account->position_type?>
                </div>
                <hr class="my-4">
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
              </div>
            </div>
            <div class="card-body">
            <form action="../Edit_account_employer.php" method="POST" enctype="multipart/form-data" onsubmit='alert("Changes saved successfully");'>
                <div class="col-6 text-right">
                  <input type="submit" class="btn btn-sm btn-primary" value="Save">
                </div>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" value= "<?php echo $account->first_name?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" value= "<?php echo $account->last_name?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                        <label class="form-control-label" for="input-cell">Phone Number</label>
                        <input type="text" id="input-cell" class="form-control form-control-alternative" value= "<?php echo $account->cell?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" value= "<?php echo $account->email?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        Upload a profile picture!
                        <input type="file" name="profile_pic" id="profile_pic">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">

                <!-- Company -->

                <h6 class="heading-small text-muted mb-4">Company Information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-company">Company</label>
                        <input type="text" id="input-company" class="form-control form-control-alternative" name="company" placeholder="Enter Company" value= "<?php echo $account->company?>" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-position">Position Title</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" name="position_type" placeholder="Enter Job Position" value= "<?php echo $account->position_type?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Industry</label>
                        <select id="input-first-name" name="industry" class="form-control form-control-alternative" value= "<?php echo $account->industry?>">
                            <option value="">Enter Industry</option>
                            <option value="Business-Related Fields"<?php if($account->industry === "Business-Related Fields") echo 'selected="selected"';?>>Business-Related Fields</option>
                            <option value="Chemicals, Petroleum, Plastics & Rubber"<?php if($account->industry === "Chemicals, Petroleum, Plastics & Rubber") echo 'selected="selected"';?>>Chemicals, Petroleum, Plastics & Rubber</option>
                            <option value="Computer Systems - Design/Programming"<?php if($account->industry === "Chemicals, Petroleum, Plastics & Rubber") echo 'selected="selected"';?>>Computer Systems - Design/Programming</option>
                            <option value="Consulting Services"<?php if($account->industry === "Consulting Services") echo 'selected="selected"';?>>Consulting Services</option>
                            <option value="Consumer Goods"<?php if($account->industry === "Consumer Goods") echo 'selected="selected"';?>>Consumer Goods</option>
                            <option value="Energy"<?php if($account->industry === "Energy") echo 'selected="selected"';?>>Energy</option>
                            <option value="Engineering Services"<?php if($account->industry === "Engineering Services") echo 'selected="selected"';?>>Engineering Services</option>
                            <option value="Environmental Services"<?php if($account->industry === "Environmental Services") echo 'selected="selected"';?>>Environmental Services</option>
                            <option value="Government"<?php if($account->industry === "Government") echo 'selected="selected"';?>>Government</option>
                            <option value="Manufacturing & Industrial Systems"<?php if($account->industry === "Manufacturing & Industrial Systems") echo 'selected="selected"';?>>Manufacturing & Industrial Systems</option>
                            <option value="Other"<?php if($account->industry === "Other") echo 'selected="selected"';?>>Other</option>
                            <option value="Pharmaceuticals & Medicine"<?php if($account->industry === "Pharmaceuticals & Medicine") echo 'selected="selected"';?>>Pharmaceuticals & Medicine</option>
                            <option value="Scientific Research & Development"<?php if($account->industry === "Scientific Research & Development") echo 'selected="selected"';?>>Scientific Research & Development</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">

                <!-- Location -->
                <h6 class="heading-small text-muted mb-4">Location</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" name="city" placeholder="City" value= "<?php echo $account->city?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" name="country" placeholder="Country" value= "<?php echo $account->country?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-postal-code">Postal code</label>
                        <input type="text" id="input-postal-code" class="form-control form-control-alternative" name="post_code" placeholder="Postal code" value= "<?php echo $account->post_code?>">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">



<!--
                <h6 class="heading-small text-muted mb-4">Job Description</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Job Description</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..."></textarea>
                  </div>
                </div>
-->

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
