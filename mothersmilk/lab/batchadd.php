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

<?php include '../mystyle.php'; ?>


</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php



echo "</br>\n";
echo "</br>\n";
echo "<b>" . "Create New Batch" . "</b>"; 
echo "</br>\n";
echo "</br>\n";


echo "<form action=\"batchcnfrm.php?dnum=$dnum&ctype=2\" method=\"post\">\n";
echo "<br>";

echo "Batch Number:&nbsp;&nbsp; <input type=\"text\" name=\"batchnumber\" size=\"9\" maxlength=\"9\" value=\"$batchnumber\">\n"; 


// Populate month - day - year

$bpmm = (idate("m"));
$bpdd = (idate("d"));
$bpyy = (idate("Y"));


echo "&nbsp;&nbsp;&nbsp;Blue Pool Date:&nbsp;&nbsp";
echo "<input type=\"int\" name=\"bpmm\" size=\"2\" maxlength=\"2\" value=\"$bpmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"bpdd\" size=\"2\" maxlength=\"2\" value=\"$bpdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"bpyr\" size=\"4\" maxlength=\"4\" value=\"$bpyy\">\n";
echo "&nbsp;(mm-dd-yyyy)\n";

echo "</br>\n";
echo "</br>\n";

echo "Batch Refrigeration Number:&nbsp;&nbsp;" . "<b>" . $batchrnumber . "</b>";
echo "</br>\n";
echo "</br>\n";


echo "Batch Designation:&nbsp;&nbsp;&nbsp;";
echo "<select name=\"batchdesignation\">\n";
echo "<option value=\"Dairy Free\">Dairy Free</option>\n";
echo "<option value=\"Full Term\">Full Term</option>\n";
echo "<option value=\"Pre Term\">Pre Term</option>\n";
echo "<option value=\"Research Only\">Research Only</option>\n";
echo "<option value=\"Unusable\">Unusable</option>\n";
echo "<option value=\"Quarantined\">Quarantined</option>\n";
echo "</select>\n";


//echo "Batch Designation:&nbsp;&nbsp;"  . "<b>" . $batchdsgn . "</b>";
echo "</br>\n";



echo "</br>"; 
// Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 

echo "</br>\n";
echo "<input type=\"submit\" value=\"Add Batch\">\n";



echo "</br>\n";
echo "</form>\n";



 

echo "</br>"; 

echo "<p><a href=\"./labmenu.php\">Lab Menu</a></p>\n";

echo "</br>"; 

?>

</P>

<P><BR><BR>

</BODY>
</HTML>
