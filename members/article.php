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
if(isset($_POST['article'])){
								//let us include all necessary files
								$typ = $_GET['typ'];
								 require_once("../functions/ezzzy_function.php");
								 //let us get the parsed variables
								 if($typ == "new"){
								 $tit = mysqli_real_escape_string($con, $_POST['title']);
								 $desc = mysqli_real_escape_string($con, $_POST['desc']);
								 //$time = cleana($_POST['hr'] .":". $_POST['mn']);//this is the event time
								 //$dob=$_POST['yr']."-".$_POST['mnt']."-".$_POST['da'];//this is the event day
								 $ad=date('Y-m-d');
								 $at=prepdate(time('h-i-s'));
								 $adt=prepdate(time());
								 //$ven = mysqli_real_escape_string($con, $_POST['venue']);
								 //let is do some processing
								 //let us check if the required fields are empty
								 if($tit == "" || $desc ==""){
								   display_error("All fields are required please");
								 }
								 else{
								   //all is now well
								   $result = mysqli_query($con, "INSERT INTO news(memberid,title,descp,adates,atimes,ntype,adt)
								   VALUES('$member_id','$tit','$desc','$ad','$at','ARTICLE','$adt')") or die(display_error("Cannot insert the record into the database"));
								   if($result){
									 $mssg = "Your Article Was added Successfully";
								   }
								 }
								 }//end of the if statement that checkis if it is a new entry
								 else if($typ == "edit"){
								   //what if we are editing?
								 $tit = mysqli_real_escape_string($con, $_POST['title']);
								 $desc = mysqli_real_escape_string($con, $_POST['desc']);
								 $rec = mysqli_real_escape_string($con, $_POST['rec']);
								 //$time = cleana($_POST['hr'] .":". $_POST['mn']);//this is the event time
								 //$dob=$_POST['yr']."-".$_POST['mnt']."-".$_POST['da'];//this is the event day
								 $ad=date('Y-m-d');
								 $at=time('h-i-s');
								 //$ven = mysqli_real_escape_string($con, $_POST['venue']);
								 //let is do some processing
								 //let us check if the required fields are empty
								 if($tit == "" || $desc =="")
								  {
								   display_error("All fields are required please");
								  }
								   else{
									 //all is now well
									 //include_once('config.php');
								   $result = mysqli_query($con, "UPDATE news SET title='$tit',descp='$desc' WHERE rec_id='$rec'") or die(display_error("Cannot update the record to the database"));
								   if($result){
									// $meid=mysql_insert_id();
									 //mysqli_query("UPDATE userlogins SET usertypedept='DEPARTMENT' WHERE rec_id='$irec'") or die("Cannot add to the user table");
									 $mssg = "Your Article Was updated Successfully";
								   }
								   }
								 }//end of the else statement that checks if we are actually editing

}//end of the if ststememnt that checks if the form is ever submitted
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
                                <div class="panel-body">
                                    <ul class="breadcrumb">
                                        <li><a href="./?lnk=articles"><i class="icon-archive"></i>See All Articles</a></li>
                                    </ul>
                                    <div class="row clearfix-space10"></div>
                                <?php if(isset($mssg)){ ezzzy_msg("Success",$mssg,"2000"); } ?>
								<form method="post" action="./?lnk=article&typ=new">
								<div class="form-group">
                                                                    <label>Title</label> <br />
                                                                    <input type="text" placeholder="Title" name="title" class="input-sm form-control"> </div>
								<div class="form-group">
								<label>Article</label> <br />
								<textarea id="text1" name="desc" placeholder="Share you article" rows="5" data-trigger="keyup" data-rangelength="[20,200]" class="form-control"></textarea>
                                                <script language="javascript1.2">
                                                    generate_wysiwyg('text1');
                                                </script>
								 </div>
								<div class="m-t-lg">
								<button class="btn small color1" name="article">Add Article</button>
								</div>
								</form>
				</div>
                                    <!-- /This is my main content -->
                                </section>
                                
                            </div> 
                            
                            <?php include_once('../pages/mfooter.php'); ?>