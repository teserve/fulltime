<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="../css/templatemo-style.css">

  <?php
    session_start();
    include '../account_class.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);

    $account2 = new Account();
    $account2->getInfoStudent($_SESSION['account_id']);

    $account3 = new Account();
    $account3->getInfoStuSkills($_SESSION['account_id']);

    function showTechRatingInput($n)
    {
      echo '<option value="">Rate Technical Skill &num;' . $n . '</option>';
      echo '<option value="5: Expert">5: Expert </option>';
      echo '<option value="4: Advanced">4: Advanced </option>';
      echo '<option value="3: Intermediate">3: Intermediate </option>';
      echo '<option value="2: Basic">2: Basic </option>';
      echo '<option value="1: Beginner">1: Beginner </option>';
    }

    function getTechSkillList()
    {
      global $pdo;

      $query = 'SELECT skill_name FROM g1116887.Skills';

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
        $output = '<option value="' . $name;
        // if ($account2->asdf === "4.0")
        // {
        //   $output .= 'selected="selected"';
        // }
        $output .= '">' . $name . '</option>';
        echo $output;
      }
    }
  ?>

</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" aria-haspopup="true"
              aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="images/blankprofile.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $account->first_name?> <?php echo $account->last_name?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
      style="min-height: 600px; background-image: url(fulltime.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $account->first_name;?>,</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can add your skills, build your portfolio,
              and express your creative endeavors.</p>
            <a href="../Dashboard/dbstudent.php" class="btn btn-info">Dashboard</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../user_data/60/profile_picture.jpg" class="rounded-circle">
                    <!-- <img src="images/blankprofile.jpg" class="rounded-circle"> -->
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
               <!-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>  -->
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <!--
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Matches</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Applications</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Skills</span>
                    </div>
                  -->
                  </div>
                </div>
              </div>

              <div class="text-center">
                <h3>
                  <?php echo $account->first_name?> <?php echo $account->last_name?><span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $account2->city?>, <?php echo $account2->Nstate?>, <?php echo $account2->country?> <?php echo $account2->post_code?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $account2->ed_level?>, <?php echo $account2->grad_date?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?php echo $account2->university?>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        Upload your resume!
                        <input type="file" name="resume" id="resume">
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
                          placeholder="City" value="<?php echo $account2->city?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-state">State</label>
                        <input type="text" id="input-state" name="Nstate" class="form-control form-control-alternative"
                          placeholder="State" value="<?php echo $account2->Nstate?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" name="country" class="form-control form-control-alternative"
                          placeholder="Country" value="<?php echo $account2->country?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-postal-code">Postal code</label>
                        <input type="number" id="input-postal-code" name="post_code" class="form-control form-control-alternative"
                          placeholder="Postal code" value="<?php echo $account2->post_code?>">
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
                          placeholder="Enter University" value="<?php echo $account2->university?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-major">Major</label>
                        <input type="text" id="input-major" name="major" class="form-control form-control-alternative"
                          placeholder="Enter Major" value="<?php echo $account2->major?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-gpa">GPA</label>
                        <select id="input-gpa" name="gpa" class="form-control form-control-alternative" value="<?php echo $account2->gpa?>">
                            <option value="">Enter Required GPA</option>
                            <option value="4.0"<?php if($account2->gpa === "4.0") echo 'selected="selected"';?>> 4.0 </option>
                            <option value="3.80-3.99"<?php if($account2->gpa === "3.80-3.99") echo 'selected="selected"';?>>  3.80-3.99 </option>
                            <option value="3.60-3.79"<?php if($account2->gpa === "3.60-3.79") echo 'selected="selected"';?>>  3.60-3.79 </option>
                            <option value="3.40-3.59"<?php if($account2->gpa === "3.40-3.59") echo 'selected="selected"';?>>  3.40-3.59 </option>
                            <option value="3.20-3.39"<?php if($account2->gpa === "3.20-3.39") echo 'selected="selected"';?>>  3.20-3.39 </option>
                            <option value="3.00-3.19"<?php if($account2->gpa === "3.00-3.19") echo 'selected="selected"';?>>  3.00-3.19 </option>
                            <option value="2.80-2.99"<?php if($account2->gpa === "2.80-2.99") echo 'selected="selected"';?>>  2.80-2.99 </option>
                            <option value="2.60-2.79"<?php if($account2->gpa === "2.60-2.79") echo 'selected="selected"';?>>  2.60-2.79 </option>
                            <option value="2.40-2.59"<?php if($account2->gpa === "2.40-2.59") echo 'selected="selected"';?>>  2.40-2.59 </option>
                            <option value="< 2.39"<?php if($account2->gpa === "< 2.39") echo 'selected="selected"';?>> < 2.39 </option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-grad-date">Graduation Date</label>
                        <input type="text" id="input-grad-date" name="grad_date" class="form-control form-control-alternative"
                          placeholder="Enter Graduation Month and Year (Ex: May 2022)" value="<?php echo $account2->grad_date?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="ed_level">Education Level</label>
                          <select id="ed_level" name="ed_level" class="form-control form-control-alternative" value="<?php echo $account2->ed_level?>">
                            <option value="">Enter Required Education Level</option>
                            <option value="Bachelor's Degree" <?php if($account2->ed_level === "Bachelor's Degree") echo 'selected="selected"';?>> Bachelor's Degree </option>
                            <option value="Master's Degree" <?php if($account2->ed_level === "Master's Degree") echo 'selected="selected"';?>>Master's Degree </option>
                            <option value="Doctorate's Degree" <?php if($account2->ed_level === "Doctorate's Degree") echo 'selected="selected"';?>>Doctorate's Degree </option>
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
                      placeholder="A few words about you ..." value="<?php echo $account2->bio?>"></textarea>
                  </div>
                </div>
                <hr class="my-4">

                <!-- Preference -->
                <h6 class="heading-small text-muted mb-4">Job Preference</h6>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-region">Ideal Region Location</label>
                        <select id="input-region" name="region" class="form-control form-control-alternative" value="<?php echo $account2->region?>">
                            <option value="">Enter Ideal Region</option>
                            <option value="Northeast" <?php if($account2->region === "Northeast") echo 'selected="selected"';?>>Northeast</option>
                            <option value="Southeast" <?php if($account2->region === "Southeast") echo 'selected="selected"';?>>Southeast</option>
                            <option value="Midwest" <?php if($account2->region === "Midwest") echo 'selected="selected"';?>>Midwest</option>
                            <option value="Southwest" <?php if($account2->region === "Southwest") echo 'selected="selected"';?>>Southwest</option>
                            <option value="West"<?php if($account2->region === "West") echo 'selected="selected"';?>>West</option>
                        </select>
                      </div>
                    </div>
                      <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-ideal-job">Ideal Job Type</label>
                          <select id="input-ideal-job" name="job_type" class="form-control form-control-alternative" value="<?php echo $account2->job_type?>">
                            <option value="">Choose Ideal Job Type</option>
                            <option value="Internship"<?php if($account2->job_type === "Internship") echo 'selected="selected"';?>>Internship</option>
                            <option value="Co-op"<?php if($account2->job_type === "Co-op") echo 'selected="selected"';?>>Co-Op</option>
                            <option value="Full-time"<?php if($account2->job_type === "Full-time") echo 'selected="selected"';?>>Full-Time</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-ideal-indust">Ideal Job Industry</label>
                        <select id="input-ideal-indust" name="industry" class="form-control form-control-alternative" value="<?php echo $account2->industry?>">
                            <option value="">Enter Ideal Industry</option>
                            <option value="Business-Related Fields"<?php if($account2->industry === "Business-Related Fields") echo 'selected="selected"';?>>Business-Related Fields</option>
                            <option value="Chemicals, Petroleum, Plastics & Rubber"<?php if($account2->industry === "Chemicals, Petroleum, Plastics & Rubber") echo 'selected="selected"';?>>Chemicals, Petroleum, Plastics & Rubber</option>
                            <option value="Computer Systems - Design/Programming"<?php if($account2->industry === "Chemicals, Petroleum, Plastics & Rubber") echo 'selected="selected"';?>>Computer Systems - Design/Programming</option>
                            <option value="Consulting Services"<?php if($account2->industry === "Consulting Services") echo 'selected="selected"';?>>Consulting Services</option>
                            <option value="Consumer Goods"<?php if($account2->industry === "Consumer Goods") echo 'selected="selected"';?>>Consumer Goods</option>
                            <option value="Energy"<?php if($account2->industry === "Energy") echo 'selected="selected"';?>>Energy</option>
                            <option value="Engineering Services"<?php if($account2->industry === "Engineering Services") echo 'selected="selected"';?>>Engineering Services</option>
                            <option value="Environmental Services"<?php if($account2->industry === "Environmental Services") echo 'selected="selected"';?>>Environmental Services</option>
                            <option value="Government"<?php if($account2->industry === "Government") echo 'selected="selected"';?>>Government</option>
                            <option value="Manufacturing & Industrial Systems"<?php if($account2->industry === "Manufacturing & Industrial Systems") echo 'selected="selected"';?>>Manufacturing & Industrial Systems</option>
                            <option value="Other"<?php if($account2->industry === "Other") echo 'selected="selected"';?>>Other</option>
                            <option value="Pharmaceuticals & Medicine"<?php if($account2->industry === "Pharmaceuticals & Medicine") echo 'selected="selected"';?>>Pharmaceuticals & Medicine</option>
                            <option value="Scientific Research & Development"<?php if($account2->industry === "Scientific Research & Development") echo 'selected="selected"';?>>Scientific Research & Development</option>
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
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-tech">Enter up to 10 Technical Skills</label>
                        <select id="input-tech1" name="tech_skill1" class="form-control form-control-alternative" value="<?php echo $account3->tech_skill1?>">

                          <option value="">Enter Technical Skill #1</option>
                          <option value="Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="Algorithms">Algorithms</option>
                          <option value="Architecture and engineering (CAD software)">Architecture and engineering (CAD software)</option>
                          <option value="Auditing">Auditing</option>
                          <option value="BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="Backend development">Backend development</option>
                          <option value="Budget planning">Budget planning</option>
                          <option value="C#">C#</option>
                          <option value="C/C++">C/C++</option>
                          <option value="Cloud computing">Cloud computing</option>
                          <option value="Content Management Systems (CMS)">Content Management Systems (CMS)</option>
                          <option value="Cost and trend analysis">Cost and trend analysis</option>
                          <option value="Data management and analytics">Data management and analytics</option>
                          <option value="Data modeling">Data modeling</option>
                          <option value="ERP systems">ERP systems</option>
                          <option value="Front-end development">Front-end development</option>
                          <option value="GAAP and FASB knowledge">GAAP and FASB knowledge</option>
                          <option value="Google Suite (Docs, Sheets, Slides, Forms, etc.)">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="HTML">HTML</option>
                          <option value="Java">Java</option>
                          <option value="JavaScript">JavaScript</option>
                          <option value="Journalism and writing: Content Management Systems">Journalism and writing: Content Management Systems</option>
                          <option value="Foreign language">Foreign language</option>
                          <option value="Marketing analytics tools">Marketing analytics tools</option>
                          <option value="Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="Network structure and security">Network structure and security</option>
                          <option value="PHP">PHP</option>
                          <option value="PM tools (JIRA, Trello, Monday.com, etc.)">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="Perl">Perl</option>
                          <option value="Photoshop, Illustrator, Adobe CS, and InDesign">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="Product lifecycle management">Product lifecycle management</option>
                          <option value="Project management and planning">Project management and planning</option>
                          <option value="Python">Python</option>
                          <option value="R">R</option>
                          <option value="Risk management">Risk management</option>
                          <option value="Ruby">Ruby</option>
                          <option value="SQL">SQL</option>
                          <option value="Salesforce">Salesforce</option>
                          <option value="Scrum and Agile">Scrum and Agile </option>
                          <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                          <option value="Shipping and transportation: Logistics management software">Shipping and transportation: Logistics management software</option>
                          <option value="Social marketing">Social marketing</option>
                          <option value="Statistics and probability">Statistics and probability</option>
                          <option value="Swift">Swift</option>
                          <option value="System design">System design</option>
                          <option value="Task management">Task management</option>
                          <option value="Technical writing and reporting">Technical writing and reporting</option>
                          <option value="UI/UX">UI/UX</option>
                          <option value="Website design">Website design</option>
                          <option value="Zapier">Zapier</option>
                        </select>
                        <select id="input-tech1-rating" name="tech_rate1" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate1?>">
                          <option value="">Rate Technical Skill #1</option>
                          <option value="5: Expert">5: Expert </option>
                          <option value="4: Advanced">4: Advanced </option>
                          <option value="3: Intermediate">3: Intermediate </option>
                          <option value="2: Basic">2: Basic </option>
                          <option value="1: Beginner">1: Beginner </option>
                        </select>
                        <!--
                        <select id="input-tech1-rating" name="tech_rate_perc1" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate_perc1?>">
                          <option value="">Rate Technical Skill #1</option>
                          <option value="100%">5: Expert </option>
                          <option value="80%">4: Advanced </option>
                          <option value="60%">3: Intermediate </option>
                          <option value="40%">2: Basic </option>
                          <option value="20%">1: Beginner </option>
                        </select>
                      -->
                        <br>
                          <select id="input-tech2" name="tech_skill2" class="form-control form-control-alternative" value="<?php echo $account3->tech_skill2?>">
                          <option value="">Enter Technical Skill #2</option>
                         <option value="Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="Algorithms">Algorithms</option>
                          <option value="Architecture and engineering (CAD software)">Architecture and engineering (CAD software)</option>
                          <option value="Auditing">Auditing</option>
                          <option value="BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="Backend development">Backend development</option>
                          <option value="Budget planning">Budget planning</option>
                          <option value="C#">C#</option>
                          <option value="C/C++">C/C++</option>
                          <option value="Cloud computing">Cloud computing</option>
                          <option value="Content Management Systems (CMS)">Content Management Systems (CMS)</option>
                          <option value="Cost and trend analysis">Cost and trend analysis</option>
                          <option value="Data management and analytics">Data management and analytics</option>
                          <option value="Data modeling">Data modeling</option>
                          <option value="ERP systems">ERP systems</option>
                          <option value="Front-end development">Front-end development</option>
                          <option value="GAAP and FASB knowledge">GAAP and FASB knowledge</option>
                          <option value="Google Suite (Docs, Sheets, Slides, Forms, etc.)">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="HTML">HTML</option>
                          <option value="Java">Java</option>
                          <option value="JavaScript">JavaScript</option>
                          <option value="Journalism and writing: Content Management Systems">Journalism and writing: Content Management Systems</option>
                          <option value="Foreign language">Foreign language</option>
                          <option value="Marketing analytics tools">Marketing analytics tools</option>
                          <option value="Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="Network structure and security">Network structure and security</option>
                          <option value="PHP">PHP</option>
                          <option value="PM tools (JIRA, Trello, Monday.com, etc.)">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="Perl">Perl</option>
                          <option value="Photoshop, Illustrator, Adobe CS, and InDesign">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="Product lifecycle management">Product lifecycle management</option>
                          <option value="Project management and planning">Project management and planning</option>
                          <option value="Python">Python</option>
                          <option value="R">R</option>
                          <option value="Risk management">Risk management</option>
                          <option value="Ruby">Ruby</option>
                          <option value="SQL">SQL</option>
                          <option value="Salesforce">Salesforce</option>
                          <option value="Scrum and Agile">Scrum and Agile </option>
                          <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                          <option value="Shipping and transportation: Logistics management software">Shipping and transportation: Logistics management software</option>
                          <option value="Social marketing">Social marketing</option>
                          <option value="Statistics and probability">Statistics and probability</option>
                          <option value="Swift">Swift</option>
                          <option value="System design">System design</option>
                          <option value="Task management">Task management</option>
                          <option value="Technical writing and reporting">Technical writing and reporting</option>
                          <option value="UI/UX">UI/UX</option>
                          <option value="Website design">Website design</option>
                          <option value="Zapier">Zapier</option>
                        </select>
                          <select id="input-tech2-rating" name="tech_rate2" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate2?>">
                            <option value="">Rate Technical Skill #2</option>
                            <option value="5: Expert">5: Expert </option>
                            <option value="4: Advanced">4: Advanced </option>
                            <option value="3: Intermediate">3: Intermediate </option>
                            <option value="2: Basic">2: Basic </option>
                            <option value="1: Beginner">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech3" name="tech_skill3" class="form-control form-control-alternative" value="<?php echo $account3->tech_skill3?>">
                          <option value="">Enter Technical Skill #3</option>
                         <option value="Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="Algorithms">Algorithms</option>
                          <option value="Architecture and engineering (CAD software)">Architecture and engineering (CAD software)</option>
                          <option value="Auditing">Auditing</option>
                          <option value="BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="Backend development">Backend development</option>
                          <option value="Budget planning">Budget planning</option>
                          <option value="C#">C#</option>
                          <option value="C/C++">C/C++</option>
                          <option value="Cloud computing">Cloud computing</option>
                          <option value="Content Management Systems (CMS)">Content Management Systems (CMS)</option>
                          <option value="Cost and trend analysis">Cost and trend analysis</option>
                          <option value="Data management and analytics">Data management and analytics</option>
                          <option value="Data modeling">Data modeling</option>
                          <option value="ERP systems">ERP systems</option>
                          <option value="Front-end development">Front-end development</option>
                          <option value="GAAP and FASB knowledge">GAAP and FASB knowledge</option>
                          <option value="Google Suite (Docs, Sheets, Slides, Forms, etc.)">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="HTML">HTML</option>
                          <option value="Java">Java</option>
                          <option value="JavaScript">JavaScript</option>
                          <option value="Journalism and writing: Content Management Systems">Journalism and writing: Content Management Systems</option>
                          <option value="Foreign language">Foreign language</option>
                          <option value="Marketing analytics tools">Marketing analytics tools</option>
                          <option value="Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="Network structure and security">Network structure and security</option>
                          <option value="PHP">PHP</option>
                          <option value="PM tools (JIRA, Trello, Monday.com, etc.)">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="Perl">Perl</option>
                          <option value="Photoshop, Illustrator, Adobe CS, and InDesign">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="Product lifecycle management">Product lifecycle management</option>
                          <option value="Project management and planning">Project management and planning</option>
                          <option value="Python">Python</option>
                          <option value="R">R</option>
                          <option value="Risk management">Risk management</option>
                          <option value="Ruby">Ruby</option>
                          <option value="SQL">SQL</option>
                          <option value="Salesforce">Salesforce</option>
                          <option value="Scrum and Agile">Scrum and Agile </option>
                          <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                          <option value="Shipping and transportation: Logistics management software">Shipping and transportation: Logistics management software</option>
                          <option value="Social marketing">Social marketing</option>
                          <option value="Statistics and probability">Statistics and probability</option>
                          <option value="Swift">Swift</option>
                          <option value="System design">System design</option>
                          <option value="Task management">Task management</option>
                          <option value="Technical writing and reporting">Technical writing and reporting</option>
                          <option value="UI/UX">UI/UX</option>
                          <option value="Website design">Website design</option>
                          <option value="Zapier">Zapier</option>
                        </select>
                          <select id="input-tech3-rating" name="tech_rate3" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate3?>">
                            <option value="">Rate Technical Skill #3</option>
                            <option value="5: Expert">5: Expert </option>
                            <option value="4: Advanced">4: Advanced </option>
                            <option value="3: Intermediate">3: Intermediate </option>
                            <option value="2: Basic">2: Basic </option>
                            <option value="1: Beginner">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech4" name="tech_skill4" class="form-control form-control-alternative" value="<?php echo $account3->tech_skill4?>">
                          <option value="">Enter Technical Skill #4</option>
                          <option value="Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="Algorithms">Algorithms</option>
                          <option value="Architecture and engineering (CAD software)">Architecture and engineering (CAD software)</option>
                          <option value="Auditing">Auditing</option>
                          <option value="BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="Backend development">Backend development</option>
                          <option value="Budget planning">Budget planning</option>
                          <option value="C#">C#</option>
                          <option value="C/C++">C/C++</option>
                          <option value="Cloud computing">Cloud computing</option>
                          <option value="Content Management Systems (CMS)">Content Management Systems (CMS)</option>
                          <option value="Cost and trend analysis">Cost and trend analysis</option>
                          <option value="Data management and analytics">Data management and analytics</option>
                          <option value="Data modeling">Data modeling</option>
                          <option value="ERP systems">ERP systems</option>
                          <option value="Front-end development">Front-end development</option>
                          <option value="GAAP and FASB knowledge">GAAP and FASB knowledge</option>
                          <option value="Google Suite (Docs, Sheets, Slides, Forms, etc.)">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="HTML">HTML</option>
                          <option value="Java">Java</option>
                          <option value="JavaScript">JavaScript</option>
                          <option value="Journalism and writing: Content Management Systems">Journalism and writing: Content Management Systems</option>
                          <option value="Foreign language">Foreign language</option>
                          <option value="Marketing analytics tools">Marketing analytics tools</option>
                          <option value="Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="Network structure and security">Network structure and security</option>
                          <option value="PHP">PHP</option>
                          <option value="PM tools (JIRA, Trello, Monday.com, etc.)">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="Perl">Perl</option>
                          <option value="Photoshop, Illustrator, Adobe CS, and InDesign">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="Product lifecycle management">Product lifecycle management</option>
                          <option value="Project management and planning">Project management and planning</option>
                          <option value="Python">Python</option>
                          <option value="R">R</option>
                          <option value="Risk management">Risk management</option>
                          <option value="Ruby">Ruby</option>
                          <option value="SQL">SQL</option>
                          <option value="Salesforce">Salesforce</option>
                          <option value="Scrum and Agile">Scrum and Agile </option>
                          <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                          <option value="Shipping and transportation: Logistics management software">Shipping and transportation: Logistics management software</option>
                          <option value="Social marketing">Social marketing</option>
                          <option value="Statistics and probability">Statistics and probability</option>
                          <option value="Swift">Swift</option>
                          <option value="System design">System design</option>
                          <option value="Task management">Task management</option>
                          <option value="Technical writing and reporting">Technical writing and reporting</option>
                          <option value="UI/UX">UI/UX</option>
                          <option value="Website design">Website design</option>
                          <option value="Zapier">Zapier</option>
                        </select>
                          <select id="input-tech4-rating" name="tech_rate4" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate4?>">
                            <option value="">Rate Technical Skill #4</option>
                            <option value="5: Expert">5: Expert </option>
                            <option value="4: Advanced">4: Advanced </option>
                            <option value="3: Intermediate">3: Intermediate </option>
                            <option value="2: Basic">2: Basic </option>
                            <option value="1: Beginner">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech5" name="tech_skill5" class="form-control form-control-alternative" value="<?php echo $account3->tech_skill5?>">
                          <option value="">Enter Technical Skill #5</option>
                          <option value="Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="Algorithms">Algorithms</option>
                          <option value="Architecture and engineering (CAD software)">Architecture and engineering (CAD software)</option>
                          <option value="Auditing">Auditing</option>
                          <option value="BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="Backend development">Backend development</option>
                          <option value="Budget planning">Budget planning</option>
                          <option value="C#">C#</option>
                          <option value="C/C++">C/C++</option>
                          <option value="Cloud computing">Cloud computing</option>
                          <option value="Content Management Systems (CMS)">Content Management Systems (CMS)</option>
                          <option value="Cost and trend analysis">Cost and trend analysis</option>
                          <option value="Data management and analytics">Data management and analytics</option>
                          <option value="Data modeling">Data modeling</option>
                          <option value="ERP systems">ERP systems</option>
                          <option value="Front-end development">Front-end development</option>
                          <option value="GAAP and FASB knowledge">GAAP and FASB knowledge</option>
                          <option value="Google Suite (Docs, Sheets, Slides, Forms, etc.)">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="HTML">HTML</option>
                          <option value="Java">Java</option>
                          <option value="JavaScript">JavaScript</option>
                          <option value="Journalism and writing: Content Management Systems">Journalism and writing: Content Management Systems</option>
                          <option value="Foreign language">Foreign language</option>
                          <option value="Marketing analytics tools">Marketing analytics tools</option>
                          <option value="Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="Network structure and security">Network structure and security</option>
                          <option value="PHP">PHP</option>
                          <option value="PM tools (JIRA, Trello, Monday.com, etc.)">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="Perl">Perl</option>
                          <option value="Photoshop, Illustrator, Adobe CS, and InDesign">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="Product lifecycle management">Product lifecycle management</option>
                          <option value="Project management and planning">Project management and planning</option>
                          <option value="Python">Python</option>
                          <option value="R">R</option>
                          <option value="Risk management">Risk management</option>
                          <option value="Ruby">Ruby</option>
                          <option value="SQL">SQL</option>
                          <option value="Salesforce">Salesforce</option>
                          <option value="Scrum and Agile">Scrum and Agile </option>
                          <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                          <option value="Shipping and transportation: Logistics management software">Shipping and transportation: Logistics management software</option>
                          <option value="Social marketing">Social marketing</option>
                          <option value="Statistics and probability">Statistics and probability</option>
                          <option value="Swift">Swift</option>
                          <option value="System design">System design</option>
                          <option value="Task management">Task management</option>
                          <option value="Technical writing and reporting">Technical writing and reporting</option>
                          <option value="UI/UX">UI/UX</option>
                          <option value="Website design">Website design</option>
                          <option value="Zapier">Zapier</option>
                        </select>
                          <select id="input-tech5-rating" name="tech_rate5" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate5?>">
                            <option value="">Rate Technical Skill #5</option>
                            <option value="5: Expert">5: Expert </option>
                            <option value="4: Advanced">4: Advanced </option>
                            <option value="3: Intermediate">3: Intermediate </option>
                            <option value="2: Basic">2: Basic </option>
                            <option value="1: Beginner">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech6" name="tech_skill6" class="form-control form-control-alternative" value="<?php echo $account3->tech_skill6?>">
                          <option value="">Enter Technical Skill #6</option>
                          <option value="Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="Algorithms">Algorithms</option>
                          <option value="Architecture and engineering (CAD software)">Architecture and engineering (CAD software)</option>
                          <option value="Auditing">Auditing</option>
                          <option value="BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="Backend development">Backend development</option>
                          <option value="Budget planning">Budget planning</option>
                          <option value="C#">C#</option>
                          <option value="C/C++">C/C++</option>
                          <option value="Cloud computing">Cloud computing</option>
                          <option value="Content Management Systems (CMS)">Content Management Systems (CMS)</option>
                          <option value="Cost and trend analysis">Cost and trend analysis</option>
                          <option value="Data management and analytics">Data management and analytics</option>
                          <option value="Data modeling">Data modeling</option>
                          <option value="ERP systems">ERP systems</option>
                          <option value="Front-end development">Front-end development</option>
                          <option value="GAAP and FASB knowledge">GAAP and FASB knowledge</option>
                          <option value="Google Suite (Docs, Sheets, Slides, Forms, etc.)">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="HTML">HTML</option>
                          <option value="Java">Java</option>
                          <option value="JavaScript">JavaScript</option>
                          <option value="Journalism and writing: Content Management Systems">Journalism and writing: Content Management Systems</option>
                          <option value="Foreign language">Foreign language</option>
                          <option value="Marketing analytics tools">Marketing analytics tools</option>
                          <option value="Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="Network structure and security">Network structure and security</option>
                          <option value="PHP">PHP</option>
                          <option value="PM tools (JIRA, Trello, Monday.com, etc.)">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="Perl">Perl</option>
                          <option value="Photoshop, Illustrator, Adobe CS, and InDesign">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="Product lifecycle management">Product lifecycle management</option>
                          <option value="Project management and planning">Project management and planning</option>
                          <option value="Python">Python</option>
                          <option value="R">R</option>
                          <option value="Risk management">Risk management</option>
                          <option value="Ruby">Ruby</option>
                          <option value="SQL">SQL</option>
                          <option value="Salesforce">Salesforce</option>
                          <option value="Scrum and Agile">Scrum and Agile </option>
                          <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                          <option value="Shipping and transportation: Logistics management software">Shipping and transportation: Logistics management software</option>
                          <option value="Social marketing">Social marketing</option>
                          <option value="Statistics and probability">Statistics and probability</option>
                          <option value="Swift">Swift</option>
                          <option value="System design">System design</option>
                          <option value="Task management">Task management</option>
                          <option value="Technical writing and reporting">Technical writing and reporting</option>
                          <option value="UI/UX">UI/UX</option>
                          <option value="Website design">Website design</option>
                          <option value="Zapier">Zapier</option>
                        </select>
                          <select id="input-tech6" name="tech_rate6" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate6?>">
                            <option value="">Rate Technical Skill #6</option>
                            <option value="5: Expert">5: Expert </option>
                            <option value="4: Advanced">4: Advanced </option>
                            <option value="3: Intermediate">3: Intermediate </option>
                            <option value="2: Basic">2: Basic </option>
                            <option value="1: Beginner">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech7" name="tech_skill7" class="form-control form-control-alternative" value="<?php echo $account3->tech_skill7?>">
                          <option value="">Enter Technical Skill #7</option>
                         <option value="Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="Algorithms">Algorithms</option>
                          <option value="Architecture and engineering (CAD software)">Architecture and engineering (CAD software)</option>
                          <option value="Auditing">Auditing</option>
                          <option value="BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="Backend development">Backend development</option>
                          <option value="Budget planning">Budget planning</option>
                          <option value="C#">C#</option>
                          <option value="C/C++">C/C++</option>
                          <option value="Cloud computing">Cloud computing</option>
                          <option value="Content Management Systems (CMS)">Content Management Systems (CMS)</option>
                          <option value="Cost and trend analysis">Cost and trend analysis</option>
                          <option value="Data management and analytics">Data management and analytics</option>
                          <option value="Data modeling">Data modeling</option>
                          <option value="ERP systems">ERP systems</option>
                          <option value="Front-end development">Front-end development</option>
                          <option value="GAAP and FASB knowledge">GAAP and FASB knowledge</option>
                          <option value="Google Suite (Docs, Sheets, Slides, Forms, etc.)">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="HTML">HTML</option>
                          <option value="Java">Java</option>
                          <option value="JavaScript">JavaScript</option>
                          <option value="Journalism and writing: Content Management Systems">Journalism and writing: Content Management Systems</option>
                          <option value="Foreign language">Foreign language</option>
                          <option value="Marketing analytics tools">Marketing analytics tools</option>
                          <option value="Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="Network structure and security">Network structure and security</option>
                          <option value="PHP">PHP</option>
                          <option value="PM tools (JIRA, Trello, Monday.com, etc.)">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="Perl">Perl</option>
                          <option value="Photoshop, Illustrator, Adobe CS, and InDesign">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="Product lifecycle management">Product lifecycle management</option>
                          <option value="Project management and planning">Project management and planning</option>
                          <option value="Python">Python</option>
                          <option value="R">R</option>
                          <option value="Risk management">Risk management</option>
                          <option value="Ruby">Ruby</option>
                          <option value="SQL">SQL</option>
                          <option value="Salesforce">Salesforce</option>
                          <option value="Scrum and Agile">Scrum and Agile </option>
                          <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                          <option value="Shipping and transportation: Logistics management software">Shipping and transportation: Logistics management software</option>
                          <option value="Social marketing">Social marketing</option>
                          <option value="Statistics and probability">Statistics and probability</option>
                          <option value="Swift">Swift</option>
                          <option value="System design">System design</option>
                          <option value="Task management">Task management</option>
                          <option value="Technical writing and reporting">Technical writing and reporting</option>
                          <option value="UI/UX">UI/UX</option>
                          <option value="Website design">Website design</option>
                          <option value="Zapier">Zapier</option>
                        </select>
                          <select id="input-tech7" name="tech_rate7" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate7?>">
                            <option value="">Rate Technical Skill #7</option>
                            <option value="5: Expert">5: Expert </option>
                            <option value="4: Advanced">4: Advanced </option>
                            <option value="3: Intermediate">3: Intermediate </option>
                            <option value="2: Basic">2: Basic </option>
                            <option value="1: Beginner">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech8" name="tech_skill8" class="form-control form-control-alternative" value="<?php echo $account3->tech_skill8?>">
                          <option value="">Enter Technical Skill #8</option>
                          <option value="Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="Algorithms">Algorithms</option>
                          <option value="Architecture and engineering (CAD software)">Architecture and engineering (CAD software)</option>
                          <option value="Auditing">Auditing</option>
                          <option value="BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="Backend development">Backend development</option>
                          <option value="Budget planning">Budget planning</option>
                          <option value="C#">C#</option>
                          <option value="C/C++">C/C++</option>
                          <option value="Cloud computing">Cloud computing</option>
                          <option value="Content Management Systems (CMS)">Content Management Systems (CMS)</option>
                          <option value="Cost and trend analysis">Cost and trend analysis</option>
                          <option value="Data management and analytics">Data management and analytics</option>
                          <option value="Data modeling">Data modeling</option>
                          <option value="ERP systems">ERP systems</option>
                          <option value="Front-end development">Front-end development</option>
                          <option value="GAAP and FASB knowledge">GAAP and FASB knowledge</option>
                          <option value="Google Suite (Docs, Sheets, Slides, Forms, etc.)">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="HTML">HTML</option>
                          <option value="Java">Java</option>
                          <option value="JavaScript">JavaScript</option>
                          <option value="Journalism and writing: Content Management Systems">Journalism and writing: Content Management Systems</option>
                          <option value="Foreign language">Foreign language</option>
                          <option value="Marketing analytics tools">Marketing analytics tools</option>
                          <option value="Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="Network structure and security">Network structure and security</option>
                          <option value="PHP">PHP</option>
                          <option value="PM tools (JIRA, Trello, Monday.com, etc.)">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="Perl">Perl</option>
                          <option value="Photoshop, Illustrator, Adobe CS, and InDesign">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="Product lifecycle management">Product lifecycle management</option>
                          <option value="Project management and planning">Project management and planning</option>
                          <option value="Python">Python</option>
                          <option value="R">R</option>
                          <option value="Risk management">Risk management</option>
                          <option value="Ruby">Ruby</option>
                          <option value="SQL">SQL</option>
                          <option value="Salesforce">Salesforce</option>
                          <option value="Scrum and Agile">Scrum and Agile </option>
                          <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                          <option value="Shipping and transportation: Logistics management software">Shipping and transportation: Logistics management software</option>
                          <option value="Social marketing">Social marketing</option>
                          <option value="Statistics and probability">Statistics and probability</option>
                          <option value="Swift">Swift</option>
                          <option value="System design">System design</option>
                          <option value="Task management">Task management</option>
                          <option value="Technical writing and reporting">Technical writing and reporting</option>
                          <option value="UI/UX">UI/UX</option>
                          <option value="Website design">Website design</option>
                          <option value="Zapier">Zapier</option>
                        </select>
                          <select id="input-tech8" name="tech_rate8" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate8?>">
                            <option value="">Rate Technical Skill #8</option>
                            <option value="5: Expert">5: Expert </option>
                            <option value="4: Advanced">4: Advanced </option>
                            <option value="3: Intermediate">3: Intermediate </option>
                            <option value="2: Basic">2: Basic </option>
                            <option value="1: Beginner">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech9" name="tech_skill9" class="form-control form-control-alternative" value="<?php echo $account3->tech_skill9?>">
                          <option value="">Enter Technical Skill #9</option>
                          <option value="Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="Algorithms">Algorithms</option>
                          <option value="Architecture and engineering (CAD software)">Architecture and engineering (CAD software)</option>
                          <option value="Auditing">Auditing</option>
                          <option value="BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="Backend development">Backend development</option>
                          <option value="Budget planning">Budget planning</option>
                          <option value="C#">C#</option>
                          <option value="C/C++">C/C++</option>
                          <option value="Cloud computing">Cloud computing</option>
                          <option value="Content Management Systems (CMS)">Content Management Systems (CMS)</option>
                          <option value="Cost and trend analysis">Cost and trend analysis</option>
                          <option value="Data management and analytics">Data management and analytics</option>
                          <option value="Data modeling">Data modeling</option>
                          <option value="ERP systems">ERP systems</option>
                          <option value="Front-end development">Front-end development</option>
                          <option value="GAAP and FASB knowledge">GAAP and FASB knowledge</option>
                          <option value="Google Suite (Docs, Sheets, Slides, Forms, etc.)">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="HTML">HTML</option>
                          <option value="Java">Java</option>
                          <option value="JavaScript">JavaScript</option>
                          <option value="Journalism and writing: Content Management Systems">Journalism and writing: Content Management Systems</option>
                          <option value="Foreign language">Foreign language</option>
                          <option value="Marketing analytics tools">Marketing analytics tools</option>
                          <option value="Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="Network structure and security">Network structure and security</option>
                          <option value="PHP">PHP</option>
                          <option value="PM tools (JIRA, Trello, Monday.com, etc.)">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="Perl">Perl</option>
                          <option value="Photoshop, Illustrator, Adobe CS, and InDesign">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="Product lifecycle management">Product lifecycle management</option>
                          <option value="Project management and planning">Project management and planning</option>
                          <option value="Python">Python</option>
                          <option value="R">R</option>
                          <option value="Risk management">Risk management</option>
                          <option value="Ruby">Ruby</option>
                          <option value="SQL">SQL</option>
                          <option value="Salesforce">Salesforce</option>
                          <option value="Scrum and Agile">Scrum and Agile </option>
                          <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                          <option value="Shipping and transportation: Logistics management software">Shipping and transportation: Logistics management software</option>
                          <option value="Social marketing">Social marketing</option>
                          <option value="Statistics and probability">Statistics and probability</option>
                          <option value="Swift">Swift</option>
                          <option value="System design">System design</option>
                          <option value="Task management">Task management</option>
                          <option value="Technical writing and reporting">Technical writing and reporting</option>
                          <option value="UI/UX">UI/UX</option>
                          <option value="Website design">Website design</option>
                          <option value="Zapier">Zapier</option>
                        </select>
                          <select id="input-tech9" name="tech_rate9" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate9?>">
                            <option value="">Rate Technical Skill #9</option>
                            <option value="5: Expert">5: Expert </option>
                            <option value="4: Advanced">4: Advanced </option>
                            <option value="3: Intermediate">3: Intermediate </option>
                            <option value="2: Basic">2: Basic </option>
                            <option value="1: Beginner">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech10" name="tech_skill10" class="form-control form-control-alternative" value="<?php echo $account3->tech_skill10?>">
                          <option value="">Enter Technical Skill #10</option>
                          <option value="Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="Algorithms">Algorithms</option>
                          <option value="Architecture and engineering (CAD software)">Architecture and engineering (CAD software)</option>
                          <option value="Auditing">Auditing</option>
                          <option value="BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="Backend development">Backend development</option>
                          <option value="Budget planning">Budget planning</option>
                          <option value="C#">C#</option>
                          <option value="C/C++">C/C++</option>
                          <option value="Cloud computing">Cloud computing</option>
                          <option value="Content Management Systems (CMS)">Content Management Systems (CMS)</option>
                          <option value="Cost and trend analysis">Cost and trend analysis</option>
                          <option value="Data management and analytics">Data management and analytics</option>
                          <option value="Data modeling">Data modeling</option>
                          <option value="ERP systems">ERP systems</option>
                          <option value="Front-end development">Front-end development</option>
                          <option value="GAAP and FASB knowledge">GAAP and FASB knowledge</option>
                          <option value="Google Suite (Docs, Sheets, Slides, Forms, etc.)">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="HTML">HTML</option>
                          <option value="Java">Java</option>
                          <option value="JavaScript">JavaScript</option>
                          <option value="Journalism and writing: Content Management Systems">Journalism and writing: Content Management Systems</option>
                          <option value="Foreign language">Foreign language</option>
                          <option value="Marketing analytics tools">Marketing analytics tools</option>
                          <option value="Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="Network structure and security">Network structure and security</option>
                          <option value="PHP">PHP</option>
                          <option value="PM tools (JIRA, Trello, Monday.com, etc.)">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="Perl">Perl</option>
                          <option value="Photoshop, Illustrator, Adobe CS, and InDesign">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="Product lifecycle management">Product lifecycle management</option>
                          <option value="Project management and planning">Project management and planning</option>
                          <option value="Python">Python</option>
                          <option value="R">R</option>
                          <option value="Risk management">Risk management</option>
                          <option value="Ruby">Ruby</option>
                          <option value="SQL">SQL</option>
                          <option value="Salesforce">Salesforce</option>
                          <option value="Scrum and Agile">Scrum and Agile </option>
                          <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                          <option value="Shipping and transportation: Logistics management software">Shipping and transportation: Logistics management software</option>
                          <option value="Social marketing">Social marketing</option>
                          <option value="Statistics and probability">Statistics and probability</option>
                          <option value="Swift">Swift</option>
                          <option value="System design">System design</option>
                          <option value="Task management">Task management</option>
                          <option value="Technical writing and reporting">Technical writing and reporting</option>
                          <option value="UI/UX">UI/UX</option>
                          <option value="Website design">Website design</option>
                          <option value="Zapier">Zapier</option>
                        </select>
                          <select id="input-tech10" name="tech_rate10" class="form-control form-control-alternative" value="<?php echo $account3->tech_rate10?>">
                            <option value="">Rate Technical Skill #10</option>
                            <option value="5: Expert">5: Expert </option>
                            <option value="4: Advanced">4: Advanced </option>
                            <option value="3: Intermediate">3: Intermediate </option>
                            <option value="2: Basic">2: Basic </option>
                            <option value="1: Beginner">1: Beginner </option>
                          </select>
                      </div>
                    </div>
                    <hr class="my-4">
                <!-- End of tech skills -->

                  <!--soft skills -->
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-soft">Soft Skills</label>
                        <select id="input-soft" name="soft_skill1" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #1</option>
                          <option value="Accountability">Accountability</option>
                          <option value="Adaptability">Adaptability</option>
                          <option value="Collaborative">Collaborative</option>
                          <option value="Communication skills">Communication skills</option>
                          <option value="Conflict resolution">Conflict resolution</option>
                          <option value="Creativity">Creativity</option>
                          <option value="Critical problem solving">Critical problem solving</option>
                          <option value="Decisiveness">Decisiveness</option>
                          <option value="Dependability">Dependability</option>
                          <option value="Flexibility">Flexibility</option>
                          <option value="Honesty">Honesty</option>
                          <option value="Innovation">Innovation</option>
                          <option value="Integrity">Integrity</option>
                          <option value="Logical reasoning">Logical reasoning</option>
                          <option value="Leadership">Leadership</option>
                          <option value="Organization">Organization</option>
                          <option value="Patience">Patience</option>
                          <option value="People management">People management</option>
                          <option value="Perseverance">Perseverance</option>
                          <option value="Planning">Planning</option>
                          <option value="Positive work ethic">Positive work ethic</option>
                          <option value="Public speaking/presentation skills">Public speaking/presentation skills</option>
                          <option value="Punctuality">Punctuality</option>
                          <option value="Reliability">Reliability</option>
                          <option value="Responsibility">Responsibility</option>
                          <option value="Results-oriented">Results-oriented</option>
                          <option value="Self-motivated">Self-motivated</option>
                          <option value="Teamwork">Teamwork</option>
                          <option value="Time management skills">Time management skills</option>
                          <option value="Willingness to learn new things">Willingness to learn new things</option>
                          <option value="Work well under pressure">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill2" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #2</option>
                          <option value="Accountability">Accountability</option>
                          <option value="Adaptability">Adaptability</option>
                          <option value="Collaborative">Collaborative</option>
                          <option value="Communication skills">Communication skills</option>
                          <option value="Conflict resolution">Conflict resolution</option>
                          <option value="Creativity">Creativity</option>
                          <option value="Critical problem solving">Critical problem solving</option>
                          <option value="Decisiveness">Decisiveness</option>
                          <option value="Dependability">Dependability</option>
                          <option value="Flexibility">Flexibility</option>
                          <option value="Honesty">Honesty</option>
                          <option value="Innovation">Innovation</option>
                          <option value="Integrity">Integrity</option>
                          <option value="Logical reasoning">Logical reasoning</option>
                          <option value="Leadership">Leadership</option>
                          <option value="Organization">Organization</option>
                          <option value="Patience">Patience</option>
                          <option value="People management">People management</option>
                          <option value="Perseverance">Perseverance</option>
                          <option value="Planning">Planning</option>
                          <option value="Positive work ethic">Positive work ethic</option>
                          <option value="Public speaking/presentation skills">Public speaking/presentation skills</option>
                          <option value="Punctuality">Punctuality</option>
                          <option value="Reliability">Reliability</option>
                          <option value="Responsibility">Responsibility</option>
                          <option value="Results-oriented">Results-oriented</option>
                          <option value="Self-motivated">Self-motivated</option>
                          <option value="Teamwork">Teamwork</option>
                          <option value="Time management skills">Time management skills</option>
                          <option value="Willingness to learn new things">Willingness to learn new things</option>
                          <option value="Work well under pressure">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill3" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #3</option>
                         <option value="Accountability">Accountability</option>
                          <option value="Adaptability">Adaptability</option>
                          <option value="Collaborative">Collaborative</option>
                          <option value="Communication skills">Communication skills</option>
                          <option value="Conflict resolution">Conflict resolution</option>
                          <option value="Creativity">Creativity</option>
                          <option value="Critical problem solving">Critical problem solving</option>
                          <option value="Decisiveness">Decisiveness</option>
                          <option value="Dependability">Dependability</option>
                          <option value="Flexibility">Flexibility</option>
                          <option value="Honesty">Honesty</option>
                          <option value="Innovation">Innovation</option>
                          <option value="Integrity">Integrity</option>
                          <option value="Logical reasoning">Logical reasoning</option>
                          <option value="Leadership">Leadership</option>
                          <option value="Organization">Organization</option>
                          <option value="Patience">Patience</option>
                          <option value="People management">People management</option>
                          <option value="Perseverance">Perseverance</option>
                          <option value="Planning">Planning</option>
                          <option value="Positive work ethic">Positive work ethic</option>
                          <option value="Public speaking/presentation skills">Public speaking/presentation skills</option>
                          <option value="Punctuality">Punctuality</option>
                          <option value="Reliability">Reliability</option>
                          <option value="Responsibility">Responsibility</option>
                          <option value="Results-oriented">Results-oriented</option>
                          <option value="Self-motivated">Self-motivated</option>
                          <option value="Teamwork">Teamwork</option>
                          <option value="Time management skills">Time management skills</option>
                          <option value="Willingness to learn new things">Willingness to learn new things</option>
                          <option value="Work well under pressure">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill4" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #4</option>
                         <option value="Accountability">Accountability</option>
                          <option value="Adaptability">Adaptability</option>
                          <option value="Collaborative">Collaborative</option>
                          <option value="Communication skills">Communication skills</option>
                          <option value="Conflict resolution">Conflict resolution</option>
                          <option value="Creativity">Creativity</option>
                          <option value="Critical problem solving">Critical problem solving</option>
                          <option value="Decisiveness">Decisiveness</option>
                          <option value="Dependability">Dependability</option>
                          <option value="Flexibility">Flexibility</option>
                          <option value="Honesty">Honesty</option>
                          <option value="Innovation">Innovation</option>
                          <option value="Integrity">Integrity</option>
                          <option value="Logical reasoning">Logical reasoning</option>
                          <option value="Leadership">Leadership</option>
                          <option value="Organization">Organization</option>
                          <option value="Patience">Patience</option>
                          <option value="People management">People management</option>
                          <option value="Perseverance">Perseverance</option>
                          <option value="Planning">Planning</option>
                          <option value="Positive work ethic">Positive work ethic</option>
                          <option value="Public speaking/presentation skills">Public speaking/presentation skills</option>
                          <option value="Punctuality">Punctuality</option>
                          <option value="Reliability">Reliability</option>
                          <option value="Responsibility">Responsibility</option>
                          <option value="Results-oriented">Results-oriented</option>
                          <option value="Self-motivated">Self-motivated</option>
                          <option value="Teamwork">Teamwork</option>
                          <option value="Time management skills">Time management skills</option>
                          <option value="Willingness to learn new things">Willingness to learn new things</option>
                          <option value="Work well under pressure">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill5" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #5</option>
                          <option value="Accountability">Accountability</option>
                          <option value="Adaptability">Adaptability</option>
                          <option value="Collaborative">Collaborative</option>
                          <option value="Communication skills">Communication skills</option>
                          <option value="Conflict resolution">Conflict resolution</option>
                          <option value="Creativity">Creativity</option>
                          <option value="Critical problem solving">Critical problem solving</option>
                          <option value="Decisiveness">Decisiveness</option>
                          <option value="Dependability">Dependability</option>
                          <option value="Flexibility">Flexibility</option>
                          <option value="Honesty">Honesty</option>
                          <option value="Innovation">Innovation</option>
                          <option value="Integrity">Integrity</option>
                          <option value="Logical reasoning">Logical reasoning</option>
                          <option value="Leadership">Leadership</option>
                          <option value="Organization">Organization</option>
                          <option value="Patience">Patience</option>
                          <option value="People management">People management</option>
                          <option value="Perseverance">Perseverance</option>
                          <option value="Planning">Planning</option>
                          <option value="Positive work ethic">Positive work ethic</option>
                          <option value="Public speaking/presentation skills">Public speaking/presentation skills</option>
                          <option value="Punctuality">Punctuality</option>
                          <option value="Reliability">Reliability</option>
                          <option value="Responsibility">Responsibility</option>
                          <option value="Results-oriented">Results-oriented</option>
                          <option value="Self-motivated">Self-motivated</option>
                          <option value="Teamwork">Teamwork</option>
                          <option value="Time management skills">Time management skills</option>
                          <option value="Willingness to learn new things">Willingness to learn new things</option>
                          <option value="Work well under pressure">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill6" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #6</option>
                          <option value="Accountability">Accountability</option>
                          <option value="Adaptability">Adaptability</option>
                          <option value="Collaborative">Collaborative</option>
                          <option value="Communication skills">Communication skills</option>
                          <option value="Conflict resolution">Conflict resolution</option>
                          <option value="Creativity">Creativity</option>
                          <option value="Critical problem solving">Critical problem solving</option>
                          <option value="Decisiveness">Decisiveness</option>
                          <option value="Dependability">Dependability</option>
                          <option value="Flexibility">Flexibility</option>
                          <option value="Honesty">Honesty</option>
                          <option value="Innovation">Innovation</option>
                          <option value="Integrity">Integrity</option>
                          <option value="Logical reasoning">Logical reasoning</option>
                          <option value="Leadership">Leadership</option>
                          <option value="Organization">Organization</option>
                          <option value="Patience">Patience</option>
                          <option value="People management">People management</option>
                          <option value="Perseverance">Perseverance</option>
                          <option value="Planning">Planning</option>
                          <option value="Positive work ethic">Positive work ethic</option>
                          <option value="Public speaking/presentation skills">Public speaking/presentation skills</option>
                          <option value="Punctuality">Punctuality</option>
                          <option value="Reliability">Reliability</option>
                          <option value="Responsibility">Responsibility</option>
                          <option value="Results-oriented">Results-oriented</option>
                          <option value="Self-motivated">Self-motivated</option>
                          <option value="Teamwork">Teamwork</option>
                          <option value="Time management skills">Time management skills</option>
                          <option value="Willingness to learn new things">Willingness to learn new things</option>
                          <option value="Work well under pressure">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill7" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #7</option>
                          <option value="Accountability">Accountability</option>
                          <option value="Adaptability">Adaptability</option>
                          <option value="Collaborative">Collaborative</option>
                          <option value="Communication skills">Communication skills</option>
                          <option value="Conflict resolution">Conflict resolution</option>
                          <option value="Creativity">Creativity</option>
                          <option value="Critical problem solving">Critical problem solving</option>
                          <option value="Decisiveness">Decisiveness</option>
                          <option value="Dependability">Dependability</option>
                          <option value="Flexibility">Flexibility</option>
                          <option value="Honesty">Honesty</option>
                          <option value="Innovation">Innovation</option>
                          <option value="Integrity">Integrity</option>
                          <option value="Logical reasoning">Logical reasoning</option>
                          <option value="Leadership">Leadership</option>
                          <option value="Organization">Organization</option>
                          <option value="Patience">Patience</option>
                          <option value="People management">People management</option>
                          <option value="Perseverance">Perseverance</option>
                          <option value="Planning">Planning</option>
                          <option value="Positive work ethic">Positive work ethic</option>
                          <option value="Public speaking/presentation skills">Public speaking/presentation skills</option>
                          <option value="Punctuality">Punctuality</option>
                          <option value="Reliability">Reliability</option>
                          <option value="Responsibility">Responsibility</option>
                          <option value="Results-oriented">Results-oriented</option>
                          <option value="Self-motivated">Self-motivated</option>
                          <option value="Teamwork">Teamwork</option>
                          <option value="Time management skills">Time management skills</option>
                          <option value="Willingness to learn new things">Willingness to learn new things</option>
                          <option value="Work well under pressure">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill8" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #8</option>
                          <option value="Accountability">Accountability</option>
                          <option value="Adaptability">Adaptability</option>
                          <option value="Collaborative">Collaborative</option>
                          <option value="Communication skills">Communication skills</option>
                          <option value="Conflict resolution">Conflict resolution</option>
                          <option value="Creativity">Creativity</option>
                          <option value="Critical problem solving">Critical problem solving</option>
                          <option value="Decisiveness">Decisiveness</option>
                          <option value="Dependability">Dependability</option>
                          <option value="Flexibility">Flexibility</option>
                          <option value="Honesty">Honesty</option>
                          <option value="Innovation">Innovation</option>
                          <option value="Integrity">Integrity</option>
                          <option value="Logical reasoning">Logical reasoning</option>
                          <option value="Leadership">Leadership</option>
                          <option value="Organization">Organization</option>
                          <option value="Patience">Patience</option>
                          <option value="People management">People management</option>
                          <option value="Perseverance">Perseverance</option>
                          <option value="Planning">Planning</option>
                          <option value="Positive work ethic">Positive work ethic</option>
                          <option value="Public speaking/presentation skills">Public speaking/presentation skills</option>
                          <option value="Punctuality">Punctuality</option>
                          <option value="Reliability">Reliability</option>
                          <option value="Responsibility">Responsibility</option>
                          <option value="Results-oriented">Results-oriented</option>
                          <option value="Self-motivated">Self-motivated</option>
                          <option value="Teamwork">Teamwork</option>
                          <option value="Time management skills">Time management skills</option>
                          <option value="Willingness to learn new things">Willingness to learn new things</option>
                          <option value="Work well under pressure">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill9" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #9</option>
                          <option value="Accountability">Accountability</option>
                          <option value="Adaptability">Adaptability</option>
                          <option value="Collaborative">Collaborative</option>
                          <option value="Communication skills">Communication skills</option>
                          <option value="Conflict resolution">Conflict resolution</option>
                          <option value="Creativity">Creativity</option>
                          <option value="Critical problem solving">Critical problem solving</option>
                          <option value="Decisiveness">Decisiveness</option>
                          <option value="Dependability">Dependability</option>
                          <option value="Flexibility">Flexibility</option>
                          <option value="Honesty">Honesty</option>
                          <option value="Innovation">Innovation</option>
                          <option value="Integrity">Integrity</option>
                          <option value="Logical reasoning">Logical reasoning</option>
                          <option value="Leadership">Leadership</option>
                          <option value="Organization">Organization</option>
                          <option value="Patience">Patience</option>
                          <option value="People management">People management</option>
                          <option value="Perseverance">Perseverance</option>
                          <option value="Planning">Planning</option>
                          <option value="Positive work ethic">Positive work ethic</option>
                          <option value="Public speaking/presentation skills">Public speaking/presentation skills</option>
                          <option value="Punctuality">Punctuality</option>
                          <option value="Reliability">Reliability</option>
                          <option value="Responsibility">Responsibility</option>
                          <option value="Results-oriented">Results-oriented</option>
                          <option value="Self-motivated">Self-motivated</option>
                          <option value="Teamwork">Teamwork</option>
                          <option value="Time management skills">Time management skills</option>
                          <option value="Willingness to learn new things">Willingness to learn new things</option>
                          <option value="Work well under pressure">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" name="soft_skill10" class="form-control form-control-alternative">
                          <option value="">Enter Soft Skill #10</option>
                          <option value="Accountability">Accountability</option>
                          <option value="Adaptability">Adaptability</option>
                          <option value="Collaborative">Collaborative</option>
                          <option value="Communication skills">Communication skills</option>
                          <option value="Conflict resolution">Conflict resolution</option>
                          <option value="Creativity">Creativity</option>
                          <option value="Critical problem solving">Critical problem solving</option>
                          <option value="Decisiveness">Decisiveness</option>
                          <option value="Dependability">Dependability</option>
                          <option value="Flexibility">Flexibility</option>
                          <option value="Honesty">Honesty</option>
                          <option value="Innovation">Innovation</option>
                          <option value="Integrity">Integrity</option>
                          <option value="Logical reasoning">Logical reasoning</option>
                          <option value="Leadership">Leadership</option>
                          <option value="Organization">Organization</option>
                          <option value="Patience">Patience</option>
                          <option value="People management">People management</option>
                          <option value="Perseverance">Perseverance</option>
                          <option value="Planning">Planning</option>
                          <option value="Positive work ethic">Positive work ethic</option>
                          <option value="Public speaking/presentation skills">Public speaking/presentation skills</option>
                          <option value="Punctuality">Punctuality</option>
                          <option value="Reliability">Reliability</option>
                          <option value="Responsibility">Responsibility</option>
                          <option value="Results-oriented">Results-oriented</option>
                          <option value="Self-motivated">Self-motivated</option>
                          <option value="Teamwork">Teamwork</option>
                          <option value="Time management skills">Time management skills</option>
                          <option value="Willingness to learn new things">Willingness to learn new things</option>
                          <option value="Work well under pressure">Work well under pressure</option>
                          </select>
                      </div>
                    </div>
                    <!--end of soft skills -->
                  </div>
                </div>
                <hr class="my-4">

                <!-- Certifications and Awards -->

                <h6 class="heading-small text-muted mb-4">Certifications and Awards</h6>
                    <div class="pl-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-certif">Enter Up to 5 Certifications or Awards</label>
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          name="award1" placeholder="Enter Certification/Award #1" value="<?php echo $account2->award1?>">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          name="award2" placeholder="Enter Certification/Award #2" value="<?php echo $account2->award2?>">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          name="award3" placeholder="Enter Certification/Award #3" value="<?php echo $account2->award3?>">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          name="award4" placeholder="Enter Certification/Award #4" value="<?php echo $account2->award4?>">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          name="award5" placeholder="Enter Certification/Award #5" value="<?php echo $account2->award5?>">
                      </div>
                    </div>
                <hr class="my-4">

                <!-- Work Experience -->
                <h6 class="heading-small text-muted mb-4">Work Experience</h6>
                <div class="pl-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-work1">Work #1</label>
                    </div>
                      <div class="form-group focused">
                      <label class="form-control-label" for="input-workcompany1">Employer</label>
                    <input type="text" id="input-workemployer1" class="form-control form-control-alternative"
                      name="work_employer1" placeholder="Employer" value="<?php echo $account2->work_employer1?>">
                     </div>
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-worktitle1">Title of Position</label>
                    <input type="text" id="input-worktitle1" class="form-control form-control-alternative"
                      name="work_position1" placeholder="Title of Position" value="<?php echo $account2->work_position1?>">
                    </div>
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-workdate1">Duration of Employment</label>
                    <input type="text" id="input-workdate1" class="form-control form-control-alternative"
                      name="work_duration1" placeholder="Duration of Employment" value="<?php echo $account2->work_duration1?>">
                    </div>
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-workdescript1">Job Description</label>
                    <textarea rows="4" id="input-workdescript1" class="form-control form-control-alternative"
                      name="work_descr1" placeholder="Describe your job duties or projects..." value="<?php echo $account2->work_descr1?>"></textarea>
                    </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-work2">Work #2</label>
                  </div>
                    <div class="form-group focused">
                    <label class="form-control-label" for="input-workcompany2">Employer</label>
                  <input type="text" id="input-workemployer2" class="form-control form-control-alternative"
                    name="work_employer2" placeholder="Employer" value="<?php echo $account2->work_employer2?>">
                  </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-worktitle2">Title of Position</label>
                  <input type="text" id="input-worktitle2" class="form-control form-control-alternative"
                    name="work_position2" placeholder="Title of Position" value="<?php echo $account2->work_position2?>">
                  </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-workdate2">Duration of Employment</label>
                  <input type="text" id="input-workdate2" class="form-control form-control-alternative"
                    name="work_duration2" placeholder="Duration of Employment" value="<?php echo $account2->work_duration2?>">
                  </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-workdescript2">Job Description</label>
                  <textarea rows="4" id="input-workdescript2" class="form-control form-control-alternative"
                    name="work_descr2" placeholder="Describe your job duties or projects..." value="<?php echo $account2->work_descr2?>"></textarea>
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
