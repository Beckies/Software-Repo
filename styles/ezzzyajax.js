//yes we are using you
function showFac(str){
  if(str == ""){
    document.getElementById('schname').value="";
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
      document.getElementById('factname').innerHTML=xmlhttp.responseText;
      //document.getElementById('mid').value=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getfac.php?q="+str,true);
  xmlhttp.send();
}

function showDep(str){
  if(str == ""){
    document.getElementById('factname').value="";
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
      document.getElementById('deptname').innerHTML=xmlhttp.responseText;
      //document.getElementById('mid').value=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getdep.php?h="+str,true);
  xmlhttp.send();
}