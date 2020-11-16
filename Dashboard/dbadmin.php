<!DOCTYPE html>
<html lang="en-US">

<head>

 <?php
    session_start();

    if (!isset($_SESSION['account_id'])) header('location: ../index.html');

    include '../account_class.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);

    $account4 = new Account();
    $account4->getInfoAdmin($_SESSION['account_id']);
  ?>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>profile</title>
     <meta name="description"
          content="Creative CV is a HTML resume template for professionals. Built with Bootstrap 4, Now UI Kit and FontAwesome, this modern and responsive design template is perfect to showcase your portfolio, skils and experience." />
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
     <link href="css/aos.css" rel="stylesheet">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link href="styles/main.css" rel="stylesheet">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/websitev2.css">

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
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation" style="background-color:rgba(207, 207, 207, 1);">
          <div class="container">

               <div class="navbar-header">

                    <!-- lOGO TEXT HERE -->
                    <a class="navbar-brand">FullTime</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="../Analytics/AdminSurvey.php">Analytics</a></li>
                         <li><a href="../Reviews/AdminReviews.php">Reviews</a></li>
                         <li><form action="../logout.php">
                            <input type='submit' class="btn btn-primary" name='submit' value='Log Out'>
                            </form></li>
                            </form>
                    </ul>
               </div>

          </div>
     </section>
     <div class="page-content">
               <div class="profile-page">
                 <div class="wrapper">
                         <div class="page-header" filter-color="orange">
                              <div class="page-header-image" data-parallax="true"
                                   style="background-image: url('images/fulltime.jpg');"></div>
                              <div class="container">
                                <div class="content-center">
                                  <div class="cc-profile-image"><img src="images/blankprofile.jpg" alt="Image" /></div>
                                  <div class="h2 title"><?php echo $account->first_name?> <?php echo $account->last_name?></div>
                                  <p class="category text-white"><?php echo $account4->university?> - <?php echo $account4->position_type?> </p>
                                  <p class="card-body text-white"><b>Email:</b> <?= $account->email?>   <b>Cell:</b>  <?= $account->cell?></p>
                                  <p class="card-body text-white"><b>Location:</b> <?php echo $account4->city?> , <?php echo $account4->Nstate?> , <?php echo $account4->country?>  <?php echo $account4->post_code?> </p><a
                                             class="btn btn-primary smooth-scroll mr-2" href="../Profile/AdminProfile.php"
                                             data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Edit Profile</a>
                                   </div>
                              </div>
                            </div>
                          </div>
                       </div>
                     </div>
<!--
                              <div class="section">
                                   <div class="container">

                                        <div class="button-container"><a class="btn btn-default btn-round btn-lg btn-icon" href="https://www.facebook.com/"
                                         rel="tooltip" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a><a
                                        class="btn btn-default btn-round btn-lg btn-icon" href="https://twitter.com/?lang=en" rel="tooltip"
                                        title="Follow me on Twitter"><i class="fa fa-twitter"></i></a><a
                                        class="btn btn-default btn-round btn-lg btn-icon" href="https://myaccount.google.com/" rel="tooltip"
                                        title="Follow me on Google+"><i class="fa fa-google-plus"></i></a><a
                                        class="btn btn-default btn-round btn-lg btn-icon" href="https://www.instagram.com/" rel="tooltip"
                                        title="Follow me on Instagram"><i class="fa fa-instagram"></i></a></div>
                                   </div>
                              </div>
                         </div>
                       -->

               <!--
               <div class="section" id="about" style= "background-color:black;">
                    <div class="h4 text-center mb-4 title">Basic Profile</div>
                    <div class="container">
                         <div class="card" data-aos="fade-up" data-aos-offset="10">
                              <div class="row">
                                   <div class="col-lg-6 col-md-12">
                                        <div class="card-body">
                                             <div class="row">
                                                  <div class="col-sm-4"><strong class="text-uppercase">Age:</strong>
                                                  </div>
                                                  <div class="col-sm-8"></div>
                                             </div>
                                             <div class="row mt-3">
                                                  <div class="col-sm-4"><strong class="text-uppercase">Email:</strong>
                                                  </div>
                                                  <div class="col-sm-8"> <?= $account->email?> </div>
                                             </div>
                                             <div class="row mt-3">
                                                  <div class="col-sm-4"><strong class="text-uppercase">Phone:</strong>
                                                  </div>
                                                  <div class="col-sm-8"> <?= $account->cell?></div>
                                             </div>
                                             <div class="row mt-3">
                                                  <div class="col-sm-4"><strong class="text-uppercase">Address:</strong>
                                                  </div>
                                                  <div class="col-sm-8">610 Purdue Mall, West Lafayette, IN 47906, U.S.A</div>
                                             </div>
                                             <div class="row mt-3">
                                                  <div class="col-sm-4"><strong
                                                            class="text-uppercase">Language:</strong></div>
                                                  <div class="col-sm-8">English, Spanish</div>
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
                           <p><a href="https://www.facebook.com/" class="fa fa-facebook-square" attr="facebook icon"></a>     <a href="https://twitter.com/?lang=en" class="fa fa-twitter"></a>     <a href="https://www.instagram.com/" class="fa fa-instagram"></a></p>
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
