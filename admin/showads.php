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
        <h2>SHOWING ADVERTS - </h2>
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
            <th>DESCRIPTION</th>
            <th>ACTION</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>S/N</th>
            <th>TITLE</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
    <tbody>
     <?php
     include_once('config.php');
     $r = 1;
     if($typ == "news"){
      $result = mysqli_query($con,"SELECT * FROM news WHERE ntype='NEWS' ORDER BY adates") or die("Cannot get the News");
      }
      else if($typ == "event"){
        $result = mysqli_query($con,"SELECT * FROM news WHERE ntype='EVENTS' ORDER BY adates") or die("Cannot get the News");
      }
      else if($typ == "ads"){
        $result = mysqli_query($con,"SELECT * FROM news WHERE ntype='ADVERT' ORDER BY adates") or die("Cannot get the News");
      }
      else{
        display_error("You have made the wrong move");
      }
      while($row = mysqli_fetch_array($result)){
      ?>
        <tr>
            <td><?php echo $r; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['descp']; ?></td>
            <td><a href="editnews.php?id=<?php echo $row['rec_id']; ?>">Edit</a> || <a class="visit" href="news_det.php?typ=news">Detail</a> || <a onclick="return confirm('Sure to Delete?')" href="del.php?id=<?php echo $row['rec_id']; ?>&amp;typ=news">Delete</a></td>
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