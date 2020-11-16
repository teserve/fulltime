<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

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

  <!-- <body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
<!--
  <div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
  <!--  <div class="logo">
      <h1><a href="index.html"></a></h1>
    </div>

  <!-- if logo is image enable this -->
    <!-- image logo -->
    <!--<div class="logo">
      <a href="index.html">
        <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
      </a>
    </div>
    <!-- //image logo -->
    <!--
    <div class="logo-icon text-center">
      <a href="index.html" title="logo"><img src="assets/images/logo.png" alt="logo-icon"> </a>
    </div>

    <div class="sidebar-menu-inner">


      <ul class="nav nav-pills nav-stacked custom-nav">
        <li class="active"><a href="index.html"><i class="fa fa-tachometer"></i><span> Dashboard</span></a>
        </li>
        <li class="menu-list">
          <a href="#"><i class="fa fa-cogs"></i>
            <span>Elements <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="carousels.html">Carousels</a> </li>
            <li><a href="cards.html">Default cards</a> </li>
            <li><a href="people.html">People cards</a></li>
          </ul>
        </li>
        <li><a href="pricing.html"><i class="fa fa-table"></i> <span>Pricing tables</span></a></li>
        <li><a href="blocks.html"><i class="fa fa-th"></i> <span>Content blocks</span></a></li>
        <li><a href="forms.html"><i class="fa fa-file-text"></i> <span>Forms</span></a></li>
      </ul>

      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>

    </div>
  </div>
  -->
  <!-- header-starts -->
  <!--
  <div class="header sticky-header" style="background-color:black;">
  -->
    <!-- notification menu start -->
    <!--
    <div class="menu-right">
      <div class="navbar user-panel-top">
        <div class="search-box">
          <form action="#search-results.html" method="get">
            <input class="search-input" placeholder="Search Here..." type="search" id="search">
            <button class="search-submit" value=""><span class="fa fa-search"></span></button>
          </form>
        </div>
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
                  aria-expanded="false">
                  <div class="profile_img">
                    <img src="assets/images/profileimg.jpg" class="rounded-circle" alt="" />
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                  <li class="user-info">
                    <h5 class="user-name">John Deo</h5>
                    <span class="status ml-2">Academic Advisor</span>
                  </li>
                  <li> <a href="../../profile%20dashboards/dbadmin.php"><i class="lnr lnr-user"></i>Profile</a> </li>
                  <li> <a href="#"><i class="lnr lnr-users"></i>Matches</a> </li>
                  <li> <a href="#"><i class="lnr lnr-thumbs-up"></i>Ratings</a> </li>
                  <li class="logout"> <a href="#sign-up.html"><i class="fa fa-power-off"></i> Logout</a> </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  -->

    <!--notification menu end -->
    <!--
  </div>
-->
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
                 <th><a href ="../Survey/Survey.php">Survey &nbsp; &nbsp; &nbsp; &nbsp;</a></th>
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
                <p class="stat-text">Total Number of Students</p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-tablet"> </i>
                <h3 class="text-secondary number">150k</h3>
                <p class="stat-text">Total Number of Applications</p>
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
                <p class="stat-text">Total Number of Companies</p>
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
              Total Users
            </div>
            <div class="card-body">
              <!-- bar chart -->
              <div id="container">
                <canvas id="barchart"></canvas>
              </div>
              <!-- //bar chart -->
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              Updated 2 hours ago
            </div>
          </div>
        </div>
        <div class="col-lg-6 pl-lg-2 chart-grid">
          <div class="card text-center card_border">
            <div class="card-header chart-grid__header">
              Hiring Trends
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

    <!-- chatting -->
    <!--
    <div class="data-tables">
      <div class="row">
        <div class="col-lg-12 chart-grid mb-4">
          <div class="card card_border p-4">
            <div class="card-header chart-grid__header pl-0 pt-0">
              Chatting
            </div>
            <div class="messaging">
              <div class="inbox_msg">
                <div class="inbox_people">
                  <div class="headind_srch">
                    <div class="srch_bar">
                      <div class="stylish-input-group">
                        <input type="text" class="search-bar" placeholder="Search Chat">
                        <span class="input-group-addon">
                          <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                        </span> </div>
                    </div>
                  </div>
                  <div class="inbox_chat">
                    <div class="chat_list active_chat">
                      <div class="chat_people">
                        <div class="chat_img"> <img src="assets/images/avatar5.jpg" alt="Alexander" class="img-fluid">
                        </div>
                        <div class="chat_ib">
                          <h5>Alexander <span class="chat_date">1 hour ago</span></h5>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </div>
                    <div class="chat_list">
                      <div class="chat_people">
                        <div class="chat_img"> <img src="assets/images/avatar3.jpg" alt="Anderson" class="img-fluid">
                        </div>
                        <div class="chat_ib">
                          <h5>Anderson <span class="chat_date">5 hours ago</span></h5>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </div>
                    <div class="chat_list">
                      <div class="chat_people">
                        <div class="chat_img"> <img src="assets/images/avatar5.jpg" alt="Isabella" class="img-fluid">
                        </div>
                        <div class="chat_ib">
                          <h5>Isabella <span class="chat_date">Yesterday</span></h5>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </div>
                    <div class="chat_list">
                      <div class="chat_people">
                        <div class="chat_img"> <img src="assets/images/avatar4.jpg" alt="Charlotte" class="img-fluid">
                        </div>
                        <div class="chat_ib">
                          <h5>Charlotte <span class="chat_date">Mar 04</span></h5>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </div>
                    <div class="chat_list">
                      <div class="chat_people">
                        <div class="chat_img"> <img src="assets/images/avatar2.jpg" alt="Davidson" class="img-fluid">
                        </div>
                        <div class="chat_ib">
                          <h5>Davidson <span class="chat_date">Feb 18</span></h5>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </div>
                    <div class="chat_list">
                      <div class="chat_people">
                        <div class="chat_img"> <img src="assets/images/avatar1.jpg" alt="Elexa ker" class="img-fluid">
                        </div>
                        <div class="chat_ib">
                          <h5>Elexa ker <span class="chat_date">Feb 04</span></h5>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </div>
                    <div class="chat_list">
                      <div class="chat_people">
                        <div class="chat_img"> <img src="assets/images/avatar4.jpg" alt="Charlotte" class="img-fluid">
                        </div>
                        <div class="chat_ib">
                          <h5>Charlotte <span class="chat_date">Jan 28</span></h5>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mesgs">
                  <div class="msg_history">
                    <div class="incoming_msg">
                      <div class="incoming_msg_img"> <img src="assets/images/avatar5.jpg" alt="Alexander"
                          class="img-fluid"> </div>
                      <div class="received_msg">
                        <div class="received_withd_msg">
                          <p>Coming along nicely, we've got a Lorem ipsum dolor sit amet consectetur adipisicing elit.
                          </p>
                          <span class="time_date"> 10:05 AM | Mar 9</span>
                        </div>
                      </div>
                    </div>
                    <div class="outgoing_msg">
                      <div class="sent_msg">
                        <p>Great start, I've added some Lorem ipsum dolor sit amet. </p>
                        <span class="time_date"> 12:15 PM | Mar 9</span>
                      </div>
                    </div>
                    <div class="incoming_msg">
                      <div class="incoming_msg_img"> <img src="assets/images/avatar5.jpg" alt="Alexander"
                          class="img-fluid"> </div>
                      <div class="received_msg">
                        <div class="received_withd_msg">
                          <p>Sed ut perspiciatis unde omnis iste natus error sit</p>
                          <span class="time_date"> 09:16 AM | Yesterday</span>
                        </div>
                      </div>
                    </div>
                    <div class="outgoing_msg">
                      <div class="sent_msg">
                        <p>But I must explain to you.</p>
                        <span class="time_date"> 03:15 PM | Today</span>
                      </div>
                    </div>
                    <div class="incoming_msg">
                      <div class="incoming_msg_img"> <img src="assets/images/avatar5.jpg" alt="Alexander"
                          class="img-fluid"> </div>
                      <div class="received_msg">
                        <div class="received_withd_msg">
                          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores.</p>
                          <span class="time_date"> 03:16 PM | Today</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="type_msg">
                    <div class="input_msg_write">
                      <input type="text" class="write_msg" placeholder="Type a message" />
                      <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o"
                          aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //chatting -->

    <!-- accordions -->
    <div class="accordions">
      <div class="row">
        <!-- accordion style 1 -->
        <!--
        <div class="col-lg-12 mb-4">
          <div class="card card_border">
            <div class="card-header chart-grid__header">
              Bootstrap Accordions
            </div>
            <div class="card-body">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header bg-white p-0" id="headingOne">
                    <a href="#" class="card__title p-3" data-toggle="collapse" data-target="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne">Collapsed accordion heading </a>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body para__style">
                      Nulla tincidunt quam justo, in tincidunt tortor sollicitudin a. Donec porta posuere
                      libero sed varius. Phasellus hendrerit commodo sem, at sagittis sapien semper quis.
                      Etiam vitae facilisis nibh. Maecenas erat nisl, blandit at nunc a, lobortis sagittis
                      ex. Maecenas pharetra pulvinar tincidunt.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header bg-white p-0" id="headingTwo">
                    <a href="#" class="card__title p-3" data-toggle="collapse" data-target="#collapseTwo"
                      aria-expanded="false" aria-controls="collapseTwo">Click here to collapse accordion</a>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body para__style">
                      Nulla tincidunt quam justo, in tincidunt tortor sollicitudin a. Donec porta posuere
                      libero sed varius. Phasellus hendrerit commodo sem, at sagittis sapien semper quis.
                      Etiam vitae facilisis nibh. Maecenas erat nisl, blandit at nunc a, lobortis sagittis
                      ex. Maecenas pharetra pulvinar tincidunt.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header bg-white p-0" id="headingThree">
                    <a href="#" class="card__title p-3" data-toggle="collapse" data-target="#collapseThree"
                      aria-expanded="false" aria-controls="collapseThree">Click here to
                      collapse accordion</a>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                    data-parent="#accordionExample">
                    <div class="card-body para__style">
                      Nulla tincidunt quam justo, in tincidunt tortor sollicitudin a. Donec porta posuere
                      libero sed varius. Phasellus hendrerit commodo sem, at sagittis sapien semper quis.
                      Etiam vitae facilisis nibh. Maecenas erat nisl, blandit at nunc a, lobortis sagittis
                      ex. Maecenas pharetra pulvinar tincidunt.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- //accordion style 1 -->
      </div>
    </div>
    <!-- //accordions -->

    <!-- modals -->
    <!--
    <section class="template-cards">
      <div class="card card_border">
        <div class="cards__heading">
          <h3>Modals - <span>2 different types of bootstrap modals</span></h3>
        </div>
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-lg-6 pr-lg-2 chart-grid">
              <div class="card text-center card_border">
                <div class="card-header chart-grid__header">
                  Demo modal
                </div>
                <div class="card-body">

                  <button type="button" class="btn btn-primary btn-style" data-toggle="modal"
                    data-target="#exampleModal">
                    Launch demo
                  </button>


                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-success">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 chart-grid">
              <div class="card text-center card_border">
                <div class="card-header chart-grid__header">
                  Vertical centered
                </div>
                <div class="card-body">

                  <button type="button" class="btn btn-primary btn-style" data-toggle="modal"
                    data-target="#exampleModalCenter">
                    Launch demo
                  </button>

                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-success">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    -->
  </div>
</div>
</section
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

                <!-- <div class="col-md-2 col-sm-4">
                      <div class="footer-thumb">
                           <h2>Company</h2>
                           <ul class="footer-link">
                                <li><a href="#about">About Us</a></li>
                                <li><a href="#blog">Read Testimonials</a></li>
                           </ul>
                      </div>
                 </div>

                 <div class="col-md-2 col-sm-4">
                      <div class="footer-thumb">
                           <h2>Services</h2>
                           <ul class="footer-link">
                                <li><a href="#">Job Placement</a></li>
                                <li><a href="#">Applicant Discovery</a></li>
                                <li><a href="#">Company Analytics</a></li>
                           </ul>
                      </div>
                 </div> -->

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
<!-- move top -->
<!--
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
-->
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
