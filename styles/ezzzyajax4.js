$(document).ready(function()
{
$(".comment_submit").click(function(){
var element = $(this);
var Id = element.attr("id");
var test = $("#textboxcontent"+Id).val();
var dataString = 'thecore='+ test + '&com_msgid=' + Id;
if(test=='')
{
  //alert(Id);
alert("Please Enter Some Text");
}
else
{
$("#flash"+Id).show();
$("#flash"+Id).fadeIn(400).html('<img src="../images/ajax-loader.gif" align="absmiddle"> loading.....');
$.ajax({
type: "POST",
url: "getcomment.php",
data: dataString,
cache: false,
target:   '#thecorep'+Id,
success: function(html){
//$("#idnameofdiv").val("");
document.getElementById('textboxcontent'+Id).value='';
//$("#thecorep"+Id).append(html); //I only Need to uncomment this one for auto refresh of the particular post
$("#thecorep"+Id).html(html); //I only Need to uncomment this one for auto refresh of the particular post
//$("#flash"+Id).hide();
//$("#textboxcontent"+Id).value = "";
}
});
}return false;});});