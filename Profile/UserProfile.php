<!-- Template
Author: templatemo
Author URL: https://templatemo.com/tm-509-hydro
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Begins Session and connects necessary css and php files to set up User Profile Page -->
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="../css/templatemo-style.css">

  <?php
    session_start();

    include '../account_class.php';
    include '../get_profile_pic.php';

    $account = new Account();
    $account->id = $_SESSION['account_id'];

    $account->getInfo($_SESSION['account_id']);
    $account->getInfoStudent($_SESSION['account_id']);
    $account->getInfoStuSkills($_SESSION['account_id']);
    $account->getInfoStuCourses($_SESSION['account_id']);

    // Assigns our variables to their respective inputs
    //tech skills
    $student_has_tech_skill_names = array(
      $account->tech_skill1,
      $account->tech_skill2,
      $account->tech_skill3,
      $account->tech_skill4,
      $account->tech_skill5,
      $account->tech_skill6,
      $account->tech_skill7,
      $account->tech_skill8,
      $account->tech_skill9,
      $account->tech_skill10
    );
    //soft skills
    $student_has_soft_skill_names = array(
      $account->soft_skill1,
      $account->soft_skill2,
      $account->soft_skill3,
      $account->soft_skill4,
      $account->soft_skill5,
      $account->soft_skill6,
      $account->soft_skill7,
      $account->soft_skill8,
      $account->soft_skill9,
      $account->soft_skill10
    );
    //courses
    $student_has_course_names = array(
      $account->course1,
      $account->course2,
      $account->course3,
      $account->course4,
      $account->course5,
    );

    // Dyanamic functions that allow for our page to query the database and present various inputs that a user can select (skills, courses, etc.)
    function showTechRatingInput($n)
    {
      echo '<option value="">Rate Technical Skill &num;' . $n . '</option>';
      echo '<option value="5: Expert">5: Expert </option>';
      echo '<option value="4: Advanced">4: Advanced </option>';
      echo '<option value="3: Intermediate">3: Intermediate </option>';
      echo '<option value="2: Basic">2: Basic </option>';
      echo '<option value="1: Beginner">1: Beginner </option>';
    }
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

        if ($name === $student_has_tech_skill_names[$n - 1])
        {
          $output .= ' selected="selected"';
        }

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

        if ($name === $student_has_soft_skill_names[$n - 1])
        {
          $output .= ' selected="selected"';
        }

        $output .= '>' . $name . '</option>';
        echo $output;
      }
    }
    //function that queries for course list from database
    function getCourseList($n)
    {
      global $pdo;
      global $student_has_course_names;

      $query = 'SELECT course_name FROM g1116887.Courses';

      try
      {
        $result = $pdo->query($query);
      }
      catch (PDOException $e)
      {
        throw new Exception($e->getMessage());
      }

      $course_names = $result->fetchAll(PDO::FETCH_COLUMN, 0);

      if (!is_array($course_names)) return;

      foreach ($course_names as $column => $name)
      {
        $output = '<option value="' . $name . '"';

        if ($name === $student_has_course_names[$n - 1])
        {
          $output .= ' selected="selected"';
        }

        $output .= '>' . $name . '</option>';
        echo $output;
      }
    }

  ?>

</head>
<!-- Begins html and php that creates front end display of our Student Profile Page -->
<!-- In line php tags are used to load in data dynamically as user logs in from previously saved inputs -->
<body>
  <div class="main-content">
    <!-- Student Icon (Top Navbar)-->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Profile picture" src=<?php echo getProfilePic($account->id); ?>>
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $account->first_name; ?> <?php echo $account->last_name?></span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
      style="min-height: 600px; background-image: url(fulltime.jpg); background-size: cover; background-position: center;">
      <span class="mask bg-gradient-default opacity-8"></span>
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $account->first_name; ?>,</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can add your skills, build your portfolio,
              and express your creative endeavors.</p>
            <a href="../Dashboard/dbstudent.php" class="btn btn-info">Dashboard</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Student Info Summary Box-->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img alt="Profile picture" src=<?php echo getProfilePic($account->id); ?> class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo $account->first_name?> <?php echo $account->last_name?><span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $account->city?>, <?php echo $account->Nstate?>, <?php echo $account->country?> <?php echo $account->post_code?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $account->ed_level?>,  <?php echo $account->grad_date?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?php echo $account->university?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Student Informations -->
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="../Edit_account_student.php" method="POST" enctype="multipart/form-data">
                <div class="col-6 text-right">
                  <input type="submit" class="btn btn-sm btn-primary" value="Save">
                </div>
                <!-- Student Basic Information -->
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-phone">Phone Number</label>
                        <input type="text" id="input-phone" name="input-phone" class="form-control form-control-alternative"
                          value=<?= $account->cell?>>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" name="input-email" class="form-control form-control-alternative"
                          value=<?php echo $account->email; ?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" name="input-first-name" class="form-control form-control-alternative"
                          value=<?= $account->first_name?>>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" name="input-last-name" class="form-control form-control-alternative"
                          value=<?= $account->last_name?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        Upload a profile picture!
                        <input type="file" name="profile_pic" id="profile_pic">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">

                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Location</h6>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" name="city" class="form-control form-control-alternative"
                          placeholder="City" value="<?php echo $account->city?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-state">State</label>
                        <input type="text" id="input-state" name="Nstate" class="form-control form-control-alternative"
                          placeholder="State" value="<?php echo $account->Nstate?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" name="country" class="form-control form-control-alternative"
                          placeholder="Country" value="<?php echo $account->country?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-postal-code">Postal code</label>
                        <input type="text" id="input-postal-code" name="post_code" class="form-control form-control-alternative"
                          placeholder="Postal code" value="<?php echo $account->post_code?>">
                      </div>
                    </div>
                  </div>
                <hr class="my-4">

                <!-- Academics -->

                <h6 class="heading-small text-muted mb-4">Academic Background</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-univ">University</label>
                        <input type="text" id="input-univ" name="university" class="form-control form-control-alternative"
                          placeholder="Enter University" value="<?php echo $account->university?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-major">Major</label>
                        <input type="text" id="input-major" name="major" class="form-control form-control-alternative"
                          placeholder="Enter Major" value="<?php echo $account->major?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-gpa">GPA</label>
                        <select id="input-gpa" name="gpa" class="form-control form-control-alternative" value="<?php echo $account->gpa?>">
                            <option value="">Enter Required GPA</option>
                            <option value="4.0"<?php if($account->gpa === "4.0") echo 'selected="selected"';?>> 4.0 </option>
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
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-grad-date">Graduation Date</label>
                        <input type="text" id="input-grad-date" name="grad_date" class="form-control form-control-alternative"
                          placeholder="Enter Graduation Month and Year (Ex: May 2022)" value="<?php echo $account->grad_date?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="ed_level">Education Level</label>
                          <select id="ed_level" name="ed_level" class="form-control form-control-alternative" value="<?php echo $account->ed_level?>">
                            <option value="">Enter Required Education Level</option>
                            <option value="Freshman" <?php if($account->ed_level === "Freshman") echo 'selected="selected"';?>> Freshman </option>
                            <option value="Sophomore" <?php if($account->ed_level === "Sophomore") echo 'selected="selected"';?>>Sophomore</option>
                            <option value="Junior" <?php if($account->ed_level === "Junior") echo 'selected="selected"';?>>Junior</option>
                            <option value="Senior" <?php if($account->ed_level === "Senior") echo 'selected="selected"';?>>Senior</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">


                <!-- About Me -->
                <h6 class="heading-small text-muted mb-4">Personal Biography</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused" method="post">
                    <label class="form-control-label" for="bio">About me</label>
                    <textarea rows="4" class="form-control form-control-alternative" name="bio"
                      placeholder="A few words about you ..." value="<?php echo $account->bio?>"><?php echo $account->bio?></textarea>
                  </div>
                </div>
                <hr class="my-4">

                <!-- Preference -->
                <h6 class="heading-small text-muted mb-4">Job Preference</h6>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-region">Ideal Region Location</label>
                        <select id="input-region" name="region" class="form-control form-control-alternative" value="<?php echo $account->region?>">
                            <option value="">Enter Ideal Region</option>
                            <option value="Northeast" <?php if($account->region === "Northeast") echo 'selected="selected"';?>>Northeast</option>
                            <option value="Southeast" <?php if($account->region === "Southeast") echo 'selected="selected"';?>>Southeast</option>
                            <option value="Midwest" <?php if($account->region === "Midwest") echo 'selected="selected"';?>>Midwest</option>
                            <option value="Southwest" <?php if($account->region === "Southwest") echo 'selected="selected"';?>>Southwest</option>
                            <option value="West"<?php if($account->region === "West") echo 'selected="selected"';?>>West</option>
                        </select>
                      </div>
                    </div>
                      <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-ideal-job">Ideal Job Type</label>
                          <select id="input-ideal-job" name="job_type" class="form-control form-control-alternative" value="<?php echo $account->job_type?>">
                            <option value="">Choose Ideal Job Type</option>
                            <option value="Internship"<?php if($account->job_type === "Internship") echo 'selected="selected"';?>>Internship</option>
                            <option value="Co-op"<?php if($account->job_type === "Co-op") echo 'selected="selected"';?>>Co-Op</option>
                            <option value="Full-time"<?php if($account->job_type === "Full-time") echo 'selected="selected"';?>>Full-Time</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-ideal-indust">Ideal Job Industry</label>
                        <select id="input-ideal-indust" name="industry" class="form-control form-control-alternative" value="<?php echo $account->industry?>">
                            <option value="">Enter Ideal Industry</option>
                            <option value="Business-Related Fields"<?php if($account->industry === "Business-Related Fields") echo 'selected="selected"';?>>Business-Related Fields</option>
                            <option value="Chemicals, Petroleum, Plastics & Rubber"<?php if($account->industry === "Chemicals, Petroleum, Plastics & Rubber") echo 'selected="selected"';?>>Chemicals, Petroleum, Plastics & Rubber</option>
                            <option value="Computer Systems - Design/Programming"<?php if($account->industry === "Chemicals, Petroleum, Plastics & Rubber") echo 'selected="selected"';?>>Computer Systems - Design/Programming</option>
                            <option value="Consulting Services"<?php if($account->industry === "Consulting Services") echo 'selected="selected"';?>>Consulting Services</option>
                            <option value="Consumer Goods"<?php if($account->industry === "Consumer Goods") echo 'selected="selected"';?>>Consumer Goods</option>
                            <option value="Energy"<?php if($account->industry === "Energy") echo 'selected="selected"';?>>Energy</option>
                            <option value="Engineering Services"<?php if($account->industry === "Engineering Services") echo 'selected="selected"';?>>Engineering Services</option>
                            <option value="Environmental Services"<?php if($account->industry === "Environmental Services") echo 'selected="selected"';?>>Environmental Services</option>
                            <option value="Government"<?php if($account->industry === "Government") echo 'selected="selected"';?>>Government</option>
                            <option value="Manufacturing & Industrial Systems"<?php if($account->industry === "Manufacturing & Industrial Systems") echo 'selected="selected"';?>>Manufacturing & Industrial Systems</option>
                            <option value="Other"<?php if($account->industry === "Other") echo 'selected="selected"';?>>Other</option>
                            <option value="Pharmaceuticals & Medicine"<?php if($account->industry === "Pharmaceuticals & Medicine") echo 'selected="selected"';?>>Pharmaceuticals & Medicine</option>
                            <option value="Scientific Research & Development"<?php if($account->industry === "Scientific Research & Development") echo 'selected="selected"';?>>Scientific Research & Development</option>
                        </select>
                    </div>
                  </div>
                  </div>
                <hr class="my-4">


                <!-- Skills -->
                <h6 class="heading-small text-muted mb-4">Skills</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <!--Tech Skill -->
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-tech">Enter up to 10 Technical Skills</label>
                        <select id="input-tech1" name="tech_skill1" class="form-control form-control-alternative" value="<?php echo $account->tech_skill1?>">
                          <option value="">Enter Technical Skill #1</option>
                          <?php getTechSkillList(1); ?>
                        </select>
                        <select id="input-tech1-rating" name="tech_rate1" class="form-control form-control-alternative" value="<?php echo $account->tech_rate1?>">
                          <option value="">Rate Technical Skill #1</option>
                          <option value="5: Expert"<?php if($account->tech_rate1 === "5: Expert") echo 'selected="selected"';?>>5: Expert </option>
                          <option value="4: Advanced"<?php if($account->tech_rate1 === "4: Advanced") echo 'selected="selected"';?>>4: Advanced </option>
                          <option value="3: Intermediate"<?php if($account->tech_rate1 === "3: Intermediate") echo 'selected="selected"';?>>3: Intermediate </option>
                          <option value="2: Basic"<?php if($account->tech_rate1 === "2: Basic") echo 'selected="selected"';?>>2: Basic </option>
                          <option value="1: Beginner"<?php if($account->tech_rate1 === "1: Beginner") echo 'selected="selected"';?>>1: Beginner </option>
                        </select>

                        <br>
                          <select id="input-tech2" name="tech_skill2" class="form-control form-control-alternative" value="<?php echo $account->tech_skill2?>">
                          <option value="">Enter Technical Skill #2</option>
                          <?php getTechSkillList(2); ?>
                        </select>
                          <select id="input-tech2-rating" name="tech_rate2" class="form-control form-control-alternative" value="<?php echo $account->tech_rate2?>">
                            <option value="">Rate Technical Skill #2</option>
                            <option value="5: Expert"<?php if($account->tech_rate2 === "5: Expert") echo 'selected="selected"';?>>5: Expert </option>
                            <option value="4: Advanced"<?php if($account->tech_rate2 === "4: Advanced") echo 'selected="selected"';?>>4: Advanced </option>
                            <option value="3: Intermediate"<?php if($account->tech_rate2 === "3: Intermediate") echo 'selected="selected"';?>>3: Intermediate </option>
                            <option value="2: Basic"<?php if($account->tech_rate2 === "2: Basic") echo 'selected="selected"';?>>2: Basic </option>
                            <option value="1: Beginner"<?php if($account->tech_rate2 === "1: Beginner") echo 'selected="selected"';?>>1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech3" name="tech_skill3" class="form-control form-control-alternative" value="<?php echo $account->tech_skill3?>">
                          <option value="">Enter Technical Skill #3</option>
                          <?php getTechSkillList(3); ?>
                        </select>
                          <select id="input-tech3-rating" name="tech_rate3" class="form-control form-control-alternative" value="<?php echo $account->tech_rate3?>">
                            <option value="">Rate Technical Skill #3</option>
                            <option value="5: Expert"<?php if($account->tech_rate3 === "5: Expert") echo 'selected="selected"';?>>5: Expert </option>
                            <option value="4: Advanced"<?php if($account->tech_rate3 === "4: Advanced") echo 'selected="selected"';?>>4: Advanced </option>
                            <option value="3: Intermediate"<?php if($account->tech_rate3 === "3: Intermediate") echo 'selected="selected"';?>>3: Intermediate </option>
                            <option value="2: Basic"<?php if($account->tech_rate3 === "2: Basic") echo 'selected="selected"';?>>2: Basic </option>
                            <option value="1: Beginner"<?php if($account->tech_rate3 === "1: Beginner") echo 'selected="selected"';?>>1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech4" name="tech_skill4" class="form-control form-control-alternative" value="<?php echo $account->tech_skill4?>">
                          <option value="">Enter Technical Skill #4</option>
                          <?php getTechSkillList(4); ?>
                        </select>
                          <select id="input-tech4-rating" name="tech_rate4" class="form-control form-control-alternative" value="<?php echo $account->tech_rate4?>">
                            <option value="">Rate Technical Skill #4</option>
                            <option value="5: Expert"<?php if($account->tech_rate4 === "5: Expert") echo 'selected="selected"';?>>5: Expert </option>
                            <option value="4: Advanced"<?php if($account->tech_rate4 === "4: Advanced") echo 'selected="selected"';?>>4: Advanced </option>
                            <option value="3: Intermediate"<?php if($account->tech_rate4 === "3: Intermediate") echo 'selected="selected"';?>>3: Intermediate </option>
                            <option value="2: Basic"<?php if($account->tech_rate4 === "2: Basic") echo 'selected="selected"';?>>2: Basic </option>
                            <option value="1: Beginner"<?php if($account->tech_rate4 === "1: Beginner") echo 'selected="selected"';?>>1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech5" name="tech_skill5" class="form-control form-control-alternative" value="<?php echo $account->tech_skill5?>">
                          <option value="">Enter Technical Skill #5</option>
                          <?php getTechSkillList(5); ?>
                        </select>
                          <select id="input-tech5-rating" name="tech_rate5" class="form-control form-control-alternative" value="<?php echo $account->tech_rate5?>">
                            <option value="">Rate Technical Skill #5</option>
                            <option value="5: Expert"<?php if($account->tech_rate5 === "5: Expert") echo 'selected="selected"';?>>5: Expert </option>
                            <option value="4: Advanced"<?php if($account->tech_rate5 === "4: Advanced") echo 'selected="selected"';?>>4: Advanced </option>
                            <option value="3: Intermediate"<?php if($account->tech_rate5 === "3: Intermediate") echo 'selected="selected"';?>>3: Intermediate </option>
                            <option value="2: Basic"<?php if($account->tech_rate5 === "2: Basic") echo 'selected="selected"';?>>2: Basic </option>
                            <option value="1: Beginner"<?php if($account->tech_rate5 === "1: Beginner") echo 'selected="selected"';?>>1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech6" name="tech_skill6" class="form-control form-control-alternative" value="<?php echo $account->tech_skill6?>">
                          <option value="">Enter Technical Skill #6</option>
                          <?php getTechSkillList(6); ?>
                        </select>
                          <select id="input-tech6" name="tech_rate6" class="form-control form-control-alternative" value="<?php echo $account->tech_rate6?>">
                            <option value="">Rate Technical Skill #6</option>
                            <option value="5: Expert"<?php if($account->tech_rate6 === "5: Expert") echo 'selected="selected"';?>>5: Expert </option>
                            <option value="4: Advanced"<?php if($account->tech_rate6 === "4: Advanced") echo 'selected="selected"';?>>4: Advanced </option>
                            <option value="3: Intermediate"<?php if($account->tech_rate6 === "3: Intermediate") echo 'selected="selected"';?>>3: Intermediate </option>
                            <option value="2: Basic"<?php if($account->tech_rate6 === "2: Basic") echo 'selected="selected"';?>>2: Basic </option>
                            <option value="1: Beginner"<?php if($account->tech_rate6 === "1: Beginner") echo 'selected="selected"';?>>1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech7" name="tech_skill7" class="form-control form-control-alternative" value="<?php echo $account->tech_skill7?>">
                          <option value="">Enter Technical Skill #7</option>
                          <?php getTechSkillList(7); ?>
                        </select>
                          <select id="input-tech7" name="tech_rate7" class="form-control form-control-alternative" value="<?php echo $account->tech_rate7?>">
                            <option value="">Rate Technical Skill #7</option>
                            <option value="5: Expert"<?php if($account->tech_rate7 === "5: Expert") echo 'selected="selected"';?>>5: Expert </option>
                            <option value="4: Advanced"<?php if($account->tech_rate7 === "4: Advanced") echo 'selected="selected"';?>>4: Advanced </option>
                            <option value="3: Intermediate"<?php if($account->tech_rate7 === "3: Intermediate") echo 'selected="selected"';?>>3: Intermediate </option>
                            <option value="2: Basic"<?php if($account->tech_rate7 === "2: Basic") echo 'selected="selected"';?>>2: Basic </option>
                            <option value="1: Beginner"<?php if($account->tech_rate7 === "1: Beginner") echo 'selected="selected"';?>>1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech8" name="tech_skill8" class="form-control form-control-alternative" value="<?php echo $account->tech_skill8?>">
                          <option value="">Enter Technical Skill #8</option>
                          <?php getTechSkillList(8); ?>
                        </select>
                          <select id="input-tech8" name="tech_rate8" class="form-control form-control-alternative" value="<?php echo $account->tech_rate8?>">
                            <option value="">Rate Technical Skill #8</option>
                            <option value="5: Expert"<?php if($account->tech_rate8 === "5: Expert") echo 'selected="selected"';?>>5: Expert </option>
                            <option value="4: Advanced"<?php if($account->tech_rate8 === "4: Advanced") echo 'selected="selected"';?>>4: Advanced </option>
                            <option value="3: Intermediate"<?php if($account->tech_rate8 === "3: Intermediate") echo 'selected="selected"';?>>3: Intermediate </option>
                            <option value="2: Basic"<?php if($account->tech_rate8 === "2: Basic") echo 'selected="selected"';?>>2: Basic </option>
                            <option value="1: Beginner"<?php if($account->tech_rate8 === "1: Beginner") echo 'selected="selected"';?>>1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech9" name="tech_skill9" class="form-control form-control-alternative" value="<?php echo $account->tech_skill9?>">
                          <option value="">Enter Technical Skill #9</option>
                          <?php getTechSkillList(9); ?>
                        </select>
                          <select id="input-tech9" name="tech_rate9" class="form-control form-control-alternative" value="<?php echo $account->tech_rate9?>">
                            <option value="">Rate Technical Skill #9</option>
                            <option value="5: Expert"<?php if($account->tech_rate9 === "5: Expert") echo 'selected="selected"';?>>5: Expert </option>
                            <option value="4: Advanced"<?php if($account->tech_rate9 === "4: Advanced") echo 'selected="selected"';?>>4: Advanced </option>
                            <option value="3: Intermediate"<?php if($account->tech_rate9 === "3: Intermediate") echo 'selected="selected"';?>>3: Intermediate </option>
                            <option value="2: Basic"<?php if($account->tech_rate9 === "2: Basic") echo 'selected="selected"';?>>2: Basic </option>
                            <option value="1: Beginner"<?php if($account->tech_rate9 === "1: Beginner") echo 'selected="selected"';?>>1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech10" name="tech_skill10" class="form-control form-control-alternative" value="<?php echo $account->tech_skill10?>">
                          <option value="">Enter Technical Skill #10</option>
                          <?php getTechSkillList(10); ?>
                        </select>
                          <select id="input-tech10" name="tech_rate10" class="form-control form-control-alternative" value="<?php echo $account->tech_rate10?>">
                            <option value="">Rate Technical Skill #10</option>
                            <option value="5: Expert"<?php if($account->tech_rate10 === "5: Expert") echo 'selected="selected"';?>>5: Expert </option>
                            <option value="4: Advanced"<?php if($account->tech_rate10 === "4: Advanced") echo 'selected="selected"';?>>4: Advanced </option>
                            <option value="3: Intermediate"<?php if($account->tech_rate10 === "3: Intermediate") echo 'selected="selected"';?>>3: Intermediate </option>
                            <option value="2: Basic"<?php if($account->tech_rate10 === "2: Basic") echo 'selected="selected"';?>>2: Basic </option>
                            <option value="1: Beginner"<?php if($account->tech_rate10 === "1: Beginner") echo 'selected="selected"';?>>1: Beginner </option>
                          </select>
                      </div>
                    </div>
                    <hr class="my-4">
                <!-- End of tech skills -->

                  <!--soft skills -->
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-soft">Soft Skills</label>
                        <select id="input-soft" name="soft_skill1" class="form-control form-control-alternative" value="<?php echo $account->soft_skill1?>">
                          <option value="">Enter Soft Skill #1</option>
                          <?php getSoftSkillList(1); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill2" class="form-control form-control-alternative" value="<?php echo $account->soft_skill2?>">
                          <option value="">Enter Soft Skill #2</option>
                          <?php getSoftSkillList(2); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill3" class="form-control form-control-alternative" value="<?php echo $account->soft_skill3?>">
                          <option value="">Enter Soft Skill #3</option>
                          <?php getSoftSkillList(3); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill4" class="form-control form-control-alternative" value="<?php echo $account->soft_skill4?>">
                          <option value="">Enter Soft Skill #4</option>
                         <option value="Accountability">Accountability</option>
                         <?php getSoftSkillList(4); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill5" class="form-control form-control-alternative" value="<?php echo $account->soft_skill5?>">
                          <option value="">Enter Soft Skill #5</option>
                          <?php getSoftSkillList(5); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill6" class="form-control form-control-alternative" value="<?php echo $account->soft_skill6?>">
                          <option value="">Enter Soft Skill #6</option>
                          <?php getSoftSkillList(6); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill7" class="form-control form-control-alternative" value="<?php echo $account->soft_skill7?>">
                          <option value="">Enter Soft Skill #7</option>
                          <?php getSoftSkillList(7); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill8" class="form-control form-control-alternative" value="<?php echo $account->soft_skill8?>">
                          <option value="">Enter Soft Skill #8</option>
                          <?php getSoftSkillList(8); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill9" class="form-control form-control-alternative" value="<?php echo $account->soft_skill9?>">
                          <option value="">Enter Soft Skill #9</option>
                          <?php getSoftSkillList(9); ?>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill10" class="form-control form-control-alternative" value="<?php echo $account->soft_skill10?>">
                          <option value="">Enter Soft Skill #10</option>
                          <?php getSoftSkillList(10); ?>
                          </select>
                      </div>
                    </div>
                    <!--end of soft skills -->
                  </div>
                </div>
                <hr class="my-4">

                <!-- Courses -->

                <h6 class="heading-small text-muted mb-4">Courses</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-tech">Enter Your 5 Most Applicable Courses</label>
                        <select id="input-tech1" name="course1" class="form-control form-control-alternative" value="<?php echo $account->course1?>">
                          <option value="">Enter Course #1</option>
                          <?php getCourseList(1); ?>
                        </select>
                        <select id="input-course-grade1" name="course_grade1" class="form-control form-control-alternative" value="<?php echo $account->course_grade1?>">
                          <option value="">Enter Course #1 Grade</option>
                          <option value="A"<?php if($account->course_grade1 === "A") echo 'selected="selected"';?>>A</option>
                          <option value="B"<?php if($account->course_grade1 === "B") echo 'selected="selected"';?>>B</option>
                          <option value="C"<?php if($account->course_grade1 === "C") echo 'selected="selected"';?>>C</option>
                          <option value="D"<?php if($account->course_grade1 === "D") echo 'selected="selected"';?>>D</option>
                          <option value="F"<?php if($account->course_grade1 === "F") echo 'selected="selected"';?>>F</option>
                        </select>
                        <br>
                          <select id="input-tech2" name="course2" class="form-control form-control-alternative" value="<?php echo $account->course2?>">
                          <option value="">Enter Course #2</option>
                          <?php getCourseList(2); ?>
                        </select>
                          <select id="input-course-grade2" name="course_grade2" class="form-control form-control-alternative" value="<?php echo $account->course_grade2?>">
                            <option value="">Enter Course #2 Grade</option>
                            <option value="A"<?php if($account->course_grade2 === "A") echo 'selected="selected"';?>>A</option>
                            <option value="B"<?php if($account->course_grade2 === "B") echo 'selected="selected"';?>>B</option>
                            <option value="C"<?php if($account->course_grade2 === "C") echo 'selected="selected"';?>>C</option>
                            <option value="D"<?php if($account->course_grade2 === "D") echo 'selected="selected"';?>>D</option>
                            <option value="F"<?php if($account->course_grade2 === "F") echo 'selected="selected"';?>>F</option>
                          </select>
                          <br>
                          <select id="input-tech3" name="course3" class="form-control form-control-alternative" value="<?php echo $account->course3?>">
                          <option value="">Enter Course #3</option>
                          <?php getCourseList(3); ?>
                        </select>
                          <select id="input-course-grade3" name="course_grade3" class="form-control form-control-alternative" value="<?php echo $account->course_grade3?>">
                            <option value="">Enter Course #3 Grade</option>
                            <option value="A"<?php if($account->course_grade3 === "A") echo 'selected="selected"';?>>A</option>
                            <option value="B"<?php if($account->course_grade3 === "B") echo 'selected="selected"';?>>B</option>
                            <option value="C"<?php if($account->course_grade3 === "C") echo 'selected="selected"';?>>C</option>
                            <option value="D"<?php if($account->course_grade3 === "D") echo 'selected="selected"';?>>D</option>
                            <option value="F"<?php if($account->course_grade3 === "F") echo 'selected="selected"';?>>F</option>
                          </select>
                          <br>
                          <select id="input-tech4" name="course4" class="form-control form-control-alternative" value="<?php echo $account->course4?>">
                          <option value="">Enter Course #4</option>
                          <?php getCourseList(4); ?>
                        </select>
                          <select id="input-course-grade4" name="course_grade4" class="form-control form-control-alternative" value="<?php echo $account->course_grade4?>">
                            <option value="">Enter Course #4 Grade</option>
                            <option value="A"<?php if($account->course_grade4 === "A") echo 'selected="selected"';?>>A</option>
                            <option value="B"<?php if($account->course_grade4 === "B") echo 'selected="selected"';?>>B</option>
                            <option value="C"<?php if($account->course_grade4 === "C") echo 'selected="selected"';?>>C</option>
                            <option value="D"<?php if($account->course_grade4 === "D") echo 'selected="selected"';?>>D</option>
                            <option value="F"<?php if($account->course_grade4 === "F") echo 'selected="selected"';?>>F</option>
                          </select>
                          <br>
                          <select id="input-tech5" name="course5" class="form-control form-control-alternative" value="<?php echo $account->course5?>">
                          <option value="">Enter Course #5</option>
                          <?php getCourseList(5); ?>
                        </select>
                          <select id="input-course-grade5" name="course_grade5" class="form-control form-control-alternative" value="<?php echo $account->course_grade5?>">
                            <option value="">Enter Course #5 Grade</option>
                            <option value="A"<?php if($account->course_grade5 === "A") echo 'selected="selected"';?>>A</option>
                            <option value="B"<?php if($account->course_grade5 === "B") echo 'selected="selected"';?>>B</option>
                            <option value="C"<?php if($account->course_grade5 === "C") echo 'selected="selected"';?>>C</option>
                            <option value="D"<?php if($account->course_grade5 === "D") echo 'selected="selected"';?>>D</option>
                            <option value="F"<?php if($account->course_grade5 === "F") echo 'selected="selected"';?>>F</option>
                          </select>
                          <br>
                        </div>
                       </div>
                      </div>
                    </div>
                    <hr class="my-4">
                    <!--end of Courses -->

                <!-- Projects -->
                <h6 class="heading-small text-muted mb-4">Projects</h6>
                    <div class="pl-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-project1">Project #1</label>
                      </div>
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-workdate2">Project Title</label>
                          <input type="text" id="input-workdate2" class="form-control form-control-alternative"
                            name="project_title1" placeholder="Project Title" value="<?php echo $account->project_title1?>">
                          </div>
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-workdescript2">Project Description</label>
                          <textarea rows="4" id="input-workdescript2" class="form-control form-control-alternative"
                            name="project_descr1" placeholder="Describe your projects duties..." value="<?php echo $account->project_descr1?>"><?php echo $account->project_descr1?></textarea>
                          </div>
                      </div>
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-certif">Project #2</label>
                      </div>
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-workdate2">Project Title</label>
                          <input type="text" id="input-workdate2" class="form-control form-control-alternative"
                            name="project_title2" placeholder="Project Title" value="<?php echo $account->project_title2?>">
                          </div>
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-workdescript2">Project Description</label>
                          <textarea rows="4" id="input-workdescript2" class="form-control form-control-alternative"
                            name="project_descr2" placeholder="Describe your project duties..." value="<?php echo $account->project_descr2?>"><?php echo $account->project_descr2?></textarea>
                          </div>
                <hr class="my-4">
                <!-- end of Projects -->

                <!-- Work Experience -->
                <h6 class="heading-small text-muted mb-4">Work Experience</h6>
                <div class="pl-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-work1">Work #1</label>
                    </div>
                      <div class="form-group focused">
                      <label class="form-control-label" for="input-workcompany1">Employer</label>
                    <input type="text" id="input-workemployer1" class="form-control form-control-alternative"
                      name="work_employer1" placeholder="Employer" value="<?php echo $account->work_employer1?>">
                     </div>
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-worktitle1">Title of Position</label>
                    <input type="text" id="input-worktitle1" class="form-control form-control-alternative"
                      name="work_position1" placeholder="Title of Position" value="<?php echo $account->work_position1?>">
                    </div>
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-workdate1">Duration of Employment</label>
                    <input type="text" id="input-workdate1" class="form-control form-control-alternative"
                      name="work_duration1" placeholder="Duration of Employment" value="<?php echo $account->work_duration1?>">
                    </div>
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-workdescript1">Job Description</label>
                    <textarea rows="4" id="input-workdescript1" class="form-control form-control-alternative"
                      name="work_descr1" placeholder="Describe your job duties or projects..." value="<?php echo $account->work_descr1?>"><?php echo $account->work_descr1?></textarea>
                    </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-work2">Work #2</label>
                  </div>
                    <div class="form-group focused">
                    <label class="form-control-label" for="input-workcompany2">Employer</label>
                  <input type="text" id="input-workemployer2" class="form-control form-control-alternative"
                    name="work_employer2" placeholder="Employer" value="<?php echo $account->work_employer2?>">
                  </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-worktitle2">Title of Position</label>
                  <input type="text" id="input-worktitle2" class="form-control form-control-alternative"
                    name="work_position2" placeholder="Title of Position" value="<?php echo $account->work_position2?>">
                  </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-workdate2">Duration of Employment</label>
                  <input type="text" id="input-workdate2" class="form-control form-control-alternative"
                    name="work_duration2" placeholder="Duration of Employment" value="<?php echo $account->work_duration2?>">
                  </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-workdescript2">Job Description</label>
                  <textarea rows="4" id="input-workdescript2" class="form-control form-control-alternative"
                    name="work_descr2" placeholder="Describe your job duties or projects..." value="<?php echo $account->work_descr2?>"><?php echo $account->work_descr2?></textarea>
                  </div>
                </div>
                <hr class="my-4">
                <!-- end of Work Experience -->
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
