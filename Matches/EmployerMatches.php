<!-- Template
Author: phpjabbers
Author URL: https://www.phpjabbers.com/free-job-portal-web-template-133.php
-->
<!DOCTYPE html>
<html lang="en">

  <head>
<!-- Starts session, loads in css & bootstrap, and enables all necessary preloads to enable website to be dynamic -->
   <?php
    session_start();
    include '../account_class.php';
    include '../get_profile_pic.php';
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
                        <a class="logo" style="color:#ffbc6e">FULLTIME</a>
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
                        <h2>View <em>Matches</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts for Matches and places them in descending order ***** -->
    <section class="section" id="trainers">
        <div class="container">

                <div class="col-lg-12">
                    <div class="row">
                      <!--php command to show all the students that matched with the employers -->
                      <?php
                         include "../db_connection.php";

                         try
                         {
                              $res = $pdo->prepare('SELECT U.user_id, U.fir_name, U.las_name, S.university, S.major, S.bio, J.position, J.job_type, M.score
                                   FROM g1116887.Job_posting J, g1116887.User U, g1116887.Student S, g1116887.Matches M
                                   WHERE (J.user_id = :employer_id) AND (U.user_id = S.user_id) AND (M.job_id = J.job_id) AND (M.user_id = S.user_id)
                                   ORDER BY M.score + 0 DESC
                                   LIMIT 14');
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
                              echo "No Applicant Matches";
                         } else {
                              $num = 1;
                              foreach ($res as $app_match){
                              echo '<div class="col-md-6">';
                              echo '<div class="trainer-item">';
                              echo '<div class="down-content">';
                              echo '<span>#' . $num . ' Match </span>';
                              echo '<h5>' . $app_match['job_type'] . ' | ' . $app_match['position'] . '</h5>';
                              echo '<h4>' . $app_match['fir_name'] . ' ' . $app_match['las_name'] . '</h4>';
                              echo '<h6>' . $app_match['university'] . ' | ' . $app_match['major'] . '</h6>';
                              echo '<p>' . $app_match['bio'] . '</p>';
                              echo '<ul class="social-icons">';
                              echo '<li><form action="Views.php" method="post"><input type="submit" class="btn btn-primary" value="View Student Profile"><input type="hidden" name="hidden_student_id_label" value="' . $app_match['user_id'] . '"></form></li>';
                              echo '</ul>';
                              echo '</div>';
                              echo '</div>';
                              echo '</div>';
                              $num++;
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
