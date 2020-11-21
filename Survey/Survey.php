<!DOCTYPE html>
<html lang="en">

<head>

 <?php
  session_start();

  if (!isset($_SESSION['account_id'])) header('location: ../index.html');

  include '../account_class.php';
  $account = new Account();

  $account->getInfo($_SESSION['account_id']);
  $account->getInfoAdmin($_SESSION['account_id']);


  function getQuestionList($n)
  {
    global $pdo;
    global $survey_questions;

    $query = 'SELECT questions FROM g1116887.Question';

    try
    {
      $result = $pdo->query($query);
    }
    catch (PDOException $e)
    {
      throw new Exception($e->getMessage());
    }

    $questions = $result->fetchAll(PDO::FETCH_COLUMN, 0);

    if (!is_array($questions)) return;

    foreach ($questions as $column => $name)
    {
      $output = '<option value="' . $name . '"';

      if ($name === $survey_questions[$n - 1])
      {
        $output .= ' selected="selected"';
      }

      $output .= '>' . $name . '</option>';
      echo $output;
    }
  }
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
          <a href="../Analytics/AdminSurvey.php" class="btn btn-info">Back to Analytics</a>
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
              <form action="../survey_edit.php" method="POST" enctype="multipart/form-data" onsubmit='alert("Survey sent successfully");'>
                <div class="col-6 text-right">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
                <h6 class="heading-small text-muted mb-4">Admin information</h6>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-full-name">First name</label>
                      <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value = <?php echo $account->first_name?>>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-full-name">Last name</label>
                      <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value = <?php echo $account->last_name?>>
                    </div>
                  </div>
                </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" value=<?= $account->email?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-full-name">University</label>
                        <input type="text" id="input-university" class="form-control form-control-alternative" name="university" placeholder="Enter University" value = <?= $account->university?>>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-full-name">Position</label>
                        <input type="text" id="input-title" class="form-control form-control-alternative" name="position_type" placeholder="Enter Position Title"   value = <?= $account->position_type?>>
                      </div>
                    </div>
                  </div>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-full-name">Full name</label>
                      <input type="text" id="input-full-name" class="form-control form-control-alternative" name= "get_name" placeholder="Enter full name of recipient">
                    </div>
                  </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" name = "get_email" placeholder="Enter email address of recipient">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-type">Account type</label>
                        <select id="input-type" name="input-type" class="form-control form-control-alternative">
                          <option value="">Enter Account Type</option>
                          <option value="1">Student</option>
                          <option value="2">Company</option>
                        </select>
                      </div>
                    </div>
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-freq">Account type</label>
                          <select id="input-freq" name="input-freq" class="form-control form-control-alternative">
                              <option value="">Enter Frequency</option>
                              <option value="1">Every Month</option>
                              <option value="2">Every 6 Months</option>
                              <option value="3">Every 12 Month</option>
                              <option value="4">Every 18 Months</option>
                              <option value="5">Every 24 Months</option>
                          </select>
                        </div>
                      </div>
                    </div>
                <hr class="my-4">
                <h6 class="heading-small text-muted mb-4">Questions</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-question">Enter up to 10 Questions</label>
                        <select id="input-question1" name="question1" class="form-control form-control-alternative">
                          <option value="">Enter Question #1</option>
                          <?php getQuestionList(1); ?>
                        </select>
                        <br>
                          <select id="input-question2" name="question2" class="form-control form-control-alternative">
                            <option value="">Enter Question #2</option>
                            <?php getQuestionList(2); ?>
                          </select>

                          <br>
                          <select id="input-question3" name="question3" class="form-control form-control-alternative">
                            <option value="">Enter Question #3</option>
                            <?php getQuestionList(3); ?>
                          </select>

                          <br>
                          <select id="input-question4" name="question4" class="form-control form-control-alternative">
                          <option value="">Enter Question #4</option>
                          <?php getQuestionList(4); ?>
                        </select>

                          <br>
                          <select id="input-question5" name="question5" class="form-control form-control-alternative">
                          <option value="">Enter Question #5</option>
                          <?php getQuestionList(5); ?>
                        </select>

                          <br>
                          <select id="input-question6" name="question6" class="form-control form-control-alternative">
                            <option value="">Enter Question #6</option>
                            <?php getQuestionList(6); ?>
                          </select>

                          <br>
                          <select id="input-question7" name="question7" class="form-control form-control-alternative">
                            <option value="">Enter Question #7</option>
                            <?php getQuestionList(7); ?>
                          </select>

                          <br>
                          <select id="input-question8" name="question8" class="form-control form-control-alternative">
                            <option value="">Enter Question #8</option>
                            <?php getQuestionList(8); ?>
                          </select>

                          <br>
                          <select id="input-question9" name="question9" class="form-control form-control-alternative">
                            <option value="">Enter Question #9</option>
                            <?php getQuestionList(9); ?>
                          </select>

                          <br>
                          <select id="input-question10" name="question10" class="form-control form-control-alternative">
                            <option value="">Enter Question #10</option>
                            <?php getQuestionList(10); ?>
                          </select>

                      </div>
                    </div>
                <!-- End of tech skills -->
              </div>
            </div>

              </form>
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
