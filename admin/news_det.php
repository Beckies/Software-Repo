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
$typ = @$_GET['typ'];
$aid = $_SESSION['rec'];
$id = @$_GET['id'];
$row = "";
if(isset($_POST['pcom'])){
    $rec = $_POST['recc'];
    $mess = cleana($_POST['message']);
    $fieds = "newsid,who,dates,comment";
    $d = date('Y-m-d');
    $va = "'$rec','$aid','$d','$mess'";  
    $resu = $ezzzy->addlist($fieds,$va,"newscomments","0");
    if($resu){
        $msg = "Success";
    }
}
else{
    $row = $ezzzy->getrow("rec_id",$id,"news");    
}
?>
      <!-- end: Quick Help -->

    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>
<!-- Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>SHOWING POST - </h2>
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
            <div class="col-md-9 col-sm-12 col-xs-12 main-column box-block blog-single"> 
      <!-- Post Image -->
      <div class="post-image"> <img width="870" height="320" src="<?php if($row['picture'] != ""){ echo $row['picture']; } else { echo "../images/slide1.jpg";} ?>" class="ani-image" alt="Blog title"> </div>
      <!-- end: Post Image -->
      <div class="post-title">
        <h1><?php echo $row['title']; ?></h1>
      </div>
      
      <!-- Post Info -->
      <div class="post-info clearfix">
        <ul class="pinfo">
          <li><i class="fa fa-calendar"></i><a href="#a"><?php echo $row['adates']; ?></a></li>          
          <li><i class="fa fa-user"></i><a href="#a"><?php echo $ezzzy->getval("rec_id",$row['who'],"login_admin","name");?></a></li>
          <li><i class="fa fa-comments-o"></i><a href="#a">3 Comments</a></li>
<!--          <li class="sharethis btn dropdown hidden-xs"><i class="fa fa-share-square-o"></i><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a">Share This Post</a>
            <ul class="dropdown-menu">
              <li> <a href="#" target="_blank" rel="nofollow" class="sharefacebook"> <i class="fa fa-facebook-square"></i> Facebook</a> </li>
              <li><a href="#" target="_blank" rel="nofollow" class="sharegoogleplus"><i class="fa fa-google-plus-square"></i> Google+ </a></li>
              <li><a href="#" target="_blank" rel="nofollow" class="sharetwitter"><i class="fa fa-twitter-square"></i> Twitter</a></li>
              <li><a href="#" target="_blank" rel="nofollow" class="sharepinterest"><i class="fa fa-pinterest-square"></i> Pinterest </a></li>
            </ul>
          </li>-->
        </ul>
      </div>
      <!-- end: Post Info --> 
      
      <!-- Post Text -->
      <div class="post-text clearfix">
        <?php echo $row['descp']; ?>
      </div>
      
      <!-- Post Text -->
      <div class="clearfix f-space10"></div>
     
      <div class="clearfix f-space30"></div>
      <!-- Author Info -->
      
      <div class="box-content clearfix">
        <div class="post-author">
          <div class="image"> <img src="../images/blog/noimage-user.jpg" alt="author"></div>
          <div class="author-info"> <span><a href="#a"><?php echo $ezzzy->getval("rec_id",$row['who'],"login_admin","name");?></a> -  post author</span>
            <p><!--About John Doe.--></p>
            <ul>
              <li><a href="#a"><i class="fa fa-facebook fa-fw"></i></a></li>
              <li><a href="#a"><i class="fa fa-twitter fa-fw"></i></a></li>
              <li><a href="#a"><i class="fa fa-google-plus fa-fw"></i></a></li>
              <li><a href="#a"><i class="fa fa-pinterest fa-fw"></i></a></li>
              <li><a href="#a"><i class="fa fa-linkedin fa-fw"></i></a></li>
              <li><a href="#a"><i class="fa fa-envelope-o fa-fw"></i></a></li>
              <li><a href="#a"><i class="fa fa-skype fa-fw"></i></a></li>
              <li><a href="#a"><i class="fa fa-youtube fa-fw"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- end: Author Info -->
      <div class="clearfix f-space30"></div>
      <div class="clearfix f-space30"></div>
      <!-- Comments -->
      
      <div class="box-heading clearfix"><span>Comments</span></div>
      <div class="box-content clearfix">
          <?php                
              $resrt = $ezzzy->getallrow("newsid",$id,"newscomments");
               while($rww = mysqli_fetch_array($resrt)){
          ?>
        <!--  Comment Box -->
        <div class="comment-box">
          <div class="user-image image"><img src="../images/blog/noimage-user.jpg" alt="userimage"></div>
          <div class="user-info"> <span class="username"><a href="#a"><?php echo $ezzzy->getval("member_id",$row['memberid'],"members","firstname");?></a></span>
            <p><?php echo $rww['comment']; ?></p>
            <span><?php echo $rww['dates']; ?></span> <span class="sp"></span> <span><a href="#a"></a></span> <span class="sp">|</span> <span><a href="#a">Like</a></span> <span>4 <i class="fa fa-heart fa-fw"></i></span> </div>
        </div>
        <!-- end: Comment Box -->       
        <?php
                }//end of the while loop
        ?>
      </div>
      
      <!-- end: Comments -->
      <div class="clearfix f-space30"></div>
      <div class="clearfix f-space30"></div>
      <!-- Add Reply -->
      
     <div class="box-content clearfix">
        <div class="comment-reply"> <span class="title">Leave a Reply</span>
            <form method="post" action="news_det.php">
              <input type="hidden" name="recc" id="" value="<?php echo $id; ?>" />
            <div class="col-md-7">
              <textarea name="message" id="message" rows="7" cols="60">Comment</textarea>
            </div>            
            <div class="col-md-4">
                <button class="btn medium color2 pull-right" type="submit" name="pcom">Post Comment</button>
            </div>
          </form>
        </div>
      </div>
      <!-- end: Add Reply --> 
      
    </div>
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