<?php
session_start();
// store session data

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE>Donor Edit</TITLE>
	<META NAME="GENERATOR" CONTENT="LibreOffice 3.3  (Linux)">
	<META NAME="AUTHOR" CONTENT="Pat Dumalanta, ChingYing Kuo">
	<META NAME="CREATED" CONTENT="2012/11/23;15512700">
	<META NAME="CHANGEDBY" CONTENT="Pat Dumalanta, ChingYing Kuo">
	<META NAME="CHANGED" CONTENT="2013/03/06;16005500">

<?php 

include '../include/main.js'; 

?>
<link type="text/css" rel="stylesheet" href="mystyle.css">

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->

<?php

echo "<h1>Donor Screening</h1>\n";
// modify phone suffix 1/18/13

$dnum = $_GET["dnum"];

/*
echo "<br>";
echo "dnum: " . $dnum;
echo "<br>";
*/

// Search for Donor in table

// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);

$sql   = "SELECT * FROM screenertable where donornumber =  $dnum";

$result = mysql_query($sql, $con); 

$row = mysql_fetch_assoc($result);


//Print_r ($_SESSION);
$determinechoose = $row['determinechoose'];
$determine = $row['determine'];
$process = $row['process'];
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
//echo "</br>"; 
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
$heptest = $row['heptest'];
$hivtest = $row['hivtest'];
$tbtest = $row['tbtest'];
$tbtreat = $row['tbtreat']; 
$herpeschoose = $row['herpeschoose'];
$herpes = $row['herpes'];
$hemophiliana = $row["hemophiliana"];
$hormones = $row["hormones"];
$ukmoschoose = $row["ukmoschoose"];
$ukmos = $row["ukmos"];
$eurochoose = $row["eurochoose"];
$euro = $row["euro"];
$diet = $row["diet"];
$donateamount = $row['donateamount'];




// Break string to display home and cell phone

$hphoneac = substr($hphone,0,3); 
$hphonepr = substr($hphone,3,3); 
$hphonesu = substr($hphone,6,4); 

$cphoneac = substr($cphone,0,3); 
$cphonepr = substr($cphone,3,3); 
$cphonesu = substr($cphone,6,4); 


echo "<form action=\"dnrcnfrm.php?donornumber=$dnum&ctype=1\" method=\"post\">\n";
echo "Doner number:&nbsp;&nbsp;&nbsp;" . "<label class = 'boldtext'>$dnum</label>";

echo "</br>\n";
echo "</br>\n";

switch ($determinechoose)
{
case 'N/A':
  $dna = 'selected';
  break;
case 'A':
  $dA = 'selected';
  break;
case 'P':
  $dP = 'selected';
  break;
case 'NP':
  $dNP = 'selected';
  break;
case 'F':
  $dF = 'selected';
  
  break;
case 'D':
  $dD = 'selected';
  
  break;
case 'C':
  $dC = 'selected';
  break;
default:
  echo "";
}

if($determinechoose == "A"||"P"||"NP"||"F")
{
	$switching = "visiable";
	$switching2 = "inline";
}
else{
	$switching = "hidden";
	$switching2 = "none";
}
?>

Application Status:&nbsp;&nbsp;&nbsp;

<select name="determinechoose" id="determinechoose" onchange="showme2('determinechoose','determine')">
<option value="N/A" <?php echo $dna ?>>Please Select</option>   
<option value="A" <?php echo $dA ?>>Applied or Awaiting</option>
<option value="P" <?php echo $dP ?>>Passed Phone Screen</option>
<option value="NP" <?php echo $dNP ?>>No Passed Phone Screen</option>
<option value="F" <?php echo $dF ?>>Failed</option>
<option value="D" <?php echo $dD ?>>Donor Accepted</option>
<option value="C" <?php echo $dC ?>>Closed</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="determine" id="determine" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $determine ?> " size=20 maxlength=20 placeholder = "mm-dd-yyyy">  


<?php
echo $process;
switch ($organization)
{
case 'IND':
  $ind = 'selected';
  break;
case 'STN':
  $stn = 'selected';
  break;
case 'JHH':
  $jhh = 'selected';
  break;
case 'OTH':
  $oth = 'selected';
  break;
default:
  echo "";
}

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
echo "</br>\n";
?>

Organization:&nbsp;&nbsp;&nbsp;

<select name="organization" id="organization" onchange="showme('organization','organizationother',3)">  
<option value="IND" <?php echo $ind ?>>Individual</option>
<option value="STN" <?php echo $stn ?>>Stanford</option>  
<option value="JHH" <?php echo $jhh ?>>John Hopkns</option>
<option value="OTH" <?php echo $oth ?>>Other</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="organizationother" id="organizationother" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>;" value="<?php echo $organizationother ?>" size=20 maxlength=20>  
	
<p>
<?php

echo "First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"donorfname\" value=\"$fname\" size=\"25\" maxlength=\"20\" >";
?>
</p>
<p>
<?php
echo "Middle Name:&nbsp; <input type=\"text\" name=\"donormname\" value=\"$mname\" size=\"25\" maxlength=\"20\">\n";
?>
</p>
<p>
<?php
echo "Last Name:&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"donorlname\" value=\"$lname\" size=\"25\" maxlength=\"20\">\n";
?>
</p>
<p>
<?php

echo "Address:&nbsp;&nbsp; <input type=\"text\" name=\"address\" value=\"$address\" size=\"25\" maxlength=\"20\">\n";
echo "&nbsp;&nbsp;City:&nbsp;&nbsp; <input type=\"text\" name=\"city\" value=\"$city\" size=\"25\" maxlength=\"20\">\n";
?>
</p>
<p>
<?php
echo "State:&nbsp;&nbsp; <input type=\"text\" name=\"state\" value=\"$state\" size=\"5\" maxlength=\"2\">\n";
echo "&nbsp;&nbsp;Zip Code:&nbsp;&nbsp; <input type=\"text\" name=\"zip\" value=\"$zip\" size=\"7\" maxlength=\"5\">\n";
echo "&nbsp;&nbsp;Country:&nbsp;&nbsp; <input type=\"text\" name=\"country\" value=\"$country\" size=\"20\" maxlength=\"15\" value=\"USA\">\n";
?>
</p>
<p>
<?php
echo "Home Phone:&nbsp;&nbsp; <input type=\"text\" name=\"hphoneac\" value=\"$hphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonepr\" value=\"$hphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonesu\" value=\"$hphonesu\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;&nbsp;Cell Phone:&nbsp;&nbsp; <input type=\"text\" name=\"cphoneac\" value=\"$cphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonepr\" value=\"$cphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonesu\" value=\"$cphonesu\" size=\"4\" maxlength=\"4\">\n";
?>
</p>
<p>
<?php


echo "Email:&nbsp;&nbsp; <input type=\"text\" name=\"email\" value=\"$email\" size=\"30\" maxlength=\"20\">\n";

echo "</br>\n";

//echo "<br>" . $referral . "<br>";


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
</p>
<p>
<?php
echo " Referred By:&nbsp;&nbsp;";
echo "<select name=\"referral\">\n";
echo "<option value=\"N/A\" $refferalna>Please Select</option>\n";
echo "<option value=\"internet\" $internet>Internet</option>\n";
echo "<option value=\"previous\" $previous>Previous Donor</option>\n";
echo "<option value=\"surrogate\" $surrogate>Surrogate</option>\n";
echo "<option value=\"other\" $other>Other</option>\n";
echo "</select>\n";
?>
</p>
<p>
<?php
echo "<h3>Baby Information</h3>\n";

echo "Baby's Name:&nbsp; <input type=\"text\" name=\"babysname\" value=\"$babysname\" size=\"25\" maxlength=\"20\">\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;Baby's DOB:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
?>

<input type=\"int\" name=\"bbmm\" size="2" maxlength="2" value="<?php echo $bbmm ?>" placeholder = "mm">
&nbsp;&nbsp;<input type=\"int\" name="bbdd" size="2" maxlength="2" value="<?php echo $bbdd ?>" placeholder = "dd">
&nbsp;&nbsp;<input type=\"int\" name="bbyy" size="4" maxlength="4" value="<?php echo $bbyy ?>" placeholder = "yyyy">



</p>
<p>
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



echo "Baby Status:&nbsp;&nbsp;";
echo "<select name=\"babystatus\">\n";
echo "<option value=\"Preterm\" $preterm>Preterm (<36 wks)</option>\n";
echo "<option value=\"In hospital\" $inhospital>In Hospital</option>\n";
echo "<option value=\"Bereaved\" $bereaved>Bereaved</option>\n";
echo "<option value=\"Research\" $research>Research</option>\n";
echo "</select>\n";
?>
</p>
<p>
<?php

echo "Amount can donate:&nbsp;<input type=\"text\" name=\"donateamount\"  value=\"$donateamount\" size=\"10\" maxlength=\"20\">\noz";
?>
</p>
<p>
<?php
echo "Stored from:&nbsp;&nbsp;";

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

echo "<select name=\"storefrom\">\n";
echo "<option value=\"deep freeze\" $deepfreeze>Deep Freeze</option>\n";
echo "<option value=\"milk at home\" $milkhome>Milk at Home</option>\n";
echo "<option value=\"hospital\" $hospital>Hospital</option>\n";
echo "</select>\n";


echo "&nbsp;&nbsp;&nbsp;Can commit to 100 oz:&nbsp;&nbsp;";

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

echo "<select name=\"milkcommit\">\n";
echo "<option value=\"yes\" $yes>Yes</option>\n";
echo "<option value=\"no\" $no>No</option>\n";
echo "</select>\n";

?>
</p>
<p>
<?php

switch ($rxbcchoose)
{
case 'N/A':
  $rxna = 'selected';
	break;
case 'Yes':
  $rxyes = 'selected';
  break;
case 'No':
  $rxno = 'selected';
  break;
default:
  echo "";
}
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

RX/BC Pll/OTC Use (Y/N)(Dates):&nbsp;&nbsp;&nbsp;

<select name="rxbcchoose" id="rxbcchoose" onchange="showme('rxbcchoose','rxbcdate',1)">
<option value="N/A" <?php echo $rxna ?>>Please Select</option>   
<option value="Yes" <?php echo $rxyes ?>>Yes</option>
<option value="No" <?php echo $rxno ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="rxbcdate" id="rxbcdate" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $rxbcdate ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">

</p>
<p>
<?php

switch ($herbschoose)
{
case 'N/A':
  $herbna = 'selected';
	break;
case 'Yes':
  $herbyes = 'selected';
  break;
case 'No':
  $herbno = 'selected';
  break;
default:
  echo "";
}
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

Supplements w/Herbs/Herb Teas (Y/N)(Dates):&nbsp;&nbsp;

<select name="herbschoose" id="herbschoose" onchange="showme('herbschoose','herbs',1)">
<option value="N/A" <?php echo $herbna ?>>Please Select</option>   
<option value="Yes" <?php echo $herbyes ?>>Yes</option>
<option value="No" <?php echo $herbno ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="herbs" id="herbs" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $herbs ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  



</p>
<p>
<?php
switch ($alcoholchoose)
{
case 'N/A':
  $alcoholna = 'selected';
	break;
case 'Yes':
  $alcoholyes = 'selected';
  break;
case 'No':
  $alcoholno = 'selected';
  break;
default:
  echo "";
}
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
Alcohol while pumping (Y/N)(Dates):&nbsp;&nbsp;

<select name="alcoholchoose" id="alcoholchoose" onchange="showme('alcoholchoose','alcohol',1)">
<option value="N/A" <?php echo $alcoholna ?>>Please Select</option>   
<option value="Yes" <?php echo $alcoholyes ?>>Yes</option>
<option value="No" <?php echo $alcoholno ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="alcohol" id="alcohol" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $alcohol ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">


</p>
<p>
<?php

echo "Smoke:&nbsp;&nbsp;";


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

echo "<select name=\"smoke\">\n";
echo "<option value=\"N/A\" $smokena>Please Select</option>\n";
echo "<option value=\"Yes\" $smokeyes>Yes</option>\n";
echo "<option value=\"No\" $smokeno>No</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;&nbsp;IV Drugs:&nbsp;&nbsp;";
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

echo "<select name=\"ivDrug\">\n";
echo "<option value=\"N/A\" $ivDrugna>Please Select</option>\n";
echo "<option value=\"Yes\" $ivDrugyes>Yes</option>\n";
echo "<option value=\"No\" $ivDrugno>No</option>\n";
echo "</select>\n";

?>
</p>
<p>
<?php
switch ($transfusionchoose)
{
case 'N/A':
  $transfusionna = 'selected';
	break;
case 'Yes':
  $transfusionyes = 'selected';
  break;
case 'No':
  $transfusionno = 'selected';
  break;
default:
  echo "";
}
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
Transfusion (Y/N)(Dates):&nbsp;&nbsp;

<select name="transfusionchoose" id="transfusionchoose" onchange="showme('transfusionchoose','transfusion',1)">
<option value="N/A" <?php echo $transfusionna ?>>Please Select</option>   
<option value="Yes" <?php echo $transfusionyes ?>>Yes</option>
<option value="No" <?php echo $transfusionno ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="transfusion" id="transfusion" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $transfusion ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">


</p>
<p>
<?php
switch ($workchoose)
{
case 'N/A':
  $workna = 'selected';
	break;
case 'Yes':
  $workyes = 'selected';
  break;
case 'No':
  $workno = 'selected';
  break;
default:
  echo "";
}
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

Work Hi-Risk/Blood (Y/N)(Dates):&nbsp;&nbsp;

<select name="workchoose" id="workchoose" onchange="showme('workchoose','work',1)">
<option value="N/A" <?php echo $workna ?>>Please Select</option>   
<option value="Yes" <?php echo $workyes ?>>Yes</option>
<option value="No" <?php echo $workno ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="work" id="work" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $work ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">


</p>
<p>
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

Tattoos/Piercing (Y/N)(Dates):&nbsp;&nbsp;

<select name="tattooschoose" id="tattooschoose" onchange="showme('tattooschoose','tattoos',1)">
<option value="N/A" <?php echo $tattoosna ?>>Please Select</option>   
<option value="Yes" <?php echo $tattoosyes ?>>Yes</option>
<option value="No" <?php echo $tattoosno ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="tattoos" id="tattoos" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $tattoos ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">

</p>
<p>
<?php

echo "Hep Test:&nbsp;&nbsp;";

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

echo "<select name=\"heptest\">\n";
echo "<option value=\"N/A\" $heptestna>Please Select</option>\n";
echo "<option value=\"Yes\" $heptestyes>Yes</option>\n";
echo "<option value=\"No\" $heptestno>No</option>\n";
echo "<option value=\"Ns\" $heptestns>Ns</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;HIV Test:&nbsp;&nbsp;";


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

echo "<select name=\"hivtest\">\n";
echo "<option value=\"N/A\" $hivtestna>Please Select</option>\n";
echo "<option value=\"Yes\" $hivtestyes>Yes</option>\n";
echo "<option value=\"No\" $hivtestno>No</option>\n";
echo "<option value=\"Ns\" $hivtestns>Ns</option>\n";
echo "</select>\n";

?>
</p>
<p>
<?php
echo "TB Test:&nbsp;&nbsp;";


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

echo "<select name=\"tbtest\">\n";
echo "<option value=\"N/A\" $tbtestna>Please Select</option>\n";
echo "<option value=\"Yes\" $tbtestyes>Yes</option>\n";
echo "<option value=\"No\" $tbtestno>No</option>\n";
echo "<option value=\"Ns\" $tbtestns>Ns</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;TB Treatment:&nbsp;&nbsp;";


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

echo "<select name=\"tbtreat\">\n";
echo "<option value=\"N/A\" $tbtreatna>Please Select</option>\n";
echo "<option value=\"Neg\" $tbtreatneg>Negative</option>\n";
echo "<option value=\"Pos\" $tbtreatpos>Positive</option>\n";
echo "</select>\n";

?>
</p>
<p>
<?php

switch ($herpeschoose)
{
case 'N/A':
  $herpesna = 'selected';
	break;
case 'Yes':
  $herpesyes = 'selected';
  break;
case 'No':
  $herpesno = 'selected';
  break;
default:
  echo "";
}
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

Cold Sores/Herpes while breatfeedng (Y/N)(Dates):&nbsp;&nbsp;

<select name="herpeschoose" id="herpeschoose" onchange="showme('herpeschoose','herpes',1)">
<option value="N/A" <?php echo $herpesna ?>>Please Select</option>   
<option value="Yes" <?php echo $herpesyes ?>>Yes</option>
<option value="No" <?php echo $herpesno ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="herpes" id="herpes" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $herpes ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">


</p>
<p>
<?php

echo "Hemophilia:&nbsp;&nbsp;";


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

echo "<select name=\"hemophilia\">\n";
echo "<option value=\"N/A\" $hemophiliana>Please Select</option>\n";
echo "<option value=\"Yes\" $hemophiliayes>Yes</option>\n";
echo "<option value=\"No\" $hemophiliano>No</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;Growth Hormones:&nbsp;&nbsp;";


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

echo "<select name=\"hormones\">\n";
echo "<option value=\"N/A\" $hormonesna>Please Select</option>\n";
echo "<option value=\"Yes\" $hormonesyes>Yes</option>\n";
echo "<option value=\"No\" $hormonesno>No</option>\n";
echo "</select>\n";

?>
</p>
<p>
<?php

switch ($ukmoschoose)
{
case 'N/A':
  $ukmosna = 'selected';
	break;
case 'Yes':
  $ukmosyes = 'selected';
  break;
case 'No':
  $ukmosno = 'selected';
  break;
default:
  echo "";
}
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

UK '80-96 3+MOS. (Y/N)(Yrs):&nbsp;&nbsp;

<select name="ukmoschoose" id="ukmoschoose" onchange="showme('ukmoschoose','ukmos',1)">
<option value="N/A" <?php echo $ukmosna ?>>Please Select</option>   
<option value="Yes" <?php echo $ukmosyes ?>>Yes</option>
<option value="No" <?php echo $ukmosno ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="ukmos" id="ukmos" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $ukmos ?>" size=20 maxlength=20 placeholder = "years"> 


</p>
<p>
<?php

switch ($eurochoose)
{
case 'N/A':
  $eurona = 'selected';
	break;
case 'Yes':
  $euroyes = 'selected';
  break;
case 'No':
  $eurono = 'selected';
  break;
default:
  echo "";
}
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

Europe '80 5+yrs (Y/N)(Yrs):&nbsp;&nbsp;

<select name="eurochoose" id="eurochoose" onchange="showme('eurochoose','euro',1)">
<option value="N/A" <?php echo $eurona ?>>Please Select</option>   
<option value="Yes" <?php echo $euroyes ?>>Yes</option>
<option value="No" <?php echo $eurono ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="euro" id="euro" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $euro ?>" size=20 maxlength=20 placeholder = "years">


</p>
<p>
<?php

echo "Special Diet:";
echo "</br>";
switch ($diet)
{
case 'Reg':
  $dietreg = 'checked';
	
case 'Dfree':
  $dietdfree = 'checked';
 
case 'Veg':
  $dietveg = 'checked';
  
case 'Vegan':
  $dietvegan = 'checked';
  
case 'Other':
  $dietother = 'checked';
 
default:
  echo "";
}
?>
<input type="checkbox" name="diet" value="Reg" <?php echo $dietreg ?>> Regular
<input type="checkbox" name="diet" value="Dfree" <?php echo $dietdfree ?>> Dairy-Free
<input type="checkbox" name="diet" value="Veg" <?php echo $dietveg ?>> Vegetarian(eggs/dairy)
<input type="checkbox" name="diet" value="Vegan" <?php echo $dietvegan ?>> Vegan
<input type="checkbox" name="diet" value="Other" <?php echo $dietother ?>> Other

</p>
<p>
<?php

echo "Donor Packet:&nbsp;&nbsp;";

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

echo "<select name=\"donorpacket\">\n";
echo "<option value=\"Sent\" $sent>Sent</option>\n";
echo "<option value=\"Received\" $received>Received</option>\n";
echo "</select>\n";

include 'donorMedi.php';
?>
</p>
<p>
<?php

echo "Comments (100 characters)";

?>
</p>
<p>
<?php

echo "<textarea name=\"donorcomment\" rows=\"2\" cols=\"50\" maxlength=\"102\" >\n";
echo "$donorcomment\n";
echo "</textarea>\n";
echo "\n";

?>
</p>
<p>
<?php
echo "<input type=\"submit\" value=\"Edit Donor\" >\n";
echo "</br>";
?>
</p>
<p>
<?php
echo "</form>";


// ****************************************************************

   mysql_free_result($result); 

   echo "</br>";

   echo "<p><a href=\"./donorslt.php\">Return to Donor Result</a></p>\n";
   echo "</br>";

   echo "<p><a href=\"./donormenu.php\">Return to Donor Menu</a></p>\n";


   mysql_close($con);




?> 

</P>


</BODY>
</HTML>
