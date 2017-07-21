/*
//This Function processes all window openings in the HOSMAP Program
//Written By: Olowoyo Samuel
//Samoltech Studios Limited
*/
// Function Lists

function OpenNew(page,targetname,itswidth,itsheight,itsleft,itstop)
{
	var nW = itswidth;
    var nLt = itsleft;
	var nTp = itstop;
	var nH = itsheight;
	var windowprops = "left=" + nLt + ",top=" + nTp + ",width=" + nW + ",height=" + nH + ",status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,directories=no,location=no";
	var newwin;
    newwin = window.open(page,targetname,windowprops);
    newwin.focus();
}

function SetValues(Form, CheckBox, Value,fld,fldb)
{
        var objCheckBoxes = document.forms[Form].elements[CheckBox];
        var countCheckBoxes = objCheckBoxes.length;
        for(var i = 0; i < countCheckBoxes; i++){
            objCheckBoxes[i].checked = Value;
        }
        if (fld.checked == true) {
            fld.checked = false
        }
        if (fldb.checked == true) {
            fldb.checked = false
        }
}

/*
Function to add template words into the template textbox
*/
function addCustom(Form, txarea, itsvalue) {
    txarea.value += itsvalue;
    Countit(Form, 160);
    txarea.focus();
}

function Countit(Form, maxlimit) {
    var field = document.forms[Form].Template;
    var cntfield = document.forms[Form].CharsLeft
    if (field.value.length > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
    }
    // otherwise, update 'characters left' counter
    else
    cntfield.value = maxlimit - field.value.length;
}

function Countita(Form, maxlimit) {
    var field = document.forms[Form].Details;
    var cntfield = document.forms[Form].CharsLeft
    var spc = CountChar(field);
     flen = field.value.length+spc;
    // COUNT TOTAL MESSAGES
    var Msgs = 1;
    var MsgLength = flen;
    if (MsgLength <= 765){Msgs = 5}
    if (MsgLength <= 612){Msgs = 4}
    if (MsgLength <= 459){Msgs = 3}
    if (MsgLength <= 306){Msgs = 2}
    if (MsgLength <= 160){Msgs = 1}
    if (flen > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
    }
    // otherwise, update 'characters left' counter
    else{
    cntfield.value = maxlimit - flen + " (Total SMS : " + Msgs + " )";
    }
}

/**
* This function takes care of special character counting in text messages
* 
*/
function CountChar(field)
      {
         var extraChars = 0;
         //var msgCount = 0;

      for (var i = 0; (i < field.value.length); i++) {
           if ((field.value.charAt(i) >= '0') && (field.value.charAt(i) <= '9')) {
           }
           else if ((field.value.charAt(i) >= 'A') && (field.value.charAt(i) <= 'Z')) {
           }
           else if ((field.value.charAt(i) >= 'a') && (field.value.charAt(i) <= 'z')) {
           }
           else if (field.value.charAt(i) == '@') {
           }
           else if (field.value.charAt(i) == '?') {
           }
           else if (field.value.charAt(i) == '$') {
           }
           else if (field.value.charAt(i) == '?') {
           }
           else if (field.value.charCodeAt(i) == 0xE8) {
           }
           else if (field.value.charCodeAt(i) == 0xE9) {
           }
           else if (field.value.charCodeAt(i) == 0xF9) {
           }
           else if (field.value.charCodeAt(i) == 0xEC) {
           }
           else if (field.value.charCodeAt(i) == 0xF2) {
           }
           else if (field.value.charCodeAt(i) == 0xC7) {
           }
           else if (field.value.charAt(i) == '\r') {
           }
           else if (field.value.charAt(i) == '\n') {
            if (navigator.appName == "Netscape"){
            extraChars++;
            }
           }
           else if (field.value.charCodeAt(i) == 0xD8) {
           }
           else if (field.value.charCodeAt(i) == 0xF8) {
           }
           else if (field.value.charCodeAt(i) == 0xC5) {
           }
           else if (field.value.charCodeAt(i) == 0xE5) {
           }
           else if (field.value.charCodeAt(i) == 0x394) {
           }
           else if (field.value.charAt(i) == '_') {
           }
           else if (field.value.charCodeAt(i) == 0x3A6) {
           }
           else if (field.value.charCodeAt(i) == 0x393) {
           }
           else if (field.value.charCodeAt(i) == 0x39B) {
           }
           else if (field.value.charCodeAt(i) == 0x3A9) {
           }
           else if (field.value.charCodeAt(i) == 0x3A0) {
           }
           else if (field.value.charCodeAt(i) == 0x3A8) {
           }
           else if (field.value.charCodeAt(i) == 0x3A3) {
           }
           else if (field.value.charCodeAt(i) == 0x398) {
           }
           else if (field.value.charCodeAt(i) == 0x39E) {
           }
           else if (field.value.charCodeAt(i) == 0xC6) {
           }
           else if (field.value.charCodeAt(i) == 0xE6) {
           }
           else if (field.value.charCodeAt(i) == 0xDF) {
           }
           else if (field.value.charCodeAt(i) == 0xC9) {
           }
           else if (field.value.charAt(i) == ' ') {
           }
           else if (field.value.charAt(i) == '!') {
           }
           else if (field.value.charAt(i) == '\"') {
           }
           else if (field.value.charAt(i) == '#') {
           }
           else if (field.value.charCodeAt(i) == 0xA4) {
           }
           else if (field.value.charAt(i) == '%') {
           }
           else if (field.value.charAt(i) == '&') {
           }
           else if (field.value.charAt(i) == '\'') {
           }
           else if (field.value.charAt(i) == '(') {
           }
           else if (field.value.charAt(i) == ')') {
           }
           else if (field.value.charAt(i) == '*') {
           }
           else if (field.value.charAt(i) == '+') {
           }
           else if (field.value.charAt(i) == ',') {
           }
           else if (field.value.charAt(i) == '-') {
           }
           else if (field.value.charAt(i) == '.') {
           }
           else if (field.value.charAt(i) == '/') {
           }
           else if (field.value.charAt(i) == ':') {
           }
           else if (field.value.charAt(i) == ';') {
           }
           else if (field.value.charAt(i) == '<') {
           }
           else if (field.value.charAt(i) == '=') {
           }
           else if (field.value.charAt(i) == '>') {
           }
           else if (field.value.charAt(i) == '?') {
           }
           else if (field.value.charCodeAt(i) == 0xA1) {
           }
           else if (field.value.charCodeAt(i) == 0xC4) {
           }
           else if (field.value.charCodeAt(i) == 0xD6) {
           }
           else if (field.value.charCodeAt(i) == 0xD1) {
           }
           else if (field.value.charCodeAt(i) == 0xDC) {
           }
           else if (field.value.charCodeAt(i) == 0xA7) {
           }
           else if (field.value.charCodeAt(i) == 0xBF) {
           }
           else if (field.value.charCodeAt(i) == 0xE4) {
           }
           else if (field.value.charCodeAt(i) == 0xF6) {
           }
           else if (field.value.charCodeAt(i) == 0xF1) {
           }
           else if (field.value.charCodeAt(i) == 0xFC) {
           }
           else if (field.value.charCodeAt(i) == 0xE0) {
           }
           else if (field.value.charCodeAt(i) == 0x391) {
           }
           else if (field.value.charCodeAt(i) == 0x392) {
           }
           else if (field.value.charCodeAt(i) == 0x395) {
           }
           else if (field.value.charCodeAt(i) == 0x396) {
           }
           else if (field.value.charCodeAt(i) == 0x397) {
           }
           else if (field.value.charCodeAt(i) == 0x399) {
           }
           else if (field.value.charCodeAt(i) == 0x39A) {
           }
           else if (field.value.charCodeAt(i) == 0x39C) {
           }
           else if (field.value.charCodeAt(i) == 0x39D) {
           }
           else if (field.value.charCodeAt(i) == 0x39F) {
           }
           else if (field.value.charCodeAt(i) == 0x3A1) {
           }
           else if (field.value.charCodeAt(i) == 0x3A4) {
           }
           else if (field.value.charCodeAt(i) == 0x3A5) {
           }
           else if (field.value.charCodeAt(i) == 0x3A7) {
           }
           /*else if (field.value.charCodeAt(i) == 0xA) {
              extraChars++;
           }
           else if (field.value.charCodeAt(i) == 0xD) {
              extraChars++;
           }*/
           else if (field.value.charAt(i) == '^') {
             extraChars++;
           }
           else if (field.value.charAt(i) == '{') {
             extraChars++;
           }
           else if (field.value.charAt(i) == '}') {
             extraChars++;
           }
           else if (field.value.charAt(i) == '\\') {
             extraChars++;
           }
           else if (field.value.charAt(i) == '[') {
             extraChars++;
           }
           else if (field.value.charAt(i) == '~') {
             extraChars++;
           }
           else if (field.value.charAt(i) == ']') {
             extraChars++;
           }
           else if (field.value.charAt(i) == '|') {
             extraChars++;
           }
           else if (field.value.charCodeAt(i) == 0x20AC) {
             extraChars++;
           }
           else {
             //unicodeFlag = 1;
           }
         }
         
         return  extraChars;
      }

  /**
  * Function to trim values
  */
   function dotrim(str)
      {
         return str.replace(/^\s+|\s+$/g,'');
      }

