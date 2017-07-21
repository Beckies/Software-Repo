<?php
/**
*  This is the API CLASS for processing most of the functionalities of the CAMPUSLOADED MOBILE APPLICATION
* 
*  (C) 2015 EZEKIEL ALIYU
*/
class CampusApi{
    //tables
    private $adverts = "adverts";
    private $assgrade = "assgrade";
    private $css = "cass";
    private $chat = "chat";
    private $commentlike = "commentlike";
    private $country = "country";
    private $courses = "courses";
    private $deparrment = "deparrment";
    private $excos = "excos";
    private $faculties = "faculties";
    private $faqs = "faqs";
    private $friends = "friends";
    private $instututions = "instututions";
    private $invite_status = "invite_status";
    private $levels = "levels";
    private $library = "library";
    private $logattempt = "logattempt";
    private $login_admin = "login_admin";
    private $members = "members";
    private $messages = "messages";
    private $news = "news";
    private $newscomments = "photos";
    private $pins = "pins";
    private $postcomments = "postcomments";
    private $postlike = "postlike";
    private $posts = "posts";
    private $reply = "reply";
    private $sbass = "sbass";
    private $siteinfo = "siteinfo";
    private $upload = "upload";
    private $userlogins = "userlogins";
    /*
    * Database connection object
    */
    private $mdb;
    
    // begin
    public function __construct($mydb){
        $this->mdb = $mydb;
    }
    
    // Login
    /**
    * This function performs User login confirmation
    * 
    * @param mixed $username
    * @param mixed $password
    */
    public function LoginUser($username,$password){
        // returns userid
        if($username !="" && $password !=""){
            $userdetail = $this->mdb->getrow_two("username",$username,"password",$password,$this->userlogins);
            if(!empty($userdetail) && $userdetail !=""){
                // check
                if($userdetail['username'] == $username && $userdetail['password'] == "$password"){
                    //before returning the ID, let us get the usertyp
                    $usertyp = $userdetail['usertyp'];
                    return $userdetail['uid']."-".$usertyp;
                }
                else{
                    return "INVALID_LOGIN_DETAILS";
                }
            }
            else{
                return "INVALID_LOGIN_DETAILS";
            }
        }
        else{
            $error = "INVALID_USER_LOGIN";
            return $error;
        }
    }
    
    
    //Add test Request
    /**
    * This function process addition of a Test request for a patient
    * 
    * @param mixed $userid
    * @param mixed $patientid
    * @param array $Requests
    */
    public function RegisterUser(array $Requests){
        // returns the requestid
        //request must be in this order
        // 0-Testname, 1-refClinic, 2-refcphone, 3-Email, 4-Amountpaid, 5-TestSamples, 6-Diagnosis, 7-Comment
        if(is_array($Requests)){
            // prepare data
            $n = 0;
            $acode=generate_code();
            $fld = "password,,firstname,,lastname,,phone,,email,,birthdate,,gender,,status,,acode";
            $vld = "$Requests[0],,$Requests[1],,$Requests[2],,$Requests[3],,$Requests[4],,$Requests[5],,$Requests[6],,$Requests[7],,$acode";
            // add 
            $aregister = $this->mdb->addlist($fld,$vld,$this->members);
            if(false!== $aregister && !empty($aregister)){
                $rid = $this->mdb->getLastid();
                //let us update the userlogin table
                $field1 = "uid,,email,,phone,,username,,password,,usertyp";
		$vals1 = "'$rid',,'$email',,'$phone',,'$email',,'$pass',,'MEMBER'";//remember to update the values to the correct one
                $this->mdb->addlist($field1,$vals1,$this->userlogins);
                return $rid;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    
    
    //List News
    /**
    * This fucntion provides an array list of all News or Event or even anything else based
    * on the type procided
    * This is useful for members and admin
    * @param mixed $typ
    */
    public function ListNews($typ,$schid,$did,$lid){
        // returns array of all available news based on typ
        if($typ !=""){
            $trequests = "";
            if($schid != ""){
            $trequests = $this->mdb->getallrow_two("schid",$schid,"ntype",$typ,$this->news);
            }
            else if($did != ""){
                $trequests = $this->mdb->getallrow_two("did",$did,"ntype",$typ,$this->news);                
            }
            else if($lid != ""){
                $trequests = $this->mdb->getallrow_two("lid",$lid,"ntype",$typ,$this->news);
            }
            else{
                $trequests = $this->mdb->getallrow("ntype",$typ,$this->news);                
            }
            if(!empty($trequests) && $trequests !=""){
                return $trequests;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }    
    
     //List testrequests
    /**
    * This fucntion provides an array list of all Comments for a particular news
    * 
    * @param mixed $nid This is the News Id
    */
    public function ListNewsComments($nid){
        // returns array of all available Patients for this Doctor/Clinic
        if($nid !=""){
            $trequests = $this->mdb->getallrow("newsid",$nid,$this->newscomments);             
            if(!empty($trequests) && $trequests !=""){
                return $trequests;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    
    //Add News Comment
    /**
    * This function process addition of a news based on typ
    * 
    * @param mixed $memberid
    * @param mixed $typ
    * @param array $Request
    */
    public function AddNews($memberid,$typ,$Request){
        // returns the requestid        
        if(($memberid !="" && $typ !="")){
            $d = date('Y-m-d');
            // prepare data
            $fld = "memberid,,title,,descp,,dates,,times,,adates,,atimes,,ntype,,venue,,adt,,picture,,price,,status";
            $vld = "$memberid,,$Request[0],,$Request[1],,'',,'','$d','$t','','','','','',''";
            // add 
            $arequest = $this->mdb->addlist($fld,$vld,$this->newscomments);
            if(false!== $arequest && !empty($arequest)){
                $rid = $this->mdb->getLastid();
                return $rid;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    
    //Add News Comment
    /**
    * This function process addition of a news Comment
    * 
    * @param mixed $nid
    * @param mixed $memberid
    * @param array $comment
    */
    public function AddNewsComments($nid,$memberid,$comment){
        // returns the requestid        
        if($memberid !="" && $nid !=""){
            $d = date('Y-m-d');
            // prepare data
            $fld = "newsid,,memberid,,dates,,comments";
            $vld = "$nid,,$memberid,,$d,,$comment";
            // add 
            $arequest = $this->mdb->addlist($fld,$vld,$this->newscomments);
            if(false!== $arequest && !empty($arequest)){
                $rid = $this->mdb->getLastid();
                return $rid;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    
    //List Schools
    /**
    * This fucntion provides an array list of all institutions on CamousLoaded
    * on the type procided
    * This is useful for members and admin
    * @param mixed $schid
    */
    public function ListSchools(){
        // returns array of all available institutions
                $trequests = $this->mdb->getallresult($this->institutions);           
            if(!empty($trequests) && $trequests !=""){
                return $trequests;
            }
            else{
                return false;
            }       
    }    
    
    //List Faculties
    /**
    * This fucntion provides an array list of all institutions on CamousLoaded
    * on the type procided
    * This is useful for members and admin
    * @param mixed $schid
    */
    public function ListFaculties($schid){
        // returns array of all available institutions
                $trequests = $this->mdb->getallrow("schid",$schid,$this->faculties);           
            if(!empty($trequests) && $trequests !=""){
                return $trequests;
            }
            else{
                return false;
            }       
    } 
    
    //List Departments
    /**
    * This fucntion provides an array list of all Departments on CampusLoaded
    * on the type procided
    * This is useful for members and admin
    * @param mixed $schid
    */
    public function ListDepartments($schid,$fid){
        // returns array of all available departmets
        $trequests = "";
        if($schid != ""){
            $trequests = $this->mdb->getallrow("schid",$schid,$this->departments);
        }
        else if($fid != ""){
            $trequests = $this->mdb->getallrow("facid",$fid,$this->departments);            
        }
                
            if(!empty($trequests) && $trequests !=""){
                return $trequests;
            }
            else{
                return false;
            }       
    } 
    
    //List Students
    /**
    * This fucntion provides an array list of all Students on CampusLoaded
    * on the type procided
    * This is useful for members and admin
    * @param mixed $schid
    */
    public function ListStudents($schid,$fid,$did){
        // returns array of all available institutions
        $trequests = "";
        if($schid != ""){
            $trequests = $this->mdb->getallrow("schid",$schid,$this->members);
        }
        else if($fid != ""){
            $trequests = $this->mdb->getallrow("facid",$fid,$this->members);            
        }
        else if($did != ""){
            $trequests = $this->mdb->getallrow("did",$did,$this->members);            
        }
                
            if(!empty($trequests) && $trequests !=""){
                return $trequests;
            }
            else{
                return false;
            }       
    } 
    
    //List Photos
    /**
    * This fucntion provides an array list of all a members photos
    * on the type procided
    * This is useful for members and admin
    * @param mixed $mid
    */
    public function ListMyPhotos($mid){
        // returns array of all available institutions
        $trequests = "";
        if($mid != ""){
            $trequests = $this->mdb->getallrow("member_id",$mid,$this->photos);
        }                
            if(!empty($trequests) && $trequests !=""){
                return $trequests;
            }
            else{
                return false;
            }       
    } 
    
    //List Friends
    /**
    * This fucntion provides an array list of all a members photos
    * on the type procided
    * This is useful for members and admin
    * @param mixed $mid
    */
    public function ListMyFriends($mid){
        // returns array of all available institutions
        $trequests = "";
        if($mid != ""){
            $trequests = $this->mdb->getrow_two("member_id",$mid,"friends_with","conf",$this->friends);
        }                
            if(!empty($trequests) && $trequests !=""){
                return $trequests;
            }
            else{
                return false;
            }       
    } 
    
    //Check Test result
    public function getTestResults($labnumber,$testcode){
        // returns result set
    }
    
    
  /*  // ADD TESTS
    public function AddTestRecord($patientid,$testrequestid,$testcategory,array $testrecords){
        // returns true on success
        
    }   */
}
?>
