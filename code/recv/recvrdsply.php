<?php 
   include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/config/main_config.php"); 
   session_start();

  // check if logged in 
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/LoginCheck.php");

  // check if has rights to access this page
  $urights = $_SESSION['urights'];
  if( !($urights & RECEIVER_RIGHTS) )
  { // no receiver rights
    header('Location: /mothersmilk/norights.php');
    exit(); 
  }

?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="/mothersmilk/css/main.css" />
 <title>Package Information Display</title>
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

include '../mystyle.php'; 
include '../include/main.js'; 

?>

<h1 class="pageTitle">Package Information Display</h1>

<?php

$packagenumber = $_GET["packagenumber"];
$logtable = $_GET["logtable"];

$compareValues = false; // compare prev and current view transaction values

// Search for Donor in table

// connect to database
$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);

if (!$logtable)
   {
      // Display from search results
      $sql   = "SELECT * FROM receivertable where packagenumber =  '$packagenumber'";
   }

else
   {
      // Display from logtable
      $transactionnumber = $_GET["transactionnumber"];
      $sql   = "SELECT * FROM receivertablelog where packagenumber =  '$packagenumber'";
      if( $transactionnumber == 1 )// first transaction, created record
         $sql .= " and transactionnumber = " . $transactionnumber;
      else
      {  
         $sql .= " and transactionnumber in (" . $transactionnumber . "," . ($transactionnumber - 1) . ") order by transactionnumber desc";
         $compareValues = true;
      }
       echo "<h1 class=\"pageTitle\">History</h1>\n";  
   
   }
      
$result = mysqli_query($con,$sql);

if (!$result) 
    {
       echo "DB Error, could not query the database\n";
       echo 'MySQL Error: ' . mysqli_error($con);
       exit;
    }

$row = mysqli_fetch_assoc($result);

if ($logtable)
  $transactiontype = $row['transactiontype'];

$mreport = $row['mreport'];

$dnum = $row['donornumberr'];
$organization = $row['organization'];
$determinechoose = $row['determinechoose'];
echo "<a href=\"./recvsearch.php\">Package Search</a>\n";
if( $urights & RECEIVER_FULL )
{
   echo "&nbsp;<a href=\"./recvadd.php?dnum=$dnum&organization=$organization&determinechoose=$determinechoose\">Add Package</a>\n";
   echo "&nbsp;<a href=\"./recvedit.php?packagenumber=$packagenumber\">Edit Package</a>\n";
   echo "&nbsp;<a href=\"./packagelog.php?packagenumber=$packagenumber\">Package History</a>\n";
}

// ******************************************
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
$milkgradeother = $row['milkgradeother'];

$rxbcchoose = $row['rxbcchoose'];
$rxbcdate = $row['rxbcdate'];
$donorstatus = $row['donorstatus'];
$diet = $row['diet'];


$reg = $row['reg'];
$dfree = $row['dfree'];
$veg = $row['veg'];
$vegan = $row['vegan'];
$other = $row['other'];

$babysdob = $row['babysdob']; 

if ($mreport == "yes")
{
      $illness = $row["illness"];
      $illnesscomment = $row["illnesscomment"];
      $illnessbegan = $row["illnessbegan"];
      $illnessend = $row["illnessend"];
      $symptomdescription = $row["symptomdescription"];
      $fever = $row["fever"];
      $feverstart = $row["feverstart"];
      $feverend = $row["feverend"];
      $meduse = $row["meduse"];
      $medtypes = $row["medtypes"];
      $dosage = $row["dosage"];
      $dosagestart = $row["dosagestart"];
      $dosageend = $row["dosageend"];
      $reportcomments = $row["reportcomments"];
      $signature = $row["signature"];
      $signaturedate = $row["signaturedate"];
}

if( $compareValues )
{  // get previous package changes
   $row = mysqli_fetch_assoc($result);
   foreach ($row as $col => $value)
   {
      $packagePrev[$col] = $value;
   } 
}



echo "<div class=\"section\">";

echo "<fieldset class=\"sectiondisplay\"><legend>General Information</legend>";
if( $logtable )
   echo "<label>Transaction Number:</label>&nbsp;&nbsp;" . $transactionnumber . "&nbsp;&nbsp;<label>Type:</label>&nbsp;" . $transactiontype . "<br><br>";

echo "<label>Package Number:</label>&nbsp;&nbsp;" . $packagenumber; 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($rdate != $packagePrev['receivedate'])) ? "dataHighlight" : "data";
echo "<label>Date Received:</label>&nbsp;&nbsp;" .  "<span class='" . $dataspanclass . "'>" . substr($rdate,5,2) . "-" .  substr($rdate,8,2) . "-" . substr($rdate,0,4) . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 

echo "</br>"; 
echo "</br>"; 

echo "<div class=\"sectioncolumn\">";

echo "<label>Donor number:</label>&nbsp;&nbsp;" . $dnum; 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($organization != $packagePrev['organization'])) ? "dataHighlight" : "data";
echo "<label>Organization:</label>" . "&nbsp;&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $organization . "</span>"; 

 
if ($organization=="OTH") 
   {
       $dataspanclass= ( $compareValues && ($organizationother != $packagePrev['organizationother'])) ? "dataHighlight" : "data";
       echo "&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $organizationother . "</span>"; 
   }

echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($donorstatus != $packagePrev['donorstatus'])) ? "dataHighlight" : "data";
echo "<label>Donor Status:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $donorstatus . "</span>"; 

echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($rxbcchoose != $packagePrev['rxbcchoose'])) ? "dataHighlight" : "data";
echo "<label>Medications:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $rxbcchoose . "</span>"; 

if ($rxbcchoose=="Yes") 
   {
       $dataspanclass= ( $compareValues && ($rxbcdate != $packagePrev['rxbcdate'])) ? "dataHighlight" : "data";
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $rxbcdate . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
   }


echo "</br>"; 
echo "</br>"; 

echo "<label>Special Diet:</label> &nbsp;&nbsp;";   
$dataspanclass= "data";
if( $compareValues &&  ( ($reg != $packagePrev['reg']) || ($dfree != $packagePrev['dfree']) || ($veg != $packagePrev['veg']) || ($vegan != $packagePrev['vegan'])  || ($others != $packagePrev['others']))) 
  { 
  $dataspanclass = "dataHighlight";
  }

echo "<span class='" . $dataspanclass . "'>";
if ($reg=="on") 
    { 
       echo "&nbsp;&nbsp;&nbsp;Reg";
    }     

if ($dfree=="on")  
    {  
       echo "&nbsp;&nbsp;&nbsp;Dfree"; 
    }     

if ($veg=="on")
    {    
       echo "&nbsp;&nbsp;&nbsp;Veg";
    }      

if ($vegan=="on")   
    {    
       echo "&nbsp;&nbsp;&nbsp;Vegan"; 
    }     

if ($others=="on")  
    {    
       echo "&nbsp;&nbsp;&nbsp;Others";  
    } 

echo "</span>";

echo "</br>"; 
echo "</br>"; 

// Break string to dsplay month - day - year
$dataspanclass= ( $compareValues && ($babysdob != $packagePrev['babysdob'])) ? "dataHighlight" : "data";
echo "<label>Baby's DOB:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . substr($babysdob,5,2) . "-" .  substr($babysdob,8,2) . "-" . substr($babysdob,0,4) . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 


echo "</br>"; 
echo "</br>"; 

echo "</div>";
echo "<div class=\"sectioncolumn\">";

$dataspanclass= ( $compareValues && ($coolernumber != $packagePrev['coolernumber'])) ? "dataHighlight" : "data";
echo "<label>Cooler number:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $coolernumber . "</span>"; 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($numberofounces != $packagePrev['numberofounces'])) ? "dataHighlight" : "data";
echo "<label>Number of Ounces:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $numberofounces . "</span>"; 
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($expressionrange != $packagePrev['expressionrange'])) ? "dataHighlight" : "data";
echo "<label>Expression Range:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $expressionrange . "</span>";
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($storefrom != $packagePrev['storefrom'])) ? "dataHighlight" : "data";
echo "<label>Stored from:</label>&nbsp;&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $storefrom . "</span>";

echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($milkgrade != $packagePrev['milkgrade'])) ? "dataHighlight" : "data";
echo "<label>Milk Grade:</label>&nbsp;&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $milkgrade . "</span>";

if( $milkgrade == "O")
{
    $dataspanclass= ( $compareValues && ($milkgradeother != $packagePrev['milkgradeother'])) ? "dataHighlight" : "data";
    echo "&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" .  $milkgradeother . "</span>";
}
echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($packetstate != $packagePrev['packetstate'])) ? "dataHighlight" : "data";
echo "<label>Packet State:</label>" . "&nbsp;&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" .  $packetstate . "</span>"; 
 
if ($packetstate=="O") 
   {
       $dataspanclass= ( $compareValues && ($packetstateother != $packagePrev['packetstateother'])) ? "dataHighlight" : "data";
       echo "&nbsp;&nbsp;&nbsp;Reason:&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $packetstateother . "</span>"; 
   }

echo "</br>"; 
echo "</br>"; 

$dataspanclass= ( $compareValues && ($storagelocation != $packagePrev['storagelocation'])) ? "dataHighlight" : "data";
echo "<label>Storage Location:</label>&nbsp;&nbsp;&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" .$storagelocation . "</span>"; 

if ($storagelocation=="Freezer") 
     {
         $dataspanclass= ( $compareValues && ($storagelocationother != $packagePrev['storagelocationother'])) ? "dataHighlight" : "data";
         echo "&nbsp;&nbsp;&nbsp;Where:&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $storagelocationother . "</span>"; 
     }
echo "</div>";

echo "</fieldset>";
echo "</div>";


if ($mreport == "yes")
  {
      echo "<fieldset class=\"sectiondisplay\"><legend>Illness and Medical Report</legend>";
      echo "<div class=\"sectioncolumn\">";

      $dataspanclass= ( $compareValues && ($illness != $packagePrev['illness'])) ? "dataHighlight" : "data";
      echo "<label>Who was ill:</label>&nbsp;&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $illness . "</span>";
      echo "<br>"; 
      echo "<br>"; 

      echo "<label>Description:</label>&nbsp;&nbsp;&nbsp;"; 
      
      $dataspanclass= ( $compareValues && ($illnesscomment != $packagePrev['illnesscomment'])) ? "dataHighlight" : "data";
      echo "<span class='" . $dataspanclass . "'>" . $illnesscomment . "</span>";
      
      echo "<br>"; 
      echo "<br>"; 

      // Displaying Illness Dates

      
      $dataspanclass= ( $compareValues && ($illnessbegan != $packagePrev['illnessbegan'])) ? "dataHighlight" : "data";
      echo "<label>Illness Began:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . substr($illnessbegan,5,2) . "-" .  substr($illnessbegan,8,2) . "-" . substr($illnessbegan,0,4) . "</span>&nbsp;&nbsp;&nbsp;"; 

      $dataspanclass= ( $compareValues && ($illnessend != $packagePrev['illnessend'])) ? "dataHighlight" : "data";
      echo "<label>Ended:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . substr($illnessend,5,2) . "-" .  substr($illnessend,8,2) . "-" . substr($illnessend,0,4) . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 

      echo "</br>"; 
      echo "</br>"; 
      

      echo "<label>Description of Symptoms:</label>&nbsp;&nbsp;";
      echo "</br>"; 
      $dataspanclass= ( $compareValues && ($symptomdescription != $packagePrev['symptomdescription'])) ? "dataHighlight" : "data";
      echo "<span class='" . $dataspanclass . "'>" . $symptomdescription . "</span>"; 

      echo "</br>"; 
      echo "</br>"; 
    
      $dataspanclass= ( $compareValues && ($fever != $packagePrev['fever'])) ? "dataHighlight" : "data";
      echo "<label>Fever:</label>&nbsp;&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . $fever . "</span>&nbsp;&nbsp;&#176F";
      echo "<br>"; 
      echo "<br>"; 

      // Displaying Fever Dates
      
      $dataspanclass= ( $compareValues && ($feverstart != $packagePrev['feverstart'])) ? "dataHighlight" : "data";
      echo "<label>Fever Began:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass . "'>" . substr($feverstart,5,2) . "-" .  substr($feverstart,8,2) . "-" . substr($feverstart,0,4)  . "</span>&nbsp;&nbsp;&nbsp;"; 

      $dataspanclass= ( $compareValues && ($feverend != $packagePrev['feverend'])) ? "dataHighlight" : "data";
      echo "<label>Ended:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass .  "'>" . substr($feverend,5,2) . "-" .  substr($feverend,8,2) . "-" . substr($feverend,0,4)  . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 

      echo "</br>"; 
      echo "</br>"; 
      echo "</div>";      
      echo "<div class=\"sectioncolumn\">";
      
      $dataspanclass= ( $compareValues && ($meduse != $packagePrev['meduse'])) ? "dataHighlight" : "data";
      echo "<label>DONOR MEDICATION USE:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass .  "'>" . $meduse . "</span>";

      echo "</br>"; 
      echo "</br>"; 

      $dataspanclass= ( $compareValues && ($medtypes != $packagePrev['medtypes'])) ? "dataHighlight" : "data";
      echo "<label>Types:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass .  "'>" . $medtypes . "</span>";

      echo "</br>"; 
      echo "</br>"; 

      $dataspanclass= ( $compareValues && ($dosage != $packagePrev['dosage'])) ? "dataHighlight" : "data";
      echo "<label>Dosage:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass .  "'>" . $dosage . "</span>";

      echo "</br>"; 
      echo "</br>"; 

      // Displaying Dosage Dates

      $dataspanclass= ( $compareValues && ($dosagestart != $packagePrev['dosagestart'])) ? "dataHighlight" : "data";
      echo "<label>Dosage Began:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass .  "'>" . substr($dosagestart,5,2) . "-" .  substr($dosagestart,8,2) . "-" . substr($dosagestart,0,4) . "</span>&nbsp;&nbsp;&nbsp;"; 

      $dataspanclass= ( $compareValues && ($dosageend != $packagePrev['dosageend'])) ? "dataHighlight" : "data";
      echo "<label>Ended:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass .  "'>" . substr($dosageend,5,2) . "-" .  substr($dosageend,8,2) . "-" . substr($dosageend,0,4) . "</span>&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
      echo "</div>";
      echo "<div class=\"section\">";
      echo "<hr>"; 
      
      echo "<label>Illness and Medication Notes/Comments:</label>&nbsp;&nbsp;";
      echo "</br>"; 
      $dataspanclass= ( $compareValues && ($reportcomments != $packagePrev['reportcomments'])) ? "dataHighlight" : "data";
      echo "<span class='" . $dataspanclass .  "'>" . $reportcomments . "</span>"; 

      echo "</br>"; 
      echo "</br>"; 

      

      echo "<label>Signed:</label>&nbsp;&nbsp;";
      $dataspanclass= ( $compareValues && ($signature != $packagePrev['signature'])) ? "dataHighlight" : "data";
      echo "<span class='" . $dataspanclass .  "'>" . $signature . "</span>"; 

      echo "</br>"; 
      echo "</br>"; 

      // Displaying Signature Date
      
      $dataspanclass= ( $compareValues && ($signaturedate != $packagePrev['signaturedate'])) ? "dataHighlight" : "data";
      echo "<label>Date Signed:</label>&nbsp;&nbsp;" . "<span class='" . $dataspanclass .  "'>" . substr($signaturedate,5,2) . "-" .  substr($signaturedate,8,2) . "-" . substr($signaturedate,0,4) . "</span>&nbsp;&nbsp;&nbsp;"; 
      echo "</div>";

      echo "</fieldset>";

  }


 mysqli_close($con);


$urights = $_SESSION['urights'];


echo "<div class=\"section\"><a href=\"./recvsearch.php\">Package Search</a>\n";

if( $urights & RECEIVER_FULL )
   {
       echo "&nbsp;<a href=\"./recvadd.php?dnum=$dnum&organization=$organization&determinechoose=$determinechoose\">Add Package</a>\n";
       echo "&nbsp;<a href=\"./recvedit.php?packagenumber=$packagenumber\">Edit Package</a>\n";
       echo "&nbsp;<a href=\"./packagelog.php?packagenumber=$packagenumber\">Package History</a>\n";
   }
echo "</div>";


?> 

</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>

