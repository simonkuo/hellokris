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


<P><a href="./donorsearch.php">Screener Search</a></P>
<br>
<P><a href="../dbenter.php">Main Menu</a></P>
<br>
<!--
<P><a href="./donormod.html">Field Modification</a></P>
<br>
-->

<?php



// Print_r ($_SESSION);

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);


// Determine the number of donors  

   mysql_select_db('milk_db', $con);

   $result = mysql_query("SELECT MAX(donornumber) FROM screenertable"); 

   $dnum = mysql_result($result,0);


echo "</br>";
echo "Number of Donors:&nbsp;&nbsp; ";
echo "<b>";
echo $dnum;
echo "</b>";   
echo "</br>";


?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
