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

//Print_r ($_SESSION);

/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);


// Next 4 lines generate the next donor number   

mysql_select_db('milk_db', $con);

$result = mysql_query("SELECT MAX(donornumber) FROM screenertable"); 

$lastnumber = mysql_result($result,0);

$donornumber = $lastnumber + 1;  /* Next donor number  */

// Populate month - day - year

$appmm = (idate("m"));
$appdd = (idate("d"));
$appyy = (idate("Y"));
// echo "<br>";
echo "<p><b><font size=5>Donor Screening</font></b></p>\n";

echo "<form action=\"dnrcnfrm.php?donornumber=$donornumber&ctype=2\" method=\"post\">\n";
// echo "Donor number:&nbsp;&nbsp; ";
echo "Doner Number:&nbsp;&nbsp;" . "<b>" . $donornumber . "</b>";
echo "</br>\n";
echo "</br>\n";
echo "Call Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";

echo "<input type=\"int\" name=\"dnrappmm\" size=\"2\" maxlength=\"2\" value=\"$appmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"dnrappdd\" size=\"2\" maxlength=\"2\" value=\"$appdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"dnrappyr\" size=\"4\" maxlength=\"4\" value=\"$appyy\">\n";
echo "&nbsp;(mm-dd-yyyy)\n";
echo "</br>\n";
echo "</br>\n";

echo "Donor Type:&nbsp;&nbsp;";
echo "<select name=\"donortype\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"individual\">Individual</option>\n";
echo "<option value=\"organization\">Organization</option>\n";
echo "</select>\n";
echo "\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Organization:&nbsp;&nbsp;";
echo "<select name=\"organization\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"STN\">STN</option>\n";
echo "<option value=\"JHH\">JHH</option>\n";
echo "</select>\n";
echo "\n";


echo "</br>\n";
echo "</br>\n";
echo "First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"donorfname\" size=\"25\" maxlength=\"20\" >";
echo "</br>\n";
echo "</br>\n";
echo "Middle Name:&nbsp; <input type=\"text\" name=\"donormname\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "</br>\n";
echo "Last Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"donorlname\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "</br>\n";
echo "Address:&nbsp;&nbsp; <input type=\"text\" name=\"address\" size=\"25\" maxlength=\"20\">\n";
echo "&nbsp;&nbsp;City:&nbsp;&nbsp; <input type=\"text\" name=\"city\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "</br>\n";
echo "State:&nbsp;&nbsp; <input type=\"text\" name=\"state\" size=\"5\" maxlength=\"2\">\n";
echo "&nbsp;&nbsp;Zip Code:&nbsp;&nbsp; <input type=\"text\" name=\"zip\" size=\"7\" maxlength=\"5\">\n";
echo "&nbsp;&nbsp;Country:&nbsp;&nbsp; <input type=\"text\" name=\"country\" size=\"20\" maxlength=\"15\" value=\"USA\">\n";
echo "</br>\n";
echo "</br>\n";

echo "Home Phone:&nbsp;&nbsp; <input type=\"text\" name=\"hphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonesu\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;&nbsp;Cell Phone:&nbsp;&nbsp; <input type=\"text\" name=\"cphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonesu\" size=\"4\" maxlength=\"4\">\n";

echo "</br>\n";
echo "</br>\n";
echo "Email:&nbsp;&nbsp; <input type=\"text\" name=\"email\" size=\"30\" maxlength=\"20\">\n";

echo "</br>\n";
echo "</br>\n";
echo " Referred By:&nbsp;&nbsp;";
echo "<select name=\"referral\">\n";
echo "<option value=\"internet\">Internet</option>\n";
echo "<option value=\"previous\">Previous Donor</option>\n";
echo "<option value=\"surrogate\">Surrogate</option>\n";
echo "<option value=\"other\">Other</option>\n";
echo "</select>\n";
echo "\n";

echo "</br>\n";
echo "</br>\n";
echo "<p><b>Baby Information</b></p>\n";

echo "Baby's Name:&nbsp; <input type=\"text\" name=\"babysname\" size=\"25\" maxlength=\"20\">\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;Baby's DOB:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";

// echo "Baby's DOB:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";

echo "<input type=\"int\" name=\"bbmm\" size=\"2\" maxlength=\"2\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"bbdd\" size=\"2\" maxlength=\"2\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"bbyy\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;(mm-dd-yyyy)\n";

echo "</br>\n";
echo "</br>\n";
echo "Baby Status:&nbsp;&nbsp;";
echo "<select name=\"babystatus\">\n";
echo "<option value=\"Preterm\">Preterm (<36 wks)</option>\n";
echo "<option value=\"In hospital\">In Hospital</option>\n";
echo "<option value=\"Bereaved\">Bereaved</option>\n";
echo "<option value=\"Research\">Research</option>\n";
echo "</select>\n";
echo "\n";
echo "</br>";
echo "</br>";

echo "Amount can donate:&nbsp;<input type=\"text\" name=\"donateamount\" size=\"10\" maxlength=\"20\">\noz";
echo "</br>";
echo "</br>";
echo "Stored from:&nbsp;&nbsp;";
echo "<select name=\"storefrom\">\n";
echo "<option value=\"deepfreeze\">Deep Freeze</option>\n";
echo "<option value=\"milkhome\">Milk at Home</option>\n";
echo "<option value=\"hospital\">Hospital</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;&nbsp;Can commit to 100 oz:&nbsp;&nbsp;";
echo "<select name=\"milkcommit\">\n";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";
echo "</br>";
echo "</br>";

echo "RX/BC Pll/OTC Use (Dates):&nbsp;&nbsp;<input type=\"text\" name=\"rxbcdate\" size=\"20\" maxlength=\"30\">\n (mm-dd-yyyy)";

echo "</br>";
echo "</br>";
echo "Supplements w/Herbs/Herb Teas:&nbsp;&nbsp;";
echo "<select name=\"herbs\">\n";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;&nbsp;Alcohol while pumping:&nbsp;&nbsp;";
echo "<select name=\"alcohol\">\n";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;&nbsp;Smoke:&nbsp;&nbsp;";
echo "<select name=\"smoke\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";

echo "</br>";
echo "</br>";

echo "&nbsp;&nbsp;Transfusion:&nbsp;&nbsp;";
echo "<select name=\"transfusion\">\n";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";


echo "</br>";
echo "</br>";

echo "Donor Packet:&nbsp;&nbsp;";
echo "<select name=\"donorpacket\">\n";
echo "<option value=\"N/A\">Please select</option>\n";
echo "<option value=\"Sent\">Sent</option>\n";
echo "<option value=\"Received\">Received</option>\n";
echo "</select>\n";


echo "</br>\n";
echo "</br>\n";


echo "Comments (100 characters)";

echo "</br>\n";
echo "</br>\n";

echo "\n";


echo "<textarea name=\"donorcomment\" rows=\"2\" cols=\"50\" maxlength=\"102\" >\n";
echo "</textarea>\n";
echo "\n";

echo "</br>\n";




echo "</br>\n";
echo "</br>\n";
echo "<input type=\"submit\" value=\"Add Donor\">\n";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
echo "</form>\n";

echo "</br>";


mysql_free_result($result); 

   echo "</br>";
   echo "</br>";
   echo "</br>";



   echo "</br>";
   echo "<p><a href=\"./donormenu.php\">Return to Donor Menu</a></p>\n";

mysql_close($con);




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
