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

// Updated 1/18/2013



$dnum = $_GET["donornumber"];

// determines whether donor is being edited or added

$ctype = $_GET["ctype"];

if ($ctype==1)
   {
      echo  "<P><FONT SIZE=5><B>Donor Edited</B></FONT></P>";
   }
else
   {
      echo  "<P><FONT SIZE=5><B>Donor Added</B></FONT></P>";
      $dnrappmm = $_POST["dnrappmm"];
      $dnrappdd = $_POST["dnrappdd"];
      $dnrappyr = $_POST["dnrappyr"];
   }
echo "</br>"; 


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

/*
$sql   = "SELECT createdby, dnrapdate, lastedit, lasteditdate FROM screenertable where donornumber =  '$dnum'";

//echo $sql;
//echo "</br>";

$result = mysql_query($sql, $con); 



echo "</br>"; 
Print_r ($_SESSION);
echo "</br>";


if (!$result)
   {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
      exit;
   }


// echo "</br>";

   $row = mysql_fetch_assoc($result);


*/



$organization = $_POST["organization"];
$organizationother = $_POST["organizationother"];

$fname = $_POST["donorfname"];
$mname = $_POST["donormname"];
$lname = $_POST["donorlname"];
$dfree = $_POST["dfree"];
$donorstat = $_POST["donorstat"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$country = $_POST["country"];
$hphoneac = $_POST["hphoneac"];
$hphonepr = $_POST["hphonepr"];
$hphonesu = $_POST["hphonesu"];
$cphoneac = $_POST["cphoneac"];
$cphonepr = $_POST["cphonepr"];
$cphonesu = $_POST["cphonesu"];

$email = $_POST["email"];
$referral = $_POST["referral"];
$babysname = $_POST["babysname"];
$babydob = $_POST["babydob"];
$bbmm = $_POST["bbmm"];
$bbdd = $_POST["bbdd"];
$bbyy = $_POST["bbyy"];

$babystatus = $_POST["babystatus"];
$donateamount = $_POST["donateamount"];
$storefrom = $_POST["storefrom"];
$milkcommit = $_POST["milkcommit"];
$rxbcchoose = $_POST["rxbcchoose"];
$rxbcdate = $_POST["rxbcdate"];
$herbs = $_POST["herbs"];
$alcohol = $_POST["alcohol"];
$smoke = $_POST["smoke"];
$ivDrug = $_POST["ivDrug"];
$transfusion = $_POST["transfusion"];
$donorpacket = $_POST["donorpacket"];
$donorcomment = $_POST["donorcomment"];


echo "</br>";
 
echo "Donor number:&nbsp;&nbsp;" . "<b>" . $dnum . "</b>"; 
echo "</br>"; 
echo "</br>";  


echo "&nbsp;&nbsp;&nbsp;&nbsp;Organization:&nbsp;&nbsp;" . "<b>" . $organization . "</b>";  
 if ($organization=="OTH") 
        {
            echo "&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;" . "<b>" . $organizationother . "</b>"; 
        }
echo "</br>"; 
echo "</br>"; 
echo "First Name:  " . "<b>" . $fname . "</b>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name:  " . "<b>" . $mname . "</b>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Name:  " . "<b>" . $lname . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Address:&nbsp;&nbsp;" . "<b>" . $address . "</b>";
echo "&nbsp;&nbsp;City:&nbsp;&nbsp;" . "<b>" . $city . "</b>";
echo "&nbsp;&nbsp;State:&nbsp;&nbsp;"  . "<b>" . $state . "</b>";
echo "&nbsp;&nbsp;Zip Code:&nbsp;&nbsp;"  . "<b>" . $zip . "</b>";
echo "&nbsp;&nbsp;Country:&nbsp;&nbsp;"  . "<b>" . $country . "</b>";
echo "</br>\n";
echo "</br>\n";
echo "Home Phone:&nbsp;&nbsp;"  . "<b>" . $hphoneac . "-" . $hphonepr . "-" . $hphonesu . "</b>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;Cell Phone:&nbsp;&nbsp;"  . "<b>" . $cphoneac . "-" . $cphonepr . "-" . $cphonesu . "</b>";
echo "</br>\n";
echo "</br>\n";

echo "Email:&nbsp;&nbsp;" . "<b>" . $email . "</b>"; 

echo "&nbsp;&nbsp;&nbsp;Referral:&nbsp;&nbsp;" . "<b>" . $referral . "</b>"; 

echo "</br>\n";

echo "</br>\n";

echo "Baby's Name:&nbsp;&nbsp;&nbsp;" . "<b>" . $babysname . "</b>"; 

// echo "</br>\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;Baby's DOB:&nbsp;&nbsp;&nbsp;";
 

echo "<b>$bbmm</b>" . "-" . "<b>$bbdd</b>" . "-" . "<b>$bbyy</b>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";


echo "&nbsp;&nbsp;&nbsp;Baby's Status:&nbsp;&nbsp;" . "<b>" . $babystatus . "</b>"; 

echo "</br>\n";
echo "</br>\n";

echo "Amount can donate:&nbsp;&nbsp;" . "<b>" . $donateamount . "</b>";

echo "</br>\n";
echo "</br>\n";
echo "Milk Stored from:&nbsp;&nbsp;&nbsp;" . "<b>" . $storefrom . "</b>"; 


echo "&nbsp;&nbsp;&nbsp;Can commit to 100 oz:&nbsp;&nbsp;" . "<b>" . $milkcommit . "</b>"; 
echo "</br>";
echo "</br>";

echo "RX/BC Pll/OTC Use (Y/N)(Dates):&nbsp;&nbsp;" . "<b>" . $rxbcchoose . "</b>";
if ($rxbcchoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<b>" . $rxbcdate . "</b>"."&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }
echo "</br>";
echo "</br>";
echo "Supplements w/Herbs/Herb Teas:&nbsp;&nbsp;" . "<b>" . $herbs . "</b>"; 


echo "&nbsp;&nbsp;&nbsp;Alcohol while pumping:&nbsp;&nbsp;" . "<b>" . $alcohol . "</b>"; 

echo "&nbsp;&nbsp;&nbsp;Smoke:&nbsp;&nbsp;". "<b>" . $smoke . "</b>";

echo "</br>";
echo "</br>";

echo "&nbsp;&nbsp;&nbsp;Transfusion:&nbsp;&nbsp;" . "<b>" . $transfusion . "</b>"; 

echo "</br>";
echo "</br>";

echo "Donor Packet:&nbsp;&nbsp;" . "<b>" . $donorpacket . "</b>";

echo "</br>";
echo "</br>";

echo "Comments:&nbsp;&nbsp;" . "<b>" . $donorcomment . "</b>";

echo "</br>\n";
echo "</br>\n";


echo "</br>"; 
echo "</br>"; 
 
echo "</br>"; 
echo "</br>"; 


// Construct "Lastedit" and "Last edit Date"


$lastedit = $_SESSION['uname'];

// Populate month - day - year

$lemm = (idate("m"));
$ledd = (idate("d"));
$leyy = (idate("Y"));

// Construct Last Edit Date
$lasteditdate = $leyy . "-" . $lemm . "-" . $ledd;

// Construct Call Date
$dnrapdate = $dnrappyr . "-" . $dnrappmm . "-" . $dnrappdd;

// Construct Baby's DOB
$babysdob = $bbyy . "-" . $bbmm . "-" . $bbdd;


// Construct home and cell phone


$hphone = $hphoneac . $hphonepr . $hphonesu;
// echo "<br>" . "hphone: " . $hphone . "<br>";
$cphone = $cphoneac . $cphonepr . $cphonesu;
// echo "<br>" . "cphone: " . $cphone . "<br>";


// determines whether donor is being edited or added


if ($ctype==1)
   {
     //Donor is being edited

     $sql = "UPDATE screenertable SET firstname='$fname', lastname='$lname', middlename='$mname', address='$address', city='$city', state='$state', zip='$zip', country='$country', homephone='$hphone', cellphone='$cphone', email='$email', referral='$referral', babysname='$babysname', babysdob='$babysdob', babystatus='$babystatus', storefrom='$storefrom', milkcommit='$milkcommit', herbs='$herbs', alcohol='$alcohol', transfusion='$transfusion', lastedit='$lastedit', lasteditdate='$lasteditdate', donorpacket='$donorpacket', donorcomment='$donorcomment', organization = '$organization', donateamount = $donateamount, rxbcdate = '$rxbcdate', smoke = '$smoke', organizationother='$organizationother', rxbcchoose = '$rxbcchoose' WHERE donornumber = '$dnum'";
   $result = mysql_query($sql, $con);

   if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }

// Inserting donor into Donor Table Log

// increment transaction number for each edit

$result = mysql_query("SELECT COUNT(*) FROM screenertablelog where donornumber = $dnum"); 

$lasttransactionnumber = mysql_result($result,0);

$transactionnumber = $lasttransactionnumber + 1;  



   $sql1 = "insert into screenertablelog (donornumber, firstname, lastname, middlename, dnrapdate, address, city, state, zip, country,  homephone, cellphone, email, referral, babysname, babysdob, babystatus, storefrom, milkcommit, herbs, alcohol, transfusion, createdby, transactionnumber, transactiontype, lasteditdate, lastedit, donorpacket, donorcomment, transactiondate, username, organization, donateamount, rxbcdate, smoke, organizationother, rxbcchoose) values ($dnum, '$fname', '$lname', '$mname', '$dnrapdate', '$address', '$city', '$state', '$zip', '$country', '$hphone', '$cphone', '$email', '$referral', '$babysname', '$babysdob', '$babystatus', '$storefrom', '$milkcommit', '$herbs', '$alcohol', '$transfusion', '$createdby', $transactionnumber, 'Edited', '$lasteditdate', '$lastedit', '$donorpacket', '$donorcomment', '$lasteditdate', '$lastedit', '$organization', $donateamount, '$rxbcdate', '$smoke', '$organizationother', '$rxbcchoose')";



   $result = mysql_query($sql1, $con); 


   if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }








// updated lab table
/*
   $sqll = "UPDATE labtable SET donornumberl = '$dnum' WHERE donorrecordnumberl = $donorrecordnumber";
   $resultlab = mysql_query($sqll, $con);

   if (!$resultlab) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }

// updated receiever table

   $sqlr = "UPDATE receivertable SET donornumberr = '$dnum' WHERE donorrecordnumberr = $donorrecordnumber";
   $resultrecv = mysql_query($sqlr, $con);

   if (!$resultrecv) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }

 */

   }
else
   {
   //Donor is being added
   
// Next 4 lines generate the next donor record number   
// ****************************************************************

   mysql_select_db('milk_db', $con);

/*
   $result = mysql_query("SELECT MAX(donorrecordnumber) FROM screenertable"); 



   $lastnum = mysql_result($result,0);

   $donorrecordnumber = $lastnum + 1;  

*/
//  Next donor number  

   $createdby = $_SESSION['uname'];

// Inserting donor into Donor Table

   $sql = "insert into screenertable (donornumber, firstname, lastname, middlename, dnrapdate, address, city, state, zip, country,  homephone, cellphone, email, referral, babysname, babysdob, babystatus, storefrom, milkcommit, herbs, alcohol, transfusion, createdby, donorpacket, donorcomment, organization, donateamount, rxbcdate, smoke, organizationother, rxbcchoose) values ($dnum, '$fname', '$lname', '$mname', '$dnrapdate', '$address', '$city', '$state', '$zip', '$country', '$hphone', '$cphone', '$email', '$referral', '$babysname', '$babysdob', '$babystatus', '$storefrom', '$milkcommit', '$herbs', '$alcohol', '$transfusion', '$createdby', '$donorpacket', '$donorcomment', '$organization', $donateamount, '$rxbcdate', '$smoke', '$organizationother', '$rxbcchoose')";


   $result = mysql_query($sql, $con); 


   if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }


// Inserting donor into Donor Table Log

   $sql1 = "insert into screenertablelog (donornumber, firstname, lastname, middlename, dnrapdate, address, city, state, zip, country,  homephone, cellphone, email, referral, babysname, babysdob, babystatus, storefrom, milkcommit, herbs, alcohol, transfusion, createdby, transactionnumber, transactiontype, transactiondate, username, donorpacket, donorcomment, organization, donateamount, rxbcdate, smoke, organizationother, rxbcchoose) values ($dnum, '$fname', '$lname', '$mname', '$dnrapdate', '$address', '$city', '$state', '$zip', '$country', '$hphone', '$cphone', '$email', '$referral', '$babysname', '$babysdob', '$babystatus', '$storefrom', '$milkcommit', '$herbs', '$alcohol', '$transfusion', '$createdby', 1, 'Created', '$dnrapdate', '$createdby', '$donorpacket', '$donorcomment', '$organization', $donateamount, '$rxbcdate', '$smoke', '$organizationother', '$rxbcchoose')";


   $result = mysql_query($sql1, $con); 


   if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }



   }
/*
echo "<br>";
echo $sql1;
echo "<br>";
*/

 mysql_close($con);

   echo "</br>";
   echo "<p><a href=\"./donorslt.php\">Return to Donor Result</a></p>\n";
   echo "</br>";
   echo "<p><a href=\"./donormenu.php\">Return to Donor Menu</a></p>\n";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
