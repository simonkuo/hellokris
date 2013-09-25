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
 <title>Donor Add/Edit Confirmation</title>
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
<P>

<h1 class="pageTitle">Donor Add/Edit Confirmation</h1>

<?php
include 'function.php'; 

// Updated 1/18/2013

//  Connect to Data Base  

$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);


$dnum = $_GET["donornumber"];

$fname = $_POST["donorfname"];
$mname = $_POST["donormname"];
$lname = $_POST["donorlname"];

// determines whether donor is being edited or added

$ctype = $_GET["ctype"];

if ($ctype==1)
   {
      echo  "<P><FONT SIZE=5><label class='boldtext'>Donor Edited</label></FONT></P>";
      $dnrapdate = $_POST["dnrapdate"];
   }
else
   {
      echo  "<P><FONT SIZE=5><label class='boldtext'>Donor Added</label></FONT></P>";
      $dnrappmm = $_POST["dnrappmm"];
      $dnrappdd = $_POST["dnrappdd"];
      $dnrappyr = $_POST["dnrappyr"];
      $dnrapdate = $dnrappyr . "-" . $dnrappmm . "-" . $dnrappdd; // construct call date
      
       // build donor id  xxxxyyss
       $namepart = strtolower(substr($fname,0,1) . str_pad(substr($lname,0,3),3,"#",STR_PAD_LEFT) . date('y'));
       $sql = "select lpad(coalesce(max(q)+1,1),2,0) as seq from (select substring(donornumber,7) as q from screenertable where donornumber like '" . $namepart . "%') as tbl";
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
       $dnum = $namepart . $seqnum;
   }


$determinechoose = $_POST['determinechoose'];
$determine = $_POST['determine'];


$organization = $_POST["organization"];
$organizationother = $_POST["organizationother"];

$donoraka = $_POST["donoraka"];
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
$babysdob = $_POST["babysdob"];
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
$donorpacket = $_POST["donorpacket"];
$donorcomment = trim($_POST["donorcomment"]);
$reg = "";
$dfree = "";
$veg = "";
$vegan = "";
$others = "";
if (IsChecked('diet','Reg'))
{
  $reg = 'on';
}
if (IsChecked('diet','Dfree'))
{
  $dfree = 'on';
}
if (IsChecked('diet','Veg'))
{
  $veg = 'on';
}
if (IsChecked('diet','Vegan'))
{
  $vegan = 'on';
}
if (IsChecked('diet','Others'))
{
  $others = 'on';
}

$createdby="";
if(isset($_SESSION['uname']))
{
 $createdby = $_SESSION['uname'];

}

echo "<fieldset class=\"sectiondisplay\">";
echo "<legend>Donor Profile</legend>";
echo "</br>";
echo "<label>Donor Number:</label>&nbsp;&nbsp;" . $dnum; 
echo "</br>"; 
echo "</br>"; 
echo "<label>Application Status:</label>&nbsp;&nbsp;" . $determinechoose;  
if (in_array($determinechoose, array("A", "P", "NP", "F"))) 
 //if ($determinechoose == "A"|"P"|"NP"|"F") 
        {
            echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;" . $determine; 
        }

echo "</br>";
echo "<hr>";

echo "<div class=\"sectioncolumn twoColumnSection\">";  
echo "<label>Organization:</label>&nbsp;&nbsp;" . $organization;  
 if ($organization=="OTH") 
        {
            echo "&nbsp;&nbsp;&nbsp;<label>Name:</label>&nbsp;&nbsp;" . $organizationother; 
        }
echo "</br>"; 
echo "</br>"; 
echo "<label>First Name:</label>  " . $fname; 
echo "<br><label>Middle Name:</label>  " . $mname; 
echo "<br><label>Last Name:</label>  " . $lname; 
echo "<br><label>Also Know As:</label> " . $donoraka;
echo "</br>"; 
echo "</br>"; 

echo "<label>Address:</label>&nbsp;&nbsp;" . $address;
echo "<br><label>City:</label>&nbsp;&nbsp;" . $city;
echo "<br><label>State:</label>&nbsp;&nbsp;" . $state;
echo "<br><label>Zip Code:</label>&nbsp;&nbsp;" . $zip;
echo "<br><label>Country:</label>&nbsp;&nbsp;"  . $country;
echo "</br>\n";
echo "</br>\n";
echo "<label>Home Phone:</label>&nbsp;&nbsp;" . $hphoneac . "-" . $hphonepr . "-" . $hphonesu;
echo "<br><label>Cell Phone:</label>&nbsp;&nbsp;" . $cphoneac . "-" . $cphonepr . "-" . $cphonesu;
echo "</br>\n";
echo "</br>\n";

echo "<Label>Email:</label>&nbsp;&nbsp;" . $email; 

echo "<br><label>Referral:</label>&nbsp;&nbsp;" . $referral; 

echo "</br>\n";

echo "</br>\n";

echo "<label>Baby's Name:</label>&nbsp;&nbsp;&nbsp;" . $babysname; 


echo "<br><label>Baby's DOB:</label>&nbsp;&nbsp;&nbsp;";
 

echo  $bbmm  . "-"  . $bbdd . "-" . $bbyy .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";


echo "<br><label>Baby's Status:</label>&nbsp;&nbsp;" . $babystatus; 

echo "</br>\n";
echo "</br>\n";

echo "<label>Amount can donate:</label>&nbsp;&nbsp;" . $donateamount;

echo "</br>\n";
echo "</br>\n";
echo "<label>Milk Stored from:</label>&nbsp;&nbsp;&nbsp;" . $storefrom; 


echo "<br><label>Can commit to 100 oz:</label>&nbsp;&nbsp;" . $milkcommit; 
echo "</br>";
echo "</br>";

echo "</div>";
echo "<div class=\"sectioncolumn twoColumnSection\">"; 

echo "<label>RX/BC Pll/OTC Use (Y/N)(Dates):</label>&nbsp;&nbsp;" . $rxbcchoose;
if ($rxbcchoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;" . $rxbcdate . "&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }
echo "</br>";
echo "</br>";
echo "<label>Supplements w/Herbs/Herb Teas (Y/N)(Dates):</label>&nbsp;&nbsp;" . $herbschoose; 
if ($herbschoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;" . $herbs . "&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }

echo "</br>";
echo "</br>";

echo "<label>Alcohol while pumping (Y/N)(Dates):</label>&nbsp;&nbsp;" . $alcoholchoose; 
if ($alcoholchoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;" . $alcohol . "&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }

echo "</br>";
echo "</br>";
echo "<label>Smoke:</label>&nbsp;&nbsp;" . $smoke;

echo "<br><label>ivDrugs:</label>&nbsp;&nbsp;" . $ivDrug;

echo "</br>";
echo "</br>";

echo "<label>Transfusion (Y/N)(Dates):</label>&nbsp;&nbsp;" . $transfusionchoose; 
if ($transfusionchoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;" . $transfusion . "&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }
echo "</br>";
echo "</br>";
echo "<label>Work Hi-Risk/Blood (Y/N)(Dates):</label>&nbsp;&nbsp;" . $workchoose; 
if ($workchoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;" . $work . "&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }
echo "</br>";
echo "</br>";
echo "<label>Tattoos/Piercing (Y/N)(Dates):</label>&nbsp;&nbsp;" . $tattooschoose; 
if ($tattooschoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;" . $tattoos . "&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }


echo "</br>";
echo "</br>";
echo "<label>Hep Test:</label>&nbsp;&nbsp;" . $heptest;

echo "<br><label>HIV Test:</label>&nbsp;&nbsp;" . $hivtest;
echo "<br><label>TB Test:</label>&nbsp;&nbsp;" . $tbtest . "&nbsp;&nbsp;";
echo "<br><label>TB Treatment:</label>&nbsp;&nbsp;" . $tbtreat . "&nbsp;&nbsp;";

echo "</br>";
echo "</br>";

echo "<label>Cold Sores/Herpes while breastfeedng (Y/N)(Dates):</label>&nbsp;&nbsp;" . $herpeschoose; 
if ($herpeschoose=="Yes") 
        {
            echo "&nbsp;&nbsp;&nbsp;<label>Date:</label>&nbsp;&nbsp;" . $herpes . "&nbsp;&nbsp;(mm-dd-yyyy)"; 
        }


echo "</br>";
echo "</br>";


echo "<label>Hemophilia:</label>&nbsp;&nbsp;" . $hemophilia . "&nbsp;&nbsp;";
echo "<br><label>Growth Hormones:</label>&nbsp;&nbsp;" . $hormones;

echo "</br>";
echo "</br>";

echo "<label>UK '80-96 3+MOS. (Y/N)(Yrs):</label> &nbsp;&nbsp;" . $ukmoschoose; 
if ($ukmoschoose=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;<label>Years:</label>&nbsp;&nbsp;" . $ukmos; 
   } 

echo "</br>"; 
echo "</br>"; 
echo "<label>Europe '80 5+Yrs (Y/N)(Yrs):</label> &nbsp;&nbsp;" . $eurochoose; 
if ($eurochoose=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;<label>Years:</label>&nbsp;&nbsp;" . $euro; 
   } 
echo "</br>"; 
echo "</br>";

echo "<label>Special Diet:</label> &nbsp;&nbsp;";   
if ($reg=="on")   {  echo "&nbsp;&nbsp;&nbsp;Reg";  }     
if ($dfree=="on")  {   echo "&nbsp;&nbsp;&nbsp;Dfree";  }     
if ($veg=="on")  { echo "&nbsp;&nbsp;&nbsp;Veg"; }      
if($vegan=="on")  { echo "&nbsp;&nbsp;&nbsp;Vegan"; }     
if ($others=="on")  { echo "&nbsp;&nbsp;&nbsp;Others";  } 

echo "</div>";

echo "</br>";  
echo "<br class=\"clear\">";
echo "<hr>";

echo "<label>Donor Packet:</label>&nbsp;&nbsp;" . $donorpacket;

echo "</br>";
echo "</br>";

echo "<label>Comments:</label>&nbsp;&nbsp;" . $donorcomment;

echo "</br>\n";
echo "</br>\n";

echo "</fieldset>";



// Construct "Lastedit" and "Last edit Date"


$lastedit = $_SESSION['uname'];

// Populate month - day - year

$lemm = (idate("m"));
$ledd = (idate("d"));
$leyy = (idate("Y"));

// Construct Last Edit Date
$lasteditdate = $leyy . "-" . $lemm . "-" . $ledd;

// Construct Call Date
//$dnrapdate = $dnrappyr . "-" . $dnrappmm . "-" . $dnrappdd;

// Construct Baby's DOB
$babysdob = $bbyy . "-" . $bbmm . "-" . $bbdd;


// Construct home and cell phone


$hphone = $hphoneac . $hphonepr . $hphonesu;
$cphone = $cphoneac . $cphonepr . $cphonesu;

// determines whether donor is being edited or added


if ($ctype==1)
   {
     //Donor is being edited

echo "<fieldset class=\"sectiondisplay\">";
include 'followupcnfrm.php'; 
echo "</fieldset>";
echo "<fieldset class=\"sectiondisplay\">";
include 'page1cnfm.php';
include 'page3cnfm.php';
echo "</fieldset>";

if($determinechoose == "F" || $determinechoose == "D")
{
  $processflag ="Y";
  
}
else
{
  

  $processflag ="N";

  
} 

     $sql = "UPDATE screenertable SET firstname='$fname', lastname='$lname', middlename='$mname', address='$address', city='$city', state='$state', zip='$zip', country='$country', homephone='$hphone', cellphone='$cphone', email='$email', referral='$referral', babysname='$babysname', babysdob='$babysdob', babystatus='$babystatus', storefrom='$storefrom', milkcommit='$milkcommit', herbs='$herbs', alcohol='$alcohol', transfusion='$transfusion', lastedit='$lastedit', lasteditdate='$lasteditdate', donorpacket='$donorpacket', donorcomment='$donorcomment', organization = '$organization', donateamount = $donateamount, rxbcdate = '$rxbcdate', smoke = '$smoke', organizationother='$organizationother', rxbcchoose = '$rxbcchoose', herbschoose = '$herbschoose', alcoholchoose = '$alcoholchoose', ivDrug = '$ivDrug', transfusionchoose = '$transfusionchoose', workchoose = '$workchoose', work = '$work', determinechoose = '$determinechoose', determine = '$determine', heptest = '$heptest', tattooschoose = '$tattooschoose', tattoos = '$tattoos', hivtest = '$hivtest', tbtest = '$tbtest', tbtreat = '$tbtreat', herpeschoose = '$herpeschoose', herpes = '$herpes', hemophilia = '$hemophilia', hormones = '$hormones', ukmoschoose = '$ukmoschoose', ukmos = '$ukmos', eurochoose = '$eurochoose', euro = '$euro', processflag = '$processflag', reg = '$reg', dfree = '$dfree', veg = '$veg', vegan = '$vegan', others = '$others', donoraka = '$donoraka'  WHERE donornumber = '$dnum'";

   $result = mysqli_query($con, $sql);
   if( $result === FALSE )
   //if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysqli_error($con);
         exit;
        }

// Update followup data
update_followup_data($dnum,$followup_data);  
// Update page 1 data
update_page1($dnum, $page1_data);
// Update page 3 data
update_page3($dnum, $page3_data);     
// Inserting donor into Donor Table Log

// increment transaction number for each edit

$result = mysqli_query($con,"SELECT COUNT(*) FROM screenertablelog where donornumber = '$dnum'"); 

$row = mysqli_fetch_row($result);
$lasttransactionnumber = $row[0];
$transactionnumber = $lasttransactionnumber + 1;  
mysqli_free_result($result);

   $sql1 = "insert into screenertablelog (donornumber, firstname, lastname, middlename, dnrapdate, address, city, state, zip, country,  homephone, cellphone, email, referral, babysname, babysdob, babystatus, storefrom, milkcommit, herbs, alcohol, transfusion, createdby, transactionnumber, transactiontype, lasteditdate, lastedit, donorpacket, donorcomment, transactiondate, username, organization, donateamount, rxbcdate, smoke, organizationother, rxbcchoose, herbschoose, alcoholchoose, ivDrug, transfusionchoose, workchoose, work, determinechoose, determine, heptest, tattooschoose, tattoos, hivtest, tbtest, tbtreat, herpeschoose, herpes, hemophilia, hormones, ukmoschoose, ukmos, eurochoose, euro, processflag, reg, dfree, veg, vegan, others, donoraka) values ('$dnum', '$fname', '$lname', '$mname', '$dnrapdate', '$address', '$city', '$state', '$zip', '$country', '$hphone', '$cphone', '$email', '$referral', '$babysname', '$babysdob', '$babystatus', '$storefrom', '$milkcommit', '$herbs', '$alcohol', '$transfusion', '$createdby', $transactionnumber, 'Edited', '$lasteditdate', '$lastedit', '$donorpacket', '$donorcomment', '$lasteditdate', '$lastedit', '$organization', $donateamount, '$rxbcdate', '$smoke', '$organizationother', '$rxbcchoose', '$herbschoose', '$alcoholchoose', '$ivDrug', '$transfusionchoose', '$workchoose', '$work', '$determinechoose', '$determine', '$heptest', '$tattooschoose', '$tattoos', '$hivtest', '$tbtest', '$tbtreat', '$herpeschoose', '$herpes', '$hemophilia', '$hormones', '$ukmoschoose', '$ukmos', '$eurochoose', '$euro', '$processflag', '$reg', '$dfree', '$veg', '$vegan', '$others', '$donoraka')";

   $result = mysqli_query($con, $sql1); 

   if( $result === FALSE ) 
   //if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysqli_error($con);
         exit;
       
	}

	
	//Update followup data in screenertablelog
	update_followup_data_log($dnum,$transactionnumber,$followup_data); 
	//Update page 1 in screenertablelog
	update_followup_data_log($dnum,$transactionnumber, $page1_data);
	//Update page 1 in screenertablelog
	update_followup_data_log($dnum,$transactionnumber, $page3_data);
   }
else
   {
   //Donor is being added
    
// Inserting donor into Donor Table

   $sql = "insert into screenertable (donornumber, firstname, lastname, middlename, dnrapdate, address, city, state, zip, country,  homephone, cellphone, email, referral, babysname, babysdob, babystatus, storefrom, milkcommit, herbs, alcohol, transfusion, createdby, donorpacket, donorcomment, organization, donateamount, rxbcdate, smoke, organizationother, rxbcchoose, herbschoose, alcoholchoose, ivDrug, transfusionchoose, workchoose, work, determinechoose, determine, heptest, tattooschoose, tattoos, hivtest, tbtest, tbtreat, herpeschoose, herpes, hemophilia, hormones, ukmoschoose, ukmos, eurochoose, euro, reg, dfree, veg, vegan, others, donoraka) values ('$dnum', '$fname', '$lname', '$mname', '$dnrapdate', '$address', '$city', '$state', '$zip', '$country', '$hphone', '$cphone', '$email', '$referral', '$babysname', '$babysdob', '$babystatus', '$storefrom', '$milkcommit', '$herbs', '$alcohol', '$transfusion', '$createdby', '$donorpacket', '$donorcomment', '$organization', $donateamount, '$rxbcdate', '$smoke', '$organizationother', '$rxbcchoose', '$herbschoose', '$alcoholchoose', '$ivDrug', '$transfusionchoose', '$workchoose', '$work', '$determinechoose', '$determine', '$heptest', '$tattooschoose', '$tattoos', '$hivtest', '$tbtest', '$tbtreat', '$herpeschoose', '$herpes', '$hemophilia', '$hormones', '$ukmoschoose', '$ukmos', '$eurochoose', '$euro', '$reg', '$dfree', '$veg', '$vegan', '$others', '$donoraka')";
    

   $result = mysqli_query($con, $sql); 

   if( $result === FALSE )
      //if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysqli_error($con);
         exit;
        }


// Inserting donor into Donor Table Log

   $sql1 = "insert into screenertablelog (donornumber, firstname, lastname, middlename, dnrapdate, address, city, state, zip, country,  homephone, cellphone, email, referral, babysname, babysdob, babystatus, storefrom, milkcommit, herbs, alcohol, transfusion, createdby, transactionnumber, transactiontype, transactiondate, username, donorpacket, donorcomment, organization, donateamount, rxbcdate, smoke, organizationother, rxbcchoose, herbschoose, ivDrug, transfusionchoose, workchoose, work, determinechoose, determine, heptest, hivtest, tbtest, tbtreat, herpeschoose, herpes, hemophilia, hormones, ukmoschoose, ukmos, eurochoose, euro,  reg, dfree, veg, vegan, others, donoraka) values ('$dnum', '$fname', '$lname', '$mname', '$dnrapdate', '$address', '$city', '$state', '$zip', '$country', '$hphone', '$cphone', '$email', '$referral', '$babysname', '$babysdob', '$babystatus', '$storefrom', '$milkcommit', '$herbs', '$alcohol', '$transfusion', '$createdby', 1, 'Created', '$dnrapdate', '$createdby', '$donorpacket', '$donorcomment', '$organization', $donateamount, '$rxbcdate', '$smoke', '$organizationother', '$rxbcchoose', '$herbschoose', '$ivDrug', '$transfusionchoose', '$workchoose', '$work', '$determinechoose', '$determine', '$heptest', '$hivtest', '$tbtest', '$tbtreat', '$herpeschoose', '$herpes', '$hemophilia', '$hormones', '$ukmoschoose', '$ukmos', '$eurochoose', '$euro', '$reg', '$dfree', '$veg', '$vegan', '$others', '$donoraka')";

   $result = mysqli_query($con, $sql1); 

	/*
   if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }


*/
   }

   //Update followup data in screenertablelog
  //update_followup_data_log($transactionnumber,$followup_data); 


 mysqli_close($con);

   echo "<br><a href=\"./donormenu.php\">Donor Menu</a></p>\n";



?> 

</P>



</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
