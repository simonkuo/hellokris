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
<style>
body
{
background-color:yellow;
}
h1
{
color:orange;
text-align:center;
}
p
{
font-family:"Times New Roman";
font-size:20px;
}
</style>
-->

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php

$dnum = $_GET["dnum"];


// Print_r ($_SESSION);
echo "</br>"; 

   echo "</br>";


/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

   echo "</br>";



echo $_POST["fexpmm"] . " " . $_POST["fexpdd"] . " " . $_POST["fexpyy"];



echo "<form action=\"recvcnfrm.php?dnum=$dnum&ctype=2\" method=\"post\">\n";
echo "<br>";
echo "Doner number:&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"donornumber\" size=\"9\" maxlength=\"9\" value=\"$dnum\">\n"; 
echo "</br>";
echo "</br>";

$rmm = substr($rdate,5,2);
$rdd = substr($rdate,8,2);
$ryy = substr($rdate,0,4);

echo "Date Received:&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"rmm\" size=\"2\" maxlength=\"2\" value=\"$rmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"rdd\" size=\"2\" maxlength=\"2\" value=\"$rdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"ryy\" size=\"4\" maxlength=\"4\" value=\"$ryy\">\n";
echo "&nbsp;mm-dd-yyyy\n";


echo "</br>"; 
echo "</br>";

$cmm = substr($cdate,5,2);
$cdd = substr($cdate,8,2);
$cyy = substr($cdate,0,4);

echo "Date Created:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<input type=\"int\" name=\"cmm\" size=\"2\" maxlength=\"2\" value=\"$cmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"cdd\" size=\"2\" maxlength=\"2\" value=\"$cdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"cyy\" size=\"4\" maxlength=\"4\" value=\"$cyy\">\n";
echo "&nbsp;mm-dd-yyyy\n";


echo "</br>"; 

echo "</br>";

echo "Number of Package:&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"pkgnum\" size=\"4\" maxlength=\"4\" value=\"$pkgnum\">\n"; 
echo "</br>"; 
echo "</br>"; 

echo "Ounces Donated:&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"pkgnumoncs\" size=\"4\" maxlength=\"4\" value=\"$pkgnumoncs\">\n"; 
echo "</br>"; 

echo "</br>\n";
echo "</br>\n";


// ****************************************************************

mysql_free_result($result); 

echo "</br>";
echo "</br>";
echo "</br>";

echo "</br>\n";
echo "<input type=\"submit\" value=\"Add Donor Package\">\n";

echo "</br>";

echo "</br>\n";
echo "</form>\n";

echo "<p><a href=\"./receivingmenu.php\">Receiver Menu</a></p>\n";
echo "</br>";


mysql_close($con);




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
