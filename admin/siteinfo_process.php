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
?>      <!-- end: Quick Help -->

    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>
<!-- Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>SITE INFORMATION</h2>
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
           <?php
								//let us include all necessary files
								include_once('config.php');
              $mysam = new SamMysql($con);
              $page=$_POST['pagee'];
              $table="siteinfo";
              if($page == ''){
                display_error('You must select a page to edit');
              }//end of if null value was sent
              else{
                //if all is well
                //let us check if the page has been added before
                //if it has not been added let us display the form for new information
                if ($mysam->getrow("page",$page,$table) == 0){
                  //if it has not been added let us display the form for new information
                //if($page == 'about'){
                  ?>
                  	<form enctype="multipart/form-data" action="siteinfo_.php?do=new" method="post" onsubmit="return checkb(this)">
                           <input type="hidden" name="pagg" value="<?php echo $page; ?>" />
     						 <table border="0" cellpadding="1" cellspacing="0" width="500" align="center">
					           <tr><th align="center">Add Site Information</th></tr>
							   <tr><td>
                               <div><label for="title">Title </label> <input class="txt form-control" type="text" name="title"></div>
					           <div><label for="text1"> Detail Information</label><textarea class="form-control" id="text1" name="parag1"> </textarea>
								<script language="javascript1.2">
								  generate_wysiwyg('text1');
								</script>
							   </div>
							   <br />

							  <div> <input class="btn small color1" type="submit" name="Submit" value="Add" id="btnSubmit" onmouseover="btnSubmit.style.color='#FFFFFF';"
                                    onmouseout="btnSubmit.style.color='';" />
                                    <input class="btn small color1" type="reset" value=" Reset " id="btnReset" onmouseover="btnReset.style.color='#FF0011';" onmouseout="btnReset.style.color='';"/>
                             </div>
					         </td></tr>
					        </table>
					        	<script type="text/javascript">
					            // <--
					                function checkb(form){
					                	if (form.parag1.value ==''){
					                		alert('Please type or copy and paste the information for this page');
					                		form.parag1.focus();
					                		return false;
					                	}
					                	if (form.pict.value =='' && form.title1.value !='' ){
					                		alert('Please select the picture you want to add so that you can upload it');
					                		form.pict.focus();
					                		return false;
					                	}
					                	return true;
					                }
					            // -->
					            </script>
					        </form>
                            <?php
                } // end of if page selected is equal to 'about us' and case new information
                else if($mysam->getrow("page",$page,$table)){
                // page already exists, display edit form
         			 	$catdetail = $mysam->getrow("page",$page,$table);
         			 	$pageid = $mysam->getval("page",$page,$table,"rec_id");
                     ?>
                      <form enctype="multipart/form-data" action="siteinfo_.php?do=edit" method="post" onsubmit="return checkb(this)">
                                   <input type="hidden" name="ID" value="<?php echo $pageid; ?>">
     						 <table border="0" cellpadding="1" cellspacing="0" width="500" align="center">
					           <tr><th align="center">Add Site Information</th></tr>
							   <tr><td>
                               <div><label for="title">Title </label> <input class="txt form-control" type="text" name="title"></div>
					           <div><label for="text1"> Detail Information</label><textarea class="form-control" id="text1" name="parag1"><?php echo $catdetail['detail']; ?> </textarea>
								<script language="javascript1.2">
								  generate_wysiwyg('text1');
								</script>
							   </div>
								<br />
							  <div> <input type="submit" class="btn small color1" name="Submit" value=" Add " id="btnSubmit" onmouseover="btnSubmit.style.color='#FFFFFF';"
                                    onmouseout="btnSubmit.style.color='';" />
                                    <input type="reset" class="btn small color1" value=" Reset " id="btnReset" onmouseover="btnReset.style.color='#FF0011';" onmouseout="btnReset.style.color='';"/>
                             </div>
					         </td></tr>
					        </table>
					        	<script type="text/javascript">
					            // <--
					                function checkb(form){
					                	if (form.parag1.value ==''){
					                		alert('Please type or copy and paste the information for this page');
					                		form.parag1.focus();
					                		return false;
					                	}
					                	if (form.pict.value =='' && form.title1.value !='' ){
					                		alert('Please select the picture you want to add so that you can upload it');
					                		form.pict.focus();
					                		return false;
					                	}
					                	return true;
					                }
					            // -->
					            </script>
					        </form>
                            <?php
                } // end of else if page selected is equal to 'about us' and displayed for editting
                 /******************************************************************************************/
                  }//end of if a ll is well
								?>
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