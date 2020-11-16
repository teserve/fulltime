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
                        <select id="input-tech1" class="form-control form-control-alternative">
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
                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                            <option value="Master's Degree">Master's Degree</option>
                            <option value="Doctorate's Degree">Doctorate's Degree</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-institution">GPA</label>
                          <select id="input-tech1" class="form-control form-control-alternative">
                            <option value="">Enter Required GPA</option>
                            <option value="4.0"> 4.0 </option>
                            <option value="3.80-3.99">  3.80-3.99 </option>
                            <option value="3.60-3.79">  3.60-3.79 </option>
                            <option value="3.40-3.59">  3.40-3.59 </option>
                            <option value="3.20-3.39">  3.20-3.39 </option>
                            <option value="3.00-3.19">  3.00-3.19 </option>
                            <option value="2.80-2.99">  2.80-2.99 </option>
                            <option value="2.60-2.79">  2.60-2.79 </option>
                            <option value="2.40-2.59">  2.40-2.59 </option>
                            <option value="< 2.39"> < 2.39 </option>
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
                        <select id="input-soft" class="form-control form-control-alternative">
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
                        <select id="input-soft" class="form-control form-control-alternative">
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
                        <select id="input-soft" class="form-control form-control-alternative">
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
                        <select id="input-soft" class="form-control form-control-alternative">
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
                        <select id="input-soft" class="form-control form-control-alternative">
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
                        <select id="input-soft" class="form-control form-control-alternative">
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
                        <select id="input-soft" class="form-control form-control-alternative">
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
                        <select id="input-soft" class="form-control form-control-alternative">
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
                        <select id="input-soft" class="form-control form-control-alternative">
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
