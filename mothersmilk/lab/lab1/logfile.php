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

//**********************

$sql = "select fname, lname, donornum, apstatus, pkgnum, rdate, bpoolnumber, bpooldate, bpooldsgn, bpoolrn  
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

$fname = $row['fname'];
$lname = $row['lname'];
$dnrstat = $row['apstatus'];
$pkgnum = $row['pkgnum'];
$rdate = $row['rdate'];
// $apstbtlid = $row['apstbtlid'];
$bpoolnumber = $row['bpoolnumber'];
$bpooldate = $row['bpooldate'];
$bpooldsgn = $row['bpooldsgn'];
$bpoolrn = $row['bpoolrn'];
$country = $row['country']; 
$state = $row['state'];
$zip = $row['zip'];

echo "Address&nbsp;&nbsp;" . "<b>" . $row['address'] . "</b>";
echo "&nbsp;&nbsp;City&nbsp;&nbsp;" . "<b>" . $row['city'] . "</b>";
echo "</br>\n";



echo "Donor number:" . "&nbsp;&nbsp;&nbsp;" . "<b>" . $dnum . "</b>"; 
echo "</br>"; 
echo "First Name:  " . "<b>" . $fname . "</b>"; 
echo "</br>"; 
echo "Last Name:  " . "<b>" . $lname . "</b>"; 
echo "</br>"; 
echo "Country&nbsp;&nbsp;"  . "<b>" . $country . "</b>";
echo "</br>"; 
echo "State&nbsp;&nbsp;"  . "<b>" . $state . "</b>";
echo "</br>"; 
echo "Zip Code&nbsp;&nbsp;"  . "<b>" . $zip . "</b>";

echo "Blue Pool Number:&nbsp;&nbsp;" . "<b>" . $bpoolnumber . "</b>";
echo "&nbsp;&nbsp;&nbsp;Blue Pool Date:&nbsp;&nbsp;"  . "<b>" . $bpooldate . "</b>";
echo "</br>\n";
echo "Blue Pool Designation:&nbsp;&nbsp;"  . "<b>" . $bpooldsgn . "</b>";
echo "</br>\n";
echo "Blue Pool Refrigeration Number:&nbsp;&nbsp;"  . "<b>" . $bpoolrn . "</b>";
echo "</br>\n";
echo "</br>\n";
echo "Donor Status:" . "&nbsp;&nbsp;&nbsp;" . "<b>" . $dnrstat . "</b>"; 
echo "</br>\n";




echo "Package Number:&nbsp;&nbsp;"  . "<b>" . $pkgnum . "</b>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;Date Received:&nbsp;&nbsp;" . "<b>" . $rdate . "</b>";
echo "</br>\n";
echo "</br>\n";
echo "Package Designation:&nbsp;&nbsp;"  . "<b>" . "modify db" . "</b>";


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
