<?php
session_name("Members");
session_start();
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YES")
{  
  include_once('../admin/index.php');
  exit;
}
$mytitle = "ARTICLE :: ";
include_once('../pages/mheader.php');
$member_id=$_SESSION['stdid'];
?>


            <!-- .vbox -->
            <section id="content">
                <section class="vbox">
                    <header class="header bg-white b-b">
                        <p>Welcome, <?php echo $_SESSION['name']; ?></p>
                    </header> 
                    <section class="scrollable wrapper">
                        <div class="row"> 
                            <div class="col-lg-8">
                                <section class="panel"> 
                                    <!-- This is my main content -->
                                <?php
             $result = mysqli_query($con,"SELECT * FROM news WHERE ntype='ARTICLE'") or die("Cannot Get the Details of the artticle");
             while($row = mysqli_fetch_array($result)){
               $theperson = $row['memberid'];
               //let us get the images of the person
                                /****************************************************************************************************/
                                    //let us get the image of this user
                                        $imgg = "";
                                        $myresults = mysqli_query($con,"SELECT * FROM photos WHERE member_id='$theperson' and typ='PROFILE'") or die("Cannot get the profile picture");
                                        if(mysqli_fetch_array($myresults) == 0){
                                          //let us get the sex of the member
                                          $sexs = $ezzzy->getval("member_id",$theperson,"members","gender");
                                          if($sexs == "Male"){
                                            $imggg = "../images/m.jpg";
                                          }
                                          elseif($sexs == "Female"){
                                            $imggg = "../images/f.jpg";
                                          }
                                        }//end of the if statement that says there is no profile picture
                                        else if(mysqli_fetch_array($myresults) > 1){
                                          $myresults = mysqli_query($con,"SELECT * FROM photos WHERE member_id='$theperson' and typ='PROFILE'") or die("Cannot get the profile picture");
                                          while($myrows = mysqli_fetch_array($myresults)){}
                                        }//end of the else statement that says the profile picture is more than one
                                        else{
                                          $myresults = mysqli_query($con,"SELECT * FROM photos WHERE member_id='$theperson' and typ='PROFILE'") or die("Cannot get the profile picture");
                                          $myrows = mysqli_fetch_array($myresults);
                                          $imggg = "../members/upload/uploads/".$myrows['picture'];
                                        }//end of the else statement that says the profile picture is just one
                                /****************************************************************************************************/
            ?>
					<article class="media">
					<div class="pull-left thumb-sm"> <span><img src="<?php echo $imggg; ?>" class="img-circle"></span> </div>
					<div class="media-body">
					<div class="pull-right media-xs text-center text-muted">
					<strong class="h4"><?php echo $row['adates']; ?></strong><br>
					<small class="label bg-light"><?php echo $row['atimes']; ?></small> </div>
					<a href="#" class="h4"><?php echo $row['title']; ?></a>
					<small class="block m-t-sm"><?php echo substr($row['descp'],0,150); ?>...
					<span class="label label-info"><a href="./?lnk=article_det&id=<?php echo $row['rec_id']; ?>">More</a></span></small> </div>
					</article>
                    <?php if($theperson == $_SESSION['stdid']){ ?>
					<div class="comment-action m-t-sm">
					<a href="./?lnk=editarticle&id=<?php echo $row['rec_id']; ?>" class="btn btn-white btn-xs active"> <i class="icon-edit text-muted text"></i>
					<i class="icon-edit text-active"></i> Edit </a>
					<a href="./?lnk=del&id=<?php echo $row['rec_id']; ?>&amp;typ=news" class="btn btn-danger btn-xs"> <i class="icon-remove text-muted"></i>Delete </a>
					</div>
                    <?php } ?>
						<div class="line pull-in"></div>
                        <?php
                         }//end of the while loop that checks for the areticles in the database
                        ?>
                                    <!-- /This is my main content -->
                                </section>

                            </div>

                            <?php include_once('../pages/mfooter.php'); ?>