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

<link type="text/css" rel="stylesheet" href="mystyle.css">
</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php
echo "<p><label class='boldtext'><font size=5>Donor Screening</font></label></p>\n";
// Updated 1/18/2013



$dnum = $_GET["donornumber"];

// determines whether donor is being edited or added

$ctype = $_GET["ctype"];

if ($ctype==1)
   {
      echo  "<P><FONT SIZE=5><label class='boldtext'>Donor Edited</label></FONT></P>";
   }
else
   {
      echo  "<P><FONT SIZE=5><label class='boldtext'>Donor Added</label></FONT></P>";
      $dnrappmm = $_POST["dnrappmm"];
      $dnrappdd = $_POST["dnrappdd"];
      $dnrappyr = $_POST["dnrappyr"];
   }
echo "</br>"; 


//echo "dnum: " . $dnum;
echo "</br>";

//  Connect to Data Base  

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);

if (!mysql_select_db('milk_db', $con)) 
   {
   echo 'Could not select database';
   exit;
   }



$determinechoose = $_POST['determinechoose'];
$determine = $_POST['determine'];
$process = $_POST['process'];
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
$herbschoose = $_POST["herbschoose"];
$herbs = $_POST["herbs"];
$alcoholchoose = $_POST["alcoholchoose"];
$alcohol = $_POST["alcohol"];
$smoke = $_POST["smoke"];
$ivDrug = $_POST["ivDrug"];
$transfusionchoose = $_POST["transfusionchoose"];
$transfusion = $_POST["transfusion"];
$workchoose = $_POST["workchoose"];
$work = $_POST["work"];
$tattooschoose = $_POST["tattooschoose"];
$tattoos = $_POST["tattoos"];
$heptest = $_POST["heptest"];
$hivtest = $_POST["hivtest"];
$tbtest = $_POST["tbtest"];
$tbtreat = $_POST["tbtreat"];
$herpeschoose = $_POST["herpeschoose"];
$herpes = $_POST["herpes"];
$hemophilia = $_POST["hemophilia"];
$hormones = $_POST["hormones"];
$ukmoschoose = $_POST["ukmoschoose"];
$ukmos = $_POST["ukmos"];
$eurochoose = $_POST["eurochoose"];
$euro = $_POST["euro"];
$diet = $_POST["diet"];
$donorpacket = $_POST["donorpacket"];
$donorcomment = $_POST["donorcomment"];


echo "</br>";
echo "Donor number:&nbsp;&nbsp;" . "<label class='boldtext'>" . $dnum . "</label>"; 
echo "</br>"; 
echo "</br>"; 
 
echo "Application Status:&nbsp;&nbsp;" . "<label class='boldtext'>" . $determinechoose . "</label>";  
 if ($determinechoose == "A"||"P"||"NP"||"F") 
        {
            echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $determine . "</label>". $process; 
        }

echo "</br>";
echo "</br>";
 
echo "Organization:&nbsp;&nbsp;" . "<label class='boldtext'>" . $organization . "</label>";  
 if ($organization=="OTH") 
        {
            echo "&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;" . "<label class='boldtext'>" . $organizationother . "</label>"; 
        }
echo "</br>"; 
echo "</br>"; 
echo "First Name:  " . "<label class='boldtext'>" . $fname . "</label>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name:  " . "<label class='boldtext'>" . $mname . "</label>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Name:  " . "<label class='boldtext'>" . $lname . "</label>"; 
echo "</br>"; 
echo "</br>"; 

echo "Address:&nbsp;&nbsp;" . "<label class='boldtext'>" . $address . "</label>";
echo "&nbsp;&nbsp;City:&nbsp;&nbsp;" . "<label class='boldtext'>" . $city . "</label>";
echo "&nbsp;&nbsp;State:&nbsp;&nbsp;"  . "<label class='boldtext'>" . $state . "</label>";
echo "&nbsp;&nbsp;Zip Code:&nbsp;&nbsp;"  . "<label class='boldtext'>" . $zip . "</label>";
echo "&nbsp;&nbsp;Country:&nbsp;&nbsp;"  . "<label class='boldtext'>" . $country . "</label>";
echo "</br>\n";
echo "</br>\n";
echo "Home Phone:&nbsp;&nbsp;"  . "<label class='boldtext'>" . $hphoneac . "-" . $hphonepr . "-" . $hphonesu . "</label>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;Cell Phone:&nbsp;&nbsp;"  . "<label class='boldtext'>" . $cphoneac . "-" . $cphonepr . "-" . $cphonesu . "</label>";
echo "</br>\n";
echo "</br>\n";

echo "Email:&nbsp;&nbsp;" . "<label class='boldtext'>" . $email . "</label>"; 

echo "&nbsp;&nbsp;&nbsp;Referral:&nbsp;&nbsp;" . "<label class='boldtext'>" . $referral . "</label>"; 

echo "</br>\n";

echo "</br>\n";

echo "Baby's Name:&nbsp;&nbsp;&nbsp;" . "<label class='boldtext'>" . $babysname . "</label>"; 

// echo "</br>\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;Baby's DOB:&nbsp;&nbsp;&nbsp;";
 

echo "<label class='boldtext'>$bbmm</label>" . "-" . "<label class='boldtext'>$bbdd</label>" . "-" . "<label class='boldtext'>$bbyy</label>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";


echo "&nbsp;&nbsp;&nbsp;Baby's Status:&nbsp;&nbsp;" . "<label class='boldtext'>" . $babystatus . "</label>"; 

echo "</br>\n";
echo "</br>\n";

echo "Amount can donate:&nbsp;&nbsp;" . "<label class='boldtext'>" . $donateamount . "</label>";

echo "</br>\n";
echo "</br>\n";
echo "Milk Stored from:&nbsp;&nbsp;&nbsp;" . "<label class='boldtext'>" . $storefrom . "</label>"; 


echo "&nbsp;&nbsp;&nbsp;Can commit to 100 oz:&nbsp;&nbsp;" . "<label class='boldtext'>" . $milkcommit . "</label>"; 
echo "</br>";
echo "</br>";

echo "RX/BC Pll/OTC Use (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $rxbcchoose . "</label>";
if ($rxbcchoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $rxbcdate . "</label>"."&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }
echo "</br>";
echo "</br>";
echo "Supplements w/Herbs/Herb Teas (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $herbschoose . "</label>"; 
if ($herbschoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $herbs . "</label>"."&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }

echo "</br>";
echo "</br>";

echo "Alcohol while pumping (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $alcoholchoose. "</label>"; 
if ($alcoholchoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $alcohol . "</label>"."&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }

echo "</br>";
echo "</br>";
echo "Smoke:&nbsp;&nbsp;". "<label class='boldtext'>" . $smoke . "</label>";

echo "&nbsp;&nbsp;&nbsp;ivDrugs:&nbsp;&nbsp;". "<label class='boldtext'>" . $ivDrug . "</label>";

echo "</br>";
echo "</br>";

echo "Transfusion (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $transfusionchoose . "</label>"; 
if ($transfusionchoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $transfusion . "</label>"."&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }
echo "</br>";
echo "</br>";
echo "Work Hi-Risk/Blood (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $workchoose . "</label>"; 
if ($workchoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $work . "</label>"."&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }
echo "</br>";
echo "</br>";
echo "Tattoos/Piercing (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $tattooschoose . "</label>"; 
if ($tattooschoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $tattoos . "</label>"."&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }


echo "</br>";
echo "</br>";
echo "Hep Test:&nbsp;&nbsp;". "<label class='boldtext'>" . $heptest . "</label>";

echo "&nbsp;&nbsp;HIV Test:&nbsp;&nbsp;". "<label class='boldtext'>" . $hivtest . "</label>" ;
echo "</br>";
echo "</br>";
echo "TB Test:&nbsp;&nbsp;". "<label class='boldtext'>" . $tbtest . "</label>" . "&nbsp;&nbsp;";
echo "TB Treatment:&nbsp;&nbsp;". "<label class='boldtext'>" . $tbtreat . "</label>" . "&nbsp;&nbsp;";

echo "</br>";
echo "</br>";

echo "Cold Sores/Herpes while breatfeedng (Y/N)(Dates):&nbsp;&nbsp;" . "<label class='boldtext'>" . $herpeschoose . "</label>"; 
if ($herpeschoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<label class='boldtext'>" . $herpes . "</label>"."&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }


echo "</br>";
echo "</br>";


echo "Hemophilia:&nbsp;&nbsp;". "<label class='boldtext'>" . $hemophilia . "</label>" . "&nbsp;&nbsp;";
echo "&nbsp;&nbsp;Growth Hormones:&nbsp;&nbsp;". "<label class='boldtext'>" . $hormones . "</label>";

echo "</br>";
echo "</br>";

echo "UK '80-96 3+MOS. (Y/N)(Yrs): &nbsp;&nbsp;" . "<label class='boldtext'>" . $ukmoschoose . "</label>"; 
if ($ukmoschoose=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Years:&nbsp;&nbsp;" . "<label class='boldtext'>" . $ukmos . "</label>" ; 
   } 

echo "</br>"; 
echo "</br>"; 
echo "Europe '80 5+Yrs (Y/N)(Yrs): &nbsp;&nbsp;" . "<label class='boldtext'>" . $eurochoose . "</label>"; 
if ($eurochoose=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Years:&nbsp;&nbsp;" . "<label class='boldtext'>" . $euro . "</label>"; 
   } 
echo "</br>"; 
echo "</br>";

echo "Special Diet: &nbsp;&nbsp;" . "<label class='boldtext'>" . $diet . "</label>";

echo "</br>"; 
echo "</br>"; 
echo "Donor Packet:&nbsp;&nbsp;" . "<label class='boldtext'>" . $donorpacket . "</label>";

echo "</br>";
echo "</br>";

echo "Comments:&nbsp;&nbsp;" . "<label class='boldtext'>" . $donorcomment . "</label>";

echo "</br>\n";
echo "</br>\n";


echo "</br>"; 
echo "</br>"; 
 
echo "</br>"; 
echo "</br>"; 
include 'followupcnfrm.php'; 

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

     $sql = "UPDATE screenertable SET firstname='$fname', lastname='$lname', middlename='$mname', address='$address', city='$city', state='$state', zip='$zip', country='$country', homephone='$hphone', cellphone='$cphone', email='$email', referral='$referral', babysname='$babysname', babysdob='$babysdob', babystatus='$babystatus', storefrom='$storefrom', milkcommit='$milkcommit', herbs='$herbs', alcohol='$alcohol', transfusion='$transfusion', lastedit='$lastedit', lasteditdate='$lasteditdate', donorpacket='$donorpacket', donorcomment='$donorcomment', organization = '$organization', donateamount = $donateamount, rxbcdate = '$rxbcdate', smoke = '$smoke', organizationother='$organizationother', rxbcchoose = '$rxbcchoose', herbschoose = '$herbschoose', alcoholchoose = '$alcoholchoose', ivDrug = '$ivDrug', transfusionchoose = '$transfusionchoose', workchoose = '$workchoose', work = '$work', determinechoose = '$determinechoose', determine = '$determine', heptest = '$heptest', tattooschoose = '$tattooschoose', tattoos = '$tattoos', hivtest = '$hivtest', tbtest = '$tbtest', tbtreat = '$tbtreat', herpeschoose = '$herpeschoose', herpes = '$herpes', hemophilia = '$hemophilia', hormones = '$hormones', ukmoschoose = '$ukmoschoose', ukmos = '$ukmos', eurochoose = '$eurochoose', euro = '$euro', diet = '$diet', process = '$process' WHERE donornumber = '$dnum'";
   $result = mysql_query($sql, $con);

   if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }

// Update followup data
update_followup_data($dnum,$followup_data);        
// Inserting donor into Donor Table Log

// increment transaction number for each edit

$result = mysql_query("SELECT COUNT(*) FROM screenertablelog where donornumber = $dnum"); 

$lasttransactionnumber = mysql_result($result,0);

$transactionnumber = $lasttransactionnumber + 1;  



   $sql1 = "insert into screenertablelog (donornumber, firstname, lastname, middlename, dnrapdate, address, city, state, zip, country,  homephone, cellphone, email, referral, babysname, babysdob, babystatus, storefrom, milkcommit, herbs, alcohol, transfusion, createdby, transactionnumber, transactiontype, lasteditdate, lastedit, donorpacket, donorcomment, transactiondate, username, organization, donateamount, rxbcdate, smoke, organizationother, rxbcchoose, herbschoose, alcoholchoose, ivDrug, transfusionchoose, workchoose, work, determinechoose, determine, heptest, tattooschoose, tattoos, hivtest, tbtest, tbtreat, herpeschoose, herpes, hemophilia, hormones, ukmoschoose, ukmos, eurochoose, euro, diet, process) values ($dnum, '$fname', '$lname', '$mname', '$dnrapdate', '$address', '$city', '$state', '$zip', '$country', '$hphone', '$cphone', '$email', '$referral', '$babysname', '$babysdob', '$babystatus', '$storefrom', '$milkcommit', '$herbs', '$alcohol', '$transfusion', '$createdby', $transactionnumber, 'Edited', '$lasteditdate', '$lastedit', '$donorpacket', '$donorcomment', '$lasteditdate', '$lastedit', '$organization', $donateamount, '$rxbcdate', '$smoke', '$organizationother', '$rxbcchoose', '$herbschoose', '$alcoholchoose', '$ivDrug', '$transfusionchoose', '$workchoose', '$work', '$determinechoose', '$determine', '$heptest', '$tattooschoose', '$tattoos', '$hivtest', '$tbtest', '$tbtreat', '$herpeschoose', '$herpes', '$hemophilia', '$hormones', '$ukmoschoose', '$ukmos', '$eurochoose', '$euro', '$diet', '$process')";



   $result = mysql_query($sql1, $con); 


   if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
       
	}
   }
else
   {
   //Donor is being added
   
// Next 4 lines generate the next donor record number   
// ****************************************************************

   mysql_select_db('milk_db', $con);


//  Next donor number  

   $createdby = $_SESSION['uname'];

// Inserting donor into Donor Table

   $sql = "insert into screenertable (donornumber, firstname, lastname, middlename, dnrapdate, address, city, state, zip, country,  homephone, cellphone, email, referral, babysname, babysdob, babystatus, storefrom, milkcommit, herbs, alcohol, transfusion, createdby, donorpacket, donorcomment, organization, donateamount, rxbcdate, smoke, organizationother, rxbcchoose, herbschoose, alcoholchoose, ivDrug, transfusionchoose, workchoose, work, determinechoose, determine, heptest, tattooschoose, tattoos, hivtest, tbtest, tbtreat, herpeschoose, herpes, hemophilia, hormones, ukmoschoose, ukmos, eurochoose, euro, diet, process) values ($dnum, '$fname', '$lname', '$mname', '$dnrapdate', '$address', '$city', '$state', '$zip', '$country', '$hphone', '$cphone', '$email', '$referral', '$babysname', '$babysdob', '$babystatus', '$storefrom', '$milkcommit', '$herbs', '$alcohol', '$transfusion', '$createdby', '$donorpacket', '$donorcomment', '$organization', $donateamount, '$rxbcdate', '$smoke', '$organizationother', '$rxbcchoose', '$herbschoose', '$alcoholchoose', '$ivDrug', '$transfusionchoose', '$workchoose', '$work', '$determinechoose', '$determine', '$heptest', '$tattooschoose', '$tattoos', '$hivtest', '$tbtest', '$tbtreat', '$herpeschoose', '$herpes', '$hemophilia', '$hormones', '$ukmoschoose', '$ukmos', '$eurochoose', '$euro', '$diet', '$process')";


   $result = mysql_query($sql, $con); 


   if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }


// Inserting donor into Donor Table Log

   $sql1 = "insert into screenertablelog (donornumber, firstname, lastname, middlename, dnrapdate, address, city, state, zip, country,  homephone, cellphone, email, referral, babysname, babysdob, babystatus, storefrom, milkcommit, herbs, alcohol, transfusion, createdby, transactionnumber, transactiontype, transactiondate, username, donorpacket, donorcomment, organization, donateamount, rxbcdate, smoke, organizationother, rxbcchoose, herbschoose, ivDrug, transfusionchoose, workchoose, work, determinechoose, determine, heptest, hivtest, tbtest, tbtreat, herpeschoose, herpes, hemophilia, hormones, ukmoschoose, ukmos, eurochoose, euro, diet, process) values ($dnum, '$fname', '$lname', '$mname', '$dnrapdate', '$address', '$city', '$state', '$zip', '$country', '$hphone', '$cphone', '$email', '$referral', '$babysname', '$babysdob', '$babystatus', '$storefrom', '$milkcommit', '$herbs', '$alcohol', '$transfusion', '$createdby', 1, 'Created', '$dnrapdate', '$createdby', '$donorpacket', '$donorcomment', '$organization', $donateamount, '$rxbcdate', '$smoke', '$organizationother', '$rxbcchoose', '$herbschoose', '$ivDrug', '$transfusionchoose', '$workchoose', '$work', '$determinechoose', '$determine', '$heptest', '$hivtest', '$tbtest', '$tbtreat', '$herpeschoose', '$herpes', '$hemophilia', '$hormones', '$ukmoschoose', '$ukmos', '$eurochoose', '$euro', '$diet', '$process')";


   $result = mysql_query($sql1, $con); 


   if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }



   }


 mysql_close($con);

   echo "</br>";
   echo "<p><a href=\"./donorslt.php\">Return to Donor Result</a></p>\n";
   echo "</br>";
   echo "<p><a href=\"./donormenu.php\">Return to Donor Menu</a></p>\n";



?> 

</P>



</BODY>
</HTML>
