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
<?php include '../mystyle.php'; ?>
-->

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php
/*
echo "<br>";
echo "from GET:  ";
echo $_GET["dnum"];

*/

$dnum = $_GET["dnum"];


echo "<br>";

// Search for Donor in table

// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

    mysql_select_db('milk_db', $con);


$sql   = "SELECT * FROM receivertable where donornumberr =  '$dnum'";

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

echo "</br>";

   $row = mysql_fetch_assoc($result);

$rdate = $row['receivedate'];
$cdate = $row['createdate'];
$pkgnum = $row['packagenumber'];
$pkgnumoncs = $row['pkgnumoncs'];


echo "</br>"; 
echo "Donor number:&nbsp;&nbsp;" . "<b>$dnum</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Date Received:&nbsp;&nbsp;" . "<b>" . substr($rdate,5,2) . "-" .  substr($rdate,8,2) . "-" . substr($rdate,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 

echo "</br>"; 
echo "</br>"; 

echo "Date Created:&nbsp;&nbsp;&nbsp;&nbsp;" . "<b>" . substr($cdate,5,2) . "-" .  substr($cdate,8,2) . "-" . substr($cdate,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 



echo "</br>"; 
echo "</br>"; 
/*
echo "Refrigeration Designation:&nbsp;&nbsp;" . $row['rdesigna']; 
echo "</br>"; 
echo "</br>"; 
*/
echo "Number of Package:&nbsp;&nbsp;" . "<b>$pkgnum</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "Ounces Donated:&nbsp;&nbsp;" . "<b>$pkgnumoncs</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Location:&nbsp;&nbsp;&nbsp;&nbsp;"; 
echo "</br>"; 
echo "</br>"; 

/*
Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 
*/

 mysql_close($con);


$urights = $_SESSION['urights'];



echo "<p><a href=\"./receivingmenu.php\">Receiver Menu</a></p>\n";
//echo "</br>";
echo "<p><a href=\"./recvsearch.php\">Search</a></p>\n";
//echo "</br>";


if ($urights==1 or $urights==2)
   {
       echo "<p><a href=\"./recvadd.php?dnum=$dnum\">Add</a></p>\n";
       echo "<p><a href=\"./recvedit.php?dnum=$dnum\">Edit</a></p>\n";
   }



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
