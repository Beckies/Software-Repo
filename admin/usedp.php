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
        <h2>UNUSED PINS - </h2>
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
            <h4>USED PINS</h4>
							  <script type="text/javascript">
                                 $(document).ready(function() {
                                      $('#example').DataTable();
                                  } );
                                </script>
                                        <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S/N</th>
            <th>PIN</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>S/N</th>
            <th>PIN</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </tfoot>

    <tbody>
     <?php
     $r = 1;
      $result=mysqli_query($con,"SELECT * FROM pins WHERE status='USED' ORDER BY rec_id desc") or die("Cannot get the FAQS");
      while($row=mysqli_fetch_array($result)){
      ?>
        <tr>
            <td><?php echo $r; ?></td>
            <td><?php echo $row['pin']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a onclick="return confirm('Sure to Delete?')" href="del.php?id=<?php echo $row['rec_id']; ?>&amp;typ=pin">Delete</a></td>
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