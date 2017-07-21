<?php
include_once("../admin/config.php");
require_once("../functions/ezzzy_function.php");
require_once("../functions/sammysql.inc.php");
$ezzzy = new SamMysql($con);
$themid=$_SESSION['stdid'];
//let us get the image of this user
$imgg = $ezzzy->showpic("member_id",$themid,"PROFILE");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ADMIN ::</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="../todo/css/app.v1.css">
        <link rel="stylesheet" href="../css/font.css" cache="false">
        <!--[if lt IE 9]> <script src="js/ie/respond.min.js" cache="false"></script>
        <script src="js/ie/html5.js" cache="false"></script>
        <script src="js/ie/fix.js" cache="false"></script> <![endif]-->
        
        <!-- scripts for higher performance (ezzzy) -->
        <script src="../todo/css/app.v1.js"></script>
        <script src="../js/jquery-1.10.2.min.js"></script>
       <link rel="stylesheet" href="../styles/modal.css" type="text/css" />
        <link rel="stylesheet" href="../styles/dhtmlwindow.css" type="text/css" />
        <script type="text/javascript" src="../styles/dhtmlwindow.js"></script>
        <script type="text/javascript" src="../styles/modal.js"></script>
        <script language="javascript" src="../styles/winfunc.js"></script>
        <script src="../dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
        <script type="text/javascript" src="./myeditor/wysiwyg.js"></script>
        <!-- / scripts for higher performance (ezzzy) -->
		
		<!-- Ezzzy Time Ago -->
			<script type="text/javascript" src="../js/date/jquery.livequery.js"></script>
			<script type="text/javascript" src="../js/date/jquery.timeago.js"></script>						
		<!-- /Ezzzy Time Ago -->
        
    </head>

    <body>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-primary aside-sm" id="nav">
                <section class="vbox">
                    <header class="dker nav-bar">
                        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="body"> <i class="icon-reorder"></i> </a>
                        <a href="#" class="nav-brand" data-toggle="fullscreen">Welcome</a> <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user"> <i class="icon-comment-alt"></i> </a>
                    </header>

                    <footer class="footer bg-gradient hidden-xs">
                        <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right"> <i class="icon-off"></i> </a>
                        <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm"> <i class="icon-reorder"></i> </a>
                    </footer>

                    <section>
                        <!-- user -->
                        <div class="bg-success nav-user hidden-xs pos-rlt">
                        <div class="nav-avatar pos-rlt">
                        <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
                            <img src="<?php echo $imgg; ?>" alt="" class="">
                          <span class="caret caret-white"></span>
                        </a> 
                            <ul class="dropdown-menu m-t-sm animated fadeInLeft"> 
                                <span class="arrow top"></span> 
                                <li> <a href="#">Settings</a> </li> 
                                <li> <a href="./?lnk=profile&AMP;id=">Profile</a> </li> 
                                <li> <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a> </li> 
                                <li class="divider"></li> <li> <a href="./?lnk=docs">Help</a> </li> 
                                <li> <a href="./?lnk=logout">Logout</a> </li> 
                            </ul> 
                            
                            <div class="visible-xs m-t m-b"> 
                                <a href="#" class="h3"><?php echo $_SESSION['name']; ?></a>
                                <p><i class="icon-map-marker"></i> <!--Some thinh here--></p>
                            </div> 
                        </div> 
                            <div class="nav-msg"> 
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="badge badge-white count-n">2</b> </a> 
                                
                                <section class="dropdown-menu m-l-sm pull-left animated fadeInRight"> 
                                    <div class="arrow left"></div> 
                                    <section class="panel bg-white"> 
                                        <header class="panel-heading"> <strong>You have <span class="count-n">2</span> notifications</strong> </header> 
                                        <div class="list-group"> 
                                            <a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> 
                                                    <img src="<?php echo $imgg;?>" alt="" class="img-circle"> </span> 
                                                <span class="media-body block m-b-none"> Use awesome <br> 
                                                        <small class="text-muted">28 Aug 15</small> 
                                                </span> 
                                            </a> 
                                            <a href="#" class="media list-group-item"> 
                                                <span class="media-body block m-b-none"> 1.0 initial released<br> 
                                                    <small class="text-muted">27 Aug 15</small> 
                                                </span> 
                                            </a> </div> 
                                        <footer class="panel-footer text-sm"> 
                                                    <a href="#" class="pull-right"><i class="icon-cog"></i></a> 
                                                    <a href="#">See all the notifications</a> 
                                        </footer> 
                                    </section> 
                                </section> 
                            </div> 
                        </div> 
                        
                        <!-- / user --> 
                        <!-- nav --> 
                        <nav class="nav-primary hidden-xs"> 
                            <ul class="nav"> 
                                <li class="active"> <a href="./?"> <i class="icon-eye-open"></i> <span>Home</span> </a> </li>
                                <li class="dropdown-submenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-camera"></i> <span>Gallery</span> </a> 
                                    <ul class="dropdown-menu"> 
                                        <li> <a href="./?lnk=gallery">Gallery</a> </li> 
                                        <li> <a href="javascript:void(0)" title="Photos" onclick="javascript:OpenNew('upload/index.html','index',820,520,120,120)"> <b class="badge pull-right">Upload</b>Photos </a> </li>                                         
                                    </ul> 
                                </li>                                
                                <li> <a href="./?lnk=article"> <i class="icon-pencil"></i> <span>Articles</span> </a> </li>
                                <?php
                                    $r = 1;
                                    $resr = $ezzzy->getallresult("postcat",'','','','7');
                                    while($rw = mysqli_fetch_array($resr)){
                                ?>
                                <li style="font-size: smaller; text-transform: capitalize;" class="dropdown-submenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-dribbble"></i> <span><?php echo $rw['title']; ?></span> </a> 
                                    <ul class="dropdown-menu">
                                        <?php                    
                                            $resrt = $ezzzy->getallrow("catid",$rw['rec_id'],"scat");
                                            while($rww = mysqli_fetch_array($resrt)){
                                          ?>
                                        <li> <a href="./?lnk=blog_&amp;id=<?php echo $rww['rec_id']; ?>&amp;typ=cat"><?php echo $rww['title']; ?></a> </li>
                                        <?php
                                            }
                                        ?>
                                    </ul> 
                                </li>
                                <?php
                                    }
                                ?>
                                <li> <a href="./?lnk=logout"> <i class="icon-time"></i> <span>Logout</span> </a> </li> 
                            </ul> 
                        </nav> 
                        <!-- / nav --> 
                        
                        <!-- note --> 
                        <div class="bg-danger wrapper hidden-vertical animated rollIn text-sm"> 
                            <a href="#" data-dismiss="alert" class="pull-right m-r-n-sm m-t-n-sm"><i class="icon-close icon-remove "></i></a> 
                            <?php echo $_SESSION['name']; ?>
                        </div> 
                        <!-- / note --> 
                    </section> 
                </section> 
            </aside> 
            <!-- /.aside --> 
			