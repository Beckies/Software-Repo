<?php
session_name("Admin");
 include_once('config.php');
require_once('../functions/ezzzy_function.php');
require_once('../functions/sammysql.inc.php');
$ezzzy = new SamMysql($con);
?>
<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="noIE" lang="en-US">
<!--<![endif]-->

<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<meta content="" name="description">
<meta content="Ezekiel Aliyu, Adedamola" name="author">
<link href="images/ico.html" rel="shortcut icon">
<title><?php echo $mytitle; ?></title>


<!-- Reset CSS -->
<link href="../css/normalize.css" rel="stylesheet" type="text/css"/>

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.css" rel="stylesheet">

<!-- Iview Slider CSS -->
<link href="../css/iview.css" rel="stylesheet">

<!--	Responsive 3D Menu	-->
<link href="../css/menu3d.css" rel="stylesheet"/>

<!-- Animations -->
<!--<link href="../css/animate.css" rel="stylesheet" type="text/css"/>-->

<!-- Custom styles for this template -->
<link href="../css/custom.css" rel="stylesheet" type="text/css" />

<!-- Style Switcher -->
<!--<link href="../css/style-switch.css" rel="stylesheet" type="text/css"/>-->

<!-- Color -->
<link href="../css/skin/color.css" id="colorstyle" rel="stylesheet">

<link href="../css/lightbox.css" rel="stylesheet" type="text/css">

<!-- php5 shim and Respond.js IE8 support of php5 elements and media queries -->
<!--[if lt IE 9]> <script src="js/php5shiv.js"></script> <script src="js/respond.min.js"></script> <![endif]-->

<!-- Bootstrap core JavaScript -->
<script src="../js/lightbox-2.6.min.js"></script>
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-select.js"></script>

<!-- Custom Scripts -->
<script src="../js/scripts.js"></script>

<!-- MegaMenu -->
<script src="../js/menu3d.js" type="text/javascript"></script>

<!-- iView Slider -->
<script src="../js/raphael-min.js" type="text/javascript"></script>
<script src="../js/jquery.easing.js" type="text/javascript"></script>
<script src="../js/iview.js" type="text/javascript"></script>
<script src="../js/retina-1.1.0.min.js" type="text/javascript"></script>

<!--[if IE 8]>
    <script type="text/javascript" src="js/selectivizr.js"></script>
    <![endif]-->

<!--Ezzzy Style -->
<link rel="stylesheet" href="../styles/css_tables/jquery.dataTables.css" type="text/css" />
<script type="text/javascript" src="../styles/css_tables/jquery.js"></script>
<script language="javascript" src="../styles/css_tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="./myeditor/wysiwyg.js"></script>
<!-- / Ezzzy Style -->

</head>

<body>
<!-- Header -->
<header>
  <!-- Top Heading Bar -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="topheadrow">
          <ul class="nav nav-pills pull-right">
            <li class="dropdown"> <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs"> Login</span></a>
              <div class="loginbox dropdown-menu"> <span class="form-header">Login</span>
                <span><a href="#a" class="color2" data-toggle="modal" data-target="#forgotpass">Forgot password?</a></span>
						<form role="form" method="post" action="admin/check_login.php">
						<small>E-mail or Username</small>
						  <div class="form-group">
						   <i class="fa fa-user fa-fw"></i>
							<input class="form-control" name="username" id="InputUserName" placeholder="E-mail or Username" type="text" required />
						  </div>
						  <small>Password</small>
						  <div class="form-group">
						    <i class="fa fa-lock fa-fw"></i>
							<input class="form-control" name="password" id="InputPassword" placeholder="Password" type="password" required />
							<input name="agree" type="checkbox" class="pull-left"/><br /><small class="pull-left">Remember Me</small>
							<button class="btn sm color1 pull-right" type="submit" name="login">Login</button>
							</div>
						 </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- end: Top Heading Bar -->

  <div class="f-space20"></div>
  <!-- Logo and Search -->
  <div class="container">
    <div class="row clearfix">
      <div class="col-lg-3 col-xs-12">
        <div class="logo"> <a href="index.php" title="Adedamolo">
          <div class="logoimage"><img alt="adedamolao.com" src="../images/logo1.jpg"></div>
          <div class="logotext"><span><strong>ADEDAMOLA</strong></span><span></span></div>
          <span class="slogan">We CARE</span></a> </div>
      </div>
      <!-- end: logo -->
      <div class="visible-xs f-space20"></div>
      <!-- search -->
      <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right">
        <div class="searchbar">
          <form action="#">
            <div class="searchbox pull-left">
              <input class="searchinput" id="search" placeholder="Search..." type="search">
              <button class="fa fa-search fa-fw" type="submit"></button>
            </div>
          </form>
        </div>
      </div>
      <!-- end: search -->

    </div>
  </div>
  <!-- end: Logo and Search -->
  <div class="f-space20"></div>
  <!-- Menu -->
  <div class="container">
    <div class="row clearfix">
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 menu-col">
        <div class="menu-heading menuHeadingdropdown"> <span> <i class="fa fa-bars"></i> Categories <i class="fa fa-angle-down"></i></span> </div>
        <!-- Mega Menu -->
        <div class="menu3dmega vertical menuMegasub" id="menuMega">
          <ul>
            <!-- Menu Item Links for Mobiles Only -->
            <li class="visible-xs"> <a href="index.php"> <i class="fa fa-home"></i> <span>Home</span> <i class="fa fa-angle-right"></i> </a>
              <div class="dropdown-menu flyout-menu">
                <!-- Sub Menu -->
                <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="admin.php">Setup</a></li>                                                    
                  <li><a href="logout.php">Logout</a></li>
                </ul>
                <!-- end: Sub Menu -->
              </div>
            </li>
            <!-- end: Menu Item -->
            <!-- Menu Item for Tablets and Computers Only-->
            <li class="hidden-xs"> <a href="#a"> <i class="fa fa-files-o"></i> <span>Pages</span> <i class="fa fa-angle-right"></i> </a>
              <div class="dropdown-menu flyout-menu">
                <!-- Sub Menu -->
                <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="admin.php">Setup</a></li>                                                    
                  <li><a href="logout.php">Logout</a></li>
                </ul>
                <!-- end: Sub Menu -->
              </div>
            </li>
            <!-- end: Menu Item -->
               
            <!-- Menu Item -->
            
            <!-- end: Menu Item -->
                       
          </ul>
        </div>
        <!-- end: Mega Menu -->
      </div>
      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 menu-col-2">
        <!-- Navigation Buttons/Quick Cart for Tablets and Desktop Only -->
        <div class="menu-links hidden-xs">
          <ul class="nav nav-pills nav-justified">
            <li> <a href="index.php"> <i class="fa fa-home fa-fw"></i> <span class="hidden-sm">Home</span></a> </li>
            <li> <a href="admin.php"> <i class="fa fa-info-circle fa-fw"></i> <span class="hidden-sm">Setup</span></a> </li>            
            <li> <a href="logout.php"> <i class="fa fa-pencil-square-o fa-fw"></i> <span class="hidden-sm ">Logout</span></a> </li>
          </ul>
        </div>
        <!-- end: Navigation Buttons/Quick Cart Tablets and large screens Only -->

      </div>
    </div>
  </div>
</header>
<!-- end: Header -->

<div class="row clearfix"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="breadcrumb"> <a href="index.php"> <i class="fa fa-home fa-fw"></i> Home </a> <i class="fa fa-angle-right fa-fw"></i> <a href="blog.php"> Blog </a> </div>

      <!-- Quick Help for tablets and large screens -->
      <div class="quick-message hidden-xs">
        <div class="quick-box">
          <div class="quick-slide"> <span class="title">Help</span>
            <div class="quickbox slide" id="quickbox">
              <div class="carousel-inner">
                <div class="item active"> <a href="#"> <i class="fa fa-envelope fa-fw"></i> Welcome</a> </div>
                <div class="item"> <a href="#"> <i class="fa fa-question-circle fa-fw"></i></a> </div>
                <div class="item"> <a href="#"> <i class="fa fa-phone fa-fw"></i> <?php echo $_SESSION['name']; ?></a> </div>
              </div>
            </div>
            <a class="left carousel-control" data-slide="prev" href="#quickbox"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="right carousel-control" data-slide="next" href="#quickbox"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
        </div>
      </div>