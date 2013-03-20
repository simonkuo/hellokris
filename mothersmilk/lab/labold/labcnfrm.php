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

$dnum = $_GET["dnum"];

$fname = $_GET["fname"];

$lname = $_GET["lname"];



echo "</br>"; 
echo $dnum;
echo "<br>";



$bpoolnumber = $_POST["bpoolnumber"];
$bplmm = $_POST["bplmm"];
$bpldd = $_POST["bpldd"];
$bplyy = $_POST["bplyy"];
$bottlenumber = $_POST["bottlenumber"];


echo "</br>"; 
echo "First Name:  " . "<b>" . $fname . "</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "Last Name:  " . "<b>" . $lname . "</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "Donor number: " . "<b>" . $dnum . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Blue Pool Number:&nbsp;&nbsp;" . "<b>" . $bpoolnumber . "</b>";
echo "</br>"; 
echo "</br>"; 


echo "Blue Pool Date:&nbsp;&nbsp;" . "<b>" . $bplmm . "&nbsp;&nbsp;" . $bpldd . "&nbsp;&nbsp;" . $bplyy . "</b>" . "&nbsp;&nbsp;(mm-dd-yyyy)";
echo "<br>\n";
echo "<br>\n";


echo "Batch Number:&nbsp;&nbsp; <input type=\"text\" name=\"state\" value=\"$state\" size=\"5\" maxlength=\"2\">\n";
echo "<br>\n";
echo "<br>\n";
echo "Bottle Number:&nbsp;&nbsp;" . "<b>" . $bottlenumber . "</b>";
echo "<br>\n";
echo "<br>\n";
echo "Date Received:&nbsp;&nbsp; <input type=\"text\" name=\"country\" value=\"$country\" size=\"20\" maxlength=\"15\" value=\"USA\">\n";
echo "</br>\n";
echo "</br>\n";


echo "</br>"; 
 
//Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 


// Construct Blue Pool Date
$bpldate = $bplyy . "-" . $bplmm . "-" . $bpldd;

//echo "<br>" . $bpldate . "</br>"; 


//  Connect to Data Base  



$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milkdb', $con);


if (!mysql_select_db('milkdb', $con)) 
   {
   echo 'Could not select database';
   exit;
   }

//Lab is being edited

$sql = "UPDATE labtbl SET bpoolnumber= '$bpoolnumber', bpooldate='$bpldate', apstbtlid='$bottlenumber' WHERE donornuml = '$dnum'";

$result = mysql_query($sql, $con); 

if (!$result) 
   {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
      exit;
   }

echo "<br>";
//echo $sql;
echo "<br>";

mysql_close($con);

echo "</br>";
echo "</br>";
echo "<p><a href=\"./labmenu.php\">Return to Lab Menu</a></p>\n";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
