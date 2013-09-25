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
 <title>Donor Edit</title>
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

<h1 class="pageTitle">Donor Edit</h1>

<p><a href="./donorslt.php">Donor Result</a></p>
<?php

// modify phone suffix 1/18/13

$dnum = $_GET["dnum"];


// Search for Donor in table

// connect to database
$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);


$sql   = "SELECT * FROM screenertable where donornumber =  '$dnum'";

$result = mysqli_query($con,$sql); 

$row = mysqli_fetch_assoc($result);

$dnrapdate = $row['dnrapdate'];
$determinechoose = $row['determinechoose'];
$determine = $row['determine'];
$organization = $row['organization'];
$organizationother = $row['organizationother']; 
$fname = $row['firstname'];
$mname = $row['middlename'];
$lname = $row['lastname'];
$tstdate = $row['dnrapdate']; 
$email = $row['email']; 
$referral = $row['referral']; 
$donorpacket = $row['donorpacket']; 
$donorcomment = $row['donorcomment']; 
$donoraka = $row['donoraka'];

$address = $row['address'];
$city = $row['city'];
$state = $row['state'];
$zip = $row['zip'];
$country = $row['country'];

$hphone = $row['homephone'];
$cphone = $row['cellphone'];

$babysname = $row['babysname'];

// Break string to dsplay month-day-year
$babysdob = $row['babysdob'];
$bbmm = substr($babysdob,5,2);
$bbdd = substr($babysdob,8,2);
$bbyy = substr($babysdob,0,4);


$babystatus = $row['babystatus'];
$storedfrom = $row['storefrom'];
$milkcommit = $row['milkcommit'];
$rxbcchoose = $row['rxbcchoose'];
$rxbcdate = $row['rxbcdate'];
$herbschoose = $row['herbschoose'];
$herbs = $row['herbs'];
$alcoholchoose = $row['alcoholchoose'];
$alcohol = $row['alcohol'];
$smoke = $row['smoke'];
$ivDrug = $row['ivDrug'];
$transfusionchoose = $row['transfusionchoose'];
$transfusion = $row['transfusion'];
$workchoose = $row['workchoose'];
$work = $row['work'];
$tattooschoose = $row['tattooschoose'];
$tattoos = $row['tattoos'];
$heptest = $row['heptest'];
$hivtest = $row['hivtest'];
$tbtest = $row['tbtest'];
$tbtreat = $row['tbtreat']; 
$herpeschoose = $row['herpeschoose'];
$herpes = $row['herpes'];
$hemophilia = $row["hemophilia"];
$hormones = $row["hormones"];
$ukmoschoose = $row["ukmoschoose"];
$ukmos = $row["ukmos"];
$eurochoose = $row["eurochoose"];
$euro = $row["euro"];
$donateamount = $row['donateamount'];
$reg = $row['reg'];
$dfree = $row['dfree'];
$veg = $row['veg'];
$vegan = $row['vegan'];
$others = $row['others'];




// Break string to display home and cell phone

$hphoneac = substr($hphone,0,3); 
$hphonepr = substr($hphone,3,3); 
$hphonesu = substr($hphone,6,4); 

$cphoneac = substr($cphone,0,3); 
$cphonepr = substr($cphone,3,3); 
$cphonesu = substr($cphone,6,4); 


echo "<form action=\"dnrcnfrm.php?donornumber=$dnum&ctype=1\" method=\"post\" onsubmit=\"return donorEditCheck();\">\n";

echo "<fieldset class=\"sectiondisplay\">";
echo "<legend>Donor Profile</legend>";
echo "<br>";
echo "<label>Donor Number:</label>&nbsp;&nbsp;&nbsp;" . "<b>$dnum</b>";

echo "<input type=\"hidden\" name=\"dnrapdate\" value=\"$dnrapdate\" />";
echo "</br>\n";


//if($determinechoose == "A"|"P"|"NP"|"F")
 if (in_array($determinechoose, array("D", "P", "NP", "F"))) 
{
	$switching = "visiable";
	$switching2 = "inline";
  
}
else{
	$switching = "hidden";
	$switching2 = "none";
  
}
?>

<label class="formDisplay">Application Status:</label>

<select name="determinechoose" id="determinechoose" onchange="showme2('determinechoose','determine')">
<!-- <option value="N/A" <?php if($determinechoose=="N/A") echo 'selected' ?>>Please Select</option> -->   
<option value="A" <?php if($determinechoose=="A") echo 'selected' ?>>Applied or Awaiting</option>
<option value="P" <?php if($determinechoose=="P") echo 'selected' ?>>Passed Phone Screen</option>
<option value="NP" <?php if($determinechoose=="NP") echo 'selected' ?>>No Passed Phone Screen</option>
<option value="F" <?php if($determinechoose=="F") echo 'selected'?>>Failed</option>
<option value="D" <?php if($determinechoose=="D") echo 'selected'?>>Donor Accepted</option>
<option value="C" <?php if($determinechoose=="C") echo 'selected' ?>>Closed</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="determine" id="determine" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $determine ?> " size=20 maxlength=20 placeholder = "mm-dd-yyyy">  


<?php



if($organization == "OTH")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{

	$switching = "hidden";
	$switching2 = "none";
}
echo "</br>\n";
?>
<hr>
<div class="sectioncolumn twoColumnSection"> 
<label class="formDisplay">Organization:</label>

<select name="organization" id="organization" onchange="showme('organization','organizationother',3)">  
<option value="IND" <?php if($organization=="IND") echo 'selected' ?>>Individual</option>
<option value="STN" <?php if($organization=="STN") echo 'selected' ?>>Stanford</option>  
<option value="JHH" <?php if($organization=="JHH") echo 'selected' ?>>John Hopkns</option>
<option value="OTH" <?php if($organization=="OTH") echo 'selected' ?>>Other</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="organizationother" id="organizationother" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>;" value="<?php echo $organizationother ?>" size=20 maxlength=20>  
	

<?php

echo "<br><label class=\"formDisplay\">First Name:</label><input type=\"text\" name=\"donorfname\" id=\"donorfname\" value=\"$fname\" size=\"25\" maxlength=\"20\" >";
?>
<?php
echo "<br><label class=\"formDisplay\">Middle Name:</label><input type=\"text\" name=\"donormname\" id=\"donormname\" value=\"$mname\" size=\"25\" maxlength=\"20\">\n";
?>
<?php
echo "<br><label class=\"formDisplay\">Last Name:</label><input type=\"text\" name=\"donorlname\" id=\"donorlname\" value=\"$lname\" size=\"25\" maxlength=\"20\">\n";
echo "<br><label class=\"formDisplay\">Also Known As:</label><input type=\"text\" name=\"donoraka\" id=\"donoraka\" value=\"$donoraka\" size=\"25\" maxlength=\"20\">\n";
?>

<?php

echo "<br><label class=\"formDisplay\">Address:</label><input type=\"text\" name=\"address\" id=\"address\" value=\"$address\" size=\"25\" maxlength=\"20\">\n";
echo "<br><label class=\"formDisplay\">City:</label><input type=\"text\" name=\"city\" id=\"city\" value=\"$city\" size=\"25\" maxlength=\"20\">\n";
?>
<?php
echo "<br><label class=\"formDisplay\">State:</label><input type=\"text\" name=\"state\" id=\"state\" value=\"$state\" size=\"5\" maxlength=\"2\">\n";
echo "&nbsp;&nbsp;<br><label class=\"formDisplay\">Zip Code:</label><input type=\"text\" name=\"zip\" id=\"zip\" value=\"$zip\" size=\"7\" maxlength=\"5\">\n";
echo "&nbsp;&nbsp;<br><label class=\"formDisplay\">Country:</label><input type=\"text\" name=\"country\" id=\"country\" value=\"$country\" size=\"20\" maxlength=\"15\" value=\"USA\">\n";
?>
<?php
echo "<br><label class=\"formDisplay\">Home Phone:</label><input type=\"text\" name=\"hphoneac\" id=\"hphoneac\" value=\"$hphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonepr\" id=\"hphonepr\" value=\"$hphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonesu\" id=\"hphonesu\" value=\"$hphonesu\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;&nbsp;<br><label class=\"formDisplay\">Cell Phone:</label><input type=\"text\" name=\"cphoneac\" id=\"cphoneac\" value=\"$cphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonepr\" id=\"cphonepr\" value=\"$cphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonesu\" id=\"cphonesu\" value=\"$cphonesu\" size=\"4\" maxlength=\"4\">\n";
?>
<?php


echo "<br><label class=\"formDisplay\">Email:</label><input type=\"text\" name=\"email\" id=\"email\" value=\"$email\" size=\"30\" maxlength=\"20\">\n";


switch ($referral)
{
case 'N/A':
  $refferalna = 'selected';
  break;
case 'internet':
  $internet = 'selected';
  break;
case 'previous':
  $previous = 'selected';
  break;
case 'surrogate':
  $surrogate = 'selected';
  break;
case 'other':
  $other = 'selected';
  break;
default:
  echo "";
}

?>
<?php
echo "<br><label class=\"formDisplay\">Referred By:</label>";
echo "<select name=\"referral\" id=\"referral\">\n";
echo "<option value=\"N/A\" $refferalna>Please Select</option>\n";
echo "<option value=\"internet\" $internet>Internet</option>\n";
echo "<option value=\"previous\" $previous>Previous Donor</option>\n";
echo "<option value=\"surrogate\" $surrogate>Surrogate</option>\n";
echo "<option value=\"other\" $other>Other</option>\n";
echo "</select>\n";
?>

<?php
echo "<br><br><label class=\"title\">Baby Information</label>\n";

echo "<br><label class=\"formDisplay\">Baby's Name:</label><input type=\"text\" name=\"babysname\" id=\"babysname\" value=\"$babysname\" size=\"25\" maxlength=\"20\">\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;<label class=\"formDisplay\">Baby's DOB:</label>";
?>

<input type="int" name="bbmm" id="bbmm" size="2" maxlength="2" value="<?php echo $bbmm ?>" placeholder = "mm">
-&nbsp;<input type="int" name="bbdd" id="bbdd" size="2" maxlength="2" value="<?php echo $bbdd ?>" placeholder = "dd">
-&nbsp;<input type="int" name="bbyy" id="bbyy" size="4" maxlength="4" value="<?php echo $bbyy ?>" placeholder = "yyyy">

<?php

switch ($babystatus)
{
case 'Preterm':
  $preterm = 'selected';
  break;
case 'In hospital':
  $inhospital = 'selected';
  break;
case 'Bereaved':
  $bereaved = 'selected';
  break;
case 'Research':
  $research = 'selected';
  break;
default:
  echo "";
}



echo "<br><label class=\"formDisplay\">Baby Status:</label>";
echo "<select name=\"babystatus\" id=\"babystatus\">\n";
echo "<option value=\"Preterm\" $preterm>Preterm (<36 wks)</option>\n";
echo "<option value=\"In hospital\" $inhospital>In Hospital</option>\n";
echo "<option value=\"Bereaved\" $bereaved>Bereaved</option>\n";
echo "<option value=\"Research\" $research>Research</option>\n";
echo "</select>\n";
?>
<?php

echo "<br><label class=\"formDisplay\">Amount can donate:</label><input type=\"text\" name=\"donateamount\" id=\"donateamount\"  value=\"$donateamount\" size=\"10\" maxlength=\"20\">\noz";
?>
<?php
echo "<br><label class=\"formDisplay\">Stored from:</label>";

switch ($storedfrom)
{
case 'deep freeze':
  $deepfreeze = 'selected';
  break;
case 'milk at home':
  $milkhome = 'selected';
  break;
case 'hospital':
  $hospital = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"storefrom\" id=\"storefrom\">\n";
echo "<option value=\"deep freeze\" $deepfreeze>Deep Freeze</option>\n";
echo "<option value=\"milk at home\" $milkhome>Milk at Home</option>\n";
echo "<option value=\"hospital\" $hospital>Hospital</option>\n";
echo "</select>\n";


echo "<br><label class=\"formDisplay\">Can commit to 100 oz:</label>";

switch ($milkcommit)
{
case 'yes':
  $yes = 'selected';
  break;
case 'no':
  $no = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"milkcommit\" id=\"milkcommit\">\n";
echo "<option value=\"yes\" $yes>Yes</option>\n";
echo "<option value=\"no\" $no>No</option>\n";
echo "</select>\n";

?>
<?php


if($rxbcchoose == "Yes")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{

	$switching = "hidden";
	$switching2 = "none";
}
?>
</div>
<div class="sectioncolumn twoColumnSection"> 
<label>RX/BC Pll/OTC Use (Y/N)(Dates):</label>

<br><select name="rxbcchoose" id="rxbcchoose" onchange="showme('rxbcchoose','rxbcdate',1)">
<option value="N/A" <?php if($rxbcchoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($rxbcchoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($rxbcchoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;
<input type ="text" name="rxbcdate" id="rxbcdate" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $rxbcdate ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">

<?php


if($herbschoose == "Yes")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{

	$switching = "hidden";
	$switching2 = "none";
}
?>

<br><br><label>Supplements w/Herbs/Herb Teas (Y/N)(Dates):</label>

<br><select name="herbschoose" id="herbschoose" onchange="showme('herbschoose','herbs',1)">
<option value="N/A" <?php if($herbschoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($herbschoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($herbschoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="herbs" id="herbs" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $herbs ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  
<?php

if($alcoholchoose == "Yes")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{

	$switching = "hidden";
	$switching2 = "none";
}

?>
<br><br><label>Alcohol while pumping (Y/N)(Dates):</label>

<br><select name="alcoholchoose" id="alcoholchoose" onchange="showme('alcoholchoose','alcohol',1)">
<option value="N/A" <?php if($alcoholchoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($alcoholchoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($alcoholchoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="alcohol" id="alcohol" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $alcohol ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">

<?php

echo "<br><label class=\"formDisplay\">Smoke:</label>";


switch ($smoke)
{
case "N/A":
  $smokena= 'selected';
	break;
case "Yes":
  $smokeyes = 'selected';
  break;
case "No":
  $smokeno = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"smoke\" id=\"smoke\">\n";
echo "<option value=\"N/A\" $smokena>Please Select</option>\n";
echo "<option value=\"Yes\" $smokeyes>Yes</option>\n";
echo "<option value=\"No\" $smokeno>No</option>\n";
echo "</select>\n";

echo "<br><label class=\"formDisplay\">ivDrugs:</label>";
switch ($ivDrug)
{
case "N/A":
  $ivDrugna= 'selected';
case "Yes":
  $ivDrugyes = 'selected';
  break;
case "No":
  $ivDrugno = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"ivDrug\" id=\"ivDrug\">\n";
echo "<option value=\"N/A\" $ivDrugna>Please Select</option>\n";
echo "<option value=\"Yes\" $ivDrugyes>Yes</option>\n";
echo "<option value=\"No\" $ivDrugno>No</option>\n";
echo "</select>\n";

?>
<?php

if($transfusionchoose == "Yes")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{

	$switching = "hidden";
	$switching2 = "none";
}
?>
<br><label>Transfusion (Y/N)(Dates):</label>

<br><select name="transfusionchoose" id="transfusionchoose" onchange="showme('transfusionchoose','transfusion',1)">
<option value="N/A" <?php if($transfusionchoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($transfusionchoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($transfusionchoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="transfusion" id="transfusion" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $transfusion ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">

<?php


if($workchoose == "Yes")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{

	$switching = "hidden";
	$switching2 = "none";
}
?>

<br><br><label>Work Hi-Risk/Blood (Y/N)(Dates):</label>

<br><select name="workchoose" id="workchoose" onchange="showme('workchoose','work',1)">
<option value="N/A" <?php if($workchoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($workchoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($workchoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="work" id="work" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $work ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">

<?php
switch ($tattooschoose)
{
case 'N/A':
  $tattoosna = 'selected';
	break;
case 'Yes':
  $tattoosyes = 'selected';
  break;
case 'No':
  $tattoosno = 'selected';
  break;
default:
  echo "";
}
if($tattooschoose == "Yes")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{

	$switching = "hidden";
	$switching2 = "none";
}
?>

<br><br><label>Tattoos/Piercing (Y/N)(Dates):</label>

<br><select name="tattooschoose" id="tattooschoose" onchange="showme('tattooschoose','tattoos',1)">
<option value="N/A" <?php if($tattooschoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($tattooschoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($tattooschoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="tattoos" id="tattoos" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $tattoos ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">

<?php

echo "<br><label class=\"formDisplay\">Hep Test:</label>";

switch ($heptest)
{
case "N/A":
  $heptestna= 'selected';
	break;
case "Yes":
  $heptestyes = 'selected';
  break;
case "No":
  $heptestno = 'selected';
  break;
case "Ns":
  $heptestns = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"heptest\" id=\"heptest\">\n";
echo "<option value=\"N/A\" $heptestna>Please Select</option>\n";
echo "<option value=\"Yes\" $heptestyes>Yes</option>\n";
echo "<option value=\"No\" $heptestno>No</option>\n";
echo "<option value=\"Ns\" $heptestns>Ns</option>\n";
echo "</select>\n";

echo "<br><label class=\"formDisplay\">HIV Test:</label>";


switch ($hivtest)
{
case "N/A":
  $hivtestna= 'selected';
	break;
case "Yes":
  $hivtestyes = 'selected';
  break;
case "No":
  $hivtestno = 'selected';
  break;
case "Ns":
  $hivtestns = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"hivtest\" id=\"hivtest\">\n";
echo "<option value=\"N/A\" $hivtestna>Please Select</option>\n";
echo "<option value=\"Yes\" $hivtestyes>Yes</option>\n";
echo "<option value=\"No\" $hivtestno>No</option>\n";
echo "<option value=\"Ns\" $hivtestns>Ns</option>\n";
echo "</select>\n";

?>
<?php
echo "<br><label class=\"formDisplay\">TB Test:</label>";


switch ($tbtest)
{
case "N/A":
  $tbtestna= 'selected';
	break;
case "Yes":
  $tbtestyes = 'selected';
  break;
case "No":
  $tbtestno = 'selected';
  break;
case "Ns":
  $tbtestns = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"tbtest\" id=\"tbtest\">\n";
echo "<option value=\"N/A\" $tbtestna>Please Select</option>\n";
echo "<option value=\"Yes\" $tbtestyes>Yes</option>\n";
echo "<option value=\"No\" $tbtestno>No</option>\n";
echo "<option value=\"Ns\" $tbtestns>Ns</option>\n";
echo "</select>\n";

echo "<br><label class=\"formDisplay\">TB Treatment:</label>";


switch ($tbtreat)
{
case "N/A":
  $tbtreatna= 'selected';
	break;
case "Neg":
  $tbtreatneg = 'selected';
  break;
case "Pos":
  $tbtreatpos = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"tbtreat\" id=\"tbtreat\">\n";
echo "<option value=\"N/A\" $tbtreatna>Please Select</option>\n";
echo "<option value=\"Neg\" $tbtreatneg>Negative</option>\n";
echo "<option value=\"Pos\" $tbtreatpos>Positive</option>\n";
echo "</select>\n";

?>
<?php

if($herpeschoose == "Yes")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{

	$switching = "hidden";
	$switching2 = "none";
}

?>

<br><label>Cold Sores/Herpes while breastfeeding (Y/N)(Dates):</label>

<br><select name="herpeschoose" id="herpeschoose" onchange="showme('herpeschoose','herpes',1)">
<option value="N/A" <?php if($herpeschoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($herpeschoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($herpeschoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="herpes" id="herpes" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $herpes ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">

<?php

echo "<br><label class=\"formDisplay\">Hemophilia:</label>";


switch ($hemophilia)
{
case "N/A":
  $hemophiliana= 'selected';
	break;
case "Yes":
  $hemophiliayes = 'selected';
  break;
case "No":
  $hemophiliano = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"hemophilia\" id=\"hemophilia\">\n";
echo "<option value=\"N/A\" $hemophiliana>Please Select</option>\n";
echo "<option value=\"Yes\" $hemophiliayes>Yes</option>\n";
echo "<option value=\"No\" $hemophiliano>No</option>\n";
echo "</select>\n";

echo "<br><label class=\"formDisplay\">Growth Hormones:</label>";


switch ($hormones)
{
case "N/A":
  $hormonesna= 'selected';
	break;
case "Yes":
  $hormonesyes = 'selected';
  break;
case "No":
  $hormonesno = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"hormones\" id=\"hormones\">\n";
echo "<option value=\"N/A\" $hormonesna>Please Select</option>\n";
echo "<option value=\"Yes\" $hormonesyes>Yes</option>\n";
echo "<option value=\"No\" $hormonesno>No</option>\n";
echo "</select>\n";

?>
<?php

if($ukmoschoose == "Yes")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{

	$switching = "hidden";
	$switching2 = "none";
}

?>

<br><label>UK '80-96 3+MOS. (Y/N)(Yrs):</label>&nbsp;&nbsp;

<br><select name="ukmoschoose" id="ukmoschoose" onchange="showme('ukmoschoose','ukmos',1)">
<option value="N/A" <?php if($ukmoschoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($ukmoschoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($ukmoschoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="ukmos" id="ukmos" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $ukmos ?>" size=20 maxlength=20 placeholder = "years"> 


<?php


if($eurochoose == "Yes")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{

	$switching = "hidden";
	$switching2 = "none";
}

?>

<br><label>Europe '80 5+yrs (Y/N)(Yrs):</label>&nbsp;&nbsp;

<br><select name="eurochoose" id="eurochoose" onchange="showme('eurochoose','euro',1)">
<option value="N/A" <?php if($eurochoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($eurochoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($eurochoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="euro" id="euro" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $euro ?>" size=20 maxlength=20 placeholder = "years">


<?php

echo "<br><br><label>Special Diet:</label>";
echo "</br>";

?>
<input type="checkbox" name="diet[]" id="diet[]" value="Reg" <?php if($reg!="")echo 'checked' ?>> Regular
<input type="checkbox" name="diet[]" id="diet[]" value="Dfree" <?php if($dfree!="")echo 'checked'?>> Dairy-Free
<input type="checkbox" name="diet[]" id="diet[]" value="Veg" <?php if($veg!="")echo 'checked' ?>> Vegetarian(eggs/dairy)
<br><input type="checkbox" name="diet[]" id="diet[]" value="Vegan" <?php if($vegan!="")echo 'checked' ?>> Vegan
&nbsp;&nbsp;<input type="checkbox" name="diet[]" id="diet[]" value="Other" <?php if($others!="")echo 'checked' ?>> Other

</p>
</div>
<br class="clear">
<hr>
<div class="section">

<?php

echo "<label class=\"formDisplay\">Donor Packet:</label>";

switch ($donorpacket)
{
case 'Sent':
  $sent = 'selected';
  break;
case 'Received':
  $received = 'selected';
  break;
default:
  echo "";
}

echo "<select name=\"donorpacket\" id=\"donorpacket\">\n";
echo "<option value=\"Sent\" $sent>Sent</option>\n";
echo "<option value=\"Received\" $received>Received</option>\n";
echo "</select>\n";


?>
<?php

echo "<br><label>Comments (100 characters)</label>";

?>
<?php

echo "<br><textarea name=\"donorcomment\" id=\"donorcomment\" rows=\"2\" cols=\"50\" maxlength=\"102\" >\n";
echo "$donorcomment\n";
echo "</textarea>\n";
echo "\n";
echo "</div>";
echo "</fieldset>";
?>
<br class="clear">
<fieldset class="sectiondisplay">
<?php
include 'followupadd.php';
?>
</fieldset>

<fieldset class="sectiondisplay">
<?php
include 'page1.php'; 
include 'page3.php';
?>
</fieldset>
<br class="clear">
<p>
<?php
echo "<input type=\"submit\" value=\"Edit Donor\">\n";
echo "</br>";
?>
</p>

<?php
echo "</form>";

   mysqli_free_result($result); 

   echo "</br>";

   echo "<p><a href=\"./donorslt.php\">Return to Donor Result</a>\n";

   echo "&nbsp;<a href=\"./donormenu.php\">Return to Donor Menu</a></p>\n";


   mysqli_close($con);
?> 



</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
