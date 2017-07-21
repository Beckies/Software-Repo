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
if(@$_GET['typ'] != "all"){
$memid=@$_GET['id']; //this is also the FACID and it is also the DID and it is also the SCH ID
}
include_once('../pages/admin_header.php');
include_once('config.php');
if(isset($_GET['typp']) && $_GET['typp'] == "unconf"){
  $theid = @$_GET['id'];
  mysqli_query($con,"UPDATE members SET status='INACTIVE' WHERE member_id='$theid'") or die("Cannot perform the ipdate");
}//end of the if statement that says the status is unconf
else if(isset($_GET['typp']) && $_GET['typp'] == "conf"){
  $theid = @$_GET['id'];
  mysqli_query($con,"UPDATE members SET status='ACTIVE' WHERE member_id='$theid'") or die("Cannot perform the ipdate");
}//end of the if statement that says the status is unconf
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
        <h2>MEMBERS - </h2>
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
                                        <table id="example" class="display" cellspacing="0">
    <thead>
        <tr>
            <th>S/N</th>
            <th>NAME</th>
            <th>REFERER</th>
            <th>PHONE</th>
            <th>ACTION</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>S/N</th>
            <th>NAME</th>
            <th>REFERER</th>
            <th>PHONE</th>
            <th>ACTION</th>
        </tr>
    </tfoot>

    <tbody>
     <?php
     $r = 1;
	 if(isset($_GET['typ']) && $_GET['typ'] == "faculty"){
      $result = mysqli_query($con, "SELECT * FROM members WHERE facid='$memid' ORDER BY member_id desc") or die("Cannot get the Students details");
	  }
	  else if(@$_GET['typ'] == "dept"){
	     $result = mysqli_query($con, "SELECT * FROM members WHERE did='$memid' ORDER BY member_id desc") or die("Cannot get the Students details");
	  }
      else if(@$_GET['typ'] == "all"){
	     $result = mysqli_query($con, "SELECT * FROM members ORDER BY member_id desc") or die("Cannot get the Students details");
	  }
	  else{
		$result = mysqli_query($con, "SELECT * FROM members WHERE schid='$memid' ORDER BY member_id desc") or die("Cannot get the Students details");
	  }
      while($row = mysqli_fetch_array($result)){
      ?>
        <tr>
            <td><?php echo $r; ?>: (<?php if($row['status'] == "ACTIVE") echo "<a href='showstd.php?id=".$row['member_id']."&amp;typp=unconf&amp;typ=all'> DEACTIVATE</a>"; else { echo "<a href='showstd.php?id=".$row['member_id']."&amp;typp=conf&amp;typ=all'>ACTIVATE</a>"; } ?>)</td>
            <td><?php echo $row['firstname']." ". $row['lastname']; ?></td>
            <td><a href="sendtxt.php?id=<?php echo $row['referer']; ?>&amp;nme=<?php echo $ezzzy->getval("member_id",$row['referer'],"members","firstname"); ?>&amp;typ=std"><?php if($row['referer'] != 0) echo $ezzzy->getval("member_id",$row['referer'],"members","firstname"); ?></a></td>
            <td><?php echo $row['phone']; ?></td>
            <td style="color: "><a style="color: blue;" href="profile.php?id=<?php echo $row['member_id']; ?>&amp;typ=std">Detail</a> || <a style="color: blue;" href="addcredit.php?id=<?php echo $row['member_id']; ?>"></a><a style="color: blue;" href="sendemail.php?id=<?php echo $row['member_id']; ?>&amp;typ=inst"></a><a style="color: blue;" href="sendtxt.php?id=<?php echo $row['member_id']; ?>&amp;nme=<?php echo $row['firstname']; ?>&amp;typ=std"></a><a style="color: blue;" onclick="return confirm('Sure to Delete?')" href="del.php?id=<?php echo $row['member_id']; ?>&amp;typ=std">Delete</a></td>
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