<?php
session_name("Members");
session_start();
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YES")
{
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  include_once('../admin/index.php');
  exit;
}
$mytitle = "Add Product :: ";
$member_id=$_SESSION['stdid'];
include_once('../pages/mem_header.php');
if(isset($_POST['article'])){
								//let us include all necessary files
								$typ = $_GET['typ'];
                                $target="../admin/pic";
								 require_once("../functions/ezzzy_function.php");
								 //let us get the parsed variables
								 if($typ == "new"){
								 $tit = mysqli_real_escape_string($con, $_POST['title']);
								 $pri = mysqli_real_escape_string($con, $_POST['price']);
								 $desc = mysqli_real_escape_string($con, $_POST['desc']);
								 $ad=date('Y-m-d');
								 $at=prepdate(time('h-i-s'));
								 $adt=prepdate(time());
								 //let is do some processing
								 //let us check if the required fields are empty
								 if($tit == "" || $desc == "" || $pri == ""){
								   display_error("All fields are required please");
								 }
								 else{
								   //all is now well
                                   /****************************************************************************************/
                       if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
        			   $p = $_FILES['pic']['type'];
        			   $pi = explode("/",$p);
        			   if ($pi[0] != "image") {
        			   display_error("The file you want to upload can only be an image. To correct this please try to Edit the record");
        			   }
        			   $uiname = basename($_FILES['pic']['name']); // true name of image
                       // copy the temp document to the place for storage
                       move_uploaded_file($_FILES['pic']['tmp_name'], $target . "/" .$uiname);
                       //prepare document for database
                       // prepare new name for picture
                       $newpic = $uiname;
                       $filestore = $target ."/".$newpic;
                       $filest="pic/".$newpic;
                       if(!$filestore){
                       echo "picture not successfully uploaded".'<br />';//display_success("picture successfully uploaded");
                       }
                       /*********************************************************************************************/
                       $result = mysqli_query($con, "INSERT INTO news(memberid,title,descp,adates,atimes,ntype,adt,picture,price,status)
                       VALUES('$member_id','$tit','$desc','$ad','$at','MARKET','$adt','$filest','$pri','NEW')") or die(display_error("Cannot insert the record into the database"));
                       if(!$result)
                       {
                        die("Can't add record - page expire");
                       } else{
                        $mssg = "Your Product was added to the market successfully";
                       }
               }//end of if(is_uploaded)
               else{
                 display_error("Please, upload an image to continue");
               }
								 }//end of the else statement that says all is well
        }//end of the if statement that checkis if it is a new entry
								 else if($typ == "edit"){

								 }//end of the else statement that checks if we are actually editing

}//end of the if ststememnt that checks if the form is ever submitted
?>
<div class="void"></div>
<div class="void"></div>
<section id="content">
<section class="scrollable wrapper">
<div class="row">
<?php include_once('../pages/mem_leftside.php'); ?>
<div class="col-lg-5">
<section class="panel">
<div class="art-blockheader">
             <div class="l"></div>
             <div class="r"></div>
             <h3 class="ta">Add Item to the Market</h3>
             </div>
			 <ul class="breadcrumb">
			<li><a href="./?lnk=stores"><i class="icon-archive"></i>Goto Store</a></li>
			</ul><br /><br /><br />
			<div class="panel-body">
                        <?php if(isset($mssg)) ezzzy_msg("Success",$mssg,"3000"); ?>
						<form enctype="multipart/form-data" method="post" action="./?lnk=gomarket&typ=new">
							<div class="form-group"><input type="text" placeholder="Title" name="title" class="input-sm form-control" required/> </div>
							<small>Price should contain only numbers. e.g: 500, 2000, 4000 </small>
							<div class="form-group"><input type="number" placeholder="Starting Price/Price" name="price" class="input-sm form-control" required/> </div>
							<div class="form-group"> 
								<label>Description</label> <br />
								<textarea id="text1" name="desc" placeholder="Description" rows="1" data-trigger="keyup" data-rangelength="[20,200]" class="form-control"></textarea>
                                <script language="javascript1.2">
								  generate_wysiwyg('text1');
								</script>
								 </div>
							 <div class="media-body">
									<input type="file" name="pic" id="pic" title="Browse to upload Image" class="btn btn-sm btn-info m-b-sm" /><br />
									</div>
							<div class="m-t-lg">
								<button type="submit" class="btn small color1" name="article">Add</button>
								</div> 
						</form>
				</div>
							</section>		
</div>
<?php include_once('../pages/news_event.php'); ?>
</div>
</section> 
</section>
<?php  include_once('../pages/mem_footer.php');  ?> 
</body>
</html>