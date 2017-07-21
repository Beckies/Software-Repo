//yes we are using u
function DoRequest(str){
  /*if(str == ""){
    document.getElementById('f'+str).value="";
    //document.getElementById('mid').value="";
    return;
  }*/
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest()
  }
  else{
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      alert('Request Sent');
      document.getElementById('thefd').innerHTML=xmlhttp.responseText;
      //document.getElementById('mid').value=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getfriendreq.php?id="+str,true);
  xmlhttp.send();
}