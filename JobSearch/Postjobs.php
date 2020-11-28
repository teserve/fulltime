<!-- Template
Author: templatemo
Author URL: https://templatemo.com/tm-509-hydro
-->

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Begins session and loads in necessary php, css, and bootstrap files for visual display and functionality -->
 <?php
    session_start();

    include '../account_class.php';
    $account = new Account();

    $account->getInfo($_SESSION['account_id']);
    $account->getInfoPostJobs($_SESSION['account_id']);
    $account->getInfoJobsSkills($_SESSION['account_id']);

  //function that queries for tech skills list from database
    function getTechSkillList($n)
    {
      global $pdo;
      global $student_has_tech_skill_names;

      $query = 'SELECT skill_name FROM g1116887.TechSkills';

      try
      {
        $result = $pdo->query($query);
      }
      catch (PDOException $e)
      {
        throw new Exception($e->getMessage());
      }

      $skill_names = $result->fetchAll(PDO::FETCH_COLUMN, 0);

      if (!is_array($skill_names)) return;

      foreach ($skill_names as $column => $name)
      {
        $output = '<option value="' . $name . '"';
        $output .= '>' . $name . '</option>';
        echo $output;
      }
    }
    //function that queries for soft skills list from database
    function getSoftSkillList($n)
    {
      global $pdo;
      global $student_has_soft_skill_names;

      $query = 'SELECT skill_name FROM g1116887.SoftSkills';

      try
      {
        $result = $pdo->query($query);
      }
      catch (PDOException $e)
      {
        throw new Exception($e->getMessage());
      }

      $skill_names = $result->fetchAll(PDO::FETCH_COLUMN, 0);

      if (!is_array($skill_names)) return;

      foreach ($skill_names as $column => $name)
      {
        $output = '<option value="' . $name . '"';
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
          <a href="Employerjobs.php" class="btn btn-info">Back to Jobs</a>
      </div>
    </nav>
    <!-- Background Image -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
      style="background-image: url(fulltime.jpg); background-size: cover; background-position: center;">
      <span class="mask bg-gradient-default opacity-8"></span>
    </div>

    <!--page content-->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Post Job Opening</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action= "../Post_job.php" method="POST" enctype="multipart/form-data" onsubmit='alert("Job opening posted successfully")'>
                <div class="col-6 text-right">
                    <input type="submit" class="btn btn-sm btn-primary" value="Post">
                </div>
                <!-- Company Information -->
                <h6 class="heading-small text-muted mb-4">Company Information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Company</label>
                        <input type="text" name="company" id="input-username" class="form-control form-control-alternative" placeholder="Enter Company">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Job Position</label>
                        <input type="text" name="position" id="input-email" class="form-control form-control-alternative" placeholder="Enter Job Title">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Industry</label>
                        <select id="input-tech1" class="form-control form-control-alternative" name="industry">
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
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-region">Region</label>
                        <select id="input-tech1" class="form-control form-control-alternative" name="region">
                            <option value="">Enter Region</option>
                            <option value="Northeast">Northeast</option>
                            <option value="Southeast">Southeast</option>
                            <option value="Midwest">Midwest</option>
                            <option value="Southwest">Southwest</option>
                            <option value="West">West</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">

          <!-- Job Requirements -->
                <h6 class="heading-small text-muted mb-4">Requirements</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-institution">Job Type</label>
                          <select id="input-tech1" class="form-control form-control-alternative" name="job_type">
                            <option value="">Enter Job Type</option>
                            <option value="Internship"> Internship </option>
                            <option value="Co-op">Co-op</option>
                            <option value="Full-time">Full-time</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-institution">Education Level</label>
                          <select id="input-tech1" class="form-control form-control-alternative" name="ed_level">
                            <option value="">Enter Required Education Level</option>
                            <option value="Freshman">Freshman</option>
                            <option value="Sophomore">Sophomore</option>
                            <option value="Junior">Junior</option>
                            <option value="Senior">Senior</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-institution">Minimum GPA</label>
                          <select id="input-tech1" class="form-control form-control-alternative" name="gpa">
                            <option value="">Enter Required Minimum GPA</option>
                            <option value="4.0"> 4.0 </option>
                            <option value="3.80-3.99"<?php if($account->gpa === "3.80-3.99") echo 'selected="selected"';?>>  3.80-3.99 </option>
                            <option value="3.60-3.79"<?php if($account->gpa === "3.60-3.79") echo 'selected="selected"';?>>  3.60-3.79 </option>
                            <option value="3.40-3.59"<?php if($account->gpa === "3.40-3.59") echo 'selected="selected"';?>>  3.40-3.59 </option>
                            <option value="3.20-3.39"<?php if($account->gpa === "3.20-3.39") echo 'selected="selected"';?>>  3.20-3.39 </option>
                            <option value="3.00-3.19"<?php if($account->gpa === "3.00-3.19") echo 'selected="selected"';?>>  3.00-3.19 </option>
                            <option value="2.80-2.99"<?php if($account->gpa === "2.80-2.99") echo 'selected="selected"';?>>  2.80-2.99 </option>
                            <option value="2.60-2.79"<?php if($account->gpa === "2.60-2.79") echo 'selected="selected"';?>>  2.60-2.79 </option>
                            <option value="2.40-2.59"<?php if($account->gpa === "2.40-2.59") echo 'selected="selected"';?>>  2.40-2.59 </option>
                            <option value="< 2.39"<?php if($account->gpa === "< 2.39") echo 'selected="selected"';?>> < 2.39 </option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-date_closed">Application Deadline</label>
                        <input type="text" id="input-date_closed" name="date_closed" class="form-control form-control-alternative" placeholder="Enter Application Deadline (Ex: May 10, 2020)">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">


                <!-- Required Tech Skills -->
                <h6 class="heading-small text-muted mb-4">Skills</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-tech">Enter up to 10 Technical Skills</label>
                        <select id="input-tech1" name="tech_skill1" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #1</option>
                            <?php getTechSkillList(); ?>
                        </select>
                        <select id="input-tech1" name="tech_rate1" class="form-control form-control-alternative">
                          <option value="">Rate Technical Skill #1</option>
                          <option value="5">5: Expert </option>
                          <option value="4">4: Advanced </option>
                          <option value="3">3: Intermediate </option>
                          <option value="2">2: Basic </option>
                          <option value="1">1: Beginner </option>
                        </select>
                        <br>
                          <select id="input-tech2" name="tech_skill2" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #2</option>
                          <?php getTechSkillList(); ?>
                        </select>
                          <select id="input-tech2" name="tech_rate2" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #2</option>
                            <?php getTechSkillList(); ?>
                        </select>

                        <br>
                        <select id="input-tech4" name="tech_skill4" class="form-control form-control-alternative">
                        <option value="">Enter Technical Skill #4</option>
                        <?php getTechSkillList(); ?>
                      </select>
                          <select id="input-tech3" name="tech_rate3" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #3</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech4" name="tech_skill4" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #4</option>
                          <?php getTechSkillList(); ?>
                        </select>
                          <select id="input-tech4" name="tech_rate4" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #4</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech5" name="tech_skill5" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #5</option>
                          <?php getTechSkillList(); ?>
                        </select>
                          <select id="input-tech5" name="tech_rate5" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #5</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech6" name="tech_skill6" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #6</option>
                          <?php getTechSkillList(); ?>
                        </select>
                          <select id="input-tech6" name="tech_rate6" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #6</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech7" name="tech_skill7" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #7</option>
                          <?php getTechSkillList(); ?>
                        </select>
                          <select id="input-tech7" name="tech_rate7" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #7</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech8" name="tech_skill8" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #8</option>
                          <?php getTechSkillList(); ?>
                        </select>
                          <select id="input-tech8" name="tech_rate8" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #8</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech9" name="tech_skill9" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #9</option>
                          <?php getTechSkillList(); ?>
                        </select>
                          <select id="input-tech9" name="tech_rate9" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #9</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech10" name="tech_skill10" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #10</option>
                          <?php getTechSkillList(); ?>
                        </select>
                          <select id="input-tech10" name="tech_rate10" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #10</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                      </div>
                    </div>
                <!-- End of tech skills -->

                  <!-- Required soft skills -->
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-soft">Soft Skills</label>
                        <select id="input-soft" name="soft_skill1" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #1</option>
                          <?php getSoftSkillList(); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill2" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #2</option>
                          <?php getSoftSkillList(); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill3" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #3</option>
                          <?php getSoftSkillList(); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill4" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #4</option>
                          <?php getSoftSkillList(); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill5" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #5</option>
                          <?php getSoftSkillList(); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill6" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #6</option>
                          <?php getSoftSkillList(); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill7" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #7</option>
                          <?php getSoftSkillList(); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill8" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #8</option>
                          <?php getSoftSkillList(); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill9" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #9</option>
                          <?php getSoftSkillList(); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill10" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #10</option>
                          <?php getSoftSkillList(); ?>
                          </select>
                      </div>
                    </div>
                    <!--end of soft skills -->
                  </div>
                </div>

                <!-- Job Description -->
                <h6 class="heading-small text-muted mb-4">Description</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Job Description</label>
                    <textarea rows="4" class="form-control form-control-alternative" name="job_descr"
                      placeholder="Desribe the job posting..." value="<?php echo $account->job_descr?>"></textarea>
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
