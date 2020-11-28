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

#count & show total reviews submitted for statistical data
    function countR()
    {
         global $pdo;

        $query = 'SELECT COUNT(*) AS num FROM g1116887.Reviews ';

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
<!-- BAR CHART SCRIPT -->


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

  <title>Analytics</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <link rel="stylesheet" href="assets/css/templatemo-style.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Job Type", "% of Hires", { role: "style" } ],
        ["Internship", 15, "#ffcc90"],
        ["Full-Time", 20, "#indigo"],
        ["Co-op", 15, "#ff964f"],

      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "\Jobs filled by Job-Type",
        width: 880,
        height: 420,
        bar: {groupWidth: "85%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

  <!-- Pie Chart JS -->
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
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <!-- Mapping Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['State', 'Users'],
          // ['US-Northeast', 10],
          // ['US-Southeast', 10],
          // ['US-Midwest', 10],
          // ['US-Southwest', 10],
          // ['US-West', 30],

          ['US-AL', 10],
          ['US-AK', 0],
          ['US-AR', 0],
          ['US-AK', 0],
          ['US-AZ', 0],
          ['US-Colorado', 0],
          ['US-CO', 0],
          ['US-DE', 0],
          ['US-FL', 20],
          ['US-HI', 0],
          ['US-KS', 0],
          ['US-KY', 0],
          ['US-MI', 0],
          ['US-MO', 0],
          ['US-MS', 0],
          ['US-MT', 0],
          ['US-NE', 0],
          ['US-NJ', 0],
          ['US-NM', 0],
          ['US-NY', 0],
          ['US-OR', 0],
          ['US-PA', 0],
          ['US-TX', 0],
          ['US-UT', 0],
          ['US-VA', 0],
          ['US-WA', 0],
          ['US-WV', 0],
          ['US-WY', 0],
          ['US-OK', 0],
          ['US-CA', 0],
          ['US-ID', 0],
          ['US-NV', 0],
          ['US-MA', 0],
          ['US-GA', 0],
          ['US-SC', 0],
          ['US-TN', 0],
          ['US-IN', 0],
          ['US-IL', 0],
          ['US-WI', 0],
          ['US-WI', 0],
          ['US-LA', 0],
          ['US-SD', 0],
          ['US-ND', 0],
          ['US-IA', 0],
          ['US-OH', 0],
          ['US-NC', 0],
          ['US-DC', 0],
          ['US-CT', 0],
          ['US-MN', 0],
          ['US-Del', 0],
          ['US-VT', 0],
          ['US-NH', 0],
          ['US-ME', 0],
          ['US-MD', 0],

        ]);

        var options = {
        region: 'US',
        displayMode: 'regions',
        resolution: 'provinces',
        colorAxis: {colors: ['#ffcc90','indigo'] },
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
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
                <h3 class="text-danger number"><?php echo countR() ?></h3>
                <p class="stat-text">Total Reviews Submitted</p>
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
              Job Posting Trends
            </div>
            <div class="card-body">
              <!-- bar chart -->
              <div id="container">
                <div id="columnchart_values" style="width: 1000px; height: 400px;"></div>
              </div>
              <!-- bar chart -->
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              Job Type Breakdown
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
              Skills Correlation to Industry
            </div>
              <div class="card-body">
                <div id="regions_div" style="width: 850px; height: 525px;"></div>
              </div>
            <div class="card-footer text-muted chart-grid__footer">
              2020 Industry Breakdown
            </div>
          </div>
        </div>
          <!-- //survey -->
      
      <!-- Machine Learning Graph -->
      <div class="col-lg-6 pl-lg-2 chart-grid">
          <div class="card text-center">
            <div class="card-header chart-grid__header">
              Posting By Job Position Type
            </div>
            <div class="card-body">
              <!-- line chart -->
              <div id="container">
                <div id="piechart" style="width: 800px; height: 525px;"></div>
              </div>
              <!-- //line chart -->
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              2020 Industry Breakdown
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
