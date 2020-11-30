<!--Template
Author: phpjabbers
Author URL: https://www.phpjabbers.com/free-job-portal-web-template-133.php
-->
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Begins session and loads in necessary css, boostrap, and php files to ensure page is dynamic and visually appealing -->

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
     <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
          rel="stylesheet">

     <title>Ratings</title>

     <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

     <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

     <link rel="stylesheet" href="assets/css/style.css">

     <link rel="stylesheet" href="assets/css/templatemo-style.css">

</head>
<!-- Begins Html, php, and css that loads in our front end of the review page -->
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
                              <a class="logo" style="color:#ffbc6e">FULLTIME</a>
                              <!-- ***** Logo End ***** -->
                              <!-- ***** Menu Start ***** -->
                              <ul class="nav">
                                   <li><a href="../Dashboard/dbstudent.php">Dashboard</a></li>
                                   <li><a href="../JobSearch/Userjobs.php">Jobs</a></li>
                                   <li><a href="../Matches/StudentMatches.php">Matches</a></li>
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
                              <h2>View <em>Reviews</em></h2>
                              </h2>
                              <br>
                              <a class="btn btn-primary smooth-scroll mr-2" href="../Reviews/leave_areview.php" data-aos="zoom-in"
                                         data-aos-anchor="data-aos-anchor">Leave a Review</a>
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
<!-- Runs query on database to enable user to select from listed items from reviews table -->
               <div class="row">
                    <div class="col-lg-12">
                         <div class="row">
                           <?php include "../db_connection.php";
                            $res1 = $pdo->query('SELECT * FROM Reviews');
                            if (count($res1) === 0) {
                              echo "No Reviews Posted";
                            } else {
                              foreach ($res1 as $post){
                                echo '<div class="col-md-6">';
                                echo '<div class="trainer-item">';
                                echo '<div class="down-content">';
                                echo '<span> &#9733 ' . $post['review_rating'] . ' Star(s) &#9733 </span>';
                                echo '<h4>' . $post['company'] . ' | ' . $post['job_type'] . ' | ' . $post['industry'] . '</h4>';
                                echo '<h6>' . $post['review_bio'] . '</h6>';
                                echo '<small>' . $post['review_date'] . '</small>';
                                echo '<ul class="social-icons">';
                                echo '</ul>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                              }
                            }

                            ?>

                         </div>
                    </div>
               </div>
               <br>
          </div>
     </section>
     <!-- ***** Fleet Ends ***** -->

     <!-- ***** Footer Start ***** -->
     <footer data-stellar-background-ratio="0.5" style="background-color:black;">
          <div class="container">
               <div class="row">

                    <div class="col-md-9 col-sm-16">
                         <div class="footer-thumb footer-info">
                              <h2>FullTime</h2>
                              <p>FullTime is a professional services provider for students, faculty, and employers. Our
                                   site creates an immersive experience that enables students with the power to leverage
                                   available job postings and find their next step.</p>
                              <br></br>
                              <p>Copyright &copy; 2020 FullTime</p>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-4">
                         <div class="footer-thumb">
                              <h2>Find us</h2>
                              <p>1245 West State Street, <br> West Lafayettte, IN 47906</p>
                              <br></br>
                              <p>Contact us <span>fulltime@gmail.com</span></p>
                              <p><a href="https://www.facebook.com/" class="fa fa-facebook-square"
                                        attr="facebook icon"></a> <a href="https://twitter.com/?lang=en"
                                        class="fa fa-twitter"></a> <a href="https://www.instagram.com/"
                                        class="fa fa-instagram"></a></p>
                         </div>
                    </div>
               </div>
          </div>
     </footer>
 <!-- ***** Footer Ends ***** -->

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
