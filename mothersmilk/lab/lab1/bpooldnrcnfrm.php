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




$bpoolnumber = $_GET["bpoolnumber"];
$ctype = $_GET["ctype"];


//echo "dnum: " . $dnum;
echo "<br>";

//  Connect to Data Base  

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);

if (!mysql_select_db('milk_db', $con)) 
   {
   echo 'Could not select database';
   exit;
   }

//*****************************8

$dnum = $_POST["donornumber"];

// determines whether donor is being deleted or added

if ($ctype==1)
{

$sql   = "SELECT apstatus from donortbl where donornum = '$dnum'";

echo $sql;
echo "</br>";

$result = mysql_query($sql, $con); 

if (!$result)
   {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
      exit;
   }


echo "</br>";

$row = mysql_fetch_assoc($result);

$donorstat = $row['apstatus'];

// ****************************************************8

// Fetch Blue Pool Date
$sql   = "SELECT bpooldate from labtbl where bpoolnumber = '$bpoolnumber'";

echo $sql;
echo "</br>";

$result = mysql_query($sql, $con); 

if (!$result)
   {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
      exit;
   }


echo "</br>";

$row = mysql_fetch_assoc($result);

$bpooldate = $row['bpooldate'];


//********************************



echo "</br>"; 
echo "Donor number: " . "<b>" . $dnum . "</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "Application Status:  " . "<b>" . $donorstat . "</b>"; 
echo "</br>";
 
// Print_r ($_SESSION);
echo "</br>"; 

// Add donor to blue pool number



$sql = "insert into labtbl (bpoolnumber, bpooldate, donornuml, donorstat) values ('$bpoolnumber', '$bpooldate', '$dnum', '$donorstat')";


$result = mysql_query($sql, $con); 

if (!$result) 
    {
       echo "DB Error, could not query the database\n";
       echo 'MySQL Error: ' . mysql_error();
       exit;
    }

}
else
{
// donor is being removed
echo "<br>" . "Donor is being removed" . "<br>";
$sql = "delete from labtbl where donornuml = '$dnum'";


$result = mysql_query($sql, $con); 

if (!$result) 
    {
       echo "DB Error, could not query the database\n";
       echo 'MySQL Error: ' . mysql_error();
       exit;
    }

}



echo "<br>";
echo $sql;
echo "<br>";

mysql_close($con);

echo "</br>";
echo "</br>";
//echo "<p><a href=\"./donormenu.php\">Return to Donor Menu</a></p>\n";
echo "<p><a href=\"./bpoolproc.php?bpoolnumber=$bpoolnumber\">Return to Blue Pool</a></p>\n";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
