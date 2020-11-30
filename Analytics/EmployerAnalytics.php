<!-- Template
Author: Templatemo
Author URL: https://templatemo.com/tag/html5
-->
<!doctype html>
<html lang="en">

<head>
<!-- Starts session, loads in necessary css & bootstrap, and prepares website for dynamic layout.  -->
 <?php
    session_start();
    include '../account_class.php';
    // include '../count_applied.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);

    // Counts the number of applied students to jobs posted by the employer logged in 
    function countApp($id)
    {
      global $pdo; 


      $query = 'SELECT COUNT(*) AS num
      FROM (SELECT * FROM g1116887.Job_posting WHERE user_id = :id) J, g1116887.Applied A 
      WHERE A.job_id = J.job_id ';
      
      $values = array(':id'=>$id);

        try
        {
             $res = $pdo->prepare($query);
             $res->execute($values);
        }
        catch (PDOException $e)
        {
             throw("Database query error");
             echo $e->getMessage();
        }
       
        $row = $res->fetch(PDO::FETCH_ASSOC);

        $tot = $row['num'];

         echo $tot;  
    }

    // counts the number of jobs posted by the employer logged in 
    function countJob($id)
    {
      global $pdo;


      $query = 'SELECT COUNT(*) AS num FROM g1116887.Job_posting WHERE (user_id = :id)';
      $values = array(':id'=>$id);
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }

        // counts the number of jobs posted by the employer logged in 
        function avgGPA($id)
        {
          global $pdo;
    
    
          $query = 'SELECT AVG( S.gpa ) as num
          FROM `Student` S
          JOIN Applied A ON S.user_id = A.user_id
          JOIN Job_posting J ON J.job_id = A.job_id
          WHERE EXISTS (
          SELECT J.job_id
          FROM Job_posting
          WHERE J.user_id = :id)';
          
          $values = array(':id'=>$id);
          
          try
          {
              $res = $pdo->prepare($query);
              $res->execute($values);
          }
          catch (PDOException $e)
          {
              throw new Exception('Database query error');
          }
    
          $row = $res->fetch(PDO::FETCH_ASSOC);
    
          $tot = $row['num'];
    
          echo $tot;
          
        }

    // Function that returns the top 10 student skill scores that have been indicated by users

    function CountS($i)
    {
      global $pdo;


      $query = 'SELECT skill_name, COUNT(*) AS num
      FROM ((SELECT tech_skill1 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill2 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill3 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill4 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill5 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill6 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill7 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill8 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill9 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill10 AS tech FROM Student_skills)
      ) t, TechSkills
      WHERE TechSkills.skill_name = t.tech
      GROUP BY tech
      ORDER BY num DESC
      LIMIT 10';

      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetchAll(PDO::FETCH_ASSOC);
      
  
      $s1 = $row[$i]['num'];
     
      echo $s1;
      
    }
    
    // Function that returns the top 10 student skill names that have been indicated by users
    function CountSN($i)
    {
      global $pdo;


      $query = 'SELECT skill_name, COUNT(*) AS num
      FROM ((SELECT tech_skill1 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill2 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill3 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill4 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill5 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill6 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill7 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill8 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill9 AS tech FROM Student_skills) UNION ALL
      (SELECT tech_skill10 AS tech FROM Student_skills)
      ) t, TechSkills
      WHERE TechSkills.skill_name = t.tech
      GROUP BY tech
      ORDER BY num DESC
      LIMIT 10';

      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetchAll(PDO::FETCH_ASSOC);
      
  
      $s1 = $row[$i]['skill_name'];
     
      echo $s1;
      
    }
   

  ?>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

  <title>Analytics</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <link rel="stylesheet" href="assets/css/templatemo-style.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">

<!-- Job Skills BAR CHART scripts -->
<!-- ALL VALUES ON CHART ARE SIGNIFIED THROUGH PRIOR RESEARCH THAT IS STATED WITHIN OUR REPORT
CURRENT RESULTS ARE BASED ON OUR GENERATION RESULTS AND RESRESENT OUR CURRENT DATABASE. RESULTS WILL UPDATE WITH ANY ADDITIONAL ADDED USERS OR EDITS TO DATABASE -->

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Skill Title", "# of Students Indicating Proficiency", { role: "style" } ],
        [" <?php echo CountSN(0)?>", <?php echo CountS(0)?>, "#bf360C"],
        ["<?php echo CountSN(1)?>", <?php echo CountS(1)?>, "#d84315"],
        ["<?php echo CountSN(2)?>", <?php echo CountS(2)?>, "#e64a19"],
        ["<?php echo CountSN(3)?>", <?php echo CountS(3)?>, "#f4511e"],
        ["<?php echo CountSN(4)?>", <?php echo CountS(4)?>, "#ff5722"],
        ["<?php echo CountSN(5)?>", <?php echo CountS(5)?>, "#ff7043"],
        ["<?php echo CountSN(6)?>", <?php echo CountS(6)?>, "#ff8a65"],
        ["<?php echo CountSN(7)?>", <?php echo CountS(7)?>, "#ffab91"],
        ["<?php echo CountSN(8)?>", <?php echo CountS(8)?>, "#ffccbc"],
        ["<?php echo CountSN(9)?>", <?php echo CountS(9)?>, "#fbe9e7"],

      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
      
        title: "\Trending Student Skills",
        width: 875,
        height: 535,
        bar: {groupWidth: "90%"},
        hAxis: {
             title: 'Number of Students Indicating Skill Proficiency',
            minValue: 0,
            ticks: [0, 10, 20, 30]
            
          },
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

<!-- Industry Breakdown Pie Chart JS & QUERIES-->
<!-- ALL WEIGHTS ON PIE CHART ARE JUSTIFIED THROUGH PRIOR RESEARCH THAT IS STATED WITHIN OUR REPORT
CURRENT WEIGHTS ARE BASED ON OUR GENERATION RESULTS AND RESRESENT OUR CURRENT DATABASE. RESULTS WILL UPDATE WITH ANY ADDITIONAL ADDED USERS OR EDITS TO DATABASE -->
<!--  -->
<?php

include '../db_connection.php';

// BEGINS FUNCTIONS USED TO QUERY INDIVIDUAL INDUSTRY NAMES AND INDICATIONS FROM STUDENT PROFILES 

//FUNCTION TO QUERY BUSINESS RELATED OCCURANCES IN DATABASE 
function I_Br()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Business-Related Fields"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }

    //FUNCTION TO QUERY CHEM, PET, Plas results from database
    function I_Ch()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Chemicals, Petroleum, Plasitcs & Rubber"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }

    //FUNCTION TO QUERY Comp Sys results from database
    function I_Co()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Computer Systems-Design/Programming"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }
//FUNCTION TO QUERY Consulting results from database
    function I_Con()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Consulting Services"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }
//FUNCTION TO QUERY Consumer results from database
    function I_Consumer()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Consumer Goods"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }
//FUNCTION TO QUERY Energy results from database
    function I_Energy()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Energy"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }

    //FUNCTION TO QUERY Engineering results from database
    function I_Eng()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Engineering Services"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }
//FUNCTION TO QUERY Environmental results from database
    function I_Env()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Environmental Services"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
    }
//FUNCTION TO QUERY Government results from database
    function I_Gov()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Government"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }
//FUNCTION TO QUERY Manufacturing results from database
    function I_Man()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Manufacturing & Industrial Systems"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }
//FUNCTION TO QUERY "other" results from database
    function I_Other()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Other"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }
//FUNCTION TO QUERY pharmacy results from database
    function I_Pharm()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Pharmaceuticals & Medicine"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }
//FUNCTION TO QUERY Scientific results from database
    function I_Sci()
    {
      global $pdo;


      $query = 'SELECT COUNT(industry) AS num FROM g1116887.Student WHERE industry = "Scientific Research & Development"';
      $values = array();
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);

      $tot = $row['num'];

      echo $tot;
      
    }
    ?>


<!-- Industry Breakdown Pie Chart JS & QUERIES-->
<!-- ALL WEIGHTS ON PIE CHART ARE JUSTIFIED THROUGH PRIOR RESEARCH THAT IS STATED WITHIN OUR REPORT
CURRENT WEIGHTS ARE BASED ON OUR GENERATION RESULTS AND RESRESENT OUR CURRENT DATABASE. RESULTS WILL UPDATE WITH ANY ADDITIONAL ADDED USERS OR EDITS TO DATABASE -->
<!--  -->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript">
  
      google.charts.load("current", {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Industry', 'Interested Users'],
          ['Business-Related Fields', <?php echo I_Br()?>],
          ['Chemicals, Petroleum, Plasitcs & Rubber',<?php echo I_Ch()?>],
          ['Computer Systems-Design/Programming',  <?php echo I_Co()?>],
          ['Consulting Services', <?php echo I_Con()?>],
          ['Consumer Goods', <?php echo I_Consumer()?>],
          ['Energy', <?php echo I_Energy()?>],
          ['Engineering Services', <?php echo I_Eng()?>],
          ['Environmental Services', <?php echo I_Env()?>],
          ['Government',  <?php echo I_Gov()?>],
          ['Manufacturing & Industrial Systems', <?php echo I_Man()?>],
          ['Other',  <?php echo I_Other()?>],
          ['Pharmaceuticals & Medicine', <?php echo I_Pharm()?>],
          ['Scientific Research & Development',  <?php echo I_Sci()?>]

        ]);
    

        var options = {
          title: 'Industry Breakdown By % of Students Indicating Interest',
          width: 850,
           height: 530,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</head>


  <!-- header -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation" style="background-color:rgba(128, 128, 128, 0.3);">
       <div class="container">

            <div class="navbar-header">

                 <!-- lOGO TEXT HERE -->
                 <a href="../index.html" class="navbar-brand">FullTime</a>
            </div>

            <!-- MENU LINKS -->
                 <div class="navbar-right">
                   <table border-spacing: 15px;>
                     <tr>
                      <th><a href ="../Dashboard/dbemployer.php">Dashboard &nbsp; &nbsp; &nbsp; &nbsp;</a></th>
                      <th><a href="../Matches/EmployerMatches.php">Matches &nbsp; &nbsp; &nbsp; &nbsp;</a></th>
                      <th><a href="../JobSearch/Employerjobs.php">Jobs &nbsp; &nbsp; &nbsp; &nbsp;</a></th>
                      <th><form action="../logout.php">
                        <input type='submit' class="btn btn-primary" name='submit' value='Log Out'>
                      </form></th>
                      </tr>
                    </table>
            </div>

       </div>
  </section>

  <!-- main content start -->
<div class="main-content" style="min-height: 600px; background-image: url(fulltime.jpg); background-size: cover; background-position: center;">

  <!-- content -->

    <div class="welcome-msg pt-3 pb-4">
      <h1><span class="text-primary"></h1>
    </div>

    <!-- statistics data -->
    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-users"> </i>
                <h3 class="text-primary number"><?php echo avgGPA($_SESSION['account_id'])?></h3>
                <p class="stat-text">Average Applicant GPA</p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-tablet"></i>
                <h3 class="text-primary number"><?php echo countApp($_SESSION['account_id']) ?></h3>
                <p class="stat-text">Total Number of Applicants
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-apartment"> </i>
                <h3 class="text-success number"><?php echo countJob($_SESSION['account_id']) ?></h3>
                <p class="stat-text">Total Number of Job Postings</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //statistics data -->

    <!-- charts -->
    <div class="chart">
      <div class="row">
        <div class="col-lg-6 pr-lg-2 chart-grid">
          <div class="card text-center card_border">
            <div class="card-header chart-grid__header">
              Top 10 Technical Skills Trends
            </div>
            <div class="card-body">
              <!-- bar chart -->
              <div id="container">
               <div id="columnchart_values" style="width: 510px; height: 530px;"></div>
              </div>
              <!-- //bar chart -->
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              2020 Skills Statistics
            </div>
          </div>
        </div>
        <!-- pie chart -->
        <div class="col-lg-6 pl-lg-2 chart-grid">
          <div class="card text-center card_border">
            <div class="card-header chart-grid__header">
              Industry Breakdown
              <div id="container">
                <div id="piechart" style="width: 700px; height: 570px;"></div>
              </div>
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              2020 Job Landscape
            </div>
          </div>
        </div>
      </div>
      <!-- //pie chart -->
    </div>
    <br>
    <br>
    <!-- //charts -->

  <!-- FOOTER -->
  <footer data-stellar-background-ratio="0.5"  style="background-color:black;">
       <div class="container">
            <div class="row" style="color:white;">

                 <div class="col-md-9 col-sm-16">
                      <div class="footer-thumb footer-info">
                           <h2>FullTime</h2>
                           <p>FullTime is a professional services provider for students, faculty, and employers. Our site creates an immersive experience that enables students with the power to leverage available job postings and find their next step.</p>
                           <br></br>
                           <p>Copyright &copy; 2020 FullTime</p>
                      </div>
                 </div>

                 <div class="col-md-3 col-sm-4">
                      <div class="footer-thumb">
                           <h2>Find us</h2>
                           <p>1245 West State Street, <br> West Lafayettte, IN 47906</p>
                           <br></br>
                           <p>Call us <span>(765) Get-Jobs</span></p>
                           <p><a href="https://www.facebook.com/" class="fa fa-facebook-square" attr="facebook icon"></a>     <a href="https://twitter.com/?lang=en" class="fa fa-twitter"></a>     <a href="https://www.instagram.com/" class="fa fa-instagram"></a></p>
                      </div>
                 </div>

            </div>
       </div>
  </footer>
<!--footer section end-->

<!-- jQuery -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/scripts.js"></script>
<!-- chart js -->
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/utils.js"></script>
<!-- //chart js -->
<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="assets/js/bar.js"></script>
<script src="assets/js/linechart.js"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->
<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
