<?php
 // Function to post delivery
function doPostsms($builddata,$url)
{ 
   $tparams = array('http' => array(
                  'method' => 'POST',
                  'content' => $builddata
               ));
   $ctx = stream_context_create($tparams); 
   $fp = @fopen($url, 'rb', false, $ctx);
   if (!$fp) {
      throw new Exception("Problem with $url, $php_errormsg");
   }
   $_response = "";
   while ($line = fread($fp, 1024)){
      $_response .= $line;
   } 
   fclose($fp);
   $tresponse = $_response;
  // echo "<br /> doPost Response " . $_response;
    return $tresponse;
}
// function to send  
function SendMSG($username,$password,$sender,$message,$mtype,$mob_numbers)
{
       //action
       $action ="send";
       $dreport = 1;
       $tdatatosend = array(
        "action" => $action,
        "username" => $username,
        "password" => $password,
        "msgtype" => $mtype,
        "dlr" => $dreport,
        "phones" => $mob_numbers,
        "sender" => $sender,
        "message" => $message
        );
      $bdata = http_build_query($tdatatosend);
      // url
      $_url = "http://www.business-sms.co.uk/httpapi/bizsmsapi.php";
     // echo "BDATA ". $bdata ." <br />";
      //send 
      return doPostsms($bdata,$_url);
}

   /**
    * Function to interprete response from server
    * 
    * @param mixed $response
    * @param mixed $ercode
    * @param mixed $mobno
    * @param mixed $msgid
    */
    function doResponse($response,$ercode,$mobno,$msgid)
    {
      //get response array into different groups and create a new array out of it
      //1. create a new arrays
      $final = array();
      if(empty($response) || $response =="" || $response ==" ")
      {
         return;
      }
      //$response = 700#2348034530294:199290339
      //2. Define separators
      $sep1 = "#";
      $sep2 = ":";
      // get the error code
         $err_code = explode($sep1,$response);   // 700  =>  2348034530294:199290339
         $mob_id = explode($sep2,$err_code[1]);  // 2348034530294  =>  199290339
         $final[$ercode] = $err_code[0];
         $final[$mobno] = $mob_id[0];
         $final[$msgid] = $mob_id[1];
    
      return $final;
    }
    
/**
  * Function name: addctcode
  * This replaces the first 0 of a mobile number with the 234 for Nigeria
  * 
  * @param string Phoneno
  * @param string country code
  * @returns string country_coded_number
  */
 function addctcode($phone,$code)
 {
    // remove initial 0
    // remove any white space first                 2348034530294
    $phonea = trim($phone);
    // if phone already has +
    $ncode = "+".$code;
    // check phone lenght maxx 11
    if(strlen($phonea) == 13 && substr($phonea,0,3) == $code)
    {
       // 234 already added?
         $newphone = $phonea;
    }
    elseif(strlen($phonea) == 14 && substr($phonea,0,3) == $code)
    {
        // like 23408034530294
        $np = substr($phonea,4);
        $newphone = $code . $np;
    }
    elseif(strlen($phonea) == 14 && substr($phonea,0,4) == $ncode)
    {
        // like +2348034530294
        $np = substr($phonea,4);
        $newphone = $code . $np;
    }
    elseif(strlen($phonea) == 15 && substr($phonea,0,4) == $ncode)
    {
        // like +23408034530294
        $np = substr($phonea,5);
        $newphone = $code . $np;
    }
    else
    {
         $np = substr($phonea, 1);
         $newphone = $code . $np;
    }
    return $newphone;
 } 
?>
