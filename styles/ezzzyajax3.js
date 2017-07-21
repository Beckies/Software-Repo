//yes we are using u
function DoAccept(str){
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
      alert('You have accepted the request');
      document.getElementById('theaccp').innerHTML=xmlhttp.responseText;
      //document.getElementById('mid').value=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getaccept.php?id="+str,true);
  xmlhttp.send();
}