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

    //calculates the ratio of applicants to job postings that have applied to the postings of the logged in employer
    function appRatio($id)
    {
      global $pdo;


      $query = 'SELECT COUNT(*) AS num FROM g1116887.Job_posting WHERE (user_id = :id)';
      $values = array(':id'=>$id);

      $query2 = 'SELECT COUNT(*) AS num2
      FROM (SELECT * FROM g1116887.Job_posting WHERE user_id = :id) J, g1116887.Applied A 
      WHERE A.job_id = J.job_id ';
      
      $values2 = array(':id'=>$id);
      
      try
      {
          $res = $pdo->prepare($query);
          $res->execute($values);
          $res2 = $pdo->prepare($query2);
          $res2->execute($values2);
      }
      catch (PDOException $e)
      {
          throw new Exception('Database query error');
      }

      $row = $res->fetch(PDO::FETCH_ASSOC);
      $tot = $row['num'];

      $row2 = $res2->fetch(PDO::FETCH_ASSOC);
      $tot2 = $row2['num2'];

      echo ($tot2 / $tot)  ;
      
    }

    // function countMatch($id)
    // {
    //   global $pdo; 


    //   $query = 'SELECT COUNT(*) AS num
    //   FROM (SELECT * FROM g1116887.Job_posting WHERE user_id = :id) J, g1116887.Applied A, g1116887.Matches M
    //   WHERE A.job_id = J.job_id AND A.job_id = M.job_id AND M.score <0';
      
    //   $values = array(':id'=>$id);

    //     try
    //     {
    //          $res = $pdo->prepare($query);
    //          $res->execute($values);
    //     }
    //     catch (PDOException $e)
    //     {
    //          throw("Database query error");
    //          echo $e->getMessage();
    //     }
       
    //     $row = $res->fetch(PDO::FETCH_ASSOC);

    //     $tot = $row['num'];

    //      echo $tot;  
    // }

   

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

<!-- Job Type BAR CHART -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Project Experience", "% of Applications", { role: "style" } ],
        ["No Projects", 15, "#ffcc90"],
        ["1 Project", 20, "#indigo"],
        ["2 Projects", 15, "#ff964f"],

      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
      
        title: "\Jobs filled per Project Experience",
        width: 875,
        height: 530,
        bar: {groupWidth: "90%"},
        hAxis: {
            minValue: 0,
            ticks: [0, 10, 20, 30]
          },
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

<!-- Industry Breakdown Pie Chart JS -->
<!-- ALL WEIGHTS ON PIE CHART ARE JUSTIFIED THROUGH PRIOR RESEARCH THAT IS STATED WITHIN OUR REPORT
CURRENT WEIGHTS ARE BASED ON OUR GENERATION RESULTS AND RESRESENT OUR CURRENT DATABASE  -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Industry Breakdown'],
          ['Business Related Fields', 6.1],
          ['Chemicals, Petroleum, Plastics & Rubber',  1.8],
          ['Computer Systems - Design/Programming',  7.9],
          ['Consulting Services', 12.8],
          ['Consumer Goods',    22.6],
          ['Energy',   1.8],
          ['Engineering Services',    18.9],
          ['Environmental Services',    1.2],
          ['Government',    1.2],
          ['Manufacturing & Industrial Systems',   18.3],
          ['Other',   3.7],
          ['Pharmaceuticals & Medicine',   3.1],
          ['Scientific Research & Development',   61]

        ]);

        var options = {
          title: 'My Daily Activities',
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
                <!-- <h3 class="text-primary number"><?php  ?></h3> -->
                <p class="stat-text">Total Matches over x%</p>
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
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-pushpin"> </i>
                <h3 class="text-danger number"><?php echo appRatio($_SESSION['account_id']) ?></h3>
                <p class="stat-text">Average # of Applicants per Posting</p>
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
              Project Experience Breakdown
            </div>
            <div class="card-body">
              <!-- bar chart -->
              <div id="container">
               <div id="columnchart_values" style="width: 500px; height: 510px;"></div>
              </div>
              <!-- //bar chart -->
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              2020 Project Statistics
            </div>
          </div>
        </div>
        <!-- pie chart -->
        <div class="col-lg-6 pl-lg-2 chart-grid">
          <div class="card text-center card_border">
            <div class="card-header chart-grid__header">
              Industry Breakdown
              <div id="container">
                <div id="piechart" style="width: 700px; height: 550px;"></div>
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
