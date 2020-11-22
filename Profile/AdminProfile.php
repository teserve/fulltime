<!DOCTYPE html>
<html lang="en">
     <head>
 <!-- Begins Session and connects necessary css and php files to set up Amministrative Profile Page -->
     <?php
      session_start();

      if (!isset($_SESSION['account_id'])) header('location: ../index.html');

      include '../account_class.php';
      include '../get_profile_pic.php';
      $account = new Account();

      $account->getInfo($_SESSION['account_id']);
      $account->getInfoAdmin($_SESSION['account_id']);
    ?>

          <link rel="stylesheet" href="stylesheet.css">
          <link rel="stylesheet" href="../css/templatemo-style.css">
      </head>

<!-- Begins html and php that creates front end display of our Administrative Profile Page -->
<!-- In line php tags are used to load in data dynamically as user logs in from previously saved inputs -->
<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src=<?php echo getProfilePic($account->id); ?>>
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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(fulltime.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $account->first_name;?>,</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can add your personal and university information.</p>
            <a href="../Dashboard/dbadmin.php" class="btn btn-info">Dashboard</a>
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
                    <img src=<?php echo getProfilePic($account->id); ?> class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  </div>
                </div>

              </div>
              <div class="text-center">
                <h3>
                  <?php echo $account->first_name?> <?php echo $account->last_name?><span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $account->city?>, <?php echo $account->Nstate?>, <?php echo $account->country?> <?php echo $account->post_code?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $account->university?> - <?php echo $account->position_type?>
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
              <form action="../Edit_account_admin.php" method="POST" enctype="multipart/form-data" onsubmit='alert("Changes saved successfully");'>
                <div class="col-6 text-right">
                  <input type="submit" class="btn btn-sm btn-primary" value="Save">
                </div>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-first-name">First name</label>
                      <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value = <?php echo $account->first_name?>>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-last-name">Last name</label>
                      <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value =<?php echo $account->last_name?>>
                    </div>
                  </div>
                </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative"
                        value=<?= $account->email?>>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-cell">Cell:</label>
                        <input type="text" id="input-cell" class="form-control form-control-alternative"
                        value=<?= $account->cell?>>
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
                <hr class="my-4">

                <!-- Location -->
                <h6 class="heading-small text-muted mb-4">Location</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" name="city" placeholder="City" value=<?php echo $account->city?>>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-state">State</label>
                        <input type="text" id="input-state" class="form-control form-control-alternative" name="Nstate" placeholder="State" value=<?php echo $account->Nstate?>>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" name="country" placeholder="Country" value=<?php echo $account->country?>>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-postal-code">Postal code</label>
                        <input type="text" id="input-postal-code" class="form-control form-control-alternative" name="post_code" placeholder="Postal code" value=<?php echo $account->post_code?>>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">

                <!-- Advisor Info -->

                <h6 class="heading-small text-muted mb-4">Advisor Information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-university">University</label>
                        <input type="text" id="input-university" class="form-control form-control-alternative" name="university" placeholder="Enter University" value="<?php echo $account->university?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-title">Position Title</label>
                        <input type="text" id="input-title" class="form-control form-control-alternative" name="position_type" placeholder="Enter Position Title" value=<?php echo $account->position_type?>>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">

              </form>
              </div>
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
