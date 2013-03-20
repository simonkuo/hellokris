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
	<META NAME="AUTHOR" CONTENT="Pat Dumalanta">
	<META NAME="CREATED" CONTENT="20121123;15512700">
	<META NAME="CHANGEDBY" CONTENT="Pat Dumalanta">
	<META NAME="CHANGED" CONTENT="20121123;16005500">
<!--
<?php include '../mystyle.php'; ?>
-->

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php
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
$donortype = $row['donortype'];
$organization = $row['organization'];
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
$rxbcdate = $row['rxbcdate'];
$herbs = $row['herbs'];
$alcohol = $row['alcohol'];
$transfusion = $row['transfusion'];
$donateamount = $row['donateamount'];




// Break string to display home and cell phone

$hphoneac = substr($hphone,0,3); 
$hphonepr = substr($hphone,3,3); 
$hphonesu = substr($hphone,6,4); 

$cphoneac = substr($cphone,0,3); 
$cphonepr = substr($cphone,3,3); 
$cphonesu = substr($cphone,6,4); 




echo "<form action=\"dnrcnfrm.php?donornumber=$dnum&ctype=1\" method=\"post\">\n";
//echo "<form action=\"dnrcnfrm.php?dnrrcrdnum='3'&ctype=1\" method=\"post\">\n";
//echo "Doner number:&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"donornumber\" value=\"$dnum\">\n";
echo "Doner number:&nbsp;&nbsp;&nbsp;" . "<b>$dnum</b>";
echo "</br>";
echo "</br>";
echo "Donor Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<select name=\"donortype\">\n";
echo "<option value=\"Non\">Please Select</option>\n";
echo "<option value=\"individual\">Individual</option>\n";
echo "<option value=\"organization\">Organization</option>\n";
echo "</select>\n";
//echo "\n";


echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Organization:&nbsp;&nbsp;";
echo "<select name=\"organization\">\n";
echo "<option value=\"Non\">Please Select</option>\n";
echo "<option value=\"STN\">STN</option>\n";
echo "<option value=\"JHH\">JHH</option>\n";
echo "</select>\n";
echo "\n";


echo "</br>\n";
echo "</br>";
echo "First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"donorfname\" value=\"$fname\" size=\"25\" maxlength=\"20\" >";
echo "</br>\n";
echo "</br>\n";
echo "Middle Name:&nbsp; <input type=\"text\" name=\"donormname\" value=\"$mname\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "</br>\n";
echo "Last Name:&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"donorlname\" value=\"$lname\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "</br>\n";

echo "Address:&nbsp;&nbsp; <input type=\"text\" name=\"address\" value=\"$address\" size=\"25\" maxlength=\"20\">\n";
echo "&nbsp;&nbsp;City:&nbsp;&nbsp; <input type=\"text\" name=\"city\" value=\"$city\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "</br>\n";
echo "State:&nbsp;&nbsp; <input type=\"text\" name=\"state\" value=\"$state\" size=\"5\" maxlength=\"2\">\n";
echo "&nbsp;&nbsp;Zip Code:&nbsp;&nbsp; <input type=\"text\" name=\"zip\" value=\"$zip\" size=\"7\" maxlength=\"5\">\n";
echo "&nbsp;&nbsp;Country:&nbsp;&nbsp; <input type=\"text\" name=\"country\" value=\"$country\" size=\"20\" maxlength=\"15\" value=\"USA\">\n";
echo "</br>\n";
echo "</br>\n";
echo "Home Phone:&nbsp;&nbsp; <input type=\"text\" name=\"hphoneac\" value=\"$hphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonepr\" value=\"$hphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonesu\" value=\"$hphonesu\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;&nbsp;Cell Phone:&nbsp;&nbsp; <input type=\"text\" name=\"cphoneac\" value=\"$cphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonepr\" value=\"$cphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonesu\" value=\"$cphonesu\" size=\"4\" maxlength=\"4\">\n";
echo "</br>\n";
echo "</br>\n";


echo "Email:&nbsp;&nbsp; <input type=\"text\" name=\"email\" value=\"$email\" size=\"30\" maxlength=\"20\">\n";

echo "</br>\n";

//echo "<br>" . $referral . "<br>";


switch ($referral)
{
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


echo "</br>\n";
echo " Referred By:&nbsp;&nbsp;";
echo "<select name=\"referral\">\n";
echo "<option value=\"internet\" $internet>Internet</option>\n";
echo "<option value=\"previous\" $previous>Previous Donor</option>\n";
echo "<option value=\"surrogate\" $surrogate>Surrogate</option>\n";
echo "<option value=\"other\" $other>Other</option>\n";
echo "</select>\n";
echo "\n";

echo "</br>\n";
echo "</br>\n";
echo "<p><b>Baby Information</b></p>\n";

echo "Baby's Name:&nbsp; <input type=\"text\" name=\"babysname\" value=\"$babysname\" size=\"25\" maxlength=\"20\">\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;Baby's DOB:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";

echo "<input type=\"int\" name=\"bbmm\" size=\"2\" maxlength=\"2\" value=\"$bbmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"bbdd\" size=\"2\" maxlength=\"2\" value=\"$bbdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"bbyy\" size=\"4\" maxlength=\"4\" value=\"$bbyy\">\n";
echo "&nbsp;(mm-dd-yyyy)\n";

echo "</br>\n";
echo "</br>\n";


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
echo "\n";
echo "</br>";
echo "</br>";

echo "Amount can donate:&nbsp;<input type=\"text\" name=\"donateamount\"  value=\"$donateamount\" size=\"10\" maxlength=\"20\">\noz";
echo "</br>";
echo "</br>";
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

echo "</br>";
echo "</br>";

echo "RX/BC Pll/OTC Use (Dates):&nbsp;&nbsp;<input type=\"text\" name=\"rxbcdate\" value=\"$rxbcdate\" size=\"20\" maxlength=\"30\">\n (mm-dd-yyyy)";

echo "</br>";
echo "</br>";

switch ($herbs)
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

echo "Supplements w/Herbs/Herb Teas:&nbsp;&nbsp;";
echo "<select name=\"herbs\">\n";
echo "<option value=\"yes\" $yes>Yes</option>\n";
echo "<option value=\"no\" $no>No</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;&nbsp;Alcohol while pumping:&nbsp;&nbsp;";

switch ($alcohol)
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

echo "<select name=\"alcohol\">\n";
echo "<option value=\"yes\" $yes>Yes</option>\n";
echo "<option value=\"no\" $no>No</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;&nbsp;Transfusion:&nbsp;&nbsp;";

switch ($transfusion)
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

echo "<select name=\"transfusion\">\n";
echo "<option value=\"yes\" $yes>Yes</option>\n";
echo "<option value=\"no\" $no>No</option>\n";
echo "</select>\n";

echo "</br>";
echo "</br>";

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


echo "</br>\n";
echo "</br>\n";


echo "Comments (100 characters)";

echo "</br>\n";
echo "</br>\n";

echo "\n";


//echo "<textarea name=\"donorcomment\" rows=\"10\" cols=\"30\" >\n";

//echo "<textarea name=\"donorcomment\" rows=\"1\" cols=\"15\" maxlength=\"17\" >\n";

echo "<textarea name=\"donorcomment\" rows=\"2\" cols=\"50\" maxlength=\"102\" >\n";
echo "$donorcomment\n";
echo "</textarea>\n";
echo "\n";

echo "</br>\n";
echo "</br>\n";
echo "<input type=\"submit\" value=\"Edit Donor\">\n";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
echo "</form>\n";


// ****************************************************************

   mysql_free_result($result); 

   echo "</br>";
   echo "</br>";

   echo "<p><a href=\"./donormenu.php\">Return to Donor Menu</a></p>\n";


   mysql_close($con);




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
