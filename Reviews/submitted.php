<!-- Template
Author: templateflip
Author URL:https://templateflip.com/demo/templates/creative-cv/
-->
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
  <title>submitted</title>
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


<!-- Begins Html, php, and css that loads in our front end of the review submission -->
</head>
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

</style>

<body id="top">

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
        <a class="navbar-brand">FullTime</a>
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
                            </form>
        </ul>
      </div>
    </div>

  <!-- Response Confirmation -->
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
                <div class="h2 title">Thank You!</div>
                <span class="heading">Your response has been recorded.</span><br>
              </br><a class="btn btn-primary smooth-scroll mr-2" href="../Dashboard/dbstudent.php" data-aos="zoom-in"
                  data-aos-anchor="data-aos-anchor">Dashboard</a>
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
                           <p>Call us <span>(765) Get-Jobs</span></p>
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
