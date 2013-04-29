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

// Updated 1/18/2013



$dnum = $_GET["dnum"];

$packagenumber = $_GET["packagenumber"];

$ctype = $_GET["ctype"];





//  Connect to Data Base  

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);

if (!mysql_select_db('milk_db', $con)) 
   {
   echo 'Could not select database';
   exit;
   }

$processnumber = $_POST["processnumber"];
/*
echo "</br>";
echo "processnumber: " . $processnumber;
echo "</br>";
*/

$mreport = $_POST["mreport"];

/*
echo "<br>"; 
echo "mreport&nbsp;&nbsp;" . $mreport;
echo "<br>"; 

*/

$storefrom = $_POST["storefrom"];
$diet = $_POST["diet"];
$babysdob = $_POST["babysdob"];
$donorstatus = $_POST["donorstatus"];
$donorcomment = $_POST["donorcomment"];
$organization = $_POST["organization"];
$organizationother = $_POST["organizationother"];
$rxbcchoose = $_POST["rxbcchoose"];
$milkgrade = $_POST["milkgrade"];


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


// Create received date (stored)
$rdate = $ryy . "-" . $rmm . "-" . $rdd;


// Create received date
//echo "</br>";
//echo "rdate: " . $rdate;

// Create expression "From" date  (stored)
$expressiondatefrom = $fcyy . "-" . $fcmm . "-" . $fcdd;

//echo "</br>";
//echo "expressiondatefrom: " . $expressiondatefrom;


// Create expression "To" date  (stored)
$expressiondateto = $tcyy . "-" . $tcmm . "-" . $tcdd;

//echo "</br>";
//echo "expressiondateto: " . $expressiondateto;

// Create expression "To" date

$expressionrange = $fcmm . "-" . $fcdd . "-" . $fcyy . "&nbsp;thru&nbsp;" . $tcmm . "-" . $tcdd . "-" . $tcyy;

/*
echo "</br>";
echo "expressionrange: " . $expressionrange;
echo "</br>";
*/


// $ctype determines if the record is added or edited

$ctype = $_GET["ctype"];

if ($ctype==1)
   {
      echo  "<P><FONT SIZE=5><B>Package Edited</B></FONT></P>";
   }
else
   {
      echo  "<P><FONT SIZE=5><B>Package Added</B></FONT></P>";
//      $dnum = $_POST["donornumber"];
   }
//echo "</br>"; 


// Check if illness report was created for this donor


if ($mreport == yes)
   {
      echo "<p><b>Illness and Medical Report</b></p>";

      $illness = $_POST["illness"];
      echo "Who was ill:&nbsp;&nbsp;&nbsp;" . "<b>" . $illness . "</b>";
      echo "<br>"; 
      echo "<br>"; 

      $illnesscomment = $_POST["illnesscomment"];
      echo "Description:&nbsp;&nbsp;&nbsp;"; 
//      echo "<br>"; 
//      echo "<br>"; 
      echo "<b>" . $illnesscomment . "</b>";
      echo "<br>"; 
      echo "<br>"; 

      // Displaying Illness Dates

      $illbmm = $_POST["illbmm"];
      $illbdd = $_POST["illbdd"];
      $illbyy = $_POST["illbyy"];
      $illemm = $_POST["illemm"];
      $illedd = $_POST["illedd"];
      $illeyy = $_POST["illeyy"];

      echo "Illness Began:&nbsp;&nbsp;";

      echo "<b>$illbmm</b>" . "-" . "<b>$illbdd</b>" . "-" . "<b>$illbyy</b>" .  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

      echo "Ended:&nbsp;&nbsp;";

      echo "<b>$illemm</b>" . "-" . "<b>$illedd</b>" . "-" . "<b>$illeyy</b>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";

      // Create illness began date (stored)
      $illnessbegan = $illbyy . "-" . $illbmm . "-" . $illbdd;

//      echo "</br>";
//      echo "illnessbegan: " . $illnessbegan;

      // Create illness end date (stored)
      $illnessend = $illeyy . "-" . $illemm . "-" . $illedd;

//      echo "</br>";
//      echo "illnessend: " . $illnessend;


      echo "</br>"; 
      echo "</br>"; 
      $symptomdescription = $_POST["symptomdescription"];

      echo "Description of Symptoms:&nbsp;&nbsp;";
      echo "</br>"; 
      echo "<b>$symptomdescription</b>"; 

      echo "</br>"; 
      echo "</br>"; 

      $fever = $_POST["fever"];
      echo "Fever:&nbsp;&nbsp;&nbsp;" . "<b>$fever</b>" . "&nbsp;&nbsp;F";
      echo "<br>"; 
      echo "<br>"; 

      // Displaying Fever Dates

      $fsmm = $_POST["fsmm"];
      $fsdd = $_POST["fsdd"];
      $fsyy = $_POST["fsyy"];
      $femm = $_POST["femm"];
      $fedd = $_POST["fedd"];
      $feyy = $_POST["feyy"];

      echo "Fever Began:&nbsp;&nbsp;";

      echo "<b>$fsmm</b>" . "-" . "<b>$fsdd</b>" . "-" . "<b>$fsyy</b>" .  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

      echo "Ended:&nbsp;&nbsp;";

      echo "<b>$femm</b>" . "-" . "<b>$fedd</b>" . "-" . "<b>$feyy</b>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";


      // Create fever began date (stored)
      $feverstart = $fsyy . "-" . $fsmm . "-" . $fsdd;

//      echo "</br>";
//      echo "feverstart: " . $feverstart;

      // Create fever end date (stored)
      $feverend = $feyy . "-" . $femm . "-" . $fedd;

//      echo "</br>";
//      echo "feverend: " . $feverend;


      echo "</br>"; 
      echo "</br>"; 

      $meduse = $_POST["meduse"];

      echo "DONOR MEDICATION USE:&nbsp;&nbsp;" . "<b>$meduse</b>";

      echo "</br>"; 
      echo "</br>"; 

      $medtypes = $_POST["medtypes"];

      echo "Types:&nbsp;&nbsp;" . "<b>$medtypes</b>";

      echo "</br>"; 
      echo "</br>"; 

      $dosage = $_POST["dosage"];

      echo "Dosage:&nbsp;&nbsp;" . "<b>$dosage</b>";

      echo "</br>"; 
      echo "</br>"; 

      // Displaying Dosage Dates

      $dsmm = $_POST["dsmm"];
      $dsdd = $_POST["dsdd"];
      $dsyy = $_POST["dsyy"];
      $demm = $_POST["demm"];
      $dedd = $_POST["dedd"];
      $deyy = $_POST["deyy"];

      echo "Dosage Start:&nbsp;&nbsp;";

      echo "<b>$dsmm</b>" . "-" . "<b>$dsdd</b>" . "-" . "<b>$dsyy</b>" .  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

      echo "Ended:&nbsp;&nbsp;";

      echo "<b>$demm</b>" . "-" . "<b>$dedd</b>" . "-" . "<b>$deyy</b>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";


      // Create dosage began date (stored)
      $dosagestart = $dsyy . "-" . $dsmm . "-" . $dsdd;

//      echo "</br>";
//      echo "dosagestart: " . $dosagestart;

      // Create fever end date (stored)
      $dosageend = $deyy . "-" . $demm . "-" . $dedd;

//      echo "</br>";
//      echo "dosageend: " . $dosageend;


      echo "</br>"; 
      echo "</br>";
 
      $reportcomments = $_POST["reportcomments"];

      echo "Illness and Medication Notes/Comments:&nbsp;&nbsp;";
      echo "</br>"; 
      echo "<b>$reportcomments</b>"; 

      echo "</br>"; 
      echo "</br>"; 

      $signature = $_POST["signature"];

      echo "Signed:&nbsp;&nbsp;";
//      echo "</br>"; 
      echo "<b>$signature</b>"; 

      echo "</br>"; 
      echo "</br>"; 

      // Displaying Signature Date

      $smm = $_POST["smm"];
      $sdd = $_POST["sdd"];
      $syy = $_POST["syy"];


      echo "Date Signed:&nbsp;&nbsp;";

      echo "<b>$smm</b>" . "-" . "<b>$sdd</b>" . "-" . "<b>$syy</b>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";


      // Create signature date (stored)
      $signaturedate = $syy . "-" . $smm . "-" . $sdd;

//      echo "</br>";
//      echo "signaturedate: " . $signaturedate;


      echo "</br>"; 

      echo "<p><b>End of Illness and Medical Report</b></p>";

      echo "</br>";


   }

//echo "</br>"; 

//echo "</br>"; 

echo "Date Received:&nbsp;&nbsp;";

echo "<b>$rmm</b>" . "-" . "<b>$rdd</b>" . "-" . "<b>$ryy</b>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";

echo "</br>"; 
echo "</br>"; 

echo "Donor number:&nbsp;&nbsp;" . "<b>$dnum</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Organization:&nbsp;&nbsp;" . "<b>$organization</b>"; 


if ($organization == 'OTH')
   {
       echo "&nbsp;&nbsp;&nbsp;Other:&nbsp;&nbsp;" . "<b>$organizationother</b>"; 
   }


echo "</br>"; 
echo "</br>"; 

echo "Donor Status:&nbsp;&nbsp;" . "<b>$donorstatus</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Donor Comments:&nbsp;&nbsp;" . "<b>$donorcomment</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Medications:&nbsp;&nbsp;" . "<b>$rxbcchoose</b>"; 

if ($rxbcchoose == 'Yes')
   {
       echo "&nbsp;&nbsp;&nbsp;Dates:&nbsp;&nbsp;" . "<b>$rxbcdate</b>"; 
   }

echo "</br>"; 
echo "</br>"; 

echo "Diet:&nbsp;&nbsp;" . "<b>$diet</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Stored From:&nbsp;&nbsp;" . "<b>$storefrom</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Milk Grade:&nbsp;&nbsp;" . "<b>$milkgrade</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Baby's DOB:&nbsp;&nbsp;&nbsp;" . "<b>" . substr($babysdob,5,2) . "-" .  substr($babysdob,8,2) . "-" . substr($babysdob,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
echo "</br>"; 
echo "</br>"; 

echo "Cooler number:&nbsp;&nbsp;" . "<b>" . $coolernumber . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Cooler comments:&nbsp;&nbsp;" . "<b>" . $coolercomments . "</b>"; 
echo "</br>"; 
echo "</br>"; 


if ($ctype==2)
   {
       // increment package number when adding a package

       $result = mysql_query("SELECT count(packagenumber) FROM receivertable"); 

       $packagenumber = mysql_result($result,0);

       $packagenumber = $packagenumber + 1;  

   }



echo "Package number:&nbsp;&nbsp;&nbsp;&nbsp;" . "<b>$packagenumber</b>"; 
echo "</br>"; 
echo "</br>"; 


echo "Number of ounces:&nbsp;&nbsp;&nbsp;&nbsp;" . "<b>$numberofounces</b>"; 
echo "</br>"; 
echo "</br>"; 


echo "Expression Range";
echo "</br>"; 
echo "</br>"; 
 
echo "&nbsp;&nbsp;From:&nbsp;&nbsp;&nbsp;" . "<b>$fcmm</b>" . "-" . "<b>$fcdd</b>" . "-" . "<b>$fcyy</b>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";
echo "</br>"; 
echo "</br>"; 

echo "&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . "<b>$tcmm</b>" . "-" . "<b>$tcdd</b>" . "-" . "<b>$tcyy</b>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";

echo "</br>"; 
echo "</br>"; 

echo "Stored from:&nbsp;&nbsp;&nbsp;". "<b>$storefrom</b>";

echo "</br>"; 
echo "</br>"; 

echo "Milk Grade:&nbsp;&nbsp;&nbsp;". "<b>$milkgrade</b>";

echo "</br>"; 
echo "</br>"; 

echo "Package State:&nbsp;&nbsp;&nbsp;&nbsp;" . "<b>$packetstate</b>"; 

if ($packetstate=="O") 
     {
         echo "&nbsp;&nbsp;&nbsp;Use:&nbsp;&nbsp;" . "<b>" . $packetstateother . "</b>"; 
     }

echo "</br>"; 
echo "</br>"; 

echo "Storage Location:&nbsp;&nbsp;&nbsp;&nbsp;" . "<b>$storagelocation</b>"; 

echo "</br>"; 
echo "</br>"; 



// Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 


//variable used when log table

$user = $_SESSION['uname'];


// determines whether receiver package is being edited or added


if ($ctype==1)
   {
   //Receiver Package is being edited
   $sql = "update receivertable set organization = '$organization', organizationother = '$organizationother', receivedate = '$rdate', expressiondatefrom = '$expressiondatefrom', expressiondateto = '$expressiondateto', expressionrange = '$expressionrange', numberofounces = $numberofounces, coolernumber = $coolernumber, packetstate = '$packetstate', packetstateother = '$packetstateother', storagelocation = '$storagelocation',  storagelocationother = '$storagelocationother', coolercomments = '$coolercomments', mreport = '$mreport', illness = '$illness', illnesscomment = '$illnesscomment', illnessbegan = '$illnessbegan', illnessend = '$illnessend', symptomdescription = '$symptomdescription', fever = '$fever', feverstart = '$feverstart', feverend = '$feverend', meduse = '$meduse', medtypes = '$medtypes', dosage = '$dosage', dosagestart = '$dosagestart', dosageend = '$dosageend', reportcomments = '$reportcomments', signature = '$signature', signaturedate = '$signaturedate', diet = '$diet', rxbcchoose = '$rxbcchoose', rxbcdate = '$rxbcdate', milkgrade = '$milkgrade', storefrom = '$storefrom', babysdob = '$babysdob', donorstatus = '$donorstatus'  WHERE packagenumber = $packagenumber";

/*
echo "</br>";
echo "</br>";
echo $sql;
echo "</br>";
echo "</br>";
*/

$result = mysql_query($sql, $con);

if (!$result) 
   {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
      exit;
   }

    // Enter in log table     

// increment transaction number for each edit

$result = mysql_query("SELECT COUNT(*) FROM receivertablelog where packagenumber = $packagenumber"); 

$lasttransactionnumber = mysql_result($result,0);

$transactionnumber = $lasttransactionnumber + 1;  



       $sql = "insert into receivertablelog (organization, organizationother, donornumberr, receivedate, expressiondatefrom, expressiondateto, expressionrange, packagenumber, numberofounces, coolernumber, packetstate, packetstateother, storagelocation, storagelocationother, user, transactionnumber, transactiontype, transactiondate, coolercomments, mreport, illness, illnesscomment, illnessbegan, illnessend, symptomdescription, fever, feverstart, feverend, meduse, medtypes, dosage, dosagestart, dosageend, reportcomments, signature, signaturedate, diet, rxbcchoose, rxbcdate, milkgrade, storefrom, babysdob, donorstatus) values ('$organization', '$organizationother', $dnum, '$rdate', '$expressiondatefrom', '$expressiondateto', '$expressionrange', '$packagenumber', $numberofounces, $coolernumber, '$packetstate', '$packetstateother', '$storagelocation', '$storagelocationother', '$user', $transactionnumber, 'Edited', '$rdate', '$coolercomments', '$mreport', '$illness', '$illnesscomment', '$illnessbegan', '$illnessend', '$symptomdescription', '$fever', '$feverstart', '$feverend', '$meduse', '$medtypes', '$dosage', '$dosagestart', '$dosageend', '$reportcomments', '$signature', '$signaturedate', '$diet', '$rxbcchoose', '$rxbcdate', '$milkgrade', '$storefrom', '$babysdob', '$donorstatus')";
/*
echo "</br>";
echo "</br>";
echo $sql;
echo "</br>";
echo "</br>";
*/
$result = mysql_query($sql, $con);

if (!$result) 
   {
      echo "DB Error2, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
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


//if ($packetstate=="R") 
if ($packetstate=="$packetsearch") 
     {
         // reduce the number of packages to be processed
         $processnumber = $processnumber - 1;
         $sql = "update screenertable set processnumber = $processnumber WHERE donornumber = $dnum";

/*
echo "</br>";
echo "</br>";
echo $sql;
echo "</br>";
echo "</br>";
*/


         $result = mysql_query($sql, $con); 

         if (!$result) 
            {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
             }

     }
/*
echo "</br>"; 
echo "processnumber: " . $processnumber;
echo "</br>";
*/

// Set the processflag to 'N' when user process package  


if ($processnumber == 0)
   {
     $sql = "update screenertable set processflag ='N' WHERE donornumber = $dnum";

/*
echo "</br>";
echo "</br>";
echo "sql:" . $sql;
echo "</br>";
echo "</br>";
*/

     $result = mysql_query($sql, $con);

     if (!$result) 
        {
           echo "DB Error, could not query the database\n";
           echo 'MySQL Error: ' . mysql_error();
           exit;
        }
  
   } 
  
   }
else
   {
/*
echo "</br>";
echo "Organi :" . $organization;
echo "</br>";
*/
      //Receiver Package is being added



      $sql = "insert into receivertable (organization, organizationother, donornumberr, receivedate, expressiondatefrom, expressiondateto, expressionrange, packagenumber, numberofounces, coolernumber, packetstate, packetstateother, storagelocation, storagelocationother, coolercomments, mreport, illness, illnesscomment, illnessbegan, illnessend, symptomdescription, fever, feverstart, feverend, meduse, medtypes, dosage, dosagestart, dosageend, reportcomments, signature, signaturedate, diet, rxbcchoose, rxbcdate, milkgrade, storefrom, babysdob, donorstatus, donorcomment) values ('$organization', '$organizationother', $dnum, '$rdate', '$expressiondatefrom', '$expressiondateto', '$expressionrange', '$packagenumber', $numberofounces, $coolernumber, '$packetstate', '$packetstateother', '$storagelocation', '$storagelocationother', '$coolercomments', '$mreport', '$illness', '$illnesscomment', '$illnessbegan', '$illnessend', '$symptomdescription', '$fever', '$feverstart', '$feverend', '$meduse', '$medtypes', '$dosage', '$dosagestart', '$dosageend', '$reportcomments', '$signature', '$signaturedate', '$diet', '$rxbcchoose', '$rxbcdate', '$milkgrade', '$storefrom', '$babysdob', '$donorstatus', '$donorcomment')";

  

/*


    echo "</br>";
    echo "</br>";
    echo $sql;
    echo "</br>";
    echo "</br>";
*/


    $result = mysql_query($sql, $con);

    if (!$result) 
       {
          echo "DB Errorppppp, could not query the database\n";
          echo 'MySQL Error: ' . mysql_error();
          exit;
       } 

 
    // Enter in log table     


       $sql2 = "insert into receivertablelog (organization, organizationother, donornumberr, receivedate, expressiondatefrom, expressiondateto, expressionrange, packagenumber, numberofounces, coolernumber, packetstate, packetstateother, storagelocation, storagelocationother, user, transactionnumber, transactiontype, transactiondate, coolercomments, mreport, illness, illnesscomment, illnessbegan, illnessend, symptomdescription, fever, feverstart, feverend, meduse, medtypes, dosage, dosagestart, dosageend, reportcomments, signature, signaturedate, diet, rxbcchoose, rxbcdate, milkgrade, storefrom, babysdob, donorstatus, donorcomment) values ('$organization', '$organizationother', $dnum, '$rdate', '$expressiondatefrom', '$expressiondateto', '$expressionrange', '$packagenumber', $numberofounces, $coolernumber, '$packetstate', '$packetstateother', '$storagelocation', '$storagelocationother', '$user', 1, 'Created', '$rdate', '$coolercomments', '$mreport', '$illness', '$illnesscomment', '$illnessbegan', '$illnessend', '$symptomdescription', '$fever', '$feverstart', '$feverend', '$meduse', '$medtypes', '$dosage', '$dosagestart', '$dosageend', '$reportcomments', '$signature', '$signaturedate', '$diet', '$rxbcchoose', '$rxbcdate', '$milkgrade', '$storefrom', '$babysdob', '$donorstatus', '$donorcomment')";

/*
echo "<br>";
echo $sql2;
echo "<br>";

echo "<br>";
*/

     $result = mysql_query($sql2, $con);

     if (!$result) 
        {
            echo "DB Errorttt, could not query the database\n";
            echo 'MySQL Error: ' . mysql_error();
            exit;
        } 

   }




mysql_close($con);

echo "</br>";
echo "</br>";

// change links depending on "Daily Search"

if ($processnumber == 0) 
    {
       echo "<p><a href=\"./recvadd.php?dnum=$dnum\">Add another package from same donor</a></p>\n";
    } 
else
    {
       echo "<p><a href=\"./dailysearch.php\">Daily Search</a></p>\n";
    }

echo "</br>";
echo "<p><a href=\"./receivingmenu.php\">Return to Receiving Menu</a></p>\n";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
