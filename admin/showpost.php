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
$typ = $_GET['typ'];
$aid = $_SESSION['rec'];
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
            <script type="text/javascript">
                                 $(document).ready(function() {
                                      $('#example').DataTable();
                                  } );
                                </script>
                                        <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S/N</th>
            <th>TITLE</th>
            <th>LINK</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>S/N</th>
            <th>TITLE</th>
            <th>LINK</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
    <tbody>
     <?php
     include_once('config.php');
     $r = 1;
     if($typ == "my"){
      $result = mysqli_query($con,"SELECT * FROM news WHERE who='$aid' and ntype='BLOG' ORDER BY adates") or die("Cannot get the News");
      }
      else if($typ == "all"){
        $result = mysqli_query($con,"SELECT * FROM news WHERE ntype='BLOG' ORDER BY adates") or die("Cannot get the News");
      }
      else{
        display_error("You have made the wrong move");
      }
      while($row = mysqli_fetch_array($result)){
      ?>
        <tr>
            <td><?php echo $r; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><a style="color: blue;" href="#"><?php echo "http://www.adedamolao.com/blog-single.php?id=".$row['rec_id']; ?></a></td>
            <td><?php echo $row['descp']; ?></td>
            <td><a style="color: blue;" href="editnews.php?id=<?php echo $row['rec_id']; ?>">Edit</a> || <a style="color: blue;" class="visit" href="news_det.php?typ=blog&amp;id=<?php echo $row['rec_id']; ?>">Detail</a> || <a style="color: blue;" onclick="return confirm('Sure to Delete?')" href="del.php?id=<?php echo $row['rec_id']; ?>&amp;typ=news"><?php if($aid == $row['rec_id']) { echo "Delete"; }?></a></td>
        </tr>
        <?php
        $r++;
         }//end of the while loop that fetches the existing matters
        ?>
    </tbody>
</table>
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