<!-- Template
Author: Templatemo
Author URL: https://templatemo.com/tag/html5
-->
<!doctype html>
<html lang="en">

<head>
  <!-- Starts session, loads in css & bootstrap, and enables all necessary preloads to enable website to be dynamic -->
 <?php
    session_start();
    include '../account_class.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);

# count & show total students for statistical data
    function countS()
    {
         global $pdo;

        $query = 'SELECT COUNT(*) AS num FROM g1116887.Student ';

        try
        {
            $res = $pdo->prepare($query);
            $res->execute();
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        $tot = $row['num'];

        echo $tot ;
    }
#count & show total job postings for statistical data
    function countJ()
    {
         global $pdo;

        $query = 'SELECT COUNT(*) AS num FROM g1116887.Job_posting ';

        try
        {
            $res = $pdo->prepare($query);
            $res->execute();
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        $total = $row['num'];

        echo $total ;
    }

#Average gpa of students in data base
    function avgG()
    {
         global $pdo;

        $query = 'SELECT ROUND(AVG(gpa),2) AS num FROM g1116887.Student ';

        try
        {
            $res = $pdo->prepare($query);
            $res->execute();
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        $total = $row['num'];

        echo $total ;
    }
// count and show total employers
    function countE()
    {
         global $pdo;

        $query = 'SELECT COUNT(*) AS num FROM g1116887.Employee ';

        try
        {
            $res = $pdo->prepare($query);
            $res->execute();
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        $tot = $row['num'];

        echo $tot ;
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

<!-- BAR CHART SCRIPT -->
<?php

include '../db_connection.php';

function Intern()
    {
      global $pdo;


      $query = 'SELECT COUNT(job_type) AS num FROM g1116887.Student WHERE job_type = "Internship"';
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

    function Co_op()
    {
      global $pdo;


      $query = 'SELECT COUNT(job_type) AS num FROM g1116887.Student WHERE job_type = "Co-op"';
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

    function full()
    {
      global $pdo;


      $query = 'SELECT COUNT(job_type) AS num FROM g1116887.Student WHERE job_type = "Full-time"';
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


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Job Type", "% of Hires", { role: "style" } ],
        ["Internship", <?php echo Intern()?>, "#ffcc90"],
        ["Full-Time", <?php echo full()?>, "#indigo"],
        ["Co-op", <?php echo Co_op()?>, "#ff964f"],

      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "\Job Posting Segments",
        width: 880,
        height: 420,
        bar: {groupWidth: "85%"},
        legend: { position: "none" },
        hAxis: {title: 'Job Description Type'},
        vAxis: {title: '# of Jobs Posted'}
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

  <!-- Pie Chart JS -->
<!-- ALL WEIGHTS ON PIE CHART ARE JUSTIFIED THROUGH PRIOR RESEARCH THAT IS STATED WITHIN OUR REPORT
CURRENT WEIGHTS ARE BASED ON OUR GENERATION RESULTS AND RESRESENT OUR CURRENT DATABASE  -->

<?php

include '../db_connection.php';

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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Industry', 'Student Interest'],
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
          title: 'Industry Breakdown By % of Students Indicating Preference'

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    
    <!-- Job Posting Region Chart -->

    <?php 

    include '../db_connection.php';

    // Function that returns the top 5 Student Courses scores that have been indicated by users

    function CountC($i)
    {
      global $pdo;


      $query = 'SELECT course_name, COUNT( * ) AS num
      FROM (
      (
      
      SELECT course1 AS tech
      FROM Student_courses
      )
      UNION ALL (
      
      SELECT course2 AS tech
      FROM Student_courses
      )
      UNION ALL (
      
      SELECT course3 AS tech
      FROM Student_courses
      )
      UNION ALL (
      
      SELECT course4 AS tech
      FROM Student_courses
      )
      UNION ALL (
      
      SELECT course5 AS tech
      FROM Student_courses
      )
      )t, Courses
      WHERE Courses.course_name = t.tech
      GROUP BY tech
      ORDER BY num DESC
      LIMIT 5';

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
    function CountCN($i)
    {
      global $pdo;


      $query = 'SELECT course_name, COUNT( * ) AS num
      FROM (
      (
      
      SELECT course1 AS tech
      FROM Student_courses
      )
      UNION ALL (
      
      SELECT course2 AS tech
      FROM Student_courses
      )
      UNION ALL (
      
      SELECT course3 AS tech
      FROM Student_courses
      )
      UNION ALL (
      
      SELECT course4 AS tech
      FROM Student_courses
      )
      UNION ALL (
      
      SELECT course5 AS tech
      FROM Student_courses
      )
      )t, Courses
      WHERE Courses.course_name = t.tech
      GROUP BY tech
      ORDER BY num DESC
      LIMIT 5';

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
      
  
      $s1 = $row[$i]['course_name'];
     
      echo $s1;
      
    }
    

    ?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Course Name", "# of Students Listing Course", { role: "style" } ],
        [" <?php echo CountCN(0)?>", <?php echo CountC(0)?>, "#ff6600"],
        ["<?php echo CountCN(1)?>", <?php echo CountC(1)?>, "#ff781f"],
        ["<?php echo CountCN(2)?>", <?php echo CountC(2)?>, "#ff8b3d"],
        ["<?php echo CountCN(3)?>", <?php echo CountC(3)?>, "#ff9d5c"],
        ["<?php echo CountCN(4)?>", <?php echo CountC(4)?>, "#ffaf7a"],

      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Student Course Preference",
        width: 880,
        height: 500,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
        hAxis: {title: '# Of Students Listing Course On Profile'},
        vAxis: {title: 'Course Titles'}
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
    
  

</head>

  <!-- //header-ends -->
  <!-- Begins html and in line php that allows for visual display of base template and saved user inputs -->
  <!-- Menu -->
  <section class="navbar custom-navbar navbar-fixed-top" role="navigation" style="background-color:rgba(128, 128, 128, 0.3);">
       <div class="container">

            <div class="navbar-header">

                 <!-- lOGO TEXT HERE -->
                 <a class="navbar-brand">FullTime</a>
            </div>

            <!-- Menu Links-->
            <div class="navbar-right">
              <table border-spacing: 15px;>
                <tr>
                 <th><a href ="../Dashboard/dbadmin.php">Dashboard &nbsp; &nbsp; &nbsp; &nbsp;</a></th>
                 <th><a href="../Reviews/AdminReviews.php">Ratings &nbsp; &nbsp; &nbsp; &nbsp;</a></th>
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
                <h3 class="text-primary number"><?php echo countS() ?></h3>
                <p class="stat-text">Total Students</p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-tablet"> </i>
                <h3 class="text-secondary number"><?php echo countE() ?></h3>
                <p class="stat-text">Total Employers</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-apartment"> </i>
                <h3 class="text-success number"><?php echo countJ() ?></h3>
                <p class="stat-text">Total Job Postings</p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-pushpin"> </i>
                <h3 class="text-secondary number"><?php echo avgG() ?></h3>
                <p class="stat-text">Average Student GPA</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //statistics data -->

    <!-- Survey -->
    <div class="chart">
      <div class="row">
        <div class="col-lg-6 pr-lg-2 chart-grid">
          <div class="card text-center card_border">
            <div class="card-header chart-grid__header">
              Send Survey
            </div>
            <div class="card-body">
              <a href="../Survey/email.php" class="btn btn-primary">Questions</a>
            </div>
          </div>
        </div>
    <!-- //survey -->

    <!-- Job Type Breakdown Bar Chart -->
        <div class="col-lg-6 pl-lg-2 chart-grid">
          <div class="card text-center">
            <div class="card-header chart-grid__header">
              Job Type Posting Trends
            </div>
            <div class="card-body">
              <!-- bar chart -->
              <div id="container">
                <div id="columnchart_values" style="width: 1000px; height: 400px;"></div>
              </div>
              <!-- bar chart -->
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              2020 Job Posting Type Breakdown
            </div>
          </div>
        </div>
      </div>
   <!-- End Bar Chart -->

          <!-- Survey -->
    <div class="chart">
      <div class="row">
        <div class="col-lg-6 pr-lg-2 chart-grid">
          <div class="card text-center ">
            <div class="card-header chart-grid__header">
              Student Course Related Trends
            </div>
              <div class="card-body">
                <div id="barchart_values" style="width: 850px; height: 525px;"></div>
              </div>
            <div class="card-footer text-muted chart-grid__footer">
              2020 Listed Relevant Courses
            </div>
          </div>
        </div>
          <!-- //survey -->
      
      <!-- Machine Learning Graph -->
      <div class="col-lg-6 pl-lg-2 chart-grid">
          <div class="card text-center">
            <div class="card-header chart-grid__header">
              Industry Preference Trends
            </div>
            <div class="card-body">
              <!-- line chart -->
              <div id="container">
                <div id="piechart" style="width: 800px; height: 525px;"></div>
              </div>
              <!-- //line chart -->
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              2020 Student Listed Industry Preferance
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- End Machine Learning Graph -->


  <!-- FOOTER -->
  <footer data-stellar-background-ratio="0.5"  style="background-color:black;">
       <div class="container">
            <div class="row">

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

<script src="js/mapgraph.js"></script>

</body>
</html>
