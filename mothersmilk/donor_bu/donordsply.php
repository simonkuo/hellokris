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

$dnum = $_GET["dnum"];

$logtable = $_GET["logtable"];

// Search for Donor in table

// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

    mysql_select_db('milk_db', $con);

if (!$logtable)
   {
      // Display from logtable
      $sql   = "SELECT * FROM screenertable where donornumber =  $dnum";
   }

else
   {
      // Display from search results
      $transactionnumber = $_GET["transactionnumber"];
      $sql   = "SELECT * FROM screenertablelog where donornumber =  $dnum and transactionnumber = $transactionnumber";
   }


echo $sql;
echo "</br>";


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


// Break string to dsplay home and cell phone

$hphone = $row['homephone'];
$cphone = $row['cellphone'];

$hphoneac = substr($hphone,0,3); 
$hphonepr = substr($hphone,3,3); 
$hphonesu = substr($hphone,6,4); 

$cphoneac = substr($cphone,0,3); 
$cphonepr = substr($cphone,3,3); 
$cphonesu = substr($cphone,6,4); 



echo "</br>"; 
echo "Donor number:" . "&nbsp;&nbsp;&nbsp;" . "<b>" . $dnum . "</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "Created By:" . "&nbsp;&nbsp;&nbsp;" . "<b>" . $row['createdby'] . "</b>"; 
//echo "</br>"; 
// Break string to dsplay month - day - year
$tstdate = $row['dnrapdate']; 

echo "&nbsp;&nbsp;&nbsp;Call Date:&nbsp;&nbsp;" . "<b>" . substr($tstdate,5,2) . "-" .  substr($tstdate,8,2) . "-" . substr($tstdate,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
echo "</br>"; 
echo "</br>"; 
echo "Last Edit:" . "&nbsp;&nbsp;&nbsp;" . "<b>" . $row['lastedit'] . "</b>"; 

// Break string to dsplay month - day - year
$tstdate = $row['lasteditdate']; 

echo "&nbsp;&nbsp;&nbsp;Date Edited:&nbsp;&nbsp;" . "<b>" . substr($tstdate,5,2) . "-" .  substr($tstdate,8,2) . "-" . substr($tstdate,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
echo "</br>"; 
echo "</br>";

echo "Donor Type:&nbsp;&nbsp;". "<b>".$row['donortype']."</b>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;Organization:&nbsp;&nbsp;". "<b>".$row['organization']."</b>";


echo "</br>"; 
echo "</br>"; 
echo "First Name:&nbsp;&nbsp;" . "<b>" . $row['firstname'] . "</b>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name:  " . "<b>" . $row['middlename'] . "</b>"; 
// echo "</br>"; 
// echo "</br>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;Last Name:  " . "<b>" . $row['lastname'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Address:&nbsp;&nbsp;" . "<b>" . $row['address'] . "</b>";
echo "&nbsp;&nbsp;City:&nbsp;&nbsp;" . "<b>" . $row['city'] . "</b>";
echo "&nbsp;&nbsp;State:&nbsp;&nbsp;"  . "<b>" . $row['state'] . "</b>";
echo "&nbsp;&nbsp;Zip Code:&nbsp;&nbsp;"  . "<b>" . $row['zip'] . "</b>";
echo "&nbsp;&nbsp;Country:&nbsp;&nbsp;"  . "<b>" . $row['country'] . "</b>";
echo "</br>\n";
echo "</br>\n";
echo "Home Phone:&nbsp;&nbsp;"  . "<b>" . $hphoneac . "-" . $hphonepr . "-" . $hphonesu . "</b>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;Cell Phone:&nbsp;&nbsp;"  . "<b>" . $cphoneac . "-" . $cphonepr . "-" . $cphonesu . "</b>";
echo "</br>\n";
echo "</br>\n";
echo "Email:&nbsp;&nbsp;" . "<b>" . $row['email'] . "</b>"; 

echo "</br>\n";
echo "</br>"; 


echo "Referred By:&nbsp;&nbsp;" . "<b>" . $row['referral'] . "</b>";

echo "</br>\n";
echo "</br>\n";

echo "Baby's Name:&nbsp;&nbsp;" . "<b>" . $row['babysname'] . "</b>"; 

// Break string to dsplay month - day - year
$tstdate = $row['babysdob']; 
//echo "</br>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;Baby's DOB:&nbsp;&nbsp;" . "<b>" . substr($tstdate,5,2) . "-" .  substr($tstdate,8,2) . "-" . substr($tstdate,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 



echo "</br>\n";


echo "</br>"; 
echo "Baby Status:&nbsp;&nbsp;" . "<b>" . $row['babystatus'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "Amount can donate:&nbsp;&nbsp;" . "<b>" . $row['donateamount'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "Milk Stored from:&nbsp;&nbsp;" . "<b>" . $row['storefrom'] . "</b>"; 
echo "&nbsp;&nbsp;&nbsp;Can commit to 100 oz:&nbsp;&nbsp;" . "<b>" . $row['milkcommit'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "RX/BC Pll/OTC Use (Dates):&nbsp;&nbsp;" . "<b>" . $row['rxbcdate'] . "</b>" . "&nbsp;&nbsp;(mm-dd-yyyy)"; 
echo "</br>"; 
echo "</br>"; 
echo "Supplements w/Herbs/Herb Teas (Dates):Y/N&nbsp;&nbsp;" . "<b>" . $row['herbs'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "Alcohol while pumping (Dates):Y/N&nbsp;&nbsp;" . "<b>" . $row['alcohol'] . "</b>"; 

echo "</br>"; 
echo "</br>"; 

echo "Smoke:&nbsp;&nbsp;" . "<b>" . $row['smoke'] . "</b>"; 

echo "&nbsp;&nbsp;&nbsp;Nicotine:&nbsp;&nbsp;" . "<b>" . $row['nicotine'] . "</b>"; 

echo "&nbsp;&nbsp;&nbsp;IV Drugs:&nbsp;&nbsp;" . "<b>" . $row['ivdrugs'] . "</b>"; 

echo "</br>"; 
echo "</br>"; 

echo "Transfusion (Dates):Y/N&nbsp;&nbsp;" . "<b>" . $row['transfusion'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Work Hi-Risk/Blood (Dates):Y/N&nbsp;&nbsp;" . "<b>" . $row['work'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Tattoos (Dates):Y/N&nbsp;&nbsp;" . "<b>" . $row['tattoos'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Piercing (Dates):Y/N&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Hep Test:&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 

echo "&nbsp;&nbsp;&nbsp;HIV Test:&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "TB Test:&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "&nbsp;&nbsp;&nbsp;TB Treatment:&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Cold Sores/Herpes while breatfeedng (Dates):Y/N&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "&nbsp;&nbsp;&nbsp;TB Treatment:&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Hemophilia:&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "&nbsp;&nbsp;&nbsp;Growth Hormones:&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "UK '80-96 3+MOS.(Yrs): Y/N&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "Europe '80 5+yrs (Yrs):Y/N:&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Special Diet:&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 
echo "</br>"; 
echo "Comments:&nbsp;&nbsp;" . "<b>" . $row['piercing'] . "</b>"; 

echo "</br>"; 
echo "</br>"; 
echo "<b>Passed Phone Screen</b>" . "<b>" . $row['piercing'] . "</b>"; 
echo "</br>"; 

echo "</br>"; 
echo "</br>"; 

echo "<p><b>Follow-Up</b></p>";

echo "Donor Packet:&nbsp;&nbsp;" . "<b>" . $row['donorpacket'] . "</b>"; 

echo "</br>"; 
echo "</br>"; 

echo "Comments:&nbsp;&nbsp;" . "<b>" . $row['donorcomment'] . "</b>"; 

echo "</br>"; 
echo "</br>"; 

// Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 


 mysql_close($con);


$urights = $_SESSION['urights'];

echo "</br>";
echo "<a href=\"./donormenu.php\">Donor Menu</a>\n";
//echo "</br>"; 

echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./donorsearch.php\">Search</a>\n";
//echo "</br>"; 

echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./donorlog.php?dnum=$dnum\">History</a>\n";

if (!$logtable)
   {
      // Remove link to edit if from the log table

      if ($urights==1 or $urights==2)
          {
              echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./donoredit.php?dnum=$dnum\">Edit</a>\n";
          }
   }

?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
