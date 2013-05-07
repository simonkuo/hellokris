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



$sql = "select fname, lname, donornum, bottlenumber, bottlernumber, bottledate, bottledsgn, batchnumber, batchdate, batchdsgn  
from donortbl, recv, labtbl
where donornum = dnrnum
and dnrnum = donornuml
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

$bottlenumber = $row['bottlenumber'];
$bottledate = $row['bottledate'];
$bottledsgn = $row['bottledsgn'];
$bottlernumber = $row['bottlernumber'];

$batchnumber = $row['batchnumber'];
$batchdate = $row['batchdate'];
$batchdsgn = $row['batchdsgn'];



echo "</br>\n";
echo "</br>\n";
echo "<b>" . "Bottle Processing" . "</b>"; 
echo "</br>\n";
echo "</br>\n";
echo "</br>"; 
echo "Bottle Number:&nbsp;&nbsp;" . "<b>" . $bottlenumber . "</b>";
echo "&nbsp;&nbsp;&nbsp;Bottle Date:&nbsp;&nbsp;"  . "<b>" . $bottledate . "</b>";
echo "</br>\n";
echo "Bottle Refrigeration Number:&nbsp;&nbsp;" . "<b>" . $bottlernumber . "</b>";
echo "</br>\n";
echo "Bottle Designation:&nbsp;&nbsp;"  . "<b>" . $bottledsgn . "</b>";
echo "</br>\n";
echo "</br>\n";


echo "</br>"; 
echo "Batch Number:&nbsp;&nbsp;" . "<b>" . $batchnumber . "</b>";
echo "&nbsp;&nbsp;&nbsp;Batch Date:&nbsp;&nbsp;"  . "<b>" . $batchdate . "</b>";
echo "</br>\n";
echo "Batch Designation:&nbsp;&nbsp;"  . "<b>" . $batchdsgn . "</b>";
echo "</br>\n";



echo "</br>"; 
Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 


 mysql_close($con);


$urights = $_SESSION['urights'];

echo "<menu>\n";
echo "       <form action=\"../labmenu.php\" style=\"display:inline\">\n";
echo "  <li>\n";
echo "          <input type=\"submit\" id=\"mysubmit\" value=\"Lab Menu\">\n";
echo "  </li>\n";
echo "       </form>\n";
echo "  <li>\n";
echo "       <form action=\"../labsearch.php\" style=\"display:inline\">\n";
echo "          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" id=\"mysubmit\" value=\"Search\">\n";
echo "       </form>\n";
echo "  </li>\n";










if ($urights==1 or $urights==2)
     {
         echo "<p><a href=\"./labedit.php?dnum=$dnum\">Edit</a></p>\n";
     }

?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
