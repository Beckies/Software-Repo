//yes we are using u
function DoLike(str){
  if(str == ""){
    document.getElementById('thek'+str).value="";
    //document.getElementById('mid').value="";
    return;
  }
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest()
  }
  else{
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      document.getElementById('thek'+str).innerHTML=xmlhttp.responseText;
      //document.getElementById('mid').value=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getlike.php?id="+str,true);
  xmlhttp.send();
}