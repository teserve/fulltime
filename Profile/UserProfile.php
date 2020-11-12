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

    function showTechRatingInput($n)
    {
      echo '<option value="">Rate Technical Skill &num;' . $n . '</option>';
      echo '<option value="5">5: Expert </option>';
      echo '<option value="4">4: Advanced </option>';
      echo '<option value="3">3: Intermediate </option>';
      echo '<option value="2">2: Basic </option>';
      echo '<option value="1">1: Beginner </option>';
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
                    <img src="images/blankprofile.jpg" class="rounded-circle">
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
                  <i class="ni location_pin mr-2"></i>City, State, Country Postal Code
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Education Level, Graduation Date
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University
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
              <form id="edit-form" action="edit_account.php" method="post" enctype="multipart/form-data">
                <div class="col-6 text-right">
                  <!-- <input type='submit' class="btn btn-sm btn-primary" name='submit' value='Save'> -->
                  <button type="submit" form="edit-form" class="btn btn-sm btn-primary">Save</button>
                </div>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Phone Number</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative"
                        value=<?= $account->cell?>>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative"
                          value=<?php echo $account->email; ?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"
                          value=<?= $account->first_name?>>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative"
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
                        <input type="text" id="input-city" class="form-control form-control-alternative"
                          placeholder="City">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-state">State</label>
                        <input type="text" id="input-state" class="form-control form-control-alternative"
                          placeholder="State">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative"
                          placeholder="Country">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-postal-code">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative"
                          placeholder="Postal code">
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
                        <label class="form-control-label" for="input-institution">University</label>
                        <input type="text" id="input-institution" class="form-control form-control-alternative"
                          placeholder="Enter Institution">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-major">Major</label>
                        <input type="text" id="input-major" class="form-control form-control-alternative"
                          placeholder="Enter Major">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-gpa">GPA</label>
                        <select id="input-tech1" class="form-control form-control-alternative">
                            <option value="">Enter Required GPA</option>
                            <option value="1"> 4.0 </option>
                            <option value="2">  3.80-3.99 </option>
                            <option value="3">  3.60-3.79 </option>
                            <option value="4">  3.40-3.59 </option>
                            <option value="5">  3.20-3.39 </option>
                            <option value="6">  3.00-3.19 </option>
                            <option value="7">  2.80-2.99 </option>
                            <option value="8">  2.60-2.79 </option>
                            <option value="9">  2.40-2.59 </option>
                            <option value="10"> < 2.39 </option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-grad-date">Graduation Date</label>
                        <input type="text" id="input-grad-date" class="form-control form-control-alternative"
                          placeholder="Enter Graduation Month and Year (Ex: May 2022)">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-institution">Education Level</label>
                          <select id="input-tech1" class="form-control form-control-alternative">
                            <option value="">Enter Required Education Level</option>
                            <option value="Bachelor">Bachelor's Degree </option>
                            <option value="Master">Master's Degree </option>
                            <option value="Doctorate">Doctorate's Degree </option>
                          </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">

                <!-- About Me -->
                <h6 class="heading-small text-muted mb-4">Personal Biography</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-institution">About me</label>
                    <textarea rows="4" class="form-control form-control-alternative"
                      placeholder="A few words about you ..."></textarea>
                  </div>
                </div>
                <hr class="my-4">

                <!-- Preference -->
                <h6 class="heading-small text-muted mb-4">Job Preference</h6>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-region">Ideal Region Location</label>
                        <select id="input-tech1" class="form-control form-control-alternative">
                            <option value="">Enter Ideal Region</option>
                            <option value="">Northeast</option>
                            <option value="">Southeast</option>
                            <option value="">Midwest</option>
                            <option value="">Southwest</option>
                            <option value="">West</option>
                        </select>
                      </div>
                    </div>
                      <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-ideal-job">Ideal Job Type</label>
                          <select id="input-ideal-job" class="form-control form-control-alternative">
                            <option value="">Choose Ideal Job Type</option>
                            <option value="Bachelor">Internship</option>
                            <option value="Master">Co-Op</option>
                            <option value="Doctorate">Full-Time</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-ideal-indust">Ideal Job Industry</label>
                        <select id="input-ideal-indust" class="form-control form-control-alternative">
                            <option value="">Enter Ideal Industry</option>
                            <option value="">Business-Related Fields</option>
                            <option value="">Chemicals, Petroleum, Plastics & Rubber</option>
                            <option value="">Computer Systems - Design/Programming</option>
                            <option value="">Consulting Services</option>
                            <option value="">Consumer Goods</option>
                            <option value="">Energy</option>
                            <option value="">Engineering Services</option>
                            <option value="">Environmental Services</option>
                            <option value="">Government</option>
                            <option value="">Manufacturing & Industrial Systems</option>
                            <option value="">Other</option>
                            <option value="">Pharmaceuticals & Medicine</option>
                            <option value="">Scientific Research & Development</option>
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
                        <select id="input-tech1" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #1</option>
                          <option value="1">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="2">Algorithms</option>
                          <option value="3">Architecture and engineering (CAD software)</option>
                          <option value="4">Auditing</option>
                          <option value="5">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="6">Backend development</option>
                          <option value="7">Budget planning</option>
                          <option value="8">C#</option>
                          <option value="9">C/C++</option>
                          <option value="10">Cloud computing</option>
                          <option value="11">Content Management Systems (CMS)</option>
                          <option value="12">Cost and trend analysis</option>
                          <option value="13">Data management and analytics</option>
                          <option value="14">Data modeling</option>
                          <option value="15">ERP systems</option>
                          <option value="16">Front-end development</option>
                          <option value="17">GAAP and FASB knowledge</option>
                          <option value="18">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="19">HTML</option>
                          <option value="20">Java</option>
                          <option value="21">JavaScript</option>
                          <option value="22">Journalism and writing: Content Management Systems</option>
                          <option value="23">Foreign language</option>
                          <option value="24">Marketing analytics tools</option>
                          <option value="25">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="26">Network structure and security</option>
                          <option value="27">PHP</option>
                          <option value="28">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="29">Perl</option>
                          <option value="30">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="31">Product lifecycle management</option>
                          <option value="32">Project management and planning</option>
                          <option value="33">Python</option>
                          <option value="34">R</option>
                          <option value="35">Risk management</option>
                          <option value="36">Ruby</option>
                          <option value="37">SQL</option>
                          <option value="38">Salesforce</option>
                          <option value="39">Scrum and Agile </option>
                          <option value="40">Search Engine Optimization (SEO)</option>
                          <option value="41">Shipping and transportation: Logistics management software</option>
                          <option value="42">Social marketing</option>
                          <option value="43">Statistics and probability</option>
                          <option value="44">Swift</option>
                          <option value="45">System design</option>
                          <option value="46">Task management</option>
                          <option value="47">Technical writing and reporting</option>
                          <option value="48">UI/UX</option>
                          <option value="49">Website design</option>
                          <option value="50">Zapier</option>
                        </select>
                        <select id="input-tech1" class="form-control form-control-alternative">
                          <option value="">Rate Technical Skill #1</option>
                          <option value="5">5: Expert </option>
                          <option value="4">4: Advanced </option>
                          <option value="3">3: Intermediate </option>
                          <option value="2">2: Basic </option>
                          <option value="1">1: Beginner </option>
                        </select>
                        <br>
                          <select id="input-tech2" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #2</option>
                          <option value="1">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="2">Algorithms</option>
                          <option value="3">Architecture and engineering (CAD software)</option>
                          <option value="4">Auditing</option>
                          <option value="5">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="6">Backend development</option>
                          <option value="7">Budget planning</option>
                          <option value="8">C#</option>
                          <option value="9">C/C++</option>
                          <option value="10">Cloud computing</option>
                          <option value="11">Content Management Systems (CMS)</option>
                          <option value="12">Cost and trend analysis</option>
                          <option value="13">Data management and analytics</option>
                          <option value="14">Data modeling</option>
                          <option value="15">ERP systems</option>
                          <option value="16">Front-end development</option>
                          <option value="17">GAAP and FASB knowledge</option>
                          <option value="18">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="19">HTML</option>
                          <option value="20">Java</option>
                          <option value="21">JavaScript</option>
                          <option value="22">Journalism and writing: Content Management Systems</option>
                          <option value="23">Foreign language</option>
                          <option value="24">Marketing analytics tools</option>
                          <option value="25">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="26">Network structure and security</option>
                          <option value="27">PHP</option>
                          <option value="28">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="29">Perl</option>
                          <option value="30">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="31">Product lifecycle management</option>
                          <option value="32">Project management and planning</option>
                          <option value="33">Python</option>
                          <option value="34">R</option>
                          <option value="35">Risk management</option>
                          <option value="36">Ruby</option>
                          <option value="37">SQL</option>
                          <option value="38">Salesforce</option>
                          <option value="39">Scrum and Agile </option>
                          <option value="40">Search Engine Optimization (SEO)</option>
                          <option value="41">Shipping and transportation: Logistics management software</option>
                          <option value="42">Social marketing</option>
                          <option value="43">Statistics and probability</option>
                          <option value="44">Swift</option>
                          <option value="45">System design</option>
                          <option value="46">Task management</option>
                          <option value="47">Technical writing and reporting</option>
                          <option value="48">UI/UX</option>
                          <option value="49">Website design</option>
                          <option value="50">Zapier</option>
                        </select>
                          <select id="input-tech2" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #2</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech3" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #3</option>
                          <option value="1">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="2">Algorithms</option>
                          <option value="3">Architecture and engineering (CAD software)</option>
                          <option value="4">Auditing</option>
                          <option value="5">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="6">Backend development</option>
                          <option value="7">Budget planning</option>
                          <option value="8">C#</option>
                          <option value="9">C/C++</option>
                          <option value="10">Cloud computing</option>
                          <option value="11">Content Management Systems (CMS)</option>
                          <option value="12">Cost and trend analysis</option>
                          <option value="13">Data management and analytics</option>
                          <option value="14">Data modeling</option>
                          <option value="15">ERP systems</option>
                          <option value="16">Front-end development</option>
                          <option value="17">GAAP and FASB knowledge</option>
                          <option value="18">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="19">HTML</option>
                          <option value="20">Java</option>
                          <option value="21">JavaScript</option>
                          <option value="22">Journalism and writing: Content Management Systems</option>
                          <option value="23">Foreign language</option>
                          <option value="24">Marketing analytics tools</option>
                          <option value="25">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="26">Network structure and security</option>
                          <option value="27">PHP</option>
                          <option value="28">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="29">Perl</option>
                          <option value="30">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="31">Product lifecycle management</option>
                          <option value="32">Project management and planning</option>
                          <option value="33">Python</option>
                          <option value="34">R</option>
                          <option value="35">Risk management</option>
                          <option value="36">Ruby</option>
                          <option value="37">SQL</option>
                          <option value="38">Salesforce</option>
                          <option value="39">Scrum and Agile </option>
                          <option value="40">Search Engine Optimization (SEO)</option>
                          <option value="41">Shipping and transportation: Logistics management software</option>
                          <option value="42">Social marketing</option>
                          <option value="43">Statistics and probability</option>
                          <option value="44">Swift</option>
                          <option value="45">System design</option>
                          <option value="46">Task management</option>
                          <option value="47">Technical writing and reporting</option>
                          <option value="48">UI/UX</option>
                          <option value="49">Website design</option>
                          <option value="50">Zapier</option>
                        </select>
                          <select id="input-tech3" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #3</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech4" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #4</option>
                          <option value="1">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="2">Algorithms</option>
                          <option value="3">Architecture and engineering (CAD software)</option>
                          <option value="4">Auditing</option>
                          <option value="5">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="6">Backend development</option>
                          <option value="7">Budget planning</option>
                          <option value="8">C#</option>
                          <option value="9">C/C++</option>
                          <option value="10">Cloud computing</option>
                          <option value="11">Content Management Systems (CMS)</option>
                          <option value="12">Cost and trend analysis</option>
                          <option value="13">Data management and analytics</option>
                          <option value="14">Data modeling</option>
                          <option value="15">ERP systems</option>
                          <option value="16">Front-end development</option>
                          <option value="17">GAAP and FASB knowledge</option>
                          <option value="18">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="19">HTML</option>
                          <option value="20">Java</option>
                          <option value="21">JavaScript</option>
                          <option value="22">Journalism and writing: Content Management Systems</option>
                          <option value="23">Foreign language</option>
                          <option value="24">Marketing analytics tools</option>
                          <option value="25">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="26">Network structure and security</option>
                          <option value="27">PHP</option>
                          <option value="28">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="29">Perl</option>
                          <option value="30">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="31">Product lifecycle management</option>
                          <option value="32">Project management and planning</option>
                          <option value="33">Python</option>
                          <option value="34">R</option>
                          <option value="35">Risk management</option>
                          <option value="36">Ruby</option>
                          <option value="37">SQL</option>
                          <option value="38">Salesforce</option>
                          <option value="39">Scrum and Agile </option>
                          <option value="40">Search Engine Optimization (SEO)</option>
                          <option value="41">Shipping and transportation: Logistics management software</option>
                          <option value="42">Social marketing</option>
                          <option value="43">Statistics and probability</option>
                          <option value="44">Swift</option>
                          <option value="45">System design</option>
                          <option value="46">Task management</option>
                          <option value="47">Technical writing and reporting</option>
                          <option value="48">UI/UX</option>
                          <option value="49">Website design</option>
                          <option value="50">Zapier</option>
                        </select>
                          <select id="input-tech4" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #4</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech5" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #5</option>
                          <option value="1">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="2">Algorithms</option>
                          <option value="3">Architecture and engineering (CAD software)</option>
                          <option value="4">Auditing</option>
                          <option value="5">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="6">Backend development</option>
                          <option value="7">Budget planning</option>
                          <option value="8">C#</option>
                          <option value="9">C/C++</option>
                          <option value="10">Cloud computing</option>
                          <option value="11">Content Management Systems (CMS)</option>
                          <option value="12">Cost and trend analysis</option>
                          <option value="13">Data management and analytics</option>
                          <option value="14">Data modeling</option>
                          <option value="15">ERP systems</option>
                          <option value="16">Front-end development</option>
                          <option value="17">GAAP and FASB knowledge</option>
                          <option value="18">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="19">HTML</option>
                          <option value="20">Java</option>
                          <option value="21">JavaScript</option>
                          <option value="22">Journalism and writing: Content Management Systems</option>
                          <option value="23">Foreign language</option>
                          <option value="24">Marketing analytics tools</option>
                          <option value="25">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="26">Network structure and security</option>
                          <option value="27">PHP</option>
                          <option value="28">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="29">Perl</option>
                          <option value="30">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="31">Product lifecycle management</option>
                          <option value="32">Project management and planning</option>
                          <option value="33">Python</option>
                          <option value="34">R</option>
                          <option value="35">Risk management</option>
                          <option value="36">Ruby</option>
                          <option value="37">SQL</option>
                          <option value="38">Salesforce</option>
                          <option value="39">Scrum and Agile </option>
                          <option value="40">Search Engine Optimization (SEO)</option>
                          <option value="41">Shipping and transportation: Logistics management software</option>
                          <option value="42">Social marketing</option>
                          <option value="43">Statistics and probability</option>
                          <option value="44">Swift</option>
                          <option value="45">System design</option>
                          <option value="46">Task management</option>
                          <option value="47">Technical writing and reporting</option>
                          <option value="48">UI/UX</option>
                          <option value="49">Website design</option>
                          <option value="50">Zapier</option>
                        </select>
                          <select id="input-tech5" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #5</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech6" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #6</option>
                          <option value="1">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="2">Algorithms</option>
                          <option value="3">Architecture and engineering (CAD software)</option>
                          <option value="4">Auditing</option>
                          <option value="5">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="6">Backend development</option>
                          <option value="7">Budget planning</option>
                          <option value="8">C#</option>
                          <option value="9">C/C++</option>
                          <option value="10">Cloud computing</option>
                          <option value="11">Content Management Systems (CMS)</option>
                          <option value="12">Cost and trend analysis</option>
                          <option value="13">Data management and analytics</option>
                          <option value="14">Data modeling</option>
                          <option value="15">ERP systems</option>
                          <option value="16">Front-end development</option>
                          <option value="17">GAAP and FASB knowledge</option>
                          <option value="18">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="19">HTML</option>
                          <option value="20">Java</option>
                          <option value="21">JavaScript</option>
                          <option value="22">Journalism and writing: Content Management Systems</option>
                          <option value="23">Foreign language</option>
                          <option value="24">Marketing analytics tools</option>
                          <option value="25">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="26">Network structure and security</option>
                          <option value="27">PHP</option>
                          <option value="28">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="29">Perl</option>
                          <option value="30">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="31">Product lifecycle management</option>
                          <option value="32">Project management and planning</option>
                          <option value="33">Python</option>
                          <option value="34">R</option>
                          <option value="35">Risk management</option>
                          <option value="36">Ruby</option>
                          <option value="37">SQL</option>
                          <option value="38">Salesforce</option>
                          <option value="39">Scrum and Agile </option>
                          <option value="40">Search Engine Optimization (SEO)</option>
                          <option value="41">Shipping and transportation: Logistics management software</option>
                          <option value="42">Social marketing</option>
                          <option value="43">Statistics and probability</option>
                          <option value="44">Swift</option>
                          <option value="45">System design</option>
                          <option value="46">Task management</option>
                          <option value="47">Technical writing and reporting</option>
                          <option value="48">UI/UX</option>
                          <option value="49">Website design</option>
                          <option value="50">Zapier</option>
                        </select>
                          <select id="input-tech6" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #6</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech7" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #7</option>
                          <option value="1">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="2">Algorithms</option>
                          <option value="3">Architecture and engineering (CAD software)</option>
                          <option value="4">Auditing</option>
                          <option value="5">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="6">Backend development</option>
                          <option value="7">Budget planning</option>
                          <option value="8">C#</option>
                          <option value="9">C/C++</option>
                          <option value="10">Cloud computing</option>
                          <option value="11">Content Management Systems (CMS)</option>
                          <option value="12">Cost and trend analysis</option>
                          <option value="13">Data management and analytics</option>
                          <option value="14">Data modeling</option>
                          <option value="15">ERP systems</option>
                          <option value="16">Front-end development</option>
                          <option value="17">GAAP and FASB knowledge</option>
                          <option value="18">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="19">HTML</option>
                          <option value="20">Java</option>
                          <option value="21">JavaScript</option>
                          <option value="22">Journalism and writing: Content Management Systems</option>
                          <option value="23">Foreign language</option>
                          <option value="24">Marketing analytics tools</option>
                          <option value="25">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="26">Network structure and security</option>
                          <option value="27">PHP</option>
                          <option value="28">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="29">Perl</option>
                          <option value="30">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="31">Product lifecycle management</option>
                          <option value="32">Project management and planning</option>
                          <option value="33">Python</option>
                          <option value="34">R</option>
                          <option value="35">Risk management</option>
                          <option value="36">Ruby</option>
                          <option value="37">SQL</option>
                          <option value="38">Salesforce</option>
                          <option value="39">Scrum and Agile </option>
                          <option value="40">Search Engine Optimization (SEO)</option>
                          <option value="41">Shipping and transportation: Logistics management software</option>
                          <option value="42">Social marketing</option>
                          <option value="43">Statistics and probability</option>
                          <option value="44">Swift</option>
                          <option value="45">System design</option>
                          <option value="46">Task management</option>
                          <option value="47">Technical writing and reporting</option>
                          <option value="48">UI/UX</option>
                          <option value="49">Website design</option>
                          <option value="50">Zapier</option>
                        </select>
                          <select id="input-tech7" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #7</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech8" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #8</option>
                          <option value="1">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="2">Algorithms</option>
                          <option value="3">Architecture and engineering (CAD software)</option>
                          <option value="4">Auditing</option>
                          <option value="5">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="6">Backend development</option>
                          <option value="7">Budget planning</option>
                          <option value="8">C#</option>
                          <option value="9">C/C++</option>
                          <option value="10">Cloud computing</option>
                          <option value="11">Content Management Systems (CMS)</option>
                          <option value="12">Cost and trend analysis</option>
                          <option value="13">Data management and analytics</option>
                          <option value="14">Data modeling</option>
                          <option value="15">ERP systems</option>
                          <option value="16">Front-end development</option>
                          <option value="17">GAAP and FASB knowledge</option>
                          <option value="18">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="19">HTML</option>
                          <option value="20">Java</option>
                          <option value="21">JavaScript</option>
                          <option value="22">Journalism and writing: Content Management Systems</option>
                          <option value="23">Foreign language</option>
                          <option value="24">Marketing analytics tools</option>
                          <option value="25">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="26">Network structure and security</option>
                          <option value="27">PHP</option>
                          <option value="28">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="29">Perl</option>
                          <option value="30">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="31">Product lifecycle management</option>
                          <option value="32">Project management and planning</option>
                          <option value="33">Python</option>
                          <option value="34">R</option>
                          <option value="35">Risk management</option>
                          <option value="36">Ruby</option>
                          <option value="37">SQL</option>
                          <option value="38">Salesforce</option>
                          <option value="39">Scrum and Agile </option>
                          <option value="40">Search Engine Optimization (SEO)</option>
                          <option value="41">Shipping and transportation: Logistics management software</option>
                          <option value="42">Social marketing</option>
                          <option value="43">Statistics and probability</option>
                          <option value="44">Swift</option>
                          <option value="45">System design</option>
                          <option value="46">Task management</option>
                          <option value="47">Technical writing and reporting</option>
                          <option value="48">UI/UX</option>
                          <option value="49">Website design</option>
                          <option value="50">Zapier</option>
                        </select>
                          <select id="input-tech8" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #8</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech9" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #9</option>
                          <option value="1">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="2">Algorithms</option>
                          <option value="3">Architecture and engineering (CAD software)</option>
                          <option value="4">Auditing</option>
                          <option value="5">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="6">Backend development</option>
                          <option value="7">Budget planning</option>
                          <option value="8">C#</option>
                          <option value="9">C/C++</option>
                          <option value="10">Cloud computing</option>
                          <option value="11">Content Management Systems (CMS)</option>
                          <option value="12">Cost and trend analysis</option>
                          <option value="13">Data management and analytics</option>
                          <option value="14">Data modeling</option>
                          <option value="15">ERP systems</option>
                          <option value="16">Front-end development</option>
                          <option value="17">GAAP and FASB knowledge</option>
                          <option value="18">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="19">HTML</option>
                          <option value="20">Java</option>
                          <option value="21">JavaScript</option>
                          <option value="22">Journalism and writing: Content Management Systems</option>
                          <option value="23">Foreign language</option>
                          <option value="24">Marketing analytics tools</option>
                          <option value="25">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="26">Network structure and security</option>
                          <option value="27">PHP</option>
                          <option value="28">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="29">Perl</option>
                          <option value="30">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="31">Product lifecycle management</option>
                          <option value="32">Project management and planning</option>
                          <option value="33">Python</option>
                          <option value="34">R</option>
                          <option value="35">Risk management</option>
                          <option value="36">Ruby</option>
                          <option value="37">SQL</option>
                          <option value="38">Salesforce</option>
                          <option value="39">Scrum and Agile </option>
                          <option value="40">Search Engine Optimization (SEO)</option>
                          <option value="41">Shipping and transportation: Logistics management software</option>
                          <option value="42">Social marketing</option>
                          <option value="43">Statistics and probability</option>
                          <option value="44">Swift</option>
                          <option value="45">System design</option>
                          <option value="46">Task management</option>
                          <option value="47">Technical writing and reporting</option>
                          <option value="48">UI/UX</option>
                          <option value="49">Website design</option>
                          <option value="50">Zapier</option>
                        </select>
                          <select id="input-tech9" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #9</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                          <br>
                          <select id="input-tech10" class="form-control form-control-alternative">
                          <option value="">Enter Technical Skill #10</option>
                          <option value="1">Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)</option>
                          <option value="2">Algorithms</option>
                          <option value="3">Architecture and engineering (CAD software)</option>
                          <option value="4">Auditing</option>
                          <option value="5">BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)</option>
                          <option value="6">Backend development</option>
                          <option value="7">Budget planning</option>
                          <option value="8">C#</option>
                          <option value="9">C/C++</option>
                          <option value="10">Cloud computing</option>
                          <option value="11">Content Management Systems (CMS)</option>
                          <option value="12">Cost and trend analysis</option>
                          <option value="13">Data management and analytics</option>
                          <option value="14">Data modeling</option>
                          <option value="15">ERP systems</option>
                          <option value="16">Front-end development</option>
                          <option value="17">GAAP and FASB knowledge</option>
                          <option value="18">Google Suite (Docs, Sheets, Slides, Forms, etc.)</option>
                          <option value="19">HTML</option>
                          <option value="20">Java</option>
                          <option value="21">JavaScript</option>
                          <option value="22">Journalism and writing: Content Management Systems</option>
                          <option value="23">Foreign language</option>
                          <option value="24">Marketing analytics tools</option>
                          <option value="25">Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)</option>
                          <option value="26">Network structure and security</option>
                          <option value="27">PHP</option>
                          <option value="28">PM tools (JIRA, Trello, Monday.com, etc.)</option>
                          <option value="29">Perl</option>
                          <option value="30">Photoshop, Illustrator, Adobe CS, and InDesign</option>
                          <option value="31">Product lifecycle management</option>
                          <option value="32">Project management and planning</option>
                          <option value="33">Python</option>
                          <option value="34">R</option>
                          <option value="35">Risk management</option>
                          <option value="36">Ruby</option>
                          <option value="37">SQL</option>
                          <option value="38">Salesforce</option>
                          <option value="39">Scrum and Agile </option>
                          <option value="40">Search Engine Optimization (SEO)</option>
                          <option value="41">Shipping and transportation: Logistics management software</option>
                          <option value="42">Social marketing</option>
                          <option value="43">Statistics and probability</option>
                          <option value="44">Swift</option>
                          <option value="45">System design</option>
                          <option value="46">Task management</option>
                          <option value="47">Technical writing and reporting</option>
                          <option value="48">UI/UX</option>
                          <option value="49">Website design</option>
                          <option value="50">Zapier</option>
                        </select>
                          <select id="input-tech10" class="form-control form-control-alternative">
                            <option value="">Rate Technical Skill #10</option>
                            <option value="5">5: Expert </option>
                            <option value="4">4: Advanced </option>
                            <option value="3">3: Intermediate </option>
                            <option value="2">2: Basic </option>
                            <option value="1">1: Beginner </option>
                          </select>
                      </div>
                    </div>
                    <hr class="my-4">
                <!-- End of tech skills -->

                  <!--soft skills -->
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-soft">Soft Skills</label>
                        <select id="input-soft" class="form-control form-control-alternative">
                          <option value="0">Enter Soft Skill #1</option>
                          <option value="1">Accountability</option>
                          <option value="2">Adaptability</option>
                          <option value="3">Collaborative</option>
                          <option value="4">Communication skills</option>
                          <option value="5">Conflict resolution</option>
                          <option value="6">Creativity</option>
                          <option value="7">Critical problem solving</option>
                          <option value="8">Decisiveness</option>
                          <option value="9">Dependability</option>
                          <option value="10">Flexibility</option>
                          <option value="11">Honesty</option>
                          <option value="12">Innovation</option>
                          <option value="13">Integrity</option>
                          <option value="14">Logical reasoning</option>
                          <option value="15">Leadership</option>
                          <option value="16">Organization</option>
                          <option value="17">Patience</option>
                          <option value="18">People management</option>
                          <option value="19">Perseverance</option>
                          <option value="20">Planning</option>
                          <option value="21">Positive work ethic</option>
                          <option value="22">Public speaking/presentation skills</option>
                          <option value="23">Punctuality</option>
                          <option value="24">Reliability</option>
                          <option value="25">Responsibility</option>
                          <option value="26">Results-oriented</option>
                          <option value="27">Self-motivated</option>
                          <option value="28">Teamwork</option>
                          <option value="29">Time management skills</option>
                          <option value="30">Willingness to learn new things</option>
                          <option value="31">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" class="form-control form-control-alternative">
                          <option value="0">Enter Soft Skill #2</option>
                          <option value="1">Accountability</option>
                          <option value="2">Adaptability</option>
                          <option value="3">Collaborative</option>
                          <option value="4">Communication skills</option>
                          <option value="5">Conflict resolution</option>
                          <option value="6">Creativity</option>
                          <option value="7">Critical problem solving</option>
                          <option value="8">Decisiveness</option>
                          <option value="9">Dependability</option>
                          <option value="10">Flexibility</option>
                          <option value="11">Honesty</option>
                          <option value="12">Innovation</option>
                          <option value="13">Integrity</option>
                          <option value="14">Logical reasoning</option>
                          <option value="15">Leadership</option>
                          <option value="16">Organization</option>
                          <option value="17">Patience</option>
                          <option value="18">People management</option>
                          <option value="19">Perseverance</option>
                          <option value="20">Planning</option>
                          <option value="21">Positive work ethic</option>
                          <option value="22">Public speaking/presentation skills</option>
                          <option value="23">Punctuality</option>
                          <option value="24">Reliability</option>
                          <option value="25">Responsibility</option>
                          <option value="26">Results-oriented</option>
                          <option value="27">Self-motivated</option>
                          <option value="28">Teamwork</option>
                          <option value="29">Time management skills</option>
                          <option value="30">Willingness to learn new things</option>
                          <option value="31">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" class="form-control form-control-alternative">
                          <option value="0">Enter Soft Skill #3</option>
                          <option value="1">Accountability</option>
                          <option value="2">Adaptability</option>
                          <option value="3">Collaborative</option>
                          <option value="4">Communication skills</option>
                          <option value="5">Conflict resolution</option>
                          <option value="6">Creativity</option>
                          <option value="7">Critical problem solving</option>
                          <option value="8">Decisiveness</option>
                          <option value="9">Dependability</option>
                          <option value="10">Flexibility</option>
                          <option value="11">Honesty</option>
                          <option value="12">Innovation</option>
                          <option value="13">Integrity</option>
                          <option value="14">Logical reasoning</option>
                          <option value="15">Leadership</option>
                          <option value="16">Organization</option>
                          <option value="17">Patience</option>
                          <option value="18">People management</option>
                          <option value="19">Perseverance</option>
                          <option value="20">Planning</option>
                          <option value="21">Positive work ethic</option>
                          <option value="22">Public speaking/presentation skills</option>
                          <option value="23">Punctuality</option>
                          <option value="24">Reliability</option>
                          <option value="25">Responsibility</option>
                          <option value="26">Results-oriented</option>
                          <option value="27">Self-motivated</option>
                          <option value="28">Teamwork</option>
                          <option value="29">Time management skills</option>
                          <option value="30">Willingness to learn new things</option>
                          <option value="31">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" class="form-control form-control-alternative">
                          <option value="0">Enter Soft Skill #4</option>
                          <option value="1">Accountability</option>
                          <option value="2">Adaptability</option>
                          <option value="3">Collaborative</option>
                          <option value="4">Communication skills</option>
                          <option value="5">Conflict resolution</option>
                          <option value="6">Creativity</option>
                          <option value="7">Critical problem solving</option>
                          <option value="8">Decisiveness</option>
                          <option value="9">Dependability</option>
                          <option value="10">Flexibility</option>
                          <option value="11">Honesty</option>
                          <option value="12">Innovation</option>
                          <option value="13">Integrity</option>
                          <option value="14">Logical reasoning</option>
                          <option value="15">Leadership</option>
                          <option value="16">Organization</option>
                          <option value="17">Patience</option>
                          <option value="18">People management</option>
                          <option value="19">Perseverance</option>
                          <option value="20">Planning</option>
                          <option value="21">Positive work ethic</option>
                          <option value="22">Public speaking/presentation skills</option>
                          <option value="23">Punctuality</option>
                          <option value="24">Reliability</option>
                          <option value="25">Responsibility</option>
                          <option value="26">Results-oriented</option>
                          <option value="27">Self-motivated</option>
                          <option value="28">Teamwork</option>
                          <option value="29">Time management skills</option>
                          <option value="30">Willingness to learn new things</option>
                          <option value="31">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" class="form-control form-control-alternative">
                          <option value="0">Enter Soft Skill #5</option>
                          <option value="1">Accountability</option>
                          <option value="2">Adaptability</option>
                          <option value="3">Collaborative</option>
                          <option value="4">Communication skills</option>
                          <option value="5">Conflict resolution</option>
                          <option value="6">Creativity</option>
                          <option value="7">Critical problem solving</option>
                          <option value="8">Decisiveness</option>
                          <option value="9">Dependability</option>
                          <option value="10">Flexibility</option>
                          <option value="11">Honesty</option>
                          <option value="12">Innovation</option>
                          <option value="13">Integrity</option>
                          <option value="14">Logical reasoning</option>
                          <option value="15">Leadership</option>
                          <option value="16">Organization</option>
                          <option value="17">Patience</option>
                          <option value="18">People management</option>
                          <option value="19">Perseverance</option>
                          <option value="20">Planning</option>
                          <option value="21">Positive work ethic</option>
                          <option value="22">Public speaking/presentation skills</option>
                          <option value="23">Punctuality</option>
                          <option value="24">Reliability</option>
                          <option value="25">Responsibility</option>
                          <option value="26">Results-oriented</option>
                          <option value="27">Self-motivated</option>
                          <option value="28">Teamwork</option>
                          <option value="29">Time management skills</option>
                          <option value="30">Willingness to learn new things</option>
                          <option value="31">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" class="form-control form-control-alternative">
                          <option value="0">Enter Soft Skill #6</option>
                          <option value="1">Accountability</option>
                          <option value="2">Adaptability</option>
                          <option value="3">Collaborative</option>
                          <option value="4">Communication skills</option>
                          <option value="5">Conflict resolution</option>
                          <option value="6">Creativity</option>
                          <option value="7">Critical problem solving</option>
                          <option value="8">Decisiveness</option>
                          <option value="9">Dependability</option>
                          <option value="10">Flexibility</option>
                          <option value="11">Honesty</option>
                          <option value="12">Innovation</option>
                          <option value="13">Integrity</option>
                          <option value="14">Logical reasoning</option>
                          <option value="15">Leadership</option>
                          <option value="16">Organization</option>
                          <option value="17">Patience</option>
                          <option value="18">People management</option>
                          <option value="19">Perseverance</option>
                          <option value="20">Planning</option>
                          <option value="21">Positive work ethic</option>
                          <option value="22">Public speaking/presentation skills</option>
                          <option value="23">Punctuality</option>
                          <option value="24">Reliability</option>
                          <option value="25">Responsibility</option>
                          <option value="26">Results-oriented</option>
                          <option value="27">Self-motivated</option>
                          <option value="28">Teamwork</option>
                          <option value="29">Time management skills</option>
                          <option value="30">Willingness to learn new things</option>
                          <option value="31">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" class="form-control form-control-alternative">
                          <option value="0">Enter Soft Skill #7</option>
                          <option value="1">Accountability</option>
                          <option value="2">Adaptability</option>
                          <option value="3">Collaborative</option>
                          <option value="4">Communication skills</option>
                          <option value="5">Conflict resolution</option>
                          <option value="6">Creativity</option>
                          <option value="7">Critical problem solving</option>
                          <option value="8">Decisiveness</option>
                          <option value="9">Dependability</option>
                          <option value="10">Flexibility</option>
                          <option value="11">Honesty</option>
                          <option value="12">Innovation</option>
                          <option value="13">Integrity</option>
                          <option value="14">Logical reasoning</option>
                          <option value="15">Leadership</option>
                          <option value="16">Organization</option>
                          <option value="17">Patience</option>
                          <option value="18">People management</option>
                          <option value="19">Perseverance</option>
                          <option value="20">Planning</option>
                          <option value="21">Positive work ethic</option>
                          <option value="22">Public speaking/presentation skills</option>
                          <option value="23">Punctuality</option>
                          <option value="24">Reliability</option>
                          <option value="25">Responsibility</option>
                          <option value="26">Results-oriented</option>
                          <option value="27">Self-motivated</option>
                          <option value="28">Teamwork</option>
                          <option value="29">Time management skills</option>
                          <option value="30">Willingness to learn new things</option>
                          <option value="31">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" class="form-control form-control-alternative">
                          <option value="0">Enter Soft Skill #8</option>
                          <option value="1">Accountability</option>
                          <option value="2">Adaptability</option>
                          <option value="3">Collaborative</option>
                          <option value="4">Communication skills</option>
                          <option value="5">Conflict resolution</option>
                          <option value="6">Creativity</option>
                          <option value="7">Critical problem solving</option>
                          <option value="8">Decisiveness</option>
                          <option value="9">Dependability</option>
                          <option value="10">Flexibility</option>
                          <option value="11">Honesty</option>
                          <option value="12">Innovation</option>
                          <option value="13">Integrity</option>
                          <option value="14">Logical reasoning</option>
                          <option value="15">Leadership</option>
                          <option value="16">Organization</option>
                          <option value="17">Patience</option>
                          <option value="18">People management</option>
                          <option value="19">Perseverance</option>
                          <option value="20">Planning</option>
                          <option value="21">Positive work ethic</option>
                          <option value="22">Public speaking/presentation skills</option>
                          <option value="23">Punctuality</option>
                          <option value="24">Reliability</option>
                          <option value="25">Responsibility</option>
                          <option value="26">Results-oriented</option>
                          <option value="27">Self-motivated</option>
                          <option value="28">Teamwork</option>
                          <option value="29">Time management skills</option>
                          <option value="30">Willingness to learn new things</option>
                          <option value="31">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" class="form-control form-control-alternative">
                          <option value="0">Enter Soft Skill #9</option>
                          <option value="1">Accountability</option>
                          <option value="2">Adaptability</option>
                          <option value="3">Collaborative</option>
                          <option value="4">Communication skills</option>
                          <option value="5">Conflict resolution</option>
                          <option value="6">Creativity</option>
                          <option value="7">Critical problem solving</option>
                          <option value="8">Decisiveness</option>
                          <option value="9">Dependability</option>
                          <option value="10">Flexibility</option>
                          <option value="11">Honesty</option>
                          <option value="12">Innovation</option>
                          <option value="13">Integrity</option>
                          <option value="14">Logical reasoning</option>
                          <option value="15">Leadership</option>
                          <option value="16">Organization</option>
                          <option value="17">Patience</option>
                          <option value="18">People management</option>
                          <option value="19">Perseverance</option>
                          <option value="20">Planning</option>
                          <option value="21">Positive work ethic</option>
                          <option value="22">Public speaking/presentation skills</option>
                          <option value="23">Punctuality</option>
                          <option value="24">Reliability</option>
                          <option value="25">Responsibility</option>
                          <option value="26">Results-oriented</option>
                          <option value="27">Self-motivated</option>
                          <option value="28">Teamwork</option>
                          <option value="29">Time management skills</option>
                          <option value="30">Willingness to learn new things</option>
                          <option value="31">Work well under pressure</option>
                          </select>
                          <br>
                        <select id="input-soft" class="form-control form-control-alternative">
                          <option value="0">Enter Soft Skill #10</option>
                          <option value="1">Accountability</option>
                          <option value="2">Adaptability</option>
                          <option value="3">Collaborative</option>
                          <option value="4">Communication skills</option>
                          <option value="5">Conflict resolution</option>
                          <option value="6">Creativity</option>
                          <option value="7">Critical problem solving</option>
                          <option value="8">Decisiveness</option>
                          <option value="9">Dependability</option>
                          <option value="10">Flexibility</option>
                          <option value="11">Honesty</option>
                          <option value="12">Innovation</option>
                          <option value="13">Integrity</option>
                          <option value="14">Logical reasoning</option>
                          <option value="15">Leadership</option>
                          <option value="16">Organization</option>
                          <option value="17">Patience</option>
                          <option value="18">People management</option>
                          <option value="19">Perseverance</option>
                          <option value="20">Planning</option>
                          <option value="21">Positive work ethic</option>
                          <option value="22">Public speaking/presentation skills</option>
                          <option value="23">Punctuality</option>
                          <option value="24">Reliability</option>
                          <option value="25">Responsibility</option>
                          <option value="26">Results-oriented</option>
                          <option value="27">Self-motivated</option>
                          <option value="28">Teamwork</option>
                          <option value="29">Time management skills</option>
                          <option value="30">Willingness to learn new things</option>
                          <option value="31">Work well under pressure</option>
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
                          placeholder="Enter Certification/Award #1">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          placeholder="Enter Certification/Award #2">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          placeholder="Enter Certification/Award #3">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          placeholder="Enter Certification/Award #4">
                        <input type="text" id="input-certif" class="form-control form-control-alternative"
                          placeholder="Enter Certification/Award #5">
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
                      placeholder="Employer">
                     </div>
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-worktitle1">Title of Position</label>
                    <input type="text" id="input-worktitle1" class="form-control form-control-alternative"
                      placeholder="Title of Position">
                    </div>
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-workdate1">Duration of Employment</label>
                    <input type="text" id="input-workdate1" class="form-control form-control-alternative"
                      placeholder="Duration of Employment">
                    </div>
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-workdescript1">Job Description</label>
                    <textarea rows="4" id="input-workdescript1" class="form-control form-control-alternative"
                      placeholder="Describe your job duties or projects..."></textarea>
                    </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-work2">Work #2</label>
                  </div>
                    <div class="form-group focused">
                    <label class="form-control-label" for="input-workcompany2">Employer</label>
                  <input type="text" id="input-workemployer2" class="form-control form-control-alternative"
                    placeholder="Employer">
                  </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-worktitle2">Title of Position</label>
                  <input type="text" id="input-worktitle2" class="form-control form-control-alternative"
                    placeholder="Title of Position">
                  </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-workdate2">Duration of Employment</label>
                  <input type="text" id="input-workdate2" class="form-control form-control-alternative"
                    placeholder="Duration of Employment">
                  </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-workdescript2">Job Description</label>
                  <textarea rows="4" id="input-workdescript2" class="form-control form-control-alternative"
                    placeholder="Describe your job duties or projects..."></textarea>
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
