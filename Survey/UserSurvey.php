<!DOCTYPE html>
<html lang="en">

<head>

 <?php
  session_start();

  if (!isset($_SESSION['account_id'])) header('location: ../index.html');

  include '../account_class.php';

  $account = new Account();
  $account->getInfo($_SESSION['account_id']);

  $survey_id = intval($_GET['survey_id']);

  if ($survey_id !== 0)
  {
    try
    {
      $survey_query = $pdo->prepare('SELECT * FROM Survey_questions WHERE survey_id = :survey_id');
      $survey_query->execute(array(':survey_id' => $survey_id));
    }
    catch (PDOException $e)
    {
      echo $e->getMessage();
    }

    $survey_info = $survey_query->fetch(PDO::FETCH_ASSOC);

    if (is_array($survey_info))
    {
      $questions = array(
        $survey_info['question1'],
        $survey_info['question2'],
        $survey_info['question3'],
        $survey_info['question4'],
        $survey_info['question5'],
        $survey_info['question6'],
        $survey_info['question7'],
        $survey_info['question8'],
        $survey_info['question9'],
        $survey_info['question10']
      );
    }
  }

  function showSurveyQuestions($qs)
  {
    for ($i = 0; $i < count($qs); $i++)
    {
      if ($qs[$i] == TRUE)
      {
        echo '<h6 class="heading-small text-muted mb-4">Question ' . ($i+1) . '</h6>';
        echo '<div class="row">';
        echo '<div class="col-lg-9">';
        echo '<div class="form-group focused">';
        echo '<p>' . $qs[$i] . '</p>';
        echo '<input type="text" class="form-control form-control-alternative" name="answer' . ($i+1) . '" placeholder="Enter Answer">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
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
              <form action="survey_answer.php" method="POST" enctype="multipart/form-data" onsubmit='alert("Survey respond submitted successfully");'>
                <div class="col-6 text-right">
                  <input type="submit" class="btn btn-sm btn-primary" value="Submit"><input type="hidden" name="hidden_survey_id" value=<?php echo $survey_id; ?>>
                </div>
                <?php showSurveyQuestions($questions); ?>
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
