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

$packagenumber = $_GET["packagenumber"];


echo "<br>";

// Search for Donor in table

// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

    mysql_select_db('milk_db', $con);

$sql   = "SELECT * FROM receivertable where packagenumber =  $packagenumber";

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

$row = mysql_fetch_assoc($result);


$mreport = $row['mreport'];


// echo "<br>" . $mreport . "</br>";

if ($mreport == "yes")
  {
      echo "<p><b>Illness and Medical Report</b></p>";

      $illness = $row["illness"];
      echo "Who was ill:&nbsp;&nbsp;&nbsp;" . "<b>" . $illness . "</b>";
      echo "<br>"; 
      echo "<br>"; 

      $illnesscomment = $row["illnesscomment"];
      echo "Description:&nbsp;&nbsp;&nbsp;"; 
//      echo "<br>"; 
//      echo "<br>"; 
      echo "<b>" . $illnesscomment . "</b>";
      echo "<br>"; 
      echo "<br>"; 

      // Displaying Illness Dates

      $illnessbegan = $row["illnessbegan"];

      echo "Illness Began:&nbsp;&nbsp;" . "<b>" . substr($illnessbegan,5,2) . "-" .  substr($illnessbegan,8,2) . "-" . substr($illnessbegan,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;"; 

      $illnessend = $row["illnessend"];

      echo "Ended:&nbsp;&nbsp;" . "<b>" . substr($illnessend,5,2) . "-" .  substr($illnessend,8,2) . "-" . substr($illnessend,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 

      echo "</br>"; 
      echo "</br>"; 
      $symptomdescription = $row["symptomdescription"];

      echo "Description of Symptoms:&nbsp;&nbsp;";
      echo "</br>"; 
      echo "<b>$symptomdescription</b>"; 

      echo "</br>"; 
      echo "</br>"; 

      $fever = $row["fever"];
      echo "Fever:&nbsp;&nbsp;&nbsp;" . "<b>$fever</b>" . "&nbsp;&nbsp;F";
      echo "<br>"; 
      echo "<br>"; 

      // Displaying Fever Dates

      $feverstart = $row["feverstart"];

      echo "Fever Began:&nbsp;&nbsp;" . "<b>" . substr($feverstart,5,2) . "-" .  substr($feverstart,8,2) . "-" . substr($feverstart,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;"; 

      $feverend = $row["feverend"];

      echo "Ended:&nbsp;&nbsp;" . "<b>" . substr($feverend,5,2) . "-" .  substr($feverend,8,2) . "-" . substr($feverend,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 


      echo "</br>"; 
      echo "</br>"; 

      $meduse = $row["meduse"];

      echo "DONOR MEDICATION USE:&nbsp;&nbsp;" . "<b>$meduse</b>";

      echo "</br>"; 
      echo "</br>"; 

      $medtypes = $row["medtypes"];

      echo "Types:&nbsp;&nbsp;" . "<b>$medtypes</b>";

      echo "</br>"; 
      echo "</br>"; 

      $dosage = $row["dosage"];

      echo "Dosage:&nbsp;&nbsp;" . "<b>$dosage</b>";

      echo "</br>"; 
      echo "</br>"; 

      // Displaying Dosage Dates

      $dosagestart = $row["dosagestart"];

      echo "Dosage Began:&nbsp;&nbsp;" . "<b>" . substr($dosagestart,5,2) . "-" .  substr($dosagestart,8,2) . "-" . substr($dosagestart,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;"; 

      $dosageend = $row["dosageend"];

      echo "Ended:&nbsp;&nbsp;" . "<b>" . substr($dosageend,5,2) . "-" .  substr($dosageend,8,2) . "-" . substr($dosageend,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 

      echo "</br>"; 
      echo "</br>";
 
      $reportcomments = $row["reportcomments"];

      echo "Illness and Medication Notes/Comments:&nbsp;&nbsp;";
      echo "</br>"; 
      echo "<b>$reportcomments</b>"; 

      echo "</br>"; 
      echo "</br>"; 

      $signature = $row["signature"];

      echo "Signed:&nbsp;&nbsp;";
//      echo "</br>"; 
      echo "<b>$signature</b>"; 

      echo "</br>"; 
      echo "</br>"; 

      // Displaying Signature Date

      echo "Date Signed:&nbsp;&nbsp;";

      $signaturedate = $row["signaturedate"];

      echo "Date Signed:&nbsp;&nbsp;" . "<b>" . substr($signaturedate,5,2) . "-" .  substr($signaturedate,8,2) . "-" . substr($signaturedate,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;"; 


      echo "</br>"; 

      echo "<p><b>End of Illness and Medical Report</b></p>";

      echo "</br>";


  }


$rdate = $row['receivedate'];
$packagenumber = $row['packagenumber'];
$dnum = $row['donornumberr'];
$organization = $row['organization'];
$organizationother = $row['organizationother'];
$coolernumber = $row['coolernumber'];
$numberofounces = $row['numberofounces'];
$expressionrange = $row['expressionrange'];
$packetstate = $row['packetstate'];
$packetstateother = $row['packetstateother'];
$storagelocation = $row['storagelocation'];
$storagelocationother = $row['storagelocationother'];
$storefrom = $row['storefrom'];
$milkgrade = $row['milkgrade'];

$rxbcchoose = $row['rxbcchoose'];
$donorstatus = $row['donorstatus'];
$diet = $row['diet'];




/*
echo "</br>"; 
Print_r ($_SESSION);
echo "</br>";

*/



echo "Package Number:&nbsp;&nbsp;" . "<b>$packagenumber</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Date Received:&nbsp;&nbsp;" . "<b>" . substr($rdate,5,2) . "-" .  substr($rdate,8,2) . "-" . substr($rdate,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 

echo "</br>"; 
echo "</br>"; 

echo "Donor number:&nbsp;&nbsp;" . "<b>$dnum</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Organization:" . "&nbsp;&nbsp;&nbsp;" . "<b>" . $organization . "</b>"; 

 
if ($organization=="OTH") 
   {
       echo "&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;" . "<b>" . $organizationother . "</b>"; 
   }

echo "</br>"; 
echo "</br>"; 

echo "Donor Status:&nbsp;&nbsp;" . "<b>$donorstatus</b>"; 

echo "</br>"; 
echo "</br>"; 

echo "Medications:&nbsp;&nbsp;" . "<b>$rxbcchoose</b>"; 

if ($row['rxbcchoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<b>" . $row['rxbcdate'] . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   }


echo "</br>"; 
echo "</br>"; 

echo "Diet:&nbsp;&nbsp;" . "<b>$diet</b>"; 

echo "</br>"; 
echo "</br>"; 

// Break string to dsplay month - day - year
$tstdate = $row['babysdob']; 

echo "Baby's DOB:&nbsp;&nbsp;" . "<b>" . substr($tstdate,5,2) . "-" .  substr($tstdate,8,2) . "-" . substr($tstdate,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 


echo "</br>"; 
echo "</br>"; 

echo "Cooler number:&nbsp;&nbsp;" . "<b>$coolernumber</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Number of Ounces:&nbsp;&nbsp;" . "<b>$numberofounces</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Expression Range:&nbsp;&nbsp;" . "<b>$expressionrange</b>";
echo "</br>"; 
echo "</br>"; 


echo "Stored from:&nbsp;&nbsp;&nbsp;". "<b>$storefrom</b>";

echo "</br>"; 
echo "</br>"; 

echo "Milk Grade:&nbsp;&nbsp;&nbsp;". "<b>$milkgrade</b>";

echo "</br>"; 
echo "</br>"; 

echo "Packet State:" . "&nbsp;&nbsp;&nbsp;" . "<b>" . $packetstate . "</b>"; 
 
if ($packetstate=="O") 
   {
       echo "&nbsp;&nbsp;&nbsp;Reason:&nbsp;&nbsp;" . "<b>" . $packetstateother . "</b>"; 
   }

echo "</br>"; 
echo "</br>"; 

echo "Storage Location:&nbsp;&nbsp;&nbsp;&nbsp;" . "<b>$storagelocation</b>"; 

if ($storagelocation=="Freezer") 
     {
         echo "&nbsp;&nbsp;&nbsp;Where:&nbsp;&nbsp;" . "<b>" . $storagelocationother . "</b>"; 
     }

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
echo "<p><a href=\"./recvsearch.php\">Packet Search</a></p>\n";
//echo "</br>";


if ($urights==1 or $urights==2)
   {
       echo "<p><a href=\"./recvadd.php?dnum=$dnum&organization=$organization&determinechoose=$determinechoose\">Add Package</a></p>\n";
       echo "<p><a href=\"./recvedit.php?packagenumber=$packagenumber\">Edit Package</a></p>\n";
   }



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
