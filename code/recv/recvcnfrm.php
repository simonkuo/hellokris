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
 <title>Add/Edit Package Confirmation</title>
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
<?php include '../mystyle.php'; ?>

<P>

<?php

// Updated 1/18/2013



$dnum = $_GET["dnum"];

$packagenumber = $_GET["packagenumber"];

$ctype = $_GET["ctype"];


//  Connect to Data Base  

$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);
$processnumber = $_POST["processnumber"];

$mreport = $_POST["mreport"];


$storefrom = $_POST["storefrom"];
$diet = $_POST["diet"];
$babysdob = $_POST["babysdob"];
$donorstatus = $_POST["donorstatus"];
$donorcomment = $_POST["donorcomment"];
$organization = $_POST["organization"];
$organizationother = $_POST["organizationother"];
$rxbcchoose = $_POST["rxbcchoose"];
$milkgrade = $_POST["milkgrade"];
$milkgradeother = $_POST["milkgradeother"];

$rmm = $_POST["rmm"];
$rdd = $_POST["rdd"];
$ryy = $_POST["ryy"];

$fcmm = $_POST["fcmm"];
$fcdd = $_POST["fcdd"];
$fcyy = $_POST["fcyy"];
$tcmm = $_POST["tcmm"];
$tcdd = $_POST["tcdd"];
$tcyy = $_POST["tcyy"];


$coolernumber = $_POST["coolernumber"];

$coolercomments = $_POST["coolercomments"];

$numberofounces = $_POST["numberofounces"];

$packetstate = $_POST["packetstate"];
$packetstateother = $_POST["packetstateother"];

$storagelocation = $_POST["storagelocation"];
$storagelocationother = $_POST["storagelocationother"];

$processflag = $_POST["processflag"];

$reg = $_POST['reg'];
$dfree = $_POST['dfree'];
$veg = $_POST['veg'];
$vegan = $_POST['vegan'];
$other = $_POST['other'];



// Create received date (stored)
$rdate = $ryy . "-" . $rmm . "-" . $rdd;

// Create expression "From" date  (stored)
$expressiondatefrom = $fcyy . "-" . $fcmm . "-" . $fcdd;


// Create expression "To" date  (stored)
$expressiondateto = $tcyy . "-" . $tcmm . "-" . $tcdd;


// Create expression "To" date

$expressionrange = $fcmm . "-" . $fcdd . "-" . $fcyy . "&nbsp;thru&nbsp;" . $tcmm . "-" . $tcdd . "-" . $tcyy;


// $ctype determines if the record is added or edited

$ctype = $_GET["ctype"];

if ($ctype==1)
   {
      echo  "<P><FONT SIZE=5><B>Package Edited</B></FONT></P>";
   }
else
   {
      echo  "<P><FONT SIZE=5><B>Package Added</B></FONT></P>";
      
      // create package number   xxxxxxxxddddddddss
      $pkgpart = $dnum . str_pad($rmm,2,'0',STR_PAD_LEFT) . str_pad($rdd,2,'0',STR_PAD_LEFT) . $ryy;
      $sql = "select lpad(coalesce(max(q)+1,1),2,0) as seq from (select substring(packagenumber,15) as q from receivertable where packagenumber like '" . $namepart . "%') as tbl";
      $result = mysqli_query( $con, $sql);
      if( $result === FALSE )
      {
         echo "DB Error, could not query sequence number\n";
         echo "MySQL Error: " . mysqli_error($con);
         exit;
      }
      $row = mysqli_fetch_row($result);
      $seqnum = $row[0];
      mysqli_free_result($result);
      $packagenumber =  $pkgpart . $seqnum;
   }


// Check if illness report was created for this donor


echo "<fieldset class=\"sectiondisplay\">";
echo "<legend>General Information</legend>";
echo "<div class=\"sectioncolumn twoColumnSection\">";

echo "<label>Package number:</label>&nbsp;&nbsp;&nbsp;&nbsp;" . $packagenumber; 
echo "</br>"; 
echo "</br>"; 
echo "<label>Date Received:</label>&nbsp;&nbsp;";

echo $rmm . "-" . $rdd . "-" . $ryy .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";

echo "</br>"; 
echo "</br>"; 

echo "<label>Donor number:</label>&nbsp;&nbsp;" . $dnum; 
echo "</br>"; 
echo "</br>"; 

echo "<label>Organization:</label>&nbsp;&nbsp;" . $organization; 


if ($organization == 'OTH')
   {
       echo "&nbsp;&nbsp;&nbsp;Other:&nbsp;&nbsp;" . $organizationother; 
   }


echo "</br>"; 
echo "</br>"; 

echo "<label>Donor Status:</label>&nbsp;&nbsp;" . $donorstatus; 
echo "</br>"; 
echo "</br>"; 

echo "<label>Donor Comments:</label>&nbsp;&nbsp;" . $donorcomment; 
echo "</br>"; 
echo "</br>"; 

echo "<label>Medications:</label>&nbsp;&nbsp;" . $rxbcchoose; 

if ($rxbcchoose == 'Yes')
   {
       echo "&nbsp;&nbsp;&nbsp;Dates:&nbsp;&nbsp;" . $rxbcdate; 
   }

echo "</br>"; 
echo "</br>"; 

echo "<label>Special Diet:</label> &nbsp;&nbsp;";   

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

echo "</br>"; 
echo "</br>"; 

echo "<label>Stored From:</label>&nbsp;&nbsp;" . $storefrom; 
echo "</br>"; 
echo "</br>"; 

echo "<label>Milk Grade:</label>&nbsp;&nbsp;" . $milkgrade . "&nbsp;&nbsp;&nbsp;" . $milkgradeother; 
echo "</br>"; 
echo "</br>"; 

echo "<label>Baby's DOB:</label>&nbsp;&nbsp;&nbsp;" . substr($babysdob,5,2) . "-" .  substr($babysdob,8,2) . "-" . substr($babysdob,0,4) . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
echo "</br>"; 
echo "</br>"; 

echo "</div>";
echo "<div class=\"sectioncolumn twoColumnSection\">";

echo "<label>Cooler number:</label>&nbsp;&nbsp;" . $coolernumber; 
echo "</br>"; 
echo "</br>"; 

echo "<label>Cooler comments:</label>&nbsp;&nbsp;" . $coolercomments; 
echo "</br>"; 
echo "</br>"; 

/*
if ($ctype==2)
   {
       // increment package number when adding a package

       $result = mysqli_query($con,"SELECT count(packagenumber) FROM receivertable");
       $row = mysqli_fetch_row($result);
       $packagenumber = $row[0];
       $packagenumber = $packagenumber + 1;  

   }
*/




echo "<label>Number of ounces:</label>&nbsp;&nbsp;&nbsp;&nbsp;" . $numberofounces; 
echo "</br>"; 
echo "</br>"; 


echo "<label>Expression Range</label>";
echo "</br>"; 
echo "</br>"; 
 
echo "&nbsp;&nbsp;<label>From:</label>&nbsp;&nbsp;&nbsp;" . $fcmm . "-" . $fcdd . "-" . $fcyy .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";
echo "</br>"; 
echo "</br>"; 

echo "&nbsp;&nbsp;<label>To:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $tcmm . "-" . $tcdd . "-" . $tcyy .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";

echo "</br>"; 
echo "</br>"; 

echo "<label>Package State:</label>&nbsp;&nbsp;&nbsp;&nbsp;" . $packetstate; 

if ($packetstate=="O") 
     {
         echo "&nbsp;&nbsp;&nbsp;Use:&nbsp;&nbsp;" . $packetstateother; 
     }

echo "</br>"; 
echo "</br>"; 

echo "<label>Storage Location:</label>&nbsp;&nbsp;&nbsp;&nbsp;" . $storagelocation; 

echo "</div>";
echo "</br>"; 
echo "</br>"; 
echo "</fieldset>";


if ($mreport == yes)
   {
      echo "<fieldset class=\"sectiondisplay\">";
      echo "<legend>Illness and Medical Report</legend>";
      echo "<div class=\"sectioncolumn twoColumnSection\">";

      $illness = $_POST["illness"];
      echo "<label>Who was ill:</label>&nbsp;&nbsp;&nbsp;" . $illness;
      echo "<br>"; 
      echo "<br>"; 

      $illnesscomment = $_POST["illnesscomment"];
      echo "<label>Description:</label>&nbsp;&nbsp;&nbsp;"; 
      echo $illnesscomment;
      echo "<br>"; 
      echo "<br>"; 

      // Displaying Illness Dates

      $illbmm = $_POST["illbmm"];
      $illbdd = $_POST["illbdd"];
      $illbyy = $_POST["illbyy"];
      $illemm = $_POST["illemm"];
      $illedd = $_POST["illedd"];
      $illeyy = $_POST["illeyy"];

      echo "<label>Illness Began:</label>&nbsp;&nbsp;";

      echo $illbmm . "-" . $illbdd . "-" . $illbyy .  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

      echo "<label>Ended:</label>&nbsp;&nbsp;";

      echo $illemm . "-" . $illedd . "-" . $illeyy .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";

      // Create illness began date (stored)
      $illnessbegan = $illbyy . "-" . $illbmm . "-" . $illbdd;

      // Create illness end date (stored)
      $illnessend = $illeyy . "-" . $illemm . "-" . $illedd;


      echo "</br>"; 
      echo "</br>"; 
      $symptomdescription = $_POST["symptomdescription"];

      echo "<label>Description of Symptoms:</label>&nbsp;&nbsp;";
      echo "</br>"; 
      echo $symptomdescription; 

      echo "</br>"; 
      echo "</br>"; 

      $fever = $_POST["fever"];
      echo "<label>Fever:</label>&nbsp;&nbsp;&nbsp;" . $fever . "&nbsp;&nbsp;&#176F";
      echo "<br>"; 
      echo "<br>"; 

      // Displaying Fever Dates

      $fsmm = $_POST["fsmm"];
      $fsdd = $_POST["fsdd"];
      $fsyy = $_POST["fsyy"];
      $femm = $_POST["femm"];
      $fedd = $_POST["fedd"];
      $feyy = $_POST["feyy"];

      echo "<label>Fever Began:</label>&nbsp;&nbsp;";

      echo $fsmm . "-" . $fsdd . "-" . $fsyy .  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

      echo "<label>Ended:</label>&nbsp;&nbsp;";

      echo $femm . "-" . $fedd . "-" . $feyy .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";


      // Create fever began date (stored)
      $feverstart = $fsyy . "-" . $fsmm . "-" . $fsdd;

      // Create fever end date (stored)
      $feverend = $feyy . "-" . $femm . "-" . $fedd;


      $meduse = $_POST["meduse"];

      echo "</div>";
      echo "<div class=\"sectioncolumn twoColumnSection\">";
      echo "<label>DONOR MEDICATION USE:</label>&nbsp;&nbsp;" . $meduse;

      echo "</br>"; 
      echo "</br>"; 

      $medtypes = $_POST["medtypes"];

      echo "<label>Types:</label>&nbsp;&nbsp;" . $medtypes;

      echo "</br>"; 
      echo "</br>"; 

      $dosage = $_POST["dosage"];

      echo "<label>Dosage:</label>&nbsp;&nbsp;" . $dosage;

      echo "</br>"; 
      echo "</br>"; 

      // Displaying Dosage Dates

      $dsmm = $_POST["dsmm"];
      $dsdd = $_POST["dsdd"];
      $dsyy = $_POST["dsyy"];
      $demm = $_POST["demm"];
      $dedd = $_POST["dedd"];
      $deyy = $_POST["deyy"];

      echo "<label>Dosage Start:</label>&nbsp;&nbsp;";

      echo $dsmm . "-" . $dsdd . "-" . $dsyy .  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

      echo "<label>Ended:</label>&nbsp;&nbsp;";

      echo $demm . "-" . $dedd . "-" . $deyy .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";


      // Create dosage began date (stored)
      $dosagestart = $dsyy . "-" . $dsmm . "-" . $dsdd;


      // Create fever end date (stored)
      $dosageend = $deyy . "-" . $demm . "-" . $dedd;

      echo "</div>";
 
      echo "<div class=\"section\">";    
      echo "<hr>"; 
      $reportcomments = $_POST["reportcomments"];

      echo "<label>Illness and Medication Notes/Comments:</label>&nbsp;&nbsp;";
      echo "</br>"; 
      echo $reportcomments; 

      echo "</br>"; 
      echo "</br>"; 

      $signature = $_POST["signature"];

      echo "<label>Signed:</label>&nbsp;&nbsp;";
      echo $signature; 

      echo "</br>"; 
      echo "</br>"; 

      // Displaying Signature Date

      $smm = $_POST["smm"];
      $sdd = $_POST["sdd"];
      $syy = $_POST["syy"];


      echo "<label>Date Signed:</label>&nbsp;&nbsp;";

      echo $smm . "-" . $sdd . "-" . $syy .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";


      // Create signature date (stored)
      $signaturedate = $syy . "-" . $smm . "-" . $sdd;

      echo "</br>"; 

      echo "</div>";
      echo "</fieldset>";

      echo "</br>";


   }


echo "</br>"; 
echo "</br>"; 


//variable used when log table

$user = $_SESSION['uname'];


// determines whether receiver package is being edited or added


if ($ctype==1)
   {
   //Receiver Package is being edited
   //$sql = "update receivertable set organization = '$organization', organizationother = '$organizationother', receivedate = '$rdate', expressiondatefrom = '$expressiondatefrom', expressiondateto = '$expressiondateto', expressionrange = '$expressionrange', numberofounces = $numberofounces, coolernumber = $coolernumber, packetstate = '$packetstate', packetstateother = '$packetstateother', storagelocation = '$storagelocation',  storagelocationother = '$storagelocationother', coolercomments = '$coolercomments', mreport = '$mreport', illness = '$illness', illnesscomment = '$illnesscomment', illnessbegan = '$illnessbegan', illnessend = '$illnessend', symptomdescription = '$symptomdescription', fever = '$fever', feverstart = '$feverstart', feverend = '$feverend', meduse = '$meduse', medtypes = '$medtypes', dosage = '$dosage', dosagestart = '$dosagestart', dosageend = '$dosageend', reportcomments = '$reportcomments', signature = '$signature', signaturedate = '$signaturedate', diet = '$diet', rxbcchoose = '$rxbcchoose', rxbcdate = '$rxbcdate',  milkgrade = '$milkgrade', milkgradeother='$milkgradeother', storefrom = '$storefrom', babysdob = '$babysdob', donorstatus = '$donorstatus', reg = '$reg', dfree = '$dfree', veg = '$veg', vegan = '$vegan', other = '$other'  WHERE packagenumber = '$packagenumber'";

  $sql = "update receivertable set organization = '$organization', organizationother = '$organizationother', receivedate = '$rdate', expressiondatefrom = '$expressiondatefrom', expressiondateto = '$expressiondateto', expressionrange = '$expressionrange', numberofounces = $numberofounces, coolernumber = $coolernumber, packetstate = '$packetstate', packetstateother = '$packetstateother', storagelocation = '$storagelocation',  storagelocationother = '$storagelocationother', coolercomments = '$coolercomments', mreport = '$mreport', diet = '$diet', rxbcchoose = '$rxbcchoose', rxbcdate = '$rxbcdate',  milkgrade = '$milkgrade', milkgradeother='$milkgradeother', storefrom = '$storefrom', babysdob = '$babysdob', donorstatus = '$donorstatus', reg = '$reg', dfree = '$dfree', veg = '$veg', vegan = '$vegan', other = '$other', mreport = '$mreport'";  
  if ($mreport == 'yes')
    $sql .= ", illness = '$illness', illnesscomment = '$illnesscomment', illnessbegan = '$illnessbegan', illnessend = '$illnessend', symptomdescription = '$symptomdescription', fever = '$fever', feverstart = '$feverstart', feverend = '$feverend', meduse = '$meduse', medtypes = '$medtypes', dosage = '$dosage', dosagestart = '$dosagestart', dosageend = '$dosageend', reportcomments = '$reportcomments', signature = '$signature', signaturedate = '$signaturedate'";
  $sql .= " WHERE packagenumber = '$packagenumber'";

$result = mysqli_query($con,$sql);

if (!$result) 
   {
      echo "(1)DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysqli_error($con);
 echo "<br>" . $sql;     
      exit;
   }

    // Enter in log table     

// increment transaction number for each edit

$result = mysqli_query($con,"SELECT COUNT(*) FROM receivertablelog where packagenumber = '$packagenumber'"); 

$row = mysqli_fetch_row($result);
$lasttransactionnumber = $row[0];

$transactionnumber = $lasttransactionnumber + 1;  



//       $sql = "insert into receivertablelog (organization, organizationother, donornumberr, receivedate, expressiondatefrom, expressiondateto, expressionrange, packagenumber, numberofounces, coolernumber, packetstate, packetstateother, storagelocation, storagelocationother, user, transactionnumber, transactiontype, transactiondate, coolercomments, mreport, illness, illnesscomment, illnessbegan, illnessend, symptomdescription, fever, feverstart, feverend, meduse, medtypes, dosage, dosagestart, dosageend, reportcomments, signature, signaturedate, diet, rxbcchoose, rxbcdate, milkgrade, milkgradeother, storefrom, babysdob, donorstatus, reg, dfree, veg, vegan, other) values ('$organization', '$organizationother', '$dnum', '$rdate', '$expressiondatefrom', '$expressiondateto', '$expressionrange', '$packagenumber', $numberofounces, $coolernumber, '$packetstate', '$packetstateother', '$storagelocation', '$storagelocationother', '$user', $transactionnumber, 'Edited', '$rdate', '$coolercomments', '$mreport', '$illness', '$illnesscomment', '$illnessbegan', '$illnessend', '$symptomdescription', '$fever', '$feverstart', '$feverend', '$meduse', '$medtypes', '$dosage', '$dosagestart', '$dosageend', '$reportcomments', '$signature', '$signaturedate', '$diet', '$rxbcchoose', '$rxbcdate', '$milkgrade', '$milkgradeother', '$storefrom', '$babysdob', '$donorstatus', '$reg', '$dfree', '$veg', '$vegan', '$other')";
       $sql = "insert into receivertablelog (organization, organizationother, donornumberr, receivedate, expressiondatefrom, expressiondateto, expressionrange, packagenumber, numberofounces, coolernumber, packetstate, packetstateother, storagelocation, storagelocationother, user, transactionnumber, transactiontype, transactiondate, coolercomments, mreport";
       if( $mreport == 'yes' )
          $sql .= ", illness, illnesscomment, illnessbegan, illnessend, symptomdescription, fever, feverstart, feverend, meduse, medtypes, dosage, dosagestart, dosageend";
       $sql .= ", reportcomments, signature, signaturedate, diet, rxbcchoose, rxbcdate, milkgrade, milkgradeother, storefrom, babysdob, donorstatus, reg, dfree, veg, vegan, other";
       $sql .= ") values ('$organization', '$organizationother', '$dnum', '$rdate', '$expressiondatefrom', '$expressiondateto', '$expressionrange', '$packagenumber', $numberofounces, $coolernumber, '$packetstate', '$packetstateother', '$storagelocation', '$storagelocationother', '$user', $transactionnumber, 'Edited', '$rdate', '$coolercomments', '$mreport'";
       if( $mreport == 'yes' )
         $sql .= ", '$illness', '$illnesscomment', '$illnessbegan', '$illnessend', '$symptomdescription', '$fever', '$feverstart', '$feverend', '$meduse', '$medtypes', '$dosage', '$dosagestart', '$dosageend'";
       $sql .= ", '$reportcomments', '$signature', '$signaturedate', '$diet', '$rxbcchoose', '$rxbcdate', '$milkgrade', '$milkgradeother', '$storefrom', '$babysdob', '$donorstatus', '$reg', '$dfree', '$veg', '$vegan', '$other')";

$result = mysqli_query($con, $sql);

if (!$result) 
   {
      echo "DB Error2, could not query the database\n";
      echo 'MySQL Error: ' . mysqli_error($con);
      //echo "<br>sql=" . $sql;
      exit;
   } 


switch ($donorstatus)
{
case 'D':
  $packetsearch = 'R';
  break;
case 'F':
  $packetsearch = 'O';
  break;
default:
  echo "";
}


if ($packetstate=="$packetsearch") 
     {
         // reduce the number of packages to be processed
         $processnumber = $processnumber - 1;
         $sql = "update screenertable set processnumber = $processnumber WHERE donornumber = '$dnum'";


         $result = mysqli_query($con, $sql); 

         if (!$result) 
            {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysqli_error($con);
                exit;
             }

     }

// Set the processflag to 'N' when user process package  


if ($processnumber == 0)
   {
     $sql = "update screenertable set processflag ='N' WHERE donornumber = '$dnum'";

     $result = mysqli_query($con, $sql);

     if (!$result) 
        {
           echo "(2)DB Error, could not query the database\n";
           echo 'MySQL Error: ' . mysqli_error($con);
           exit;
        }
  
   } 
  
   }
else
   {
      //Receiver Package is being added
      $sql = "insert into receivertable (organization, organizationother, donornumberr, receivedate, expressiondatefrom, expressiondateto, expressionrange, packagenumber, numberofounces, coolernumber, packetstate, packetstateother, storagelocation, storagelocationother, coolercomments, mreport, illness, illnesscomment, illnessbegan, illnessend, symptomdescription, fever, feverstart, feverend, meduse, medtypes, dosage, dosagestart, dosageend, reportcomments, signature, signaturedate, diet, rxbcchoose, rxbcdate, milkgrade, milkgradeother, storefrom, babysdob, donorstatus, donorcomment, reg, dfree, veg, vegan, other) values ('$organization', '$organizationother', '$dnum', '$rdate', '$expressiondatefrom', '$expressiondateto', '$expressionrange', '$packagenumber', $numberofounces, $coolernumber, '$packetstate', '$packetstateother', '$storagelocation', '$storagelocationother', '$coolercomments', '$mreport', '$illness', '$illnesscomment', '$illnessbegan', '$illnessend', '$symptomdescription', '$fever', '$feverstart', '$feverend', '$meduse', '$medtypes', '$dosage', '$dosagestart', '$dosageend', '$reportcomments', '$signature', '$signaturedate', '$diet', '$rxbcchoose', '$rxbcdate', '$milkgrade', '$milkgradeother', '$storefrom', '$babysdob', '$donorstatus', '$donorcomment', '$reg', '$dfree', '$veg', '$vegan', '$other')";
/*
      $sql = "insert into receivertable (organization, organizationother, donornumberr, receivedate, expressiondatefrom, expressiondateto, expressionrange, packagenumber, numberofounces, coolernumber, packetstate, packetstateother, storagelocation, storagelocationother, coolercomments, mreport
      , illness, illnesscomment, illnessbegan, illnessend, symptomdescription, fever, feverstart, feverend, meduse, medtypes, dosage, dosagestart, dosageend, reportcomments, signature, signaturedate, diet, rxbcchoose, rxbcdate, milkgrade, milkgradeother, storefrom, babysdob, donorstatus, donorcomment, reg, dfree, veg, vegan, other) values ('$organization', '$organizationother', '$dnum', '$rdate', '$expressiondatefrom', '$expressiondateto', '$expressionrange', '$packagenumber', $numberofounces, $coolernumber, '$packetstate', '$packetstateother', '$storagelocation', '$storagelocationother', '$coolercomments', '$mreport'
      , '$illness', '$illnesscomment', '$illnessbegan', '$illnessend', '$symptomdescription', '$fever', '$feverstart', '$feverend', '$meduse', '$medtypes', '$dosage', '$dosagestart', '$dosageend', '$reportcomments', '$signature', '$signaturedate', '$diet', '$rxbcchoose', '$rxbcdate', '$milkgrade', '$milkgradeother', '$storefrom', '$babysdob', '$donorstatus', '$donorcomment', '$reg', '$dfree', '$veg', '$vegan', '$other')";
*/
    $result = mysqli_query($con,$sql);

    if (!$result) 
       {
          echo "(3)DB Error, could not query the database\n";
          echo 'MySQL Error: ' . mysqli_error($con);
          exit;
       } 

 
    // Enter in log table     


       $sql2 = "insert into receivertablelog (organization, organizationother, donornumberr, receivedate, expressiondatefrom, expressiondateto, expressionrange, packagenumber, numberofounces, coolernumber, packetstate, packetstateother, storagelocation, storagelocationother, user, transactionnumber, transactiontype, transactiondate, coolercomments, mreport, illness, illnesscomment, illnessbegan, illnessend, symptomdescription, fever, feverstart, feverend, meduse, medtypes, dosage, dosagestart, dosageend, reportcomments, signature, signaturedate, diet, rxbcchoose, rxbcdate, milkgrade, storefrom, babysdob, donorstatus, donorcomment, reg, dfree, veg, vegan, other) values ('$organization', '$organizationother', '$dnum', '$rdate', '$expressiondatefrom', '$expressiondateto', '$expressionrange', '$packagenumber', $numberofounces, $coolernumber, '$packetstate', '$packetstateother', '$storagelocation', '$storagelocationother', '$user', 1, 'Created', '$rdate', '$coolercomments', '$mreport', '$illness', '$illnesscomment', '$illnessbegan', '$illnessend', '$symptomdescription', '$fever', '$feverstart', '$feverend', '$meduse', '$medtypes', '$dosage', '$dosagestart', '$dosageend', '$reportcomments', '$signature', '$signaturedate', '$diet', '$rxbcchoose', '$rxbcdate', '$milkgrade', '$storefrom', '$babysdob', '$donorstatus', '$donorcomment', '$reg', '$dfree', '$veg', '$vegan', '$other')";

     $result = mysqli_query($con,$sql2);

     if (!$result) 
        {
            echo "(4)DB Error, could not query the database\n";
            echo 'MySQL Error: ' . mysqli_error($con);
            exit;
        } 

   }




mysqli_close($con);

echo "</br>";
echo "</br>";

// change links depending on "Daily Search"

echo "<div>";
if ($ctype==2)
    {
       echo "<a href=\"./recvadd.php?dnum=$dnum\">Add another package from same donor</a>\n";
    }


if ($processnumber > 0) 
    {
       echo "&nbsp;&nbsp;<a href=\"./dailysearch.php\">Daily Search</a>\n";
    }

echo "&nbsp;&nbsp;<a href=\"./receivingmenu.php\">Receiver Menu</a>\n";
echo "</div>";


?> 

</P>

<P><BR><BR>

</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
