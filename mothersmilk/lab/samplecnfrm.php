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




$sampleid = $_GET["sampleid"];

/*
echo "sampleid: " . $sampleid;
echo "<br>";

//  Connect to Data Base  

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);

if (!mysql_select_db('milk_db', $con)) 
   {
   echo 'Could not select database';
   exit;
   }

// check if donor number can be used

$donorfind = "select donornum from donortbl where donornum = $dnrrcrdnum";


$resultfind = mysql_query($donorfind, $con); 



if (!$resultfind) 
     {
       echo "DB Error, could not query the database\n";
       echo 'MySQL Error: ' . mysql_error();
       exit;
     }



while ($row = mysql_fetch_assoc($resultfind)) 
   {
       $currentdonornum=$row['donornum'];

       echo "current donor number: " . $currentdonornum;   
//       $donorexist = 1;   /* triggers when records are found  
   }



if ($dnum==$currentdonornum)
   {
      echo  "donor number has not been changed";
//      exit;
   }
else
   {
      echo  "donor number has been changed";
   }


*/




// $ctype determines if the record is added or edited

$ctype = $_GET["ctype"];

if ($ctype==1)
   {
   echo  "<P><FONT SIZE=5><B>Sample Edited</B></FONT></P>";
   }
else
   {
   echo  "<P><FONT SIZE=5><B>Sample Added</B></FONT></P>";
   }
echo "</br>"; 


$fname = $_POST["donorfname"];
$lname = $_POST["donorlname"];
$donorstat = $_POST["donorstat"];



echo "</br>"; 
echo "Sample ID: " . "<b>" . $sampleid . "</b>"; 
echo "</br>"; 
echo "</br>"; 


echo "</br>"; 
echo "</br>"; 
 
//Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 


// insert into lab table
/*  
   $sqll = "insert into labtbl (donornuml, dnrrcrdnuml) values ('$dnum', $dnrrcrdnum)";

   $resultlab = mysql_query($sqll, $con); 

  
   if (!$resultlab) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }

*/


 
echo "<br>";
echo $sql;
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
