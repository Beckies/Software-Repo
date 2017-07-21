//yes we are using u
$(document).ready(function()
{
$(".pro_submit").click(function(){
var element = $(this);
var Id = element.attr("id");
var fname = $("#fname").val();
var lname = $("#lname").val();
var nname = $("#nname").val();
var desc = $("#desc").val();
var datetime1 = $("#datetime").val();
var prisch = $("#prisch").val();
var datetime2 = $("#datetime").val();
var highschool = $("#highschool").val();
var datetime3 = $("#datetime").val();
var facass = $("#facass").val();
var detass = $("#detass").val();
var stass = $("#stass").val();
var fplans = $("#fplans").val();
var movies = $("#movies").val();
var music = $("#music").val();
var video = $("#video").val();
var mentor = $("#mentor").val();
var hobbies = $("#hobbies").val();
var interest = $("#interest").val();
var phone = $("#phone").val();
//var dataString = 'thecore='+ test + '&com_msgid=' + Id;
var dataString = 'fname='+fname+'&lname='+lname+'&nname='+nname+'&phone='+phone+'&desc='+desc+'&datetime='+datetime1+'&prisch='+prisch+'&datetime='+datetime2+'&highschool='+highschool+'&datetime='+datetime3+'&facass='+facass+'&detass='+detass+'&stass='+stass+'&fplans='+fplans+'&movies='+movies+'&music='+music+'&video='+video+'&mentor='+mentor+'&hobbies='+hobbies+'&interest='+interest+'&frmid=frm'+Id;
if(nname=='')
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
url: "getpupdate.php",
data: dataString,
cache: false,
//target:   '#thecorep'+Id,
success: function(html){

document.getElementById('textboxcontent'+Id).value='';

$("#frm"+Id).html(html); //I only Need to uncomment this one for auto refresh of the particular post

}
});
}return false;});});