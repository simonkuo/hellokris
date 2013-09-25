<?php 
   include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/config/main_config.php"); 
   session_start();

  // check if logged in 
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/LoginCheck.php");

  // check if has rights to access this page
  $urights = $_SESSION['urights'];
  if( !($urights & SCREENER_RIGHTS) )
  { // no admin rights
    header('Location: /mothersmilk/norights.php');
    exit(); 
  }

?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="/mothersmilk/css/main.css" />
 <title>Donor Information Display</title>
<link rel="icon" 
      type="image/ico" 
      href="/mothersmilk/images/favicon.ico" />
</head>
<body>
<div id="pageContent">
<div id="header">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/HeaderHTML.php"); ?>
</div>
<div id="menu"></div>
<div id="messagebar">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/MessageBar.php"); ?>
</div>

<div id="content">
<?php 

include '../include/main.js'; 
?>


<h1 class="pageTitle">Donor Information Display</h1>
<?php
$dnum = $_GET["dnum"];

$logtable = $_GET["logtable"];

$compareValues = false; // compare prev and current view transaction values


// Search for Donor in table

// connect to database
$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);

if (!$logtable)
   {
      // Display from search results
      $sql   = "SELECT * FROM screenertable where donornumber =  '$dnum'";
   }

else
   {
      // Display from log table
      $transactionnumber = $_GET["transactionnumber"];
      $sql = "SELECT * FROM screenertablelog where donornumber =  '" . $dnum . "'";
      if( $transactionnumber == 1 )// first transaction, created record
         $sql .= " and transactionnumber = " . $transactionnumber;
      else
      {  
         $sql .= " and transactionnumber in (" . $transactionnumber . "," . ($transactionnumber - 1) . ") order by transactionnumber desc";
         $compareValues = true;
      }
       echo "<h1 class=\"pageTitle\">History</h1>\n";  
   }


echo "<a href=\"./donorslt.php\">Return to Donor Result</a>\n";
echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./donorsearch.php\">Search</a>\n";
echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./donorlog.php?dnum=$dnum\">History</a>\n";

if (!$logtable)
  {   // Remove link to edit if from the log table
      if( $urights & SCREENER_FULL ) // have full screener rights
          {
              echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./donoredit.php?dnum=$dnum\">Edit</a>\n";
          }
   }

$result = mysqli_query($con,$sql); 

if (!$result)
   {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysqli_error($con);
      exit;
   }

   $row = mysqli_fetch_assoc($result);

// Break string to dsplay home and cell phone
$hphone = $row['homephone'];
$cphone = $row['cellphone'];

$hphoneac = substr($hphone,0,3); 
$hphonepr = substr($hphone,3,3); 
$hphonesu = substr($hphone,6,4); 

$cphoneac = substr($cphone,0,3); 
$cphonepr = substr($cphone,3,3); 
$cphonesu = substr($cphone,6,4); 

$determinechoose = $row['determinechoose'];
$determine = $row['determine'];
$createdby = $row['createdby'];
$dnrapdate = $row['dnrapdate'];
$organization = $row['organization'];
$organizationother = $row['organizationother'];
$firstname = $row['firstname'];
$middlename = $row['middlename'];
$lastname = $row['lastname'];
$donoraka = $row['donoraka'];
$address = $row['address'];
$city = $row['city'];
$state = $row['state'];
$zip = $row['zip'];
$country = $row['country'];
$email =  $row['email'];
$referral =  $row['referral'];
$babysname =  $row['babysname'];
$babysdob = $row['babysdob'];
$babystatus = $row['babystatus'];
$donateamount = $row['donateamount'];
$storefrom = $row['storefrom'];
$milkcommit = $row['milkcommit'];
$rxbcchoose = $row['rxbcchoose']; 
$rxbcdate = $row['rxbcdate'];
$herbschoose = $row['herbschoose'];
$herbs = $row['herbs'];
$alcoholchoose = $row['alcoholchoose'];
$alcohol = $row['alcohol'];
$smoke = $row['smoke'];
$ivDrug = $row['ivDrug'];
$transfusionchoose = $row['transfusionchoose'];
$transfusion = $row['transfusion'];
$workchoose = $row['workchoose'];
$work = $row['work'];
$tattooschoose = $row['tattooschoose'];
$tattoos = $row['tattoos'];
$heptest = $row['heptest']; 
$hivtest = $row['hivtest'];
$tbtest = $row['tbtest']; 
$tbtreat = $row['tbtreat'];
$herpeschoose = $row['herpeschoose'];
$herpes = $row['herpes'];
$hemophilia = $row['hemophilia'];
$hormones = $row['hormones'];
$ukmoschoose = $row['ukmoschoose'];
$ukmos = $row['ukmos'];
$eurochoose = $row['eurochoose'];
$euro = $row['euro'];
$reg = $row['reg']; 
$dfree = $row['dfree'];
$veg = $row['veg'];
$vegan = $row['vegan'];
$others = $row['others'];
$donorcomment = $row['donorcomment'];

// follow-up
$donorpacketbymail = $row['donorpacketbymail'];
$donorpacketbyemail = $row['donorpacketbyemail'];
$donorpacketbyfax = $row['donorpacketbyfax'];
$datesentpacket = $row['datesentpacket'];
$staffinitdatesentpacket = $row['staffinitdatesentpacket'];
$datereceivedpacket = $row['datereceivedpacket'];
$staffinitdatereceivedpacket = $row['staffinitdatereceivedpacket'];
$pedifaxneeded = $row['pedifaxneeded'];
$datesentpedi = $row['datesentpedi'];
$staffinitdatesentpedi = $row['staffinitdatesentpedi'];
$datereceivedpedi = $row['datereceivedpedi'];
$staffinitdatereceivedpedi = $row['staffinitdatereceivedpedi'];
$obfaxneeded = $row['obfaxneeded'];
$datesentob = $row['datesentob'];
$staffinitdatesentob = $row['staffinitdatesentob'];
$datereceivedob = $row['datereceivedob'];
$staffinitdatereceivedob = $row['staffinitdatereceivedob'];
$other = $row['other'];
$datesentother = $row['datesentother'];
$staffinitdatesentother = $row['staffinitdatesentother'];
$datereceivedother = $row['datereceivedother'];
$staffinitdatereceivedother = $row['staffinitdatereceivedother'];
$datepacketreview = $row['datepacketreview'];
$packetreviewstatus = $row['packetreviewstatus'];
$staffinitpacketreview = $row['staffinitpacketreview'];
if( $logtable )
{  
   $transactionnumber = $row['transactionnumber'];
   $transactiontype = $row['transactiontype'];
}
//questionaire
$q1 = $row['q1'];
$q2 = $row['q2'];
$q3 = $row['q3'];
$q4 = $row['q4'];
$q5 = $row['q5'];
$q6 = $row['q6'];
$q7 = $row['q7'];
$q8 = $row['q8'];
$q9 = $row['q9'];
$q10 = $row['q10'];
$q11 = $row['q11'];
$q12 = $row['q12'];
$q13 = $row['q13'];
$q14 = $row['q14'];
$q15 = $row['q15'];
$q16 = $row['q16'];
$q17 = $row['q17'];
$q18 = $row['q18'];
$q19 = $row['q19'];
$q20 = $row['q20'];
$q21 = $row['q21'];
$q22 = $row['q22'];
$q23 = $row['q23'];
$q24 = $row['q24'];
$q25 = $row['q25'];
$q26 = $row['q26'];
$q27 = $row['q27'];
$q28 = $row['q28'];
$q29 = $row['q29'];
$q30 = $row['q30'];
$q31 = $row['q31'];
$q32 = $row['q32'];
$q33 = $row['q33'];
$q34 = $row['q34'];
$q35 = $row['q35'];
$q36 = $row['q36'];
$q37 = $row['q37'];
$q38 = $row['q38'];
$q39 = $row['q39'];
$q40 = $row['q40'];
$q41 = $row['q41'];
$q42 = $row['q42'];
$q43 = $row['q43'];
$q44 = $row['q44'];
$q45 = $row['q45'];
$q46 = $row['q46'];
$q47 = $row['q47'];
$q48 = $row['q48'];
$q49 = $row['q49'];
$bq1 = $row['bq1'];
$bq2 = $row['bq2'];
$bq3 = $row['bq3'];
$bq4 = $row['bq4'];
$bq5 = $row['bq5'];
$bq6 = $row['bq6'];

if( $compareValues )
{
   $row = mysqli_fetch_assoc($result);
   $hphonePrev = $row['homephone'];
   $cphonePrev = $row['cellphone'];
   $determinechoosePrev = $row['determinechoose'];
   $determinePrev = $row['determine'];
   $createdbyPrev = $row['createdby'];
   $dnrapdatePrev = $row['dnrapdate']; 
   $organizationPrev = $row['organization'];
   $organizationotherPrev = $row['organizationother'];
   $firstnamePrev = $row['firstname'];
   $middlenamePrev = $row['middlename'];
   $lastnamePrev = $row['lastname'];
   $donorakaPrev = $row['donoraka'];
   $addressPrev = $row['address'];
   $cityPrev = $row['city'];
   $statePrev = $row['state'];
   $zipPrev = $row['zip'];
   $countryPrev = $row['country'];
   $emailPrev =  $row['email'];
   $referralPrev =  $row['referral'];
   $babysnamePrev =  $row['babysname'];
   $babysdobPrev = $row['babysdob'];
   $babystatusPrev = $row['babystatus'];
   $donateamountPrev = $row['donateamount'];
   $storefromPrev = $row['storefrom'];
   $milkcommitPrev = $row['milkcommit'];
   $rxbcchoosePrev = $row['rxbcchoose']; 
   $rxbcdatePrev = $row['rxbcdate'];
   $herbschoosePrev = $row['herbschoose'];
   $herbsPrev = $row['herbs'];
   $alcoholchoosePrev = $row['alcoholchoose'];
   $alcoholPrev = $row['alcohol'];
   $smokePrev = $row['smoke'];
   $ivDrugPrev = $row['ivDrug'];
   $transfusionchoosePrev = $row['transfusionchoose'];
   $transfusionPrev = $row['transfusion'];
   $workchoosePrev = $row['workchoose'];
   $workPrev = $row['work'];
   $tattooschoosePrev = $row['tattooschoose'];
   $tattoosPrev = $row['tattoos'];
   $heptestPrev = $row['heptest']; 
   $hivtestPrev = $row['hivtest'];
   $tbtestPrev = $row['tbtest']; 
   $tbtreatPrev = $row['tbtreat'];
   $herpeschoosePrev = $row['herpeschoose'];
   $herpesPrev = $row['herpes'];
   $hemophiliaPrev = $row['hemophilia'];
   $hormonesPrev = $row['hormones'];
   $ukmoschoosePrev = $row['ukmoschoose'];
   $ukmosPrev = $row['ukmos'];
   $eurochoosePrev = $row['eurochoose'];
   $euroPrev = $row['euro'];
   $regPrev = $row['reg']; 
   $dfreePrev = $row['dfree'];
   $vegPrev = $row['veg'];
   $veganPrev = $row['vegan'];
   $othersPrev = $row['others'];
   $donorcommentPrev = $row['donorcomment'];

   $donorpacketbymailPrev = $row['donorpacketbymail'];
   $donorpacketbyemailPrev = $row['donorpacketbyemail'];
   $donorpacketbyfaxPrev = $row['donorpacketbyfax'];
   $datesentpacketPrev = $row['datesentpacket'];
   $staffinitdatesentpacketPrev = $row['staffinitdatesentpacket'];
   $datereceivedpacketPrev = $row['datereceivedpacket'];
   $staffinitdatereceivedpacketPrev = $row['staffinitdatereceivedpacket'];
   $pedifaxneededPrev = $row['pedifaxneeded'];
   $datesentpediPrev = $row['datesentpedi'];
   $staffinitdatesentpediPrev = $row['staffinitdatesentpedi'];
   $datereceivedpediPrev = $row['datereceivedpedi'];
   $staffinitdatereceivedpediPrev = $row['staffinitdatereceivedpedi'];
   $obfaxneededPrev = $row['obfaxneeded'];
   $datesentobPrev = $row['datesentob'];
   $staffinitdatesentobPrev = $row['staffinitdatesentob'];
   $datereceivedobPrev = $row['datereceivedob'];
   $staffinitdatereceivedobPrev = $row['staffinitdatereceivedob'];
   $otherPrev = $row['other'];
   $datesentotherPrev = $row['datesentother'];
   $staffinitdatesentotherPrev = $row['staffinitdatesentother'];
   $datereceivedotherPrev = $row['datereceivedother'];
   $staffinitdatereceivedotherPrev = $row['staffinitdatereceivedother'];
   $datepacketreviewPrev = $row['datepacketreview'];
   $packetreviewstatusPrev = $row['packetreviewstatus'];
   $staffinitpacketreviewPrev = $row['staffinitpacketreview'];

   $q1Prev = $row['q1'];
   $q2Prev = $row['q2'];
   $q3Prev = $row['q3'];
   $q4Prev = $row['q4'];
   $q5Prev = $row['q5'];
   $q6Prev = $row['q6'];
   $q7Prev = $row['q7'];
   $q8Prev = $row['q8'];
   $q9Prev = $row['q9'];
   $q10Prev = $row['q10'];
   $q11Prev = $row['q11'];
   $q12Prev = $row['q12'];
   $q13Prev = $row['q13'];
   $q14Prev = $row['q14'];
   $q15Prev = $row['q15'];
   $q16Prev= $row['q16'];
   $q17Prev = $row['q17'];
   $q18Prev = $row['q18'];
   $q19Prev = $row['q19'];
   $q20Prev = $row['q20'];
   $q21Prev = $row['q21'];
   $q22Prev = $row['q22'];
   $q23Prev = $row['q23'];
   $q24Prev = $row['q24'];
   $q25Prev = $row['q25'];
   $q26Prev = $row['q26'];
   $q27Prev = $row['q27'];
   $q28Prev = $row['q28'];
   $q29Prev = $row['q29'];
   $q30Prev = $row['q30'];
   $q31Prev = $row['q31'];
   $q32Prev = $row['q32'];
   $q33Prev = $row['q33'];
   $q34Prev = $row['q34'];
   $q35Prev = $row['q35'];
   $q36Prev = $row['q36'];
   $q37Prev = $row['q37'];
   $q38Prev = $row['q38'];
   $q39Prev = $row['q39'];
   $q40Prev = $row['q40'];
   $q41Prev = $row['q41'];
   $q42Prev = $row['q42'];
   $q43Prev = $row['q43'];
   $q44Prev = $row['q44'];
   $q45Prev = $row['q45'];
   $q46Prev = $row['q46'];
   $q47Prev = $row['q47'];
   $q48Prev = $row['q48'];
   $q49Prev = $row['q49'];
   $bq1Prev = $row['bq1'];
   $bq2Prev = $row['bq2'];
   $bq3Prev = $row['bq3'];
   $bq4Prev = $row['bq4'];
   $bq5Prev = $row['bq5'];
   $bq6Prev = $row['bq6'];
}
if( $compareValues )
   echo "<br><br><span class=\"dataHighlight\">Changed information hightlighted.</span>";
echo "<fieldset class=\"sectiondisplay\">";
echo "<legend>Donor Profile</legend>";
echo "</br>"; 
echo "<div class=\"sectioncolumn twoColumnSection\">"; 
if( $logtable )
   echo "<label>Transaction Number:</label>" . "&nbsp;&nbsp;" . $transactionnumber . "&nbsp;&nbsp;<label>Type:</label>&nbsp;&nbsp;" . $transactiontype . "<br><br>";
echo "<label>Donor Number:</label>" . "&nbsp;&nbsp;&nbsp;" . $dnum; 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($determinechoose != $determinechoosePrev)) ? "dataHighlight" : "data";
echo "<label>Application Status:</label>" . "&nbsp;&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $determinechoose . "</span>"; 
if (in_array($determinechoose, array("D", "P", "NP", "F"))) 
//if ($row['determinechoose'] == "A"|"P"|"NP"|"F") 
        {
            $dataspanclass= ( $compareValues && ($determine != $determinePrev)) ? "dataHighlight" : "data";
            echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $determine . "</span>"; 
        }
// Break string to dsplay month - day - year
$tstdate = $row['dnrapdate']; 
$dnrapdate = $tstdate;

$dataspanclass= ( $compareValues && ($dnrapdate != $dnrapdatePrev)) ? "dataHighlight" : "data";
echo "<br><br><label>Call Date:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . substr($tstdate,5,2) . "-" .  substr($tstdate,8,2) . "-" . substr($tstdate,0,4) . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
        
echo "</div>";
echo "<div class=\"sectioncolumn twoColumnSection\"> ";
echo "<label>Created By:</label>" . "&nbsp;&nbsp;&nbsp;" . $createdby; 
echo "</br>"; 
echo "</br>"; 
echo "<label>Last Edit:</label>" . "&nbsp;&nbsp;&nbsp;" . $row['lastedit']; 

// Break string to dsplay month - day - year
$tstdate = $row['lasteditdate']; 

echo "<br><br><label>Date Edited:</label>&nbsp;&nbsp;" . substr($tstdate,5,2) . "-" .  substr($tstdate,8,2) . "-" . substr($tstdate,0,4) . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
echo "</div>";

echo "<br class=\"clear\">";
echo "<hr>";
echo "<div class=\"sectioncolumn twoColumnSection\">";
$dataspanclass= ( $compareValues && ($organization != $organizationPrev)) ? "dataHighlight" : "data";
echo "<label>Organization:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $organization . "</span>";
if ($row['organization']=="OTH") 
   {
       $dataspanclass= ( $compareValues && ($organizationother != $organizationotherPrev)) ? "dataHighlight" : "data";
       echo "&nbsp;&nbsp;&nbsp;<label>Name:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $organizationother . "</span>"; 
   }

echo "</br>"; 
echo "</br>"; 
$dataspanclass= ( $compareValues && ($firstname != $firstnamePrev)) ? "dataHighlight" : "data";
echo "<label>First Name:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $firstname . "</span>";
$dataspanclass= ( $compareValues && ($middlename != $middlenamePrev)) ? "dataHighlight" : "data"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><label>Middle Name:</label><span class='" . $dataspanclass . "'>" . $middlename . "</span>"; 
$dataspanclass= ( $compareValues && ($lastname != $lastnamePrev)) ? "dataHighlight" : "data";
echo "&nbsp;&nbsp;&nbsp;&nbsp;<br><label>Last Name:</label>  <span class='" . $dataspanclass . "'>" . $lastname . "</span>"; 
$dataspanclass= ( $compareValues && ($donoraka != $donorakaPrev)) ? "dataHighlight" : "data";
echo "<br><label>Also Known As:</label> <span class='" . $dataspanclass . "'>" . $donoraka . "</span>";
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($address != $addressPrev)) ? "dataHighlight" : "data";
echo "<label>Address:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $address . "</span>";
$dataspanclass= ( $compareValues && ($city != $cityPrev)) ? "dataHighlight" : "data";
echo "&nbsp;&nbsp;<br><label>City:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $city . "</span>";
$dataspanclass= ( $compareValues && ($state != $statePrev)) ? "dataHighlight" : "data";
echo "&nbsp;&nbsp;<br><Label>State:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $state . "</span>";
$dataspanclass= ( $compareValues && ($zip != $zipPrev)) ? "dataHighlight" : "data";
echo "&nbsp;&nbsp;<br><label>Zip Code:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $zip . "</span>";
$dataspanclass= ( $compareValues && ($country != $countryPrev)) ? "dataHighlight" : "data";
echo "&nbsp;&nbsp;<br><label>Country:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $country . "</span>";
echo "</br>\n";
echo "</br>\n";

$dataspanclass= ( $compareValues && ($hphone != $hphonePrev)) ? "dataHighlight" : "data";
echo "<label>Home Phone:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $hphoneac . "-" . $hphonepr . "-" . $hphonesu . "</span>";
$dataspanclass= ( $compareValues && ($cphone != $cphonePrev)) ? "dataHighlight" : "data";
echo "<br><label>Cell Phone:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $cphoneac . "-" . $cphonepr . "-" . $cphonesu . "</span>";
echo "</br>\n";
echo "</br>\n";

$dataspanclass= ( $compareValues && ($email != $emailPrev)) ? "dataHighlight" : "data";
echo "<label>Email:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $email . "</span>"; 

echo "</br>\n";
echo "</br>"; 

$dataspanclass= ( $compareValues && ($referral != $referralPrev)) ? "dataHighlight" : "data";
echo "<label>Referred By:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $referral . "</span>";

echo "</br>\n";
echo "</br>\n";

$dataspanclass= ( $compareValues && ($babysname != $babysnamePrev)) ? "dataHighlight" : "data";
echo "<label>Baby's Name:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $babysname . "</span>"; 

// Break string to dsplay month - day - year
$tstdate = $row['babysdob'];
$babysdob = $tstdate;
 
$dataspanclass= ( $compareValues && ($babysdob != $babysdobPrev)) ? "dataHighlight" : "data";
echo "&nbsp;&nbsp;&nbsp;&nbsp;<br><label>Baby's DOB:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . substr($tstdate,5,2) . "-" .  substr($tstdate,8,2) . "-" . substr($tstdate,0,4)  . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 

echo "</br>"; 
$dataspanclass= ( $compareValues && ($babystatus != $babystatusPrev)) ? "dataHighlight" : "data";
echo "<label>Baby Status:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $babystatus. "</span>"; 
echo "</br>"; 
echo "</br>"; 
$dataspanclass= ( $compareValues && ($donateamount != $donateamountPrev)) ? "dataHighlight" : "data";
echo "<label>Amount can donate:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>". $donateamount . "</span>"; 
echo "</br>"; 
echo "</br>"; 
$dataspanclass= ( $compareValues && ($storefrom != $storefromPrev)) ? "dataHighlight" : "data";
echo "<label>Milk Stored from:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $storefrom . "</span>"; 

$dataspanclass= ( $compareValues && ($milkcommit != $milkcommitPrev)) ? "dataHighlight" : "data"; 
echo "&nbsp;&nbsp;&nbsp;<br><label>Can commit to 100 oz:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $milkcommit. "</span>"; 

echo "</br>"; 
echo "</br>"; 
echo "</div>";
echo "<div class=\"sectioncolumn twoColumnSection\">";

$dataspanclass= ( $compareValues && ($rxbcchoose != $rxbcchoosePrev)) ? "dataHighlight" : "data"; 
echo "<label>RX/BC Pll/OTC Use (Y/N)(Dates):</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $rxbcchoose . "</span>"; 
if ($row['rxbcchoose']=="Yes") 
   {
       $dataspanclass= ( $compareValues && ($rxbcdate != $rxbcdatePrev)) ? "dataHighlight" : "data"; 
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $rxbcdate . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   }

echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($herbschoose != $herbschoosePrev)) ? "dataHighlight" : "data"; 
echo "<label>Supplements w/Herbs/Herb Teas (Y/N)(Dates):</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $herbschoose . "</span>"; 
if ($row['herbschoose']=="Yes") 
   {
       $dataspanclass= ( $compareValues && ($herbs != $herbsPrev)) ? "dataHighlight" : "data"; 
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $herbs . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   }

echo "</br>"; 
echo "</br>"; 
$dataspanclass= ( $compareValues && ($alcoholchoose != $alcoholchoosePrev)) ? "dataHighlight" : "data"; 
echo "<label>Alcohol while pumping (Y/N)(Dates):</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $alcoholchoose . "</span>"; 

if ($row['alcoholchoose']=="Yes") 
   {
      $dataspanclass= ( $compareValues && ($alcohol != $alcoholPrev)) ? "dataHighlight" : "data"; 
      echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $alcohol . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   }

echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($smoke != $smokePrev)) ? "dataHighlight" : "data"; 
echo "<label>Smoke:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>"  . $smoke . "</span>"; 

$dataspanclass= ( $compareValues && ($ivDrug != $ivDrugPrev)) ? "dataHighlight" : "data"; 
echo "<br><label>ivDrugs:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $ivDrug . "</span>"; 

echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($transfusionchoose != $transfusionchoosePrev)) ? "dataHighlight" : "data"; 
echo "<label>Transfusion (Y/N)(Dates):</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $transfusionchoose . "</span>"; 
if ($row['transfusionchoose']=="Yes") 
   {
       $dataspanclass= ( $compareValues && ($transfusion != $transfusionPrev)) ? "dataHighlight" : "data"; 
       echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $transfusion . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   }
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($workchoose != $workchoosePrev)) ? "dataHighlight" : "data"; 
echo "<label>Work Hi-Risk/Blood (Y/N)(Dates):</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $workchoose . "</span>";
if ($row['workchoose']=="Yes") 
   {
       $dataspanclass= ( $compareValues && ($work != $workPrev)) ? "dataHighlight" : "data"; 
       echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $work . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   } 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($tattooschoose != $tattooschoosePrev)) ? "dataHighlight" : "data"; 
echo "<label>Tattoos/Piercing (Y/N)(Dates):</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $tattooschoose . "</span>"; 
if ($row['tattooschoose']=="Yes") 
   {
       $dataspanclass= ( $compareValues && ($tattoos != $tattoosPrev)) ? "dataHighlight" : "data"; 
       echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $tattoos . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   } 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($heptest != $heptestPrev)) ? "dataHighlight" : "data"; 
echo "<label>Hep Test:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $heptest . "</span>"; 

$dataspanclass= ( $compareValues && ($hivtest != $hivtestPrev)) ? "dataHighlight" : "data"; 
echo "<br><label>HIV Test:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $hivtest . "</span>";
 
echo "</br>"; 
$dataspanclass= ( $compareValues && ($tbtest != $tbtestPrev)) ? "dataHighlight" : "data"; 
echo "<label>TB Test:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $tbtest . "</span>"; 
$dataspanclass= ( $compareValues && ($tbtreat != $tbtreatPrev)) ? "dataHighlight" : "data"; 
echo "<br><label>TB Treatment:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $tbtreat . "</span>"; 

echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($herpeschoose != $herpeschoosePrev)) ? "dataHighlight" : "data"; 
echo "<label>Cold Sores/Herpes while breastfeeding (Y/N)(Dates):</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $herpeschoose . "</span>"; 
if ($row['herpeschoose']=="Yes") 
   {
       $dataspanclass= ( $compareValues && ($herpes != $herpesPrev)) ? "dataHighlight" : "data"; 
       echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $herpes . "</span>&nbsp;&nbsp;(mm-dd-yyyy)"; 
   } 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($hemophilia != $hemophiliaPrev)) ? "dataHighlight" : "data"; 
echo "<label>Hemophilia:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $hemophilia . "</span>"; 
$dataspanclass= ( $compareValues && ($hormones != $hormonesPrev)) ? "dataHighlight" : "data"; 
echo "<br><label>Growth Hormones:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $hormones . "</span>"; 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($ukmoschoose != $ukmoschoosePrev)) ? "dataHighlight" : "data"; 
echo "<label>UK '80-96 3+MOS. (Y/N)(Yrs):</label> &nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $ukmoschoose . "</span>"; 
if ($row['ukmoschoose']=="Yes") 
   {
       $dataspanclass= ( $compareValues && ($ukmos != $ukmosPrev)) ? "dataHighlight" : "data"; 
       echo "&nbsp;&nbsp;&nbsp;<label>Years:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $ukmos . "</span>"; 
   } 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($eurochoose != $eurochoosePrev)) ? "dataHighlight" : "data"; 
echo "<label>Europe '80 5+yrs (Y/N)(Yrs):</label> &nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $eurochoose . "</span>"; 
if ($row['eurochoose']=="Yes") 
   {
       $dataspanclass= ( $compareValues && ($euro != $euroPrev)) ? "dataHighlight" : "data"; 
       echo "&nbsp;&nbsp;&nbsp;<label>Years:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $euro . "</span>"; 
   } 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && (($reg != $regPrev) || ($dfree != $dfreePrev) || ($veg != $vegPrev) || ($vegan != $veganPrev) || ($others != $othersPrev)) ) ? "dataHighlight" : "data"; 
echo "<label>Special Diet:</label> &nbsp;&nbsp;<span class='" . $dataspanclass . "'>";   
if ($reg =="on" /*"Reg"*/)     {     echo "&nbsp;&nbsp;&nbsp;Reg" /*. $reg*/;     }     
if ($dfree =="on" /*"Dfree"*/)     {        echo
"&nbsp;&nbsp;&nbsp;dfree" /*. $dfree*/;     }     
if ($veg =="on" /*"Veg"*/)
{        echo "&nbsp;&nbsp;&nbsp;veg" /*. $veg*/;}      
if
($vegan =="on" /*"Vegan"*/)     {        echo "&nbsp;&nbsp;&nbsp;vegan" /*. $vegan*/;     }     
if ($others =="Other")     {        echo "&nbsp;&nbsp;&nbsp;" /*. $others */;     } 
echo "</span>";
echo "</div>";

echo "<br class=\"clear\">";
echo "<hr>";
echo "</br>"; 
$dataspanclass= ( $compareValues && ($donorcomment != $donorcommentPrev)) ? "dataHighlight" : "data"; 
echo "<label>Comments:</label>&nbsp;&nbsp;<span class='" . $dataspanclass . "'>" . $donorcomment . "</span>"; 
echo "<br><br>";
echo "</fieldset>";

echo "</br>"; 
echo "</br>"; 
?>
<?php 
echo "<fieldset class=\"sectiondisplay\">";
include 'followupdsply.php';
echo "</fieldset>";
echo "<fieldset class=\"sectiondisplay\">";
include 'page1dsply.php';
include 'page3dsply.php';
echo "</fieldset>";
?>
<?php

 mysqli_close($con);


$urights = $_SESSION['urights'];
echo "<p>";
echo "<a href=\"./donorslt.php\">Return to Donor Result</a>\n";
echo "&nbsp;<a href=\"./donormenu.php\">Donor Menu</a>\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./donorsearch.php\">Search</a>\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./donorlog.php?dnum=$dnum\">History</a>\n";

if (!$logtable)
   {
      // Remove link to edit if from the log table

      if( $urights & SCREENER_FULL ) // have full screener rights
          {
              echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./donoredit.php?dnum=$dnum\">Edit</a>\n";
          }
   }
echo "</p>"; 
?>
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
