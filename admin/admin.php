<?php
session_name("Admin");
session_start(); //Start the current session
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YESS"){
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  include_once('../pages/login.php');
  exit;
}
$mytitle = ":: ADMIN";
include_once('../pages/admin_header.php');
?>      <!-- end: Quick Help -->
 <link rel="stylesheet" href="../css/app.v1.css">
    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>
<!-- Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>ADMINISTRATION</h2>
      </div>
    </div>
  </div>
</div>
<!-- end: Page title -->
<div class="row clearfix f-space10"></div>
<div class="container">
  <!-- row -->
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 main-column box-block">
       <!-- This is the beginning of my manin content -->
            <div class="dropdown pull-left m-r">
                <ul class="dropdown-menu pos-stc inline" role="menu" aria-labelledby="dropdownMenu">                
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#">Post</a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="cpost.php?ctyp=blog">Create Post</a></li>
                        <li><a tabindex="-1" href="showpost.php?typ=my">Show My Posts</a></li>
                        <li><a tabindex="-1" href="showpost.php?typ=all">Show All Posts</a></li>
                      </ul>
                    </li>                    
                    <li class="divider"></li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#">Blog Manager</a> </li>
                </ul>
            </div>
       
       <?php if($_SESSION['rec'] == 1){ ?>
       
            <div class="dropdown pull-left m-r">
                <ul class="dropdown-menu pos-stc inline" role="menu" aria-labelledby="dropdownMenu">                
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#" class="fa fa-arrow-right">Category</a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                          <li><a tabindex="-1" href="ccat.php?ctyp=software" class="">Create Category</a></li>
                        <li><a tabindex="-1" href="showcat.php?ctyp=software">Show Categories</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#" class="fa fa-arrow-right">Upload</a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                          <li><a tabindex="-1" href="us.php" class="fa fa-upload">Upload Software</a></li>
                        <li><a tabindex="-1" href="showus.php">Show Softwares</a></li>
                      </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#">Software Manager</a> </li>
                </ul>
            </div>
       
            <div class="dropdown pull-left m-r">
                <ul class="dropdown-menu pos-stc inline" role="menu" aria-labelledby="dropdownMenu">                
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#" class="fa fa-arrow-right">Category</a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="ccat.php?ctyp=blog">Create Category</a></li>
                        <li><a tabindex="-1" href="showcat.php?ctyp=blog">Show Categories</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#" class="fa fa-arrow-right">Admin Users</a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="addadmin.php">Add Admin</a></li>
                        <li><a tabindex="-1" href="showadmin.php">Show Admin</a></li>
                      </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#">Post Management</a> </li>
                </ul>
            </div>

            <div class="dropdown pull-left m-r">
                <ul class="dropdown-menu pos-stc inline" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="siteinfo.php">Site Information</a></li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#" class="fa fa-arrow-right">Events</a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="addevent.php">Add Event</a></li>
                        <li><a tabindex="-1" href="showevent.php?typ=event">Show Event</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#" class="fa fa-arrow-right">News</a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="addnews.php">Add News</a></li>
                        <li><a tabindex="-1" href="shownews.php?typ=news">Show News</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#" class="fa fa-arrow-right">Adverts</a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="addads.php">Add Advert</a></li>
                        <li><a tabindex="-1" href="showads.php?typ=ads">Show Advert</a></li>
                      </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#">Website Managagement</a> </li>
                </ul>
            </div>

            <div class="dropdown pull-left m-r">
                <ul class="dropdown-menu pos-stc inline" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="showmem.php">Show Members</a></li>
<!--                    <li class="dropdown-submenu"> <a tabindex="-1" href="#">SMS</a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="sendsms.php">Send SMS</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#">Email</a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="sendemail.php">Send Email</a></li>
                      </ul>
                    </li>-->
                    <li class="divider"></li>
                    <li class="dropdown-submenu"> <a tabindex="-1" href="#">Members Managagement</a> </li>
                </ul>
            </div>

            <div class="dropdown dropup pull-left">
                <ul class="dropdown-menu bg-inverse pos-stc inline" role="menu" aria-labelledby="dropdownMenu">
                    <li class="dropdown-submenu"><a tabindex="-1" href="#">Pin</a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                          <li><a tabindex="-1" href="usedp.php">Used Pin</a> </li>
                          <li><a tabindex="-1" href="unusedp.php">Unused Pin</a> </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a tabindex="-1" href="#">Security Management</a> </li>
              </ul>
            </div>
       <?php } ?>
       <!-- This is the Ending of my manin content -->
    </div>
    <!-- side bar -->
    <?php include_once('../pages/right.php'); ?>
    <!-- end:sidebar -->
  </div>
  <!-- end:row -->
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>
<!-- footer -->
<?php include_once('../pages/foot.php'); ?>