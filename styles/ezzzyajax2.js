$(document).ready(function processForm(formId,thefield) {
  //let us get the post id;
  var thepostid = $('#thepostid').val();
	var options = {
			target:   '#thecorep'+thepostid,   // target element(s) to be updated with server response
			beforeSubmit:  beforeSubmit,  // pre-submit callback
			success:       afterSuccess,  // post-submit callback
			uploadProgress: OnProgress, //upload progress callback
			resetForm: true        // reset the form after successful submit
		};

	 $(formId).submit(function() {
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

		if( !$(thefield).val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
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
    $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
    $('#statustxt').html(percentComplete + '%'); //update status text
    if(percentComplete>50)
        {
            $('#statustxt').css('color','#000'); //change status text to white after 50%
        }
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

});

/*function processForm(formId){
  //my validation Code Here
  $.ajax(
  {
    type: 'POST',
    url: getcomment.php,
    data: $("#"+formId).serialize(),
    success: function(data){
      $('#thecorep').html(data)
    }
  });
}*/