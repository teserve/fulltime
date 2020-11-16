<!DOCTYPE html>
<html lang="en">

<head>

 <?php
    session_start();
    include '../account_class.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);
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
                <div class="col-4 text-right">
                  <form action="edit_account.php">
                    <a href="#!" class="btn btn-sm btn-primary">Send</a>
                  </form>
                  <!-- <a href="#!" class="btn btn-sm btn-primary">Save </a> -->
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Questions</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-tech">Enter up to 10 Questions</label>
                        <select id="input-tech1" class="form-control form-control-alternative">
                          <option value="">Enter Question #1</option>
                          <option value="1">How would you rate the application process? </option>
                          <option value="2">How would you rate the interview process?</option>
                          <option value="3">How would you rate your career preparedness? </option>
                          <option value="4">What can be done to improve your career preparedness?</option>
                          <option value="5">Which courses are the most useful in preparring you for your current job?/</option>
                          <option value="6">What skills did you get from the courses?</option>
                          <option value="7">What activities or events are the most useful in preparring you for your current job?</option>
                          <option value="8">What skills did you get from the activities or events?</option>
                          <option value="9">What is the most important technical skills and soft skills amongst the required skills?</option>
                          <option value="10">How would you rate your job matches?</option>
                          <option value="11">Are there any additional comments or suggestions you have to improve the matches? </option>
                          <option value="12">How would you rate the importance of certifications and activities/events?</option>
                          <option value="13">What skills do you wish to be added to the dropdowns?</option>
                          <option value="14">Would you recommend this website to other friends? Why?</option>
                          <option value="15">Are there any additional comments or suggestions you have to improve the recruiting process?</option>
                        </select>

                        <br>
                          <select id="input-tech2" class="form-control form-control-alternative">
                          <option value="">Enter Question #2</option>
                          <option value="1">How would you rate the application process? </option>
                          <option value="2">How would you rate the interview process?</option>
                          <option value="3">How would you rate your career preparedness? </option>
                          <option value="4">What can be done to improve your career preparedness?</option>
                          <option value="5">Which courses are the most useful in preparring you for your current job?/</option>
                          <option value="6">What skills did you get from the courses?</option>
                          <option value="7">What activities or events are the most useful in preparring you for your current job?</option>
                          <option value="8">What skills did you get from the activities or events?</option>
                          <option value="9">What is the most important technical skills and soft skills amongst the required skills?</option>
                          <option value="10">How would you rate your job matches?</option>
                          <option value="11">Are there any additional comments or suggestions you have to improve the matches? </option>
                          <option value="12">How would you rate the importance of certifications and activities/events?</option>
                          <option value="13">What skills do you wish to be added to the dropdowns?</option>
                          <option value="14">Would you recommend this website to other friends? Why?</option>
                          <option value="15">Are there any additional comments or suggestions you have to improve the recruiting process?</option>
                        </select>

                          <br>
                          <select id="input-tech3" class="form-control form-control-alternative">
                          <option value="">Enter Question #3</option>
                          <option value="1">How would you rate the application process? </option>
                          <option value="2">How would you rate the interview process?</option>
                          <option value="3">How would you rate your career preparedness? </option>
                          <option value="4">What can be done to improve your career preparedness?</option>
                          <option value="5">Which courses are the most useful in preparring you for your current job?/</option>
                          <option value="6">What skills did you get from the courses?</option>
                          <option value="7">What activities or events are the most useful in preparring you for your current job?</option>
                          <option value="8">What skills did you get from the activities or events?</option>
                          <option value="9">What is the most important technical skills and soft skills amongst the required skills?</option>
                          <option value="10">How would you rate your job matches?</option>
                          <option value="11">Are there any additional comments or suggestions you have to improve the matches? </option>
                          <option value="12">How would you rate the importance of certifications and activities/events?</option>
                          <option value="13">What skills do you wish to be added to the dropdowns?</option>
                          <option value="14">Would you recommend this website to other friends? Why?</option>
                          <option value="15">Are there any additional comments or suggestions you have to improve the recruiting process?</option>
                        </select>

                          <br>
                          <select id="input-tech4" class="form-control form-control-alternative">
                          <option value="">Enter Question #4</option>
                          <option value="1">How would you rate the application process? </option>
                          <option value="2">How would you rate the interview process?</option>
                          <option value="3">How would you rate your career preparedness? </option>
                          <option value="4">What can be done to improve your career preparedness?</option>
                          <option value="5">Which courses are the most useful in preparring you for your current job?/</option>
                          <option value="6">What skills did you get from the courses?</option>
                          <option value="7">What activities or events are the most useful in preparring you for your current job?</option>
                          <option value="8">What skills did you get from the activities or events?</option>
                          <option value="9">What is the most important technical skills and soft skills amongst the required skills?</option>
                          <option value="10">How would you rate your job matches?</option>
                          <option value="11">Are there any additional comments or suggestions you have to improve the matches? <o/ption>
                          <option value="12">How would you rate the importance of certifications and activities/events?</option>
                          <option value="13">What skills do you wish to be added to the dropdowns?</option>
                          <option value="14">Would you recommend this website to other friends? Why?</option>
                          <option value="15">Are there any additional comments or suggestions you have to improve the recruiting process?</option>
                        </select>

                          <br>
                          <select id="input-tech5" class="form-control form-control-alternative">
                          <option value="">Enter Question #5</option>
                          <option value="1">How would you rate the application process? </option>
                          <option value="2">How would you rate the interview process?</option>
                          <option value="3">How would you rate your career preparedness? </option>
                          <option value="4">What can be done to improve your career preparedness?</option>
                          <option value="5">Which courses are the most useful in preparring you for your current job?/</option>
                          <option value="6">What skills did you get from the courses?</option>
                          <option value="7">What activities or events are the most useful in preparring you for your current job?</option>
                          <option value="8">What skills did you get from the activities or events?</option>
                          <option value="9">What is the most important technical skills and soft skills amongst the required skills?</option>
                          <option value="10">How would you rate your job matches?</option>
                          <option value="11">Are there any additional comments or suggestions you have to improve the matches? </option>
                          <option value="12">How would you rate the importance of certifications and activities/events?</option>
                          <option value="13">What skills do you wish to be added to the dropdowns?</option>
                          <option value="14">Would you recommend this website to other friends? Why?</option>
                          <option value="15">Are there any additional comments or suggestions you have to improve the recruiting process?</option>
                        </select>

                          <br>
                          <select id="input-tech6" class="form-control form-control-alternative">
                          <option value="">Enter Question #6</option>
                          <option value="1">How would you rate the application process? </option>
                          <option value="2">How would you rate the interview process?</option>
                          <option value="3">How would you rate your career preparedness? </option>
                          <option value="4">What can be done to improve your career preparedness?</option>
                          <option value="5">Which courses are the most useful in preparring you for your current job?/</option>
                          <option value="6">What skills did you get from the courses?</option>
                          <option value="7">What activities or events are the most useful in preparring you for your current job?</option>
                          <option value="8">What skills did you get from the activities or events?</option>
                          <option value="9">What is the most important technical skills and soft skills amongst the required skills?</option>
                          <option value="10">How would you rate your job matches?</option>
                          <option value="11">Are there any additional comments or suggestions you have to improve the matches? </option>
                          <option value="12">How would you rate the importance of certifications and activities/events?</option>
                          <option value="13">What skills do you wish to be added to the dropdowns?</option>
                          <option value="14">Would you recommend this website to other friends? Why?</option>
                          <option value="15">Are there any additional comments or suggestions you have to improve the recruiting process?</option>
                        </select>

                          <br>
                          <select id="input-tech7" class="form-control form-control-alternative">
                          <option value="">Enter Question #7</option>
                          <option value="1">How would you rate the application process? </option>
                          <option value="2">How would you rate the interview process?</option>
                          <option value="3">How would you rate your career preparedness? </option>
                          <option value="4">What can be done to improve your career preparedness?</option>
                          <option value="5">Which courses are the most useful in preparring you for your current job?/</option>
                          <option value="6">What skills did you get from the courses?</option>
                          <option value="7">What activities or events are the most useful in preparring you for your current job?</option>
                          <option value="8">What skills did you get from the activities or events?</option>
                          <option value="9">What is the most important technical skills and soft skills amongst the required skills?</option>
                          <option value="10">How would you rate your job matches?</option>
                          <option value="11">Are there any additional comments or suggestions you have to improve the matches? </option>
                          <option value="12">How would you rate the importance of certifications and activities/events?</option>
                          <option value="13">What skills do you wish to be added to the dropdowns?</option>
                          <option value="14">Would you recommend this website to other friends? Why?</option>
                          <option value="15">Are there any additional comments or suggestions you have to improve the recruiting process?</option>
                        </select>

                          <br>
                          <select id="input-tech8" class="form-control form-control-alternative">
                          <option value="">Enter Question #8</option>
                          <option value="1">How would you rate the application process? </option>
                          <option value="2">How would you rate the interview process?</option>
                          <option value="3">How would you rate your career preparedness? </option>
                          <option value="4">What can be done to improve your career preparedness?</option>
                          <option value="5">Which courses are the most useful in preparring you for your current job?/</option>
                          <option value="6">What skills did you get from the courses?</option>
                          <option value="7">What activities or events are the most useful in preparring you for your current job?</option>
                          <option value="8">What skills did you get from the activities or events?</option>
                          <option value="9">What is the most important technical skills and soft skills amongst the required skills?</option>
                          <option value="10">How would you rate your job matches?</option>
                          <option value="11">Are there any additional comments or suggestions you have to improve the matches? </option>
                          <option value="12">How would you rate the importance of certifications and activities/events?</option>
                          <option value="13">What skills do you wish to be added to the dropdowns?</option>
                          <option value="14">Would you recommend this website to other friends? Why?</option>
                          <option value="15">Are there any additional comments or suggestions you have to improve the recruiting process?</option>
                        </select>

                          <br>
                          <select id="input-tech9" class="form-control form-control-alternative">
                          <option value="">Enter Question #9</option>
                          <option value="1">How would you rate the application process? </option>
                          <option value="2">How would you rate the interview process?</option>
                          <option value="3">How would you rate your career preparedness? </option>
                          <option value="4">What can be done to improve your career preparedness?</option>
                          <option value="5">Which courses are the most useful in preparring you for your current job?/</option>
                          <option value="6">What skills did you get from the courses?</option>
                          <option value="7">What activities or events are the most useful in preparring you for your current job?</option>
                          <option value="8">What skills did you get from the activities or events?</option>
                          <option value="9">What is the most important technical skills and soft skills amongst the required skills?</option>
                          <option value="10">How would you rate your job matches?</option>
                          <option value="11">Are there any additional comments or suggestions you have to improve the matches? </option>
                          <option value="12">How would you rate the importance of certifications and activities/events?</option>
                          <option value="13">What skills do you wish to be added to the dropdowns?</option>
                          <option value="14">Would you recommend this website to other friends? Why?</option>
                          <option value="15">Are there any additional comments or suggestions you have to improve the recruiting process?</option>
                        </select>

                          <br>
                          <select id="input-tech10" class="form-control form-control-alternative">
                          <option value="">Enter Question #10</option>
                          <option value="1">How would you rate the application process? </option>
                          <option value="2">How would you rate the interview process?</option>
                          <option value="3">How would you rate your career preparedness? </option>
                          <option value="4">What can be done to improve your career preparedness?</option>
                          <option value="5">Which courses are the most useful in preparring you for your current job?/</option>
                          <option value="6">What skills did you get from the courses?</option>
                          <option value="7">What activities or events are the most useful in preparring you for your current job?</option>
                          <option value="8">What skills did you get from the activities or events?</option>
                          <option value="9">What is the most important technical skills and soft skills amongst the required skills?</option>
                          <option value="10">How would you rate your job matches?</option>
                          <option value="11">Are there any additional comments or suggestions you have to improve the matches? </option>
                          <option value="12">How would you rate the importance of certifications and activities/events?</option>
                          <option value="13">What skills do you wish to be added to the dropdowns?</option>
                          <option value="14">Would you recommend this website to other friends? Why?</option>
                          <option value="15">Are there any additional comments or suggestions you have to improve the recruiting process?</option>
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
