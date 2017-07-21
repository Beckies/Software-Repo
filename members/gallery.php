<?php
session_name("Members");
session_start();
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YES")
{  
  include_once('../admin/index.php');
  exit;
}
$mytitle = "GALLERY :: ";
include_once('../pages/mheader.php');
$member_id=$_SESSION['stdid'];
$mid = $_SESSION['stdid'];
if(isset($_POST['go'])){
 $pic;
 $act = $_POST['act'];
 if($act == "profilepic"){
   for($o=0;$o<count($_POST['myp']); $o++){
     $thepic = $_POST['myp'][$o];
     $union = mysqli_query($con,"UPDATE photos SET typ='PROFILE' WHERE rec_id='$thepic'") or die("Cannot Perform The update as requested");
     ezzzy_msg("Success","Your Profile Picture has now been set Successfully","3000");
   }//end of the for loop that loops through the
 }//end of the if statement that checks if the act is profilepic
 if($act == "del"){
   for($o=0;$o<count($_POST['myp']); $o++){
     $thepic = $_POST['myp'][$o];
     $union = mysqli_query($con,"DELETE FROM photos WHERE rec_id='$thepic'") or die("Cannot Perform The update as requested");
     ezzzy_msg("Success","The Selected Profile Picture(s) has been deleted","3000");
   }//end of the for loop that loops through the
 }//end of the else statement that checks if the act is delete
 elseif($act == "profilepic1"){
   for($o=0;$o<count($_POST['myp']); $o++){
     $thepic = $_POST['myp'][$o];
     $union = mysqli_query($con,"UPDATE photos SET typ='' WHERE rec_id='$thepic'") or die("Cannot Perform The update as requested");
     ezzzy_msg("Success","The selected Profile Picture has been removed","3000");
   }//end of the for loop that loops through the
 }//end of the if statement that checks if the act is to remove from profilepic
 elseif($act == "contest"){
   for($o=0;$o<count($_POST['myp']); $o++){
     $thepic = $_POST['myp'][$o];
     //$union = mysqli_query($con,"UPDATE photos SET typ='PROFILE' WHERE rec_id='$thepic'") or die("Cannot Perform The update as requested");
     //ezzzy_msg("Success","The selected Profile Picture has been removed","3000");
     $tst = ezzzy_input("Pin","Enter the Contest Pin Here","true","true","Enter Pin here");
     echo $tst;
   }//end of the for loop that loops through the
 }//end of the else statement that updtes rhe photo as being for contest
}//end of the if statement that checks if the
?>

<style>
.gallery:after {
    content: '';
    display: block;
    height: 2px;
    margin: .5em 0 1.4em;
    background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(77,77,77,1) 50%, rgba(0, 0, 0, 0) 100%);
    background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(77,77,77,1) 50%, rgba(0, 0, 0, 0) 100%);
}

.gallery img {
    height: 100%;
}

.gallery a {
    /*width: 240px;*/
    width: 64px;
    /*height: 180px;*/
    height: 64px;
    display: inline-block;
    overflow: hidden;
    margin: 4px 6px;
    box-shadow: 0 0 4px -1px #000;
}
</style>
    <script>
window.onload = function() {
    if(typeof oldIE === 'undefined' && Object.keys)
        hljs.initHighlighting();
    baguetteBox.run('.baguetteBoxOne');
    baguetteBox.run('.baguetteBoxTwo');
    baguetteBox.run('.baguetteBoxThree', {
        animation: 'fadeIn'
    });
    baguetteBox.run('.baguetteBoxFour', {
        buttons: true
    });
    baguetteBox.run('.baguetteBoxFive', {
        captions: function(element) {
            // `this` == Array of current gallery items
            return element.getElementsByTagName('img')[0].alt;
        }
    });
};
    </script>
<link rel="stylesheet" href="../js/gallery/baguetteBox.css">
  <script src="../js/gallery/baguetteBox.js" async></script>
    <script src="../js/gallery/plugins.js" async></script>


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
                                <form action="./?lnk=gallery" method="post">
    <div class="baguetteBoxFour gallery">
     <?php
     $r = 1;
      $result = mysqli_query($con,"SELECT * FROM photos WHERE member_id='$mid'") or die("Cannot get the pictures for this guy");
      while($row = mysqli_fetch_array($result)){
     ?>

        <input <?php if($row['typ'] == "PROFILE"){echo "checked=true"; }?> type="checkbox" name="myp[]" value="<?php echo $row['rec_id']; ?>" /><a href="<?php echo "upload/uploads/". $row['picture']; ?>" data-caption="<?php echo $row['title']; ?>"><img src="<?php echo "upload/uploads/". $row['picture']; ?>"></a>
        <?php
        if(($r % 5) == 0){
          echo "<br />";
        }
        $r++;
         }//end of the while loop that brings out my whole pictures from the db
        ?>
    </div>

     <table>
      <tr>
       <td>With Selected? =&raquo;&raquo;</td>
       <td><input type="checkbox" id="withs" name="" value="" /></td>
      </tr>

      <tr id="updateme" style="display: none;">
       <td><select name="act">
        <option value="profilepic">Make Profile Picture</option>
        <option value="profilepic1">Remove From Profile Picture</option>
        <option value="share">Share on Timeline</option>
        <option id="contest" value="contest">Use For Contest</option>
        <option value="del">Delete</option>
       </select></td>
       <td><input class="btn small color1" type="submit" name="go" value="go" /></td>
      </tr>
     </table>

    </form>

	<!-- -->
<script>
$("#withs").change(function(e) {

if($(this).is(":checked"))
{
$("#updateme").show();
}
else
{
$("#updateme").hide();
}
});
</script>
                                    <!-- /This is my main content -->
                                </section>

                            </div>

                            <?php include_once('../pages/mfooter.php'); ?>