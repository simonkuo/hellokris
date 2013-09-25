<?php 
   include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/config/main_config.php"); 
   session_start();

  // check if logged in 
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/LoginCheck.php");

  // check if has rights to access this page
  $urights = $_SESSION['urights'];
  if( !($urights & SCREENER_RIGHTS) )
  { // no admin rights
    header('Location: /mothersmilk/norights.php');
    exit(); 
  }

?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="/mothersmilk/css/main.css" />
 <title>Donor Screening</title>
<link rel="icon" 
      type="image/ico" 
      href="/mothersmilk/images/favicon.ico" />
</head>
<body>
<div id="pageContent">
<div id="header">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/HeaderHTML.php"); ?>
</div>
<div id="menu"></div>
<div id="messagebar">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/MessageBar.php"); ?>
</div>

<div id="content">
<?php 

include '../include/main.js'; 

?>

<h1 class="pageTitle">Donor Screening</h1>
<?php 


/*  Connect to Data Base */

$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);


// Next 4 lines generate the next donor number   

$result = mysqli_query($con,"SELECT MAX(donornumber) FROM screenertable"); 

$row = mysqli_fetch_row($result);
$lastnumber = $row[0];

$donornumber = $lastnumber + 1;  /* Next donor number  */

// Populate month - day - year

$appmm = (idate("m"));
$appdd = (idate("d"));
$appyy = (idate("Y"));

echo "<form action=\"dnrcnfrm.php?donornumber=$donornumber&ctype=2\" method=\"post\" onsubmit=\"return validate()\">\n";
echo "<fieldset class=\"sectiondisplay\">";
//echo "<br>";
//echo "<label>Donor Number:</label>&nbsp;&nbsp;" . "<span>" . $donornumber . "</span>";
echo "</br>\n";
echo "</br>\n";

?>

<label>Application Status:</label>&nbsp;&nbsp;&nbsp;

<select name="determinechoose" id="determinechoose" onchange="showme2('determinechoose','determine')">  
<!--<option value="N/A" >Please Select</option> -->   
<option value="A" >Applied or Awaiting</option>
<option value="P" >Passed Phone Screen</option>
<option value="NP" >No Passed Phone Screen</option>
<option value="F" >Failed</option>
<option value="D" >Donor Accepted</option>
<!-- <option value="C" >Closed</option>-->
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="determine" id="determine" style="display:none;position:relative;visibility:hidden;" value="" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  

<?php

echo "</br>\n";
echo "</br>\n";

echo "<label>Call Date:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
?>

<input type="int" name="dnrappmm" id="dnrappmm" size="2" maxlength="2" value="<?php echo $appmm ?>">
&nbsp;-&nbsp;<input type="int" name="dnrappdd" id="dnrappdd" size="2" maxlength="2" value="<?php echo $appdd ?>">
&nbsp;-&nbsp;<input type="int" name="dnrappyr" id="dbrappyr" size="4" maxlength="4" value="<?php echo $appyy ?>">


<?php
echo "</br>\n";
echo "<hr>";
echo "</br>\n";
?>
<div class="sectioncolumn twoColumnSection"> 
<label class="formDisplay">Organization:</label>

<select name="organization" id="organization" onchange="showme('organization','organizationother',4)">  
<option value="N/A" >Please Select</option>";
<option value="IND" >Individual</option>
<option value="STN" >Stanford</option>  
<option value="JHH" >John Hopkns</option>
<option value="OTH" >Other</option>
</select>
&nbsp;&nbsp;&nbsp;
<input type ="text" name="organizationother" id="organizationother" style="display:none;position:relative;visibility:hidden;" value="" size=20 maxlength=20>  

<?php
echo "</br>\n";
echo "<label class=\"formDisplay\">First Name:</label><input type=\"text\" name=\"donorfname\" id=\"donorfname\" size=\"25\" maxlength=\"20\" >";
echo "</br>\n";
echo "<label class=\"formDisplay\">Middle Name:</label><input type=\"text\" name=\"donormname\" id=\"donormname\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "<label class=\"formDisplay\">Last Name:</label><input type=\"text\" name=\"donorlname\" id=\"donorlname\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "<label class=\"formDisplay\">Also Known As:</label><input type=\"text\" name=\"donoraka\" id=\"donoraka\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "<label class=\"formDisplay\">Address:</label><input type=\"text\" name=\"address\" id=\"address\" size=\"25\" maxlength=\"20\">\n";
echo "<br><label class=\"formDisplay\">City:</label><input type=\"text\" name=\"city\" id=\"city\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "<label class=\"formDisplay\">State:</label><input type=\"text\" name=\"state\" id=\"state\" size=\"5\" maxlength=\"2\">\n";
echo "<br><label class=\"formDisplay\">Zip Code:</label><input type=\"text\" name=\"zip\" id=\"zip\" size=\"7\" maxlength=\"5\">\n";
echo "<br><label class=\"formDisplay\">Country:</label><input type=\"text\" name=\"country\" id=\"country\" size=\"20\" maxlength=\"15\" value=\"USA\">\n";
echo "</br>\n";

echo "<label class=\"formDisplay\">Home Phone:</label><input type=\"text\" name=\"hphoneac\" id=\"hphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonepr\" id=\"hphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonesu\" id=\"hphonesu\" size=\"4\" maxlength=\"4\">\n";
echo "<br><label class=\"formDisplay\">Cell Phone:</label><input type=\"text\" name=\"cphoneac\" id=\"cphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonepr\" id=\"cphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonesu\" id=\"cphonepr\" size=\"4\" maxlength=\"4\">\n";

echo "</br>\n";
echo "<label class=\"formDisplay\">Email:</label><input type=\"text\" name=\"email\" size=\"30\" maxlength=\"30\">\n";

echo "</br>\n";
echo " <label class=\"formDisplay\">Referred By:</label>";
echo "<select name=\"referral\" id=\"referral\">\n";
echo "<option value=\"N/A\" >Please Select</option>";
echo "<option value=\"internet\">Internet</option>\n";
echo "<option value=\"previous\">Previous Donor</option>\n";
echo "<option value=\"surrogate\">Surrogate</option>\n";
echo "<option value=\"other\">Other</option>\n";
echo "</select>\n";
echo "\n";

echo "</br>\n";
echo "</br>\n";
echo "<label class=\"title\">Baby Information</label>\n";

echo "<br><label class=\"formDisplay\">Baby's Name:</label><input type=\"text\" name=\"babysname\" id=\"babysname\" size=\"25\" maxlength=\"20\">\n";

echo "<br><label class=\"formDisplay\">Baby's DOB:</label>";
?>

<input type="int" name="bbmm" id="bbmm" size="2" maxlength="2" value="" placeholder = "mm">
&nbsp;&nbsp;<input type="int" name="bbdd" id="bbdd" size="2" maxlength="2" value="" placeholder = "dd">
&nbsp;&nbsp;<input type="int" name="bbyy" id="bbyy" size="4" maxlength="4" value="" placeholder = "yyyy">

<?php
echo "</br>\n";
echo "<label class=\"formDisplay\">Baby Status:</label>";
echo "<select name=\"babystatus\" id=\"babystatus\">\n";
echo "<option value=\"N/A\" >Please Select</option>";
echo "<option value=\"Preterm\">Preterm (<36 wks)</option>\n";
echo "<option value=\"In hospital\">In Hospital</option>\n";
echo "<option value=\"Bereaved\">Bereaved</option>\n";
echo "<option value=\"Research\">Research</option>\n";
echo "</select>\n";
echo "\n";
echo "</br>";

echo "<label class=\"formDisplay\">Amount can donate:</label><input type=\"text\" name=\"donateamount\" id=\"donateamount\" size=\"10\" maxlength=\"20\" value=\"0\">\noz";
echo "</br>";
echo "<label class=\"formDisplay\">Stored from:</label>";
echo "<select name=\"storefrom\" id=\"storefrom\">\n";
echo "<option value=\"N/A\" >Please Select</option>";
echo "<option value=\"deepfreeze\">Deep Freeze</option>\n";
echo "<option value=\"milkhome\">Milk at Home</option>\n";
echo "<option value=\"hospital\">Hospital</option>\n";
echo "</select>\n";

echo "<br><label class=\"formDisplay\">Can commit to 100 oz:</label>";
echo "<select name=\"milkcommit\" id=\"milkcommit\">\n";
echo "<option value=\"N/A\" >Please Select</option>";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";
echo "</br>";
echo "</br>";
?>
</div>
<div class="sectioncolumn twoColumnSection"> 
<label>RX/BC Pll/OTC Use (Y/N)(Dates):</label>

<br><select name="rxbcchoose" id="rxbcchoose" onchange="showme('rxbcchoose','rxbcdate',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="rxbcdate" id="rxbcdate" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy"> 

<?php
echo "</br>";
echo "</br>";
?>
<label>Supplements w/Herbs/Herb Teas (Y/N)(Dates):</label>

<br><select name="herbschoose" id="herbschoose" onchange="showme('herbschoose','herbs',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="herbs" id="herbs" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  

<?php
echo "</br>\n";
echo "</br>\n";
?>
<label>Alcohol while pumping (Y/N)(Dates):</label>
<br><select name="alcoholchoose" id="alcoholchoose" onchange="showme('alcoholchoose','alcohol',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="alcohol" id="alcohol" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy"> 

<?php
echo "</br>\n";
echo "</br>\n";
echo "<label class=\"formDisplay\">Smoke:</label>";
echo "<select name=\"smoke\" id=\"smoke\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";


echo "<br><label class=\"formDisplay\">ivDrugs:</label>";
echo "<select name=\"ivDrug\" id=\"ivDrug\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";

echo "</br>";
echo "</br>";
?>
<label>Transfusion (Y/N)(Dates):</label>
<br><select name="transfusionchoose" id="transfusionchoose" onchange="showme('transfusionchoose','transfusion',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="transfusion" id="transfusion" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  

<?php
echo "</br>";
echo "</br>";
?>

<label>Work Hi-Risk/Blood (Y/N)(Dates):</label>
<br>
<select name="workchoose" id="workchoose" onchange="showme('workchoose','work',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="work" id="work" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  

<?php
echo "</br>";
echo "</br>";
?>

<label>Tattoos/Piercing (Y/N)(Dates):</label>
<br>
<select name="tattooschoose" id="tattooschoose" onchange="showme('tattooschoose','tattoos',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="tattoos" id="tattoos" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy"> 

<?php
echo "</br>";
echo "</br>";

echo "<label class=\"formDisplay\">Hep Test:</label>";

echo "<select name=\"heptest\" id=\"heptest\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"Yes\">Yes</option>\n";
echo "<option value=\"No\">No</option>\n";
echo "<option value=\"Ns\">Ns</option>\n";
echo "</select>\n";

echo "<br><label class=\"formDisplay\">HIV Test:</label>";

echo "<select name=\"hivtest\" id=\"hivtest\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"Yes\">Yes</option>\n";
echo "<option value=\"No\">No</option>\n";
echo "<option value=\"Ns\">Ns</option>\n";
echo "</select>\n";

echo "</br>";

echo "<label class=\"formDisplay\">TB Test:</label>";

echo "<select name=\"tbtest\" id=\"tbtest\">\n";
echo "<option value=\"N/A\" >Please Select</option>\n";
echo "<option value=\"Yes\" >Yes</option>\n";
echo "<option value=\"No\" >No</option>\n";
echo "<option value=\"Ns\" >Ns</option>\n";
echo "</select>\n";

echo "<br><label class=\"formDisplay\">TB Treatment:</label>";

echo "<select name=\"tbtreat\" id=\"tbtreat\">\n";
echo "<option value=\"N/A\" >Please Select</option>\n";
echo "<option value=\"Neg\" >Negative</option>\n";
echo "<option value=\"Pos\" >Positive</option>\n";
echo "</select>\n";

echo "</br>";
echo "</br>";

?>

<label>Cold Sores/Herpes while breastfeeding (Y/N)(Dates):</label>&nbsp;&nbsp;

<select name="herpeschoose" id="herpeschoose" onchange="showme('herpeschoose','herpes',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="herpes" id="herpes" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  

<?php
echo "</br>";
echo "</br>";
echo "<label class=\"formDisplay\">Hemophilia:</label>";

echo "<select name=\"hemophilia\" id=\"hemophilia\">\n";
echo "<option value=\"N/A\" >Please Select</option>\n";
echo "<option value=\"Yes\" >Yes</option>\n";
echo "<option value=\"No\" >No</option>\n";
echo "</select>\n";

echo "<br><label class=\"formDisplay\">Growth Hormones:</label>";

echo "<select name=\"hormones\" id=\"hormones\">\n";
echo "<option value=\"N/A\" >Please Select</option>\n";
echo "<option value=\"Yes\" >Yes</option>\n";
echo "<option value=\"No\" >No</option>\n";
echo "</select>\n";


echo "</br>";
echo "</br>";
?>

<label>UK '80-96 3+MOS. (Y/N)(Yrs):</label>

<br><select name="ukmoschoose" id="ukmoschoose" onchange="showme('ukmoschoose','ukmos',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="ukmos" id="ukmos" style="display:none;position:relative;visibility:hidden;" value= "" size=20 maxlength=20 placeholder = "years"> 

<?php

echo "</br>"; 
echo "</br>"; 
?>

<label>Europe '80 5+yrs (Y/N)(Yrs):</label>

<br><select name="eurochoose" id="eurochoose" onchange="showme('eurochoose','euro',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="euro" id="euro" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "years">  



<?php

echo "<br><br><label>Special Diet:</label>";
echo "</br>";

?>

<input type="checkbox" name="diet[]" value="Reg" > Regular
<input type="checkbox" name="diet[]" value="Dfree" > Dairy-Free
<input type="checkbox" name="diet[]" value="Veg" > Vegetarian(eggs/dairy)
<br><input type="checkbox" name="diet[]" value="Vegan" > Vegan
&nbsp;&nbsp;<input type="checkbox" name="diet[]" value="Other" > Other


<?php
echo "</br>";
echo "</div>";
echo "<br class=\"clear\">";
echo "<hr>";
echo "<br>";
echo "<label>Comments (100 characters)</label>";

echo "</br>\n";

echo "\n";


echo "<textarea name=\"donorcomment\" id=\"donorcomment\" rows=\"2\" cols=\"50\" maxlength=\"102\"
>\n"; echo "</textarea>\n"; echo "\n";

echo "</br>\n";


echo "</fieldset>";
echo "<br class=\"clear\">";

echo "</br>\n";
echo "</br>\n";
echo "<input type=\"submit\" value=\"Add Donor\">\n";
echo "</form>\n";


mysqli_free_result($result); 


   echo "&nbsp;<a href=\"./donormenu.php\">Donor Menu</a></p>\n";

mysqli_close($con);

?> 
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>

