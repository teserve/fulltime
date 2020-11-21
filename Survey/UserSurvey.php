<!DOCTYPE html>
<html lang="en">

<head>

 <?php
  session_start();

  if (!isset($_SESSION['account_id'])) header('location: ../index.html');

  include '../account_class.php';
  $account = new Account();
  ?>


  <link rel="stylesheet" href="assets/css/stylesheet.css">
  <link rel="stylesheet" href="assets/css/templatemo-style.css">
</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
          <h1 class="display-2 text-white">FULLTIME</h1>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
      style="background-image: url(fulltime.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
    </div>
    <!--page content-->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Survey Questions</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="../survey_edit.php" method="POST" enctype="multipart/form-data" onsubmit='alert("Survey respond submitted successfully");'>
                <div class="col-6 text-right">
                  <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                </div>
                <h6 class="heading-small text-muted mb-4">Question 1</h6>
                <div class="row">
                  <div class="col-lg-9">
                    <div class="form-group focused">
                      <p><?php echo $account->question1?>></p>
                      <input type="text" class="form-control form-control-alternative" name = "answer1" placeholder="Enter Answer" value = <?php echo $account->answer1?>>
                    </div>
                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4">Question 2</h6>
                <div class="row">
                  <div class="col-lg-9">
                    <div class="form-group focused">
                      <p><?= $account->question2?>></p>
                      <input type="text" class="form-control form-control-alternative" placeholder="Enter Answer" value = <?php echo $account->answer2?>>
                    </div>
                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4">Question 3</h6>
                <div class="row">
                  <div class="col-lg-9">
                    <div class="form-group focused">
                      <p><?= $account->question3?>></p>
                      <input type="text" class="form-control form-control-alternative" placeholder="Enter Answer" value = <?php echo $account->answer3?>>
                      </div>
                    </div>
                  </div>
                  <h6 class="heading-small text-muted mb-4">Question 4</h6>
                  <div class="row">
                    <div class="col-lg-9">
                      <div class="form-group focused">
                        <p><?= $account->question4?>></p>
                        <input type="text" class="form-control form-control-alternative" placeholder="Enter Answer" value = <?php echo $account->answer4?>>
                      </div>
                    </div>
                </div>
                <h6 class="heading-small text-muted mb-4">Question 5</h6>
                <div class="row">
                  <div class="col-lg-9">
                    <div class="form-group focused">
                      <p><?= $account->question5?>></p>
                      <input type="text" class="form-control form-control-alternative" placeholder="Enter Answer" value = <?php echo $account->answer5?>>
                    </div>
                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4">Question 6</h6>
                <div class="row">
                  <div class="col-lg-9">
                    <div class="form-group focused">
                      <p><?= $account->question6?>></p>
                      <input type="text" class="form-control form-control-alternative" placeholder="Enter Answer" value = <?php echo $account->answer6?>>
                    </div>
                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4">Question 7</h6>
                <div class="row">
                  <div class="col-lg-9">
                    <div class="form-group focused">
                      <p><?= $account->question7?>></p>
                      <input type="text" class="form-control form-control-alternative" placeholder="Enter Answer" value = <?php echo $account->answer7?>>
                    </div>
                  </div>
                </div>
              <h6 class="heading-small text-muted mb-4">Question 8</h6>
              <div class="row">
                <div class="col-lg-9">
                  <div class="form-group focused">
                    <p><?= $account->question8?>></p>
                    <input type="text" class="form-control form-control-alternative" placeholder="Enter Answer" value = <?php echo $account->answer8?>>
                  </div>
                </div>
              </div>
              <h6 class="heading-small text-muted mb-4">Question 9</h6>
              <div class="row">
                <div class="col-lg-9">
                  <div class="form-group focused">
                    <p><?= $account->question9?>></p>
                    <input type="text" class="form-control form-control-alternative" placeholder="Enter Answer" value = <?php echo $account->answer9?>>
                  </div>
                </div>
              </div>
              <h6 class="heading-small text-muted mb-4">Question 10</h6>
              <div class="row">
                <div class="col-lg-9">
                  <div class="form-group focused">
                    <p><?= $account->question8?>></p>
                    <input type="text" class="form-control form-control-alternative" placeholder="Enter Answer" value = <?php echo $account->answer10?>>
                  </div>
                </div>
              </div>
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
