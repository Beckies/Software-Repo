<?php
session_name("Members");
session_start();
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YES")
{
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  include_once('../admin/index.php');
  exit;
}
$mid = $_GET['id'];
$mytitle = "Profile-Page :: ";
include_once('../pages/mheader.php');
$result = mysqli_query($con,"SELECT * FROM members WHERE member_id='$mid'") or die("Cannot get the profile detail");
$row = mysqli_fetch_array($result);
//let us get the sex of the member
 $img = $ezzzy->showpic("member_id",$mid,"PROFILE");
?>
<div class="void"></div>
<div class="void"></div>
<div class="void"></div>
<div class="void"></div>
<section class="hbox stretch"> 
<section id="content"> 
<section class="vbox">
<section class="scrollable">
<section class="hbox stretch">
<aside class="col-lg-5 aside-lg bg-light lter b-r">
<section class="vbox">
<section class="scrollable">
<div class="wrapper">
<div class="clearfix m-b"> <a href="#" class="pull-left thumb m-r"> <img src="<?php echo $img; ?>" class="img-circle"> </a>
<div class="clear"> <div class="h3 m-t-xs m-b-xs"><?php echo $row['firstname']." ".$row['lastname']; ?></div>
<small class="text-muted"><i class="icon-map-marker"></i> <?php echo $row['address']; ?></small>
<a  href="#">
								 <button class="btn btn-sm btn-default" data-placement="top" title="Send friend Request" style="margin:0px;">
								 <img  src="../images/png/glyphicons-7-user-add.png" style="width:16px; height:16px;" /></button></a>
</div>
</div>
<div class="panel wrapper">
<div class="row">
<div class="col-xs-4">
<a href="#"> <span class="m-b-xs h4 block">245</span>
<small class="text-muted">Followers</small> </a>
</div>
<div class="col-xs-4">
<a href="#"> <span class="m-b-xs h4 block">55</span> <small class="text-muted">Following</small> </a>
</div>
<div class="col-xs-4">
<a href="#"> <span class="m-b-xs h4 block">2,035</span> <small class="text-muted">Tweets</small> </a>
</div>
</div>
</div>
<!--<div> <small class="text-uc text-xs text-muted">School</small><p><?php echo ""; ?></p>
<div class="line"></div>
<small class="text-uc text-xs text-muted">connection</small>
<p class="m-t-sm"> <a href="" class="btn btn-rounded btn-twitter btn-icon"><i class="icon-twitter"></i></a> <a href="<?php echo "#"; ?>" class="btn btn-rounded btn-facebook btn-icon"><i class="icon-facebook"></i></a> <a href="<?php echo "#"; ?>" class="btn btn-rounded btn-gplus btn-icon"><i class="icon-google-plus"></i></a> </p>
</div>-->
<div class="line"></div>


</div>
</section>
</section>
</aside>

<aside class="col-lg-5">
<section class="vbox">
<header class="header bg-light bg-gradient">
<ul class="nav nav-tabs nav-white">
<li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
<li class=""><a href="#events" data-toggle="tab">Events</a></li>
<li class=""><a href="#interaction" data-toggle="tab">Interaction</a></li>
</ul> </header>

<section class="scrollable">
<div class="tab-content">
<div class="tab-pane active" id="activity">
<ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
<?php
 $myposv = mysqli_query($con,"SELECT * FROM posts WHERE member_id='$mid'") or die("Cannot get this members timeline detail");
 while($myrow = mysqli_fetch_array($myposv)){
?>
<li class="list-group-item">
    <a href="#" class="thumb-sm pull-left m-r-sm">
        <img src="<?php echo $img; ?>" class="img-circle">
    </a>
    <a href="#" class="clear">
      <small class="pull-right"><?php echo $myrow['dates']; ?></small>
      <strong class="block"><?php echo $row['firstname']." ".$row['lastname']; ?></strong>
      <small><?php echo $myrow['actualpost']; ?> </small>
    </a>
</li>
<?php
}//end of the while loop that brings the timeline of this user
?>
</ul>
 </div>
 <div class="tab-pane" id="events">
 <div class="text-center wrapper"> <i class="icon-spinner icon-spin icon-large"></i> </div>
 </div>
 <div class="tab-pane" id="interaction">
 <div class="text-center wrapper"> <i class="icon-spinner icon-spin icon-large"></i> </div>
 </div>
 </div>
 </section>
 </section>
 </aside>
<aside> <!--<section class="vbox"> <section class="scrollable">
 <div class="wrapper"-->
<!--</div>
</section>
</section>-->
</aside>
 </section>
 </section>
 </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a>
 </section> <!-- /.vbox -->
 </section>
 </body>
 </html>
 <?php  include_once('../pages/mfooter.php'); ?>