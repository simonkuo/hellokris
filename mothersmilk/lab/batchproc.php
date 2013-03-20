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


$batchnumber = $_POST["batchnumber"];

// $bpoolnumber = $_POST["bpoolnumber"];

if (!$batchnumber)
   {
      // Batch number came from labdsply.php
     
      $batchnumber = $_GET["batchnumber"];

      echo "Came from labdsply\n";
   }
else
   {
      // Batch number came from labdsply.php
     
      echo "Came from batchsearch.php\n";
   }




// Search for Donor in table

// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

    mysql_select_db('milk_db', $con);



$sql = "select batchnumber, batchrnumber, batchdate, batchdsgn  
from labtbl
where batchnumber = '$batchnumber'";


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

$fname = $row['fname'];
$lname = $row['lname'];
$batchnumber = $row['batchnumber'];
$batchdate = $row['batchdate'];
$batchdsgn = $row['batchdsgn'];
$batchrnumber = $row['batchrnumber'];


echo "</br>\n";
echo "</br>\n";
echo "<b>" . "Batch Processing" . "</b>"; 
echo "</br>\n";
echo "</br>\n";
echo "</br>"; 
echo "Batch Number:&nbsp;&nbsp;" . "<b>" . $batchnumber . "</b>";
echo "&nbsp;&nbsp;&nbsp;Batch Date:&nbsp;&nbsp;"  . "<b>" . $batchdate . "</b>";
echo "</br>\n";
echo "Batch Refrigeration Number:&nbsp;&nbsp;" . "<b>" . $batchrnumber . "</b>";
echo "</br>\n";
echo "Batch Designation:&nbsp;&nbsp;"  . "<b>" . $batchdsgn . "</b>";
echo "</br>\n";
echo "</br>\n";



echo "</br>"; 
Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 


 mysql_close($con);


$urights = $_SESSION['urights'];



if ($urights==1 or $urights==2)
     {
         echo "<p><a href=\"./labedit.php?dnum=$dnum\">Edit</a></p>\n";
     }

 

echo "</br>"; 

echo "<p><a href=\"./labproc.php\">Lab Processing Menu</a></p>\n";

echo "</br>"; 

?>

</P>

<P><BR><BR>

</BODY>
</HTML>
