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

mysql_select_db('milk_db', $con);


$sql   = "SELECT fname, lname, donornum, dnrapdate, bpoolnumber, bpooldate, batchnumber, bottlenumber, rdate 
from donortbl, recv, labtbl
where donornum = donornumr
and donornumr = donornuml
and donornum = '$dnum'";



//echo $sql;
//echo "</br>";

   $result = mysql_query($sql, $con); 



/*
echo "</br>"; 
Print_r ($_SESSION);
echo "</br>";

*/
if (!$result)
   {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
      exit;
   }


// echo "</br>";

   $row = mysql_fetch_assoc($result);


$dnrapdatetemp = $row['dnrapdate'];

// converting date in the following format mm-dd-yyyy
  
$dnrapdate = substr($dnrapdatetemp,5,2) . "-" .  substr($dnrapdatetemp,8,2) . "-" . substr($dnrapdatetemp,0,4); 


$bpoolnumber = $row['bpoolnumber'];

$batchnumber = $row['batchnumber'];



echo "</br>"; 
echo "First Name:  " . "<b>" . $row['fname'] . "</b>"; 
echo "</br>\n";
echo "Last Name:  " . "<b>" . $row['lname'] . "</b>"; 
echo "</br>"; 
echo "Donor number:" . "&nbsp;&nbsp;&nbsp;" . "<b>" . $dnum . "</b>"; 
echo "</br>\n";
echo "Donor Application Date:&nbsp;&nbsp;" . "<b>" . $dnrapdate . "</b>";
echo "</br>\n";

echo "Blue Pool Number:&nbsp;&nbsp;" . "<b>" . "<a href=\"./bpoolproc.php?bpoolnumber=$bpoolnumber\"> '$bpoolnumber'</a>" . "</b>";
echo "</br>\n";

       
$bpooldatetemp = $row['bpooldate'];

// converting date in the following format mm-dd-yyyy
  
$bpooldate = substr($bpooldatetemp,5,2) . "-" .  substr($bpooldatetemp,8,2) . "-" . substr($bpooldatetemp,0,4); 



echo "Blue Pool Date:&nbsp;&nbsp;" . "<b>" . $bpooldate . "</b>";
echo "</br>\n";

echo "Batch Number:&nbsp;&nbsp;" . "<b>" . "<a href=\"./batchproc.php?batchnumber=$batchnumber\"> '$batchnumber'</a>" . "</b>";
echo "</br>\n";

echo "Bottle Number:&nbsp;&nbsp;" . "<b>" . $row['bottlenumber'] . "</b>";
echo "</br>\n";

$rdatetemp = $row['rdate'];

// converting date in the following format mm-dd-yyyy
  
$rdate = substr($rdatetemp,5,2) . "-" .  substr($rdatetemp,8,2) . "-" . substr($rdatetemp,0,4); 


echo "Date Received:&nbsp;&nbsp;" . "<b>" . $rdate . "</b>";
echo "</br>\n";
echo "Donor Baby Date of Birth:&nbsp;&nbsp;" . "<b>" . $rdate . "</b>";
echo "</br>\n";


 mysql_close($con);



echo "</br>";
echo "<p><a href=\"./labmenu.php\">Lab Menu</a></p>\n";
echo "</br>";




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
