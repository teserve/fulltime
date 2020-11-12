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

                        <br>
                          <select id="input-tech2" class="form-control form-control-alternative">
                          <option value="">Enter Question #2</option>
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

                          <br>
                          <select id="input-tech3" class="form-control form-control-alternative">
                          <option value="">Enter Question #3</option>
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

                          <br>
                          <select id="input-tech4" class="form-control form-control-alternative">
                          <option value="">Enter Question #4</option>
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

                          <br>
                          <select id="input-tech5" class="form-control form-control-alternative">
                          <option value="">Enter Question #5</option>
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

                          <br>
                          <select id="input-tech6" class="form-control form-control-alternative">
                          <option value="">Enter Question #6</option>
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

                          <br>
                          <select id="input-tech7" class="form-control form-control-alternative">
                          <option value="">Enter Question #7</option>
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

                          <br>
                          <select id="input-tech8" class="form-control form-control-alternative">
                          <option value="">Enter Question #8</option>
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

                          <br>
                          <select id="input-tech9" class="form-control form-control-alternative">
                          <option value="">Enter Question #9</option>
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

                          <br>
                          <select id="input-tech10" class="form-control form-control-alternative">
                          <option value="">Enter Question #10</option>
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
