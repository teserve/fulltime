<!DOCTYPE html>
<html lang="en">
     <head>
<!-- Starts session, loads in css & bootsrap files, and prepares document for dynamic interaction -->
     <?php
      session_start();

      if (!isset($_SESSION['account_id'])) header('location: ../index.html');

      include '../account_class.php';
      $account = new Account();
      $account->getInfo($_SESSION['account_id']);
    ?>

          <link rel="stylesheet" href="../Profile/stylesheet.css">
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
          <a href="Userjobs.php" class="btn btn-info">Back to Jobs</a>
        </ul>
      </div>
    </nav>
  </div>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(fulltime.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row" style="padding-left:20px">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $account->first_name;?>,</h1>
            <div class="form-group focused">
              <form action="" onsubmit='alert("Your resume was uploaded successfully");' enctype="multipart/form-data">
                To apply, upload your resume!
                <input type="file" name="resume" id="resume">
                <input type="submit" value = "Submit" class="btn btn-info">
              </form>
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
