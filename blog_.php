<?php
$mytitle = " :: WELCOME";
include_once('pages/header.php');
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
        <h2>The Blog</h2>
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
        <?php
          $r = 1;
          if(isset($_GET['typ']) && $_GET['typ'] == "cat"){
           $resr = $ezzzy->getallrow("postid",$_GET['id'],"news");
          }
          else{
              $resr = $ezzzy->getallresult("news");              
          }
           while($rw = mysqli_fetch_array($resr)){
          ?>
      <div class="blogpost row">
        <div class="blogcontent col-md-12">
            <div class="blogimage"> <a href="blog-single.php?id=<?php echo $rw['rec_id']; ?>"> <img width="870" height="320" src="<?php if($rw['picture'] != ""){ echo "admin/". $rw['picture']; } else { echo "images/slide1.jpg";} ?>" class="ani-image" alt="title"> </a> </div>
          <div class="blogdetails col-md-2 col-xs-12 date"> <span>05</span><span>Feb 2015</span> <a href="blog-single.php?id=<?php echo $rw['rec_id']; ?>" class="btn color2 medium">More</a> </div>
          <div class="col-md-10 col-xs-12 blog-summery"> <a class="color1" href="blog-single.php?id=<?php echo $rw['rec_id']; ?>">
            <h1><?php echo $rw['title']; ?></h1>
            </a> <span class="bloginfo"> <a href="#a"> <i class="fa fa-user fa-fw"></i><?php echo $ezzzy->getval("rec_id",$rw['who'],"login_admin","name");?></a> <a href="#a"> <i class="fa fa-comments fa-fw"></i><?php echo ""; ?> Comments</a> </span>
            <p> <?php echo substr($rw['descp'],0,290); ?>... <a href="blog-single.php?id=<?php echo $rw['rec_id']; ?>">read more</a> </p>
          </div>
        </div>
      </div>
      <div class="clearfix f-space30"></div>
      <?php
           }//end of the while loop
      ?>
     
    </div>
    <!-- side bar -->
    <?php include_once('pages/rightpanel.php'); ?>
    <!-- end:sidebar --> 
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>
<!-- footer -->
<?php include_once('pages/footer.php'); ?>