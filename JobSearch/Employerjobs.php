<!--Template
Author: phpjabbers
Author URL: https://www.phpjabbers.com/free-job-portal-web-template-133.php
-->
<!DOCTYPE html>
<html lang="en">

  <head>
<!-- Starts session, loads in necessary css and bootsrap files, and prepares for dynamic page -->
   <?php
    session_start();
    include '../account_class.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);
    include '../get_profile_pic.php';
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
                        <a class="logo" style="color:#ffbc6e">FULLTIME</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="../Dashboard/dbemployer.php">Dashboard</a></li>
                            <li><a href="../Matches/EmployerMatches.php">Matches</a></li>
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
                        <h2> View <em>Current Job Postings & Applicants</em></h2>
                        <br>
                        <!--
                        <div class="search-container">
                        <form action="search_student.php", method "post">
                          <input type="text" placeholder="Search.." name="k">
                          <button type="submit" value="search"><i class="fa fa-search"></i></button>
                         </form>
                         </div>
                       -->
                         <br>
                        <a class="btn btn-primary smooth-scroll mr-2" href="Postjobs.php" data-aos="zoom-in"
                          data-aos-anchor="data-aos-anchor">Post Job Openings</a>
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

<!-- Select Statements & php that allow for pop up of applicants on employer job page  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                      <?php include "../db_connection.php";
                      try
                      {
                           $res1 = $pdo->prepare('SELECT *
                                                 FROM g1116887.Job_posting J
                                                 WHERE (J.user_id = :employer_id)');
                           $id = $account->id;
                           $res1->execute(array(':employer_id' => $id));
                      }
                      catch (PDOException $e)
                      {
                           throw("Database query error");
                           echo $e->getMessage();
                      }

                      $res1;
                       if (count($res1) === 0) {
                         echo "No Jobs Posted";
                       } else {
                         foreach ($res1 as $post){
                           echo '<div class="col-md-6">';
                           echo '<div class="trainer-item">';
                           echo '<div class="down-content">';
                           echo '<span> ' . $post['job_type'] . '  &nbsp;|&nbsp;  ' . $post['position'] . '</span>';
                           echo '<h4>' . $post['company'] . '</h4>';
                           echo '<a> <b>Industry:</b> ' . $post['industry'] . '<br> <b>Region Location: </b>' . $post['region'] . '</a>';
                           echo '<br><br><a> <b>Requirements: </b></a><br>';
                           echo '<small style="color:#757575;">Education Level: ' . $post['ed_level'] . '</small><br>';
                           echo '<small style="color:#757575;">Minimum GPA: ' . $post['gpa'] . '</small><br>';
                           echo '<br><a> <b>Job Description: </b></a><br>';
                           echo '<p>' . $post['job_descr'] . '</p>';
                           echo '<br><h6>Application Due: ' . $post['date_closed'] . '</h6>';
                           echo '</div>';
                           echo '</div>';
                           echo '</div>';
                         }
                       }

                       ?>
                      <?php
                         include "../db_connection.php";

                         try
                         {
                              $res = $pdo->prepare('SELECT U.user_id, U.fir_name, U.las_name, S.university, S.major, S.bio, J.position, J.job_type
                                   FROM g1116887.Job_posting J, g1116887.Applied A, g1116887.User U, g1116887.Student S
                                   WHERE (J.user_id = :employer_id) AND (A.job_id = J.job_id) AND (A.user_id = U.user_id) AND (U.user_id = S.user_id)');
                              $id = $account->id;
                              $res->execute(array(':employer_id' => $id));
                         }
                         catch (PDOException $e)
                         {
                              throw("Database query error");
                              echo $e->getMessage();
                         }

                         $res;

                         if (count($res) === 0) {
                              echo "No Applicants";
                         } else {
                              foreach ($res as $applicant){
                              echo '<div class="col-md-6">';
                              echo '<div class="trainer-item">';
                              echo '<div class="image-thumb">';
                              echo '<img src="' . getProfilePic($applicant['user_id']) . '" alt="" style="width:300px;height:300px;">';
                              echo '</div>';
                              echo '<div class="down-content">';
                              echo '<h4><br>' . $applicant['job_type'] . '  &nbsp;|&nbsp;  ' . $applicant['position'] . '</h4>';
                              echo '<h3>' . $applicant['fir_name'] . ' ' . $applicant['las_name'] . '</h3>';
                              echo '<h6>' . $applicant['university'] . '  &nbsp;|&nbsp;  ' . $applicant['major'] . '</h6>';
                              echo '<p>' . $applicant['bio'] . '</p>';
                              echo '<ul class="social-icons">';
                              echo '<li><form action="Views.php" method="post"><input type="submit" class="btn btn-primary" value="View Student Profile"><input type="hidden" name="hidden_student_id_label" value="' . $applicant['user_id'] . '"></form></li>';
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
