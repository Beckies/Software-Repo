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
<!-- Ezzzy Ajax Posting -->
<script type="text/javascript" src="../js/js/jquery.form.min.js"></script>
<script type="text/javascript">
//jc = jquery.noConflict();
$(document).ready(function() {
	var options = {
			target:   '#theco',   // target element(s) to be updated with server response
			beforeSubmit:  beforeSubmit,  // pre-submit callback
			success:       afterSuccess,  // post-submit callback
			uploadProgress: OnProgress, //upload progress callback
			resetForm: true        // reset the form after successful submit
		};

	 $('#MyUploadForm').submit(function() {
			$(this).ajaxSubmit(options);
			// always return false to prevent standard browser submit and page navigation
			return false;
		});


//function after succesful file upload (when server response)
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	$('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar
    //$("#output").html("Are you kidding me?");

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		if( !$('#title').val()) //check empty input filed
		{
			$("#output").html("Please Enter the title for this app");
			return false
		}
		if( !$('#desc').val()) //check empty input filed
		{
			//$("#output").html("Please provide a description for the app");
			//return false
		}
		//$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//progress bar function
function OnProgress(event, position, total, percentComplete)
{
    //Progress bar
	$('#progressbox').show();
    $('#progressbar').width(percentComplete + '%'); //update progressbar percent complete
    $('#statustxt').html(percentComplete + '%'); //update status text
    if(percentComplete>50)
        {
            $('#statustxt').css('color','#000'); //change status text to white after 50%
        }
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes === 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

});
</script>
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
        <h2>UPLOAD APP - </h2>
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
       <!-- This is the beginning of my mani content -->
       <form enctype="multipart/form-data" id="MyUploadFormm" method="post" action="us_process.php?typ=new">
                    <img src="../images/ajax-loader.gif" class="icon-spinner icon-spin" id="loading-img" style="display:none;" alt="Please Wait"/>
                    <div id="progressbox" ><div id="progressbar"></div ><div id="statustxt"></div></div>
                    <div id="output"></div>
                    <label class="small">App/Software Category: </label>
                     <select name="pcat" class="form-control">
                         <option value="">--Select One--</option>
                         <?php
                          $result = $ezzzy->getallresult("scat","title","A");
                          while($row = mysqli_fetch_array($result)){
                              ?>
                         <option value="<?php echo $row['rec_id']; ?>"><?php echo $row['title']; ?></option>                              
                              <?php
                          }
                         ?>
                     </select>
                    <label class="small">App/Software Title: </label>
                        <input type="text" value="" name="title" id="title" placeholder="App Title" class="input4">
                        <label class="small">Description: </label>                        
                        <textarea id="text1" name="desc" id="desc" cols="90" rows="10" placeholder="Description" class="form-control"></textarea>
                        <script language="javascript1.2">
                            generate_wysiwyg('text1');
			</script>
                        <label class="small">Cover Photo: </label>
                        <input type="file" name="pic" id="userImage" title="Browse to upload" class="user-image btn btn-sm btn-info m-b-sm" />
                        <label class="small">Upload app/Software: </label>
                        <input type="file" name="app" id="userImage" title="Browse to upload" class="user-image btn btn-sm btn-info m-b-sm" />
									<div class="row clearfix f-space20"></div>
                                                                        <button id="FormSubmitt" name="shareee" type="submit" class="btn small color1">Upload</button>
		</form>
       <!-- This is the Ending of my mani content -->
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
<?php include_once('../pages/foot.php');