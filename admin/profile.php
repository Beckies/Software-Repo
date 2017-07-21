<?php
session_name("Admin");
session_start(); //Start the current session
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YESS"){
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  include_once('../pages/login.php');
  exit;
}
$mytitle = ":: ADMIN";
$id=$_GET['id'];
$typ=$_GET['typ'];
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
        <h2>PROFILE - </h2>
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
		 <h4>PROFILE</h4>
							  <script type="text/javascript">
                                 $(document).ready(function() {
                                      $('#example').DataTable();
                                  } );
                                </script>
                                        <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </tfoot>

    <tbody>
    <?php
      if($typ == "std"){
        $row = $ezzzy->getrow("member_id",$id,"members");
    ?>
        <tr style="">
            <td>FULL NAME: </td>
            <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
        </tr>
        <tr style="">
            <td>SEX: </td>
            <td><?php echo $row['gender']; ?></td>
        </tr>
        <tr style="">
            <td>PHONE: </td>
            <td><?php echo $row['phone']; ?></td>
        </tr>
        <tr style=" ">
            <td>EMAIL: </td>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <tr style=" ">
            <td>USERNAME: </td>
            <td><?php echo $row['username']; ?></td>
        </tr>
        <tr style=" ">
            <td>PASSWORD: </td>
            <td><?php echo $row['password']; ?></td>
        </tr>
        <tr style=" ">
            <td>ADDRESS: </td>
            <td><?php echo $row['address']; ?></td>
        </tr>
        <tr style=" ">
            <td>BIRTHDATE: </td>
            <td><?php echo $row['birthdate']; ?></td>
        </tr>        
        <?php
         }//end of the if statement that says we are viewing the profile of a student
         else if($typ == "excoooooo"){
           $row = $ezzzy->getrow("rec_id",$id,"excos");
           if($row['picture'] !=""){
        ?>
        <tr style=" ">
           <td>&nbsp;</td>
            <td><img width="300" height="400" src="<?php echo "../admin/". $row['picture']; ?>" /></td>
        </tr>
        <?php } ?>
        <tr style=" ">
            <td>FULL NAME: </td>
            <td><?php echo $row['name']; ?></td>
        </tr>
        <tr style=" ">
            <td>SEX: </td>
            <td><?php echo $row['sex']; ?></td>
        </tr>
        <tr style=" ">
            <td>PHONE: </td>
            <td><?php echo $row['phone']; ?></td>
        </tr>
        <tr style=" ">
            <td>EMAIL: </td>
            <td><?php echo $row['mail']; ?></td>
        </tr>
        <tr style=" ">
            <td>OFFICE: </td>
            <td><?php echo $row['portfolio']; ?></td>
        </tr>
        <tr style=" ">
            <td>DEPARTMENT: </td>
            <td><?php echo $ezzzy->getval("rec_id",$did,"departments","deptname"); ?></td>
        </tr>
        <?php
         }//end of the else statement that says we are viewing the profile of an exco
         else if($typ == "exco"){
        ?>
        <tr style=" ">
            <td>FULL NAME: </td>
            <td><?php echo $row['name']; ?></td>
        </tr>
        <tr style=" ">
            <td>SEX: </td>
            <td><?php echo $row['sex']; ?></td>
        </tr>
        <tr style=" ">
            <td>PHONE: </td>
            <td><?php echo $row['phone']; ?></td>
        </tr>
        <tr style=" ">
            <td>EMAIL: </td>
            <td><?php echo $row['mail']; ?></td>
        </tr>
        <tr style=" ">
            <td>OFFICE: </td>
            <td><?php echo $row['portfolio']; ?></td>
        </tr>
        <tr style=" ">
            <td>DEPARTMENT: </td>
            <td><?php echo $ezzzy->getval("rec_id",$did,"departments","deptname"); ?></td>
        </tr>
        <?php
         }//end of the else statement that says we are viewing the profile of a lecturer
         else{
           display_error("Oops!! You have made a very wrong move");
         }
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