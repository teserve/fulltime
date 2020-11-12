<!DOCTYPE html>
<html lang="en">

  <head>

   <?php
    session_start();
    include '../account_class.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);
  ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Job Search</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/templatemo-style.css">

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo" style="color:#ffbc6e">FULLTIME</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="../Dashboard/dbemployer.php">Dashboard</a></li>
                            <li><a href="../JobSearch/Employerjobs.php">Jobs</a></li>
                            <li><a href="../Analytics/EmployerAnalytics.php">Analytics</a></li>
                            <li><form action="../logout.php">
                            <input type='submit' class="btn btn-primary" name='submit' value='Log Out'>
                            </form></li>
                            </form>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url('fulltime.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Search <em>Matches</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div class="row">
                <div class="col-lg-4">
                  <!-- Filter Options-->
                         <h3 style="margin-bottom: 15px">Filter by...</h5>

                         <h5 style="margin-bottom: 15px">Job Type</h5>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Internship</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Co-op</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Full-time</span>
                              </label>
                         </div>

                         <br>

                         <h5 style="margin-bottom: 15px">Education Level</h5>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Bachelor's Degree</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Master's Degree</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Doctorate Degree</span>
                              </label>
                         </div>
                         <br>

                         <h5 style="margin-bottom: 15px">GPA</h5>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>4.0</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>3.80-3.99</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>3.60-3.79</span>
                              </label>
                         </div>
                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>3.40-3.59</span>
                              </label>
                         </div>
                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>3.20-3.39</span>
                              </label>
                         </div>
                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>3.00-3.19</span>
                              </label>
                         </div>
                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>2.80-2.99</span>
                              </label>
                         </div>
                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>2.60-2.79</span>
                              </label>
                         </div>
                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>&#8805 2.50</span>
                              </label>
                         </div>
                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>< 2.49</span>
                              </label>
                         </div>
                    </form>

                    <br>
                </div>

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    <img src="blankprofile.jpg" alt="" style="width:300px;height:300px;">
                                </div>
                                <div class="down-content">
                                <span>98% Match</span>

                                    <h4>Haley Clark </h4>

                                    <p>Full Time</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                      <img src="blankprofile.jpg" alt="" style="width:300px;height:300px;">
                                </div>
                                <div class="down-content">
                                <span>96% Match</span>

                                    <h4>Courtney Halak </h4>

                                    <p>Full Time</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                      <img src="blankprofile.jpg" alt="" style="width:300px;height:300px;">
                                </div>
                                <div class="down-content">
                                <span>89% Match</span>

                                    <h4>Christopher Bower</h4>

                                    <p>Full Time</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                      <img src="blankprofile.jpg" alt="" style="width:300px;height:300px;">
                                </div>
                                <div class="down-content">
                                <span>78% Match</span>
                                    <h4>Douglas McWherter</h4>

                                    <p>Full Time</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                  <img src="blankprofile.jpg" alt="" style="width:300px;height:300px;">
                                </div>
                                <div class="down-content">
                                <span>75% Match</span>
                                    <h4>Daniel Bolinaga</h4>

                                    <p>Contract</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                      <img src="blankprofile.jpg" alt="" style="width:300px;height:300px;">
                                </div>
                                <div class="down-content">
                                <span>71% Match</span>
                                    <h4>Claire Standhart</h4>

                                    <p>Contract</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <br>
          <!--
            <nav>
              <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          -->
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->


    <!-- ***** Footer Start ***** -->
    <!-- FOOTER -->

  <footer data-stellar-background-ratio="0.5"  style="background-color:black;">
       <div class="container">
            <div class="row">

                 <div class="col-md-9 col-sm-16">
                      <div class="footer-thumb footer-info">
                           <h2>FullTime</h2>
                           <p>FullTime is a professional services provider for students, faculty, and employers. Our site creates an immersive experience that enables students with the power to leverage available job postings and find their next step.</p>
                           <br></br>
                           <p>Copyright &copy; 2020 FullTime</p>
                      </div>
                 </div>

                <!-- <div class="col-md-2 col-sm-4">
                      <div class="footer-thumb">
                           <h2>Company</h2>
                           <ul class="footer-link">
                                <li><a href="#about">About Us</a></li>
                                <li><a href="#blog">Read Testimonials</a></li>
                           </ul>
                      </div>
                 </div>

                 <div class="col-md-2 col-sm-4">
                      <div class="footer-thumb">
                           <h2>Services</h2>
                           <ul class="footer-link">
                                <li><a href="#">Job Placement</a></li>
                                <li><a href="#">Applicant Discovery</a></li>
                                <li><a href="#">Company Analytics</a></li>
                           </ul>
                      </div>
                 </div> -->

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

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>
