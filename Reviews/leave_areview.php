<!DOCTYPE html>
<html lang="en-US">

<head>
<!-- Begins session and loads in necessary css, boostrap, and php files to ensure page is dynamic and visually appealing -->

 <?php
    session_start();
    include '../account_class.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);
  ?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>leave_areview</title>
  <meta name="description"
    content="Creative CV is a HTML resume template for professionals. Built with Bootstrap 4, Now UI Kit and FontAwesome, this modern and responsive design template is perfect to showcase your portfolio, skils and experience." />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="styles/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/websitev2.css">



</head>
<!-- Begins Html, php, and css that loads in our front end of the review page -->

<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid rgb(70, 68, 68);
  border-radius: 4px;

}
input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid rgb(70, 68, 68);
  border-radius: 4px;
  resize: vertical;
}

input[type=role], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid rgb(70, 68, 68);
  border-radius: 4px;
}
input[type=sort], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid rgb(70, 68, 68);
  float: center;
  border-radius: 4px;
}

input[type=submit] {
  background-color: #ffbc6e;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}


.col-25 {
  float: left;
  width: 15%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
</style>

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
          <li><a href = "../Dashboard/dbstudent.php">Dashboard</a></li>
          <li><a href = "../Matches/StudentMatches.php">Matches</a></li>
          <li><a href = "../JobSearch/Userjobs.php">Jobs</a></li>
          <li><form action="../logout.php">
                 <input type='submit' class="btn btn-primary" name='submit' value='Log Out'>
                 </form></li>
        </ul>
      </div>

    </div>
  </section>
  <div class="page-content">
    <div>
      <div class="profile-page">
        <div class="wrapper">
          <div class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('images/fulltime.jpg');">
            </div>
            <div class="container">
              <div class="content-center">
                <div class="h2 title">Leave A Review For Your Company</div>
                <span class="heading">Scroll to give your Feedback!</span>
              </div>
            </div>
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
        </div>
      </div>
<!-- Review Form for submission -->
      <div class="section" id="leave_review">
        <div class="h4 text-center  mb-4 title">Leave a Review</div>
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <div class="card-body">
                  <div class="container">
                    <form action= "../enter_review.php" method="post">
                      <div class="row">
                        <div class="col-25">
                        </div>
                        <div class="col-75">
                          <input type="text" id="inst_id" name="company" placeholder="Company">
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-25">
                          </div>
                          <div class="col-75">
                           <select id="industry" name="industry">
                            <option value="">Enter Industry</option>
                            <option value="Business-Related Fields">Business-Related Fields</option>
                            <option value="Chemicals, Petroleum, Plastics & Rubber">Chemicals, Petroleum, Plastics & Rubber</option>
                            <option value="Computer Systems - Design/Programming">Computer Systems - Design/Programming</option>
                            <option value="Consulting Services">Consulting Services</option>
                            <option value="Consumer Goods">Consumer Goods</option>
                            <option value="Energy">Energy</option>
                            <option value="Engineering Services">Engineering Services</option>
                            <option value="Environmental Services">Environmental Services</option>
                            <option value="Government">Government</option>
                            <option value="Manufacturing & Industrial Systems">Manufacturing & Industrial Systems</option>
                            <option value="Other">Other</option>
                            <option value="Pharmaceuticals & Medicine">Pharmaceuticals & Medicine</option>
                            <option value="Scientific Research & Development">Scientific Research & Development</option>
                          </select>
                          </div>
                        </div>
                      <div class="row">
                        <div class="col-25">
                        </div>
                        <div class="col-75">
                          <select id="type" name="job_type">
                            <option value="">Select Type</option>
                            <option value="Intern">Intern</option>
                            <option value="Full-Time Employee">Full-Time Employee</option>
                            <option value="Co-op">Co-Op</option>
                            <option value="Volunteer">Volunteer</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                        </div>
                       <div class="row">
                        <div class="col-25">
                        </div>
                        <div class="col-75">
                          <select id="rate" name="review_rating">
                            <option value="">Rate how many stars this experience was...</option>
                            <option value="0">0</option>
                            <option value="0.5">0.5</option>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                            <option value="2.5">2.5</option>
                            <option value="3">3</option>
                            <option value="3.5">3.5</option>
                            <option value="4">4</option>
                            <option value="4.5">4.5</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                        </div>
                      <div class="row">
                        <div class="col-25">
                        </div>
                        <div class="col-75">
                          <textarea id="subject" name="review_bio" placeholder="Review..." style="height:100px"></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                        </div>
                        <div class="col-75">
                       <input type='submit' class="btn btn-primary" name='submit' value='Post'>
                      </div>
                    </form>
                    <br> </br>
                    <br> </br>
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
                           <p>Contact us <span>fulltime@gmail.com</span></p>
                           <p><a href="https://www.facebook.com/" class="fa fa-facebook-square" attr="facebook icon"></a> <a href="https://twitter.com/?lang=en" class="fa fa-twitter"></a>     <a href="https://www.instagram.com/" class="fa fa-instagram"></a></p>
                      </div>
                 </div>
          </div>
        </div>
      </footer>
<!-- Includes javascript that animates the review page -->

        <script src="js/core/jquery.3.2.1.min.js"></script>
        <script src="js/core/popper.min.js"></script>
        <script src="js/core/bootstrap.min.js"></script>
        <script src="js/now-ui-kit.js?v=1.1.0"></script>
        <script src="js/aos.js"></script>
        <script src="scripts/main.js"></script>
</body>

</html>
