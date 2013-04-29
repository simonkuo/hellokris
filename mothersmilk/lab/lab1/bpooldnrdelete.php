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

Print_r ($_SESSION);

$dnum = $_GET["dnum"];
$bpoolnumber = $_GET["bpoolnumber"];

echo "bpoolnumber: " . "$bpoolnumber";
echo "<br>";


echo "<p><b>Remove donor from Blue Pool number</b></p>";


echo "<br>";

echo "</br>";
echo "<form action=\"bpooldnrcnfrm.php?bpoolnumber=$bpoolnumber&ctype=3\" method=\"post\">\n";


// echo "Donor number:&nbsp;&nbsp; ";
echo "Doner Number:&nbsp;&nbsp; <input type=\"text\" name=\"donornumber\" value=\"$dnum\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "</br>\n";
echo "<input type=\"submit\" value=\"Remove Donor\">\n";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
echo "</form>\n";

echo "</br>";

echo "</br>";
echo "</br>";


// ****************************************************************

   mysql_free_result($result); 

   echo "</br>";
   echo "</br>";
   echo "</br>";



   echo "</br>";
   echo "<p><a href=\"./bpoolproc.php?bpoolnumber=$bpoolnumber\">Back</a></p>\n";

// some code

// mysql_close($con);




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
