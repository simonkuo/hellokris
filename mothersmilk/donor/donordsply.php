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
	<META NAME="AUTHOR" CONTENT="Pat Dumalanta, ChingYing Kuo">
	<META NAME="CREATED" CONTENT="2012/11/23;15512700">
	<META NAME="CHANGEDBY" CONTENT="Pat Dumalanta, ChingYing Kuo">
	<META NAME="CHANGED" CONTENT="2013/03/06;16005500">
<!--
<?php include '../mystyle.php'; ?>
-->
<?php 

include '../include/main.js'; 
?>

<link type="text/css" rel="stylesheet" href="mystyle.css">

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php
echo "<p><label class='boldtext'><font size=5>Donor Screening</font></label></p>\n";
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
echo "Donor number:" . "&nbsp;&nbsp;&nbsp;" . "<label class='boldtext'>" . $dnum . "</label>"; 
echo "</br>"; 
echo "</br>"; 

echo "Application Status:" . "&nbsp;&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['determinechoose'] . "</label>"; 
if ($row['determinechoose'] == "A"||"P"||"NP"||"F") 
        {
            echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['determine'] . "</label>"; 
        }
echo "</br>"; 
echo "</br>";
echo "Created By:" . "&nbsp;&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['createdby'] . "</label>"; 
//echo "</br>"; 
// Break string to dsplay month - day - year
$tstdate = $row['dnrapdate']; 

echo "&nbsp;&nbsp;&nbsp;Call Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . substr($tstdate,5,2) . "-" .  substr($tstdate,8,2) . "-" . substr($tstdate,0,4) . "</label>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
echo "</br>"; 
echo "</br>"; 
echo "Last Edit:" . "&nbsp;&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['lastedit'] . "</label>"; 

// Break string to dsplay month - day - year
$tstdate = $row['lasteditdate']; 

echo "&nbsp;&nbsp;&nbsp;Date Edited:&nbsp;&nbsp;" . "<label class='boldtext'>" . substr($tstdate,5,2) . "-" .  substr($tstdate,8,2) . "-" . substr($tstdate,0,4) . "</label>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
echo "</br>"; 
echo "</br>";

echo "Organization:&nbsp;&nbsp;". "<label class='boldtext'>".$row['organization']."</label>";
if ($row['organization']=="OTH") 
   {
       echo "&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['organizationother'] . "</label>"; 
   }

echo "</br>"; 
echo "</br>"; 
echo "First Name:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['firstname'] . "</label>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name:  " . "<label class='boldtext'>" . $row['middlename'] . "</label>"; 
// echo "</br>"; 
// echo "</br>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;Last Name:  " . "<label class='boldtext'>" . $row['lastname'] . "</label>"; 
echo "</br>"; 
echo "</br>"; 

echo "Address:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['address'] . "</label>";
echo "&nbsp;&nbsp;City:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['city'] . "</label>";
echo "&nbsp;&nbsp;State:&nbsp;&nbsp;"  . "<label class='boldtext'>" . $row['state'] . "</label>";
echo "&nbsp;&nbsp;Zip Code:&nbsp;&nbsp;"  . "<label class='boldtext'>" . $row['zip'] . "</label>";
echo "&nbsp;&nbsp;Country:&nbsp;&nbsp;"  . "<label class='boldtext'>" . $row['country'] . "</label>";
echo "</br>\n";
echo "</br>\n";
echo "Home Phone:&nbsp;&nbsp;"  . "<label class='boldtext'>" . $hphoneac . "-" . $hphonepr . "-" . $hphonesu . "</label>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;Cell Phone:&nbsp;&nbsp;"  . "<label class='boldtext'>" . $cphoneac . "-" . $cphonepr . "-" . $cphonesu . "</label>";
echo "</br>\n";
echo "</br>\n";
echo "Email:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['email'] . "</label>"; 

echo "</br>\n";
echo "</br>"; 


echo "Referred By:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['referral'] . "</label>";

echo "</br>\n";
echo "</br>\n";

echo "Baby's Name:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['babysname'] . "</label>"; 

// Break string to dsplay month - day - year
$tstdate = $row['babysdob']; 
//echo "</br>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;Baby's DOB:&nbsp;&nbsp;" . "<label class='boldtext'>" . substr($tstdate,5,2) . "-" .  substr($tstdate,8,2) . "-" . substr($tstdate,0,4) . "</label>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 



echo "</br>\n";


echo "</br>"; 
echo "Baby Status:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['babystatus'] . "</label>"; 
echo "</br>"; 
echo "</br>"; 
echo "Amount can donate:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['donateamount'] . "</label>"; 
echo "</br>"; 
echo "</br>"; 

echo "Milk Stored from:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['storefrom'] . "</label>"; 
echo "&nbsp;&nbsp;&nbsp;Can commit to 100 oz:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['milkcommit'] . "</label>"; 

echo "</br>"; 
echo "</br>"; 

echo "RX/BC Pll/OTC Use (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['rxbcchoose'] . "</label>"; 
if ($row['rxbcchoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['rxbcdate'] . "</label>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   }

echo "</br>"; 
echo "</br>"; 

echo "Supplements w/Herbs/Herb Teas (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['herbschoose'] . "</label>"; 
if ($row['herbschoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['herbs'] . "</label>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   }

echo "</br>"; 
echo "</br>"; 
echo "Alcohol while pumping (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['alcoholchoose'] . "</label>"; 

if ($row['alcoholchoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['alcohol'] . "</label>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   }

echo "</br>"; 
echo "</br>"; 

echo "Smoke:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['smoke'] . "</label>"; 

echo "&nbsp;&nbsp;&nbsp;ivDrugs:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['ivDrug'] . "</label>"; 

echo "</br>"; 
echo "</br>"; 

echo "Transfusion (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['transfusionchoose'] . "</label>"; 
if ($row['transfusionchoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['transfusion'] . "</label>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   }
echo "</br>"; 
echo "</br>"; 

echo "Work Hi-Risk/Blood (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['workchoose'] . "</label>";
if ($row['workchoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['work'] . "</label>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   } 
echo "</br>"; 
echo "</br>"; 

echo "Tattoos/Piercing (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['tattooschoose'] . "</label>"; 
if ($row['tattooschoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['tattoos'] . "</label>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   } 
echo "</br>"; 
echo "</br>"; 

echo "Hep Test:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['heptest'] . "</label>"; 

echo "&nbsp;&nbsp;&nbsp;HIV Test:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['hivtest'] . "</label>";
 
echo "</br>"; 
echo "</br>"; 

echo "TB Test:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['tbtest'] . "</label>"; 
echo "&nbsp;&nbsp;&nbsp;TB Treatment:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['tbtreat'] . "</label>"; 

echo "</br>"; 
echo "</br>"; 

echo "Cold Sores/Herpes while breatfeedng (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['herpeschoose'] . "</label>"; 
if ($row['herpeschoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['herpes'] . "</label>" . "&nbsp;&nbsp;(mm-dd-yyyy)"; 
   } 
echo "</br>"; 
echo "</br>"; 

echo "Hemophilia:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['hemophilia'] . "</label>"; 
echo "&nbsp;&nbsp;&nbsp;Growth Hormones:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['hormones'] . "</label>"; 
echo "</br>"; 
echo "</br>"; 

echo "UK '80-96 3+MOS. (Y/N)(Yrs): &nbsp;&nbsp;" . "<label class='boldtext'>" . $row['ukmoschoose'] . "</label>"; 
if ($row['ukmoschoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Years:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['ukmos'] . "</label>"; 
   } 
echo "</br>"; 
echo "</br>"; 

echo "Europe '80 5+yrs (Y/N)(Yrs): &nbsp;&nbsp;" . "<label class='boldtext'>" . $row['eurochoose'] . "</label>"; 
if ($row['eurochoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Years:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['euro'] . "</label>"; 
   } 
echo "</br>"; 
echo "</br>"; 


echo "Special Diet:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['diet'] . "</label>";

echo "</br>"; 
echo "</br>"; 
echo "Comments:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['piercing'] . "</label>"; 

echo "</br>"; 
echo "</br>"; 
echo "<label class='boldtext'>Passed Phone Screen</label>" . "<label class='boldtext'>" . $row['piercing'] . "</label>"; 
echo "</br>"; 

echo "</br>"; 
echo "</br>"; 

echo "<p><label class='boldtext'>Follow-Up</label></p>";

echo "Donor Packet:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['donorpacket'] . "</label>"; 

echo "</br>"; 
echo "</br>"; 

echo "Comments:&nbsp;&nbsp;" . "<label class='boldtext'>" . $row['donorcomment'] . "</label>"; 

echo "</br>"; 
echo "</br>"; 

// Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 


 mysql_close($con);


$urights = $_SESSION['urights'];
echo "<p><a href=\"./donorslt.php\">Return to Donor Result</a></p>\n";
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
