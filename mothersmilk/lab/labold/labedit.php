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



// Search for Donor in table

// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milkdb', $con);

$sql   = "SELECT * FROM donortbl where donornum =  '$dnum'";

$result = mysql_query($sql, $con); 

$row = mysql_fetch_assoc($result);


//Print_r ($_SESSION);

$fname = $row['fname'];
$lname = $row['lname'];

echo "<form action=\"labcnfrm.php?dnum=$dnum&fname=$fname&lname=$lname\" method=\"post\">\n";
//echo "<form action=\"dnrcnfrm.php?dnrrcrdnum='3'&ctype=1\" method=\"post\">\n";
echo "</br>\n";
echo "First Name:&nbsp;&nbsp;" . "<b>" . $fname . "</b>";
echo "</br>\n";
echo "</br>\n";
echo "Last Name:&nbsp;&nbsp;" . "<b>" . $lname . "</b>";
echo "</br>\n";
echo "</br>\n";
echo "Doner number:&nbsp;&nbsp;" . "<b>" . $dnum . "</b>";
echo "</br>";

$sql   = "SELECT * FROM labtbl where donornuml =  '$dnum'";


$result = mysql_query($sql, $con); 

$row = mysql_fetch_assoc($result);


$bpoolnumber = $row['bpoolnumber']; 
$bpooldate = $row['bpooldate']; 
$bottlenumber = $row['apstbtlid']; 
$dnrrcrdnum = $row['dnrrcrdnum']; 


echo "</br>\n";



echo "</br>\n";
echo "Blue Pool Number:&nbsp;&nbsp; <input type=\"text\" name=\"bpoolnumber\" value=\"$bpoolnumber\" size=\"25\" maxlength=\"20\">\n";


echo "<br>" . "<br>" . "Blue Pool Date:&nbsp;&nbsp; \n";


// Break string to dsplay month - day - year

$bplmm = substr($bpooldate,5,2); 
$bpldd = substr($bpooldate,8,2); 
$bplyy = substr($bpooldate,0,4); 



// echo "<br>\n";
echo "<input type=\"int\" name=\"bplmm\" size=\"2\" maxlength=\"2\" value=\"$bplmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"bpldd\" size=\"2\" maxlength=\"2\" value=\"$bpldd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"bplyy\" size=\"4\" maxlength=\"4\" value=\"$bplyy\">\n";
echo "&nbsp;mm-dd-yyyy\n";
echo "<br>\n";
echo "<br>\n";

echo "Batch Number:&nbsp;&nbsp; <input type=\"text\" name=\"state\" value=\"$state\" size=\"5\" maxlength=\"2\">\n";
echo "<br>\n";
echo "<br>\n";
echo "Bottle Number:&nbsp;&nbsp; <input type=\"text\" name=\"bottlenumber\" value=\"$bottlenumber\" size=\"7\" maxlength=\"5\">\n";
echo "<br>\n";
echo "<br>\n";
echo "Date Received:&nbsp;&nbsp; <input type=\"text\" name=\"country\" value=\"$country\" size=\"20\" maxlength=\"15\" value=\"USA\">\n";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";






echo "</br>\n";
echo "</br>\n";
echo "<input type=\"submit\" value=\"Edit Lab\">\n";
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
   echo "<p><a href=\"./labmenu.php\">Return to Lab Menu</a></p>\n";


   mysql_close($con);




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
