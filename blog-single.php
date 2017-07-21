<?php
$mytitle = " :: WELCOME";
include_once('pages/header.php');
$id = $_GET['id'];
$row = $ezzzy->getrow("rec_id",$id,"news");
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
        <h2>Apps/Blog</h2>
      </div>
    </div>
  </div>
</div>
<!-- end: Page title -->
<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row"> 
    <!--   Single Post -->
    <div class="col-md-9 col-sm-12 col-xs-12 main-column box-block blog-single"> 
      <!-- Post Image -->
      <div class="post-image"> <img width="870" height="320" src="<?php if($row['picture'] != ""){ echo "admin/". $row['picture']; } else { echo "images/slide1.jpg";} ?>" class="ani-image" alt="Blog title"> </div>
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
          <?php if($row['apath'] == ""){ ?>
          <li class="sharethis btn dropdown hidden-xs"><i class="fa fa-share-square-o"></i><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a">Share This Post</a>
            <ul class="dropdown-menu">
              <li> <a href="#" target="_blank" rel="nofollow" class="sharefacebook"> <i class="fa fa-facebook-square"></i> Facebook</a> </li>
              <li><a href="#" target="_blank" rel="nofollow" class="sharegoogleplus"><i class="fa fa-google-plus-square"></i> Google+ </a></li>
              <li><a href="#" target="_blank" rel="nofollow" class="sharetwitter"><i class="fa fa-twitter-square"></i> Twitter</a></li>
              <li><a href="#" target="_blank" rel="nofollow" class="sharepinterest"><i class="fa fa-pinterest-square"></i> Pinterest </a></li>
            </ul>
          </li>
          <?php
            }//end of the if statement that says its a blog
            else if($row['apath'] != ""){ ?>
          <li class="sharethis btn dropdown hidden-xs"><i class="fa fa-download"></i><a class="" data-toggle="" data-hover="" href="<?php echo "admin/".$row['apath']; ?>">Download Now</a>            
          </li>
          <?php
            }//end of the else statement that says its an app
          ?>
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
          <div class="image"> <img src="images/blog/noimage-user.jpg" alt="author"></div>
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
          <div class="user-image image"><img src="images/blog/noimage-user.jpg" alt="userimage"></div>
          <div class="user-info"> <span class="username"><a href="#a"><?php echo $ezzzy->getval("member_id",$row['memberid'],"members","firstname");?></a></span>
            <p><?php echo $rww['comment']; ?></p>
            <span>5 days ago</span> <span class="sp"></span> <span><a href="#a"></a></span> <span class="sp">|</span> <span><a href="#a">Like</a></span> <span>4 <i class="fa fa-heart fa-fw"></i></span> </div>
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
      
<!--      <div class="box-content clearfix">
        <div class="comment-reply"> <span class="title">Leave a Reply</span>
          <form>
            <div class="col-md-5">
              <input class="name" id="name" value="" placeholder="Name*">
              <input class="name" id="email" value="" placeholder="Email* (will not be published)">
              <input class="name" id="website" value="" placeholder="Website">
            </div>
            <div class="col-md-7">
              <textarea name="message-area" id="message" rows="7" cols="60">Comment</textarea>
            </div>
            <div class="col-md-8"> <span class="instruction"> Do not post violating content,. You may use these HTML tags and attributes: &lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </span></div>
            <div class="col-md-4">
              <button class="btn medium color2 pull-right" type="submit">Post Comment</button>
            </div>
          </form>
        </div>
      </div>-->
      <!-- end: Add Reply --> 
      
    </div>
    <!--   end: Single Post --> 
    
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