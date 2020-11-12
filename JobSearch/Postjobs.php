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
          <a href="Employerjobs.php" class="btn btn-info">Back to Jobs</a>
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
                  <h3 class="mb-0">Post Job Opening</h3>
                </div>
                <div class="col-4 text-right">
                  <form action="edit_account.php">
                    <a href="#!" class="btn btn-sm btn-primary">Save</a>
                  </form>
                  <!-- <a href="#!" class="btn btn-sm btn-primary">Save </a> -->
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
            <!--    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Phone Number</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative"
                          placeholder="Phone Number">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative"
                          placeholder="email@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"
                          placeholder="First name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative"
                          placeholder="Last name">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4"> -->
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Company Information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Company</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Enter Company">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Job Position</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="Enter Job Position">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Industry</label>
                        <select id="input-tech1" class="form-control form-control-alternative">
                            <option value="">Enter Industry</option>
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
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-region">Region</label>
                        <select id="input-tech1" class="form-control form-control-alternative">
                            <option value="">Enter Region</option>
                            <option value="">Northeast</option>
                            <option value="">Southeast</option>
                            <option value="">Midwest</option>
                            <option value="">Southwest</option>
                            <option value="">West</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Academics -->

                <h6 class="heading-small text-muted mb-4">Requirements</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-institution">Job Type</label>
                          <select id="input-tech1" class="form-control form-control-alternative">
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
                          <select id="input-tech1" class="form-control form-control-alternative">
                            <option value="">Enter Required Education Level</option>
                            <option value="Bachelor">Bachelor's Degree </option>
                            <option value="Master">Master's Degree </option>
                            <option value="Doctorate">Doctorate's Degree </option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-institution">GPA</label>
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


                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Description</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Job Description</label>
                    <textarea rows="4" class="form-control form-control-alternative"
                      placeholder="Desribe the job posting..."></textarea>
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
