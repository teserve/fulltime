<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">
<!-- Starts session, loads in css & bootstrap, and enables all necessary preloads to enable website to be dynamic -->
<head>

 <?php
    session_start();
    include '../account_class.php';
    $account = new Account();
    $account->getInfo($_SESSION['account_id']);
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
</head>

  <!-- //header-ends -->
  <section class="navbar custom-navbar navbar-fixed-top" role="navigation" style="background-color:rgba(128, 128, 128, 0.3);">
       <div class="container">

            <div class="navbar-header">

                 <!-- lOGO TEXT HERE -->
                 <a class="navbar-brand">FullTime</a>
            </div>

            <!-- MENU LINKS -->
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
  <!--<div class="container-fluid content-top-gap">-->

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
                <h3 class="text-primary number">200 k</h3>
                <p class="stat-text">Total Students</p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-tablet"> </i>
                <h3 class="text-secondary number">150k</h3>
                <p class="stat-text">Internships Posted This Year</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-apartment"> </i>
                <h3 class="text-success number">50k</h3>
                <p class="stat-text">Total Surveys Sent</p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-pushpin"> </i>
                <h3 class="text-danger number"></h3>
                <p class="stat-text">Application Fill Rate</p>
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
              Send Survey
            </div>
            <div class="card-body">
              <a href="../Survey/Survey.php" class="btn btn-primary">Questions</a>
            </div>
          </div>
        </div>

        <div class="col-lg-6 pl-lg-2 chart-grid">
          <div class="card text-center">
            <div class="card-header chart-grid__header">
              Job Posting Trends
            </div>
            <div class="card-body">
              <!-- line chart -->
              <div id="container">
                <canvas id="linechart"></canvas>
              </div>
              <!-- //line chart -->
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              Updated just now
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //charts -->

    <!-- accordions -->
  <div class="accordions">
      <div class="row">
  </div>
</div>
</section>
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

<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-1.10.2.min.js"></script>

<!-- chart js -->
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/utils.js"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="assets/js/bar.js"></script>
<script src="assets/js/linechart.js"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/scripts.js"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="assets/js/modernizr.js"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/custom.js"></script>

</body>

</html>
