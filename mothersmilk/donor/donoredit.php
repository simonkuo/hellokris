<?php
session_start();
// store session data

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="LibreOffice 3.3  (Linux)">
	<META NAME="AUTHOR" CONTENT="Pat Dumalanta, ChingYing Kuo">
	<META NAME="CREATED" CONTENT="2012/11/23;15512700">
	<META NAME="CHANGEDBY" CONTENT="Pat Dumalanta, ChingYing Kuo">
	<META NAME="CHANGED" CONTENT="2013/03/06;16005500">
<!--
<?php include '../mystyle.php'; ?>
-->
<?php 

include '../include/main.js'; 

?>
<link type="text/css" rel="stylesheet" href="mystyle.css">

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->

<?php

echo "<p><label class='boldtext'>Donor Screening</label></p>\n";
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
$diet = $row["diet"];
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


echo "<form action=\"dnrcnfrm.php?donornumber=$dnum&ctype=1\" method=\"post\">\n";
echo "Doner number:&nbsp;&nbsp;&nbsp;" . "<b>$dnum</b>";

echo "</br>\n";
echo "</br>\n";


if($determinechoose == "A"|"P"|"NP"|"F")
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
<option value="N/A" <?php if($determinechoose=="N/A") echo 'selected' ?>>Please Select</option>   
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


if($determinechoose == "F"|"D")
{
  $process ="on";
}
else
{
  $process ="off";
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
<option value="IND" <?php if($organization=="IND") echo 'selected' ?>>Individual</option>
<option value="STN" <?php if($organization=="STN") echo 'selected' ?>>Stanford</option>  
<option value="JHH" <?php if($organization=="JHH") echo 'selected' ?>>John Hopkns</option>
<option value="OTH" <?php if($organization=="OTH") echo 'selected' ?>>Other</option>
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
echo "<p><b>Baby Information</b></p>\n";

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
<option value="N/A" <?php if($rxbcchoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($rxbcchoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($rxbcchoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="rxbcdate" id="rxbcdate" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $rxbcdate ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">

</p>
<p>
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

Supplements w/Herbs/Herb Teas (Y/N)(Dates):&nbsp;&nbsp;

<select name="herbschoose" id="herbschoose" onchange="showme('herbschoose','herbs',1)">
<option value="N/A" <?php if($herbschoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($herbschoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($herbschoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="herbs" id="herbs" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $herbs ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  



</p>
<p>
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
Alcohol while pumping (Y/N)(Dates):&nbsp;&nbsp;

<select name="alcoholchoose" id="alcoholchoose" onchange="showme('alcoholchoose','alcohol',1)">
<option value="N/A" <?php if($alcoholchoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($alcoholchoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($alcoholchoose=="No") echo 'selected' ?>>No</option>
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

echo "&nbsp;&nbsp;&nbsp;ivDrugs:&nbsp;&nbsp;";
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
<option value="N/A" <?php if($transfusionchoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($transfusionchoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($transfusionchoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="transfusion" id="transfusion" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $transfusion ?>" size=20 maxlength=20 placeholder = "mm-dd-yyyy">


</p>
<p>
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

Work Hi-Risk/Blood (Y/N)(Dates):&nbsp;&nbsp;

<select name="workchoose" id="workchoose" onchange="showme('workchoose','work',1)">
<option value="N/A" <?php if($workchoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($workchoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($workchoose=="No") echo 'selected' ?>>No</option>
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
<option value="N/A" <?php if($tattooschoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($tattooschoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($tattooschoose=="No") echo 'selected' ?>>No</option>
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
<option value="N/A" <?php if($herpeschoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($herpeschoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($herpeschoose=="No") echo 'selected' ?>>No</option>
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
<option value="N/A" <?php if($ukmoschoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($ukmoschoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($ukmoschoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="ukmos" id="ukmos" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $ukmos ?>" size=20 maxlength=20 placeholder = "years"> 


</p>
<p>
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

Europe '80 5+yrs (Y/N)(Yrs):&nbsp;&nbsp;

<select name="eurochoose" id="eurochoose" onchange="showme('eurochoose','euro',1)">
<option value="N/A" <?php if($eurochoose=="N/A") echo 'selected' ?>>Please Select</option>   
<option value="Yes" <?php if($eurochoose=="Yes") echo 'selected' ?>>Yes</option>
<option value="No" <?php if($eurochoose=="No") echo 'selected' ?>>No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="euro" id="euro" style="display:<?php echo $switching2 ?>;position:relative;visibility:<?php echo $switching ?>; " value= "<?php echo $euro ?>" size=20 maxlength=20 placeholder = "years">


</p>
<p>
<?php

echo "Special Diet:";
echo "</br>";

?>
<input type="checkbox" name="reg" value="Reg" <?php if($reg=="Reg")echo 'checked' ?>> Regular
<input type="checkbox" name="dfree" value="Dfree" <?php if($dfree=="Dfree")echo 'checked'?>> Dairy-Free
<input type="checkbox" name="veg" value="Veg" <?php if($veg=="Veg")echo 'checked' ?>> Vegetarian(eggs/dairy)
<input type="checkbox" name="vegan" value="Vegan" <?php if($vegan=="Vegan")echo 'checked' ?>> Vegan
<input type="checkbox" name="others" value="Other" <?php if($others=="Other")echo 'checked' ?>> Other

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
<?php
include 'followupadd.php'; 
?>
<p>
<?php
echo "<input type=\"submit\" value=\"Edit Donor\">\n";
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
