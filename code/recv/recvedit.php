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
 <title>Edit Package</title>
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
include '../include/mystylex.php'; 


?>

<h1 class="pageTitle">Edit Package</h1>

<?php

$packagenumber = $_GET["packagenumber"];

// connect to database
$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);

$sql   = "SELECT * FROM receivertable where packagenumber =  '$packagenumber'";

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);


$rdate = $row['receivedate'];
$cdate = $row['createdate'];
$dnum = $row['donornumberr'];
$organization = $row['organization'];
$donorstatus = $row['donorstatus'];
$rxbcchoose = $row['rxbcchoose'];
$diet = $row['diet'];
$donorcomment = $row['donorcomment'];
$babysdob = $row['babysdob'];

$milkgrade = $row['milkgrade'];
$milkgdradeother = $row['milkgradeother'];

$storefrom = $row['storefrom'];

$coolernumber = $row['coolernumber'];

$coolercomments = $row['coolercomments'];

$numberofounces = $row['numberofounces'];
$packetstate = $row['packetstate'];

$expressiondatefrom = $row['expressiondatefrom'];
$expressiondateto = $row['expressiondateto'];

$receivercomment = $row['receivercomment'];


$reg = $row['reg'];
$dfree = $row['dfree'];
$veg = $row['veg'];
$vegan = $row['vegan'];
$other = $row['other'];



$mreport = $row['mreport'];
      $illness = $row["illness"];
      $illnesscomment = $row["illnesscomment"];

      // Creating Illness Dates

      $illnessbegan = $row["illnessbegan"];
      $illnessbeganmm = substr($illnessbegan,5,2);
      $illnessbegandd = substr($illnessbegan,8,2);
      $illnessbeganyy = substr($illnessbegan,0,4);

      $illnessend = $row["illnessend"];
      $illnessendmm = substr($illnessend,5,2);
      $illnessenddd = substr($illnessend,8,2);
      $illnessendyy = substr($illnessend,0,4);

      $symptomdescription = $row["symptomdescription"];

      $fever = $row["fever"];

      // Creating Fever Dates

      $feverstart = $row["feverstart"];
      $feverstartmm = substr($feverstart,5,2);
      $feverstartdd = substr($feverstart,8,2);
      $feverstartyy = substr($feverstart,0,4);

      $feverend = $row["feverend"];
      $feverendmm = substr($feverend,5,2);
      $feverenddd = substr($feverend,8,2);
      $feverendyy = substr($feverend,0,4);

      $meduse = $row["meduse"];
      $medtypes = $row["medtypes"];
      $dosage = $row["dosage"];

      // Creating Dosage Dates

      $dosagestart = $row["dosagestart"];
      $dosagestartmm = substr($dosagestart,5,2);
      $dosagestartdd = substr($dosagestart,8,2);
      $dosagestartyy = substr($dosagestart,0,4);

      $dosageend = $row["dosageend"];
      $dosageendmm = substr($dosageend,5,2);
      $dosageenddd = substr($dosageend,8,2);
      $dosageendyy = substr($dosageend,0,4);

      $reportcomments = $row["reportcomments"];

      $signature = $row["signature"];

      // Creating Signature Dates

      $signaturedate = $row["signaturedate"];
      $signaturedatemm = substr($signaturedate,5,2);
      $signaturedatedd = substr($signaturedate,8,2);
      $signaturedateyy = substr($signaturedate,0,4);


switch ($illness)
{
case 'Donor':
  $donor = 'selected';
  break;
case 'Family Member':
  $family = 'selected';
  break;
default:
  echo "";
}


switch ($meduse)
{
case 'Yes':
  $yes = 'selected';
  break;
case 'No':
  $no = 'selected';
  break;
default:
  echo "";
}


echo "<form action=\"recvcnfrm.php?dnum=$dnum&packagenumber=$packagenumber&ctype=1\" method=\"post\">\n";

$rmm = substr($rdate,5,2);
$rdd = substr($rdate,8,2);
$ryy = substr($rdate,0,4);

echo "<fieldset class=\"sectiondisplay\"><legend>General Information</legend>";
echo "<div class=\"sectioncolumn twoColumnSection\">";
echo "<label>Package number:</label>&nbsp;&nbsp;&nbsp;" . $packagenumber . "<br><br>"; 
echo "<label>Date Received:</label>&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"rmm\" size=\"2\" maxlength=\"2\" value=\"$rmm\">\n";
echo "- <input type=\"int\" name=\"rdd\" size=\"2\" maxlength=\"2\" value=\"$rdd\">\n";
echo "- <input type=\"int\" name=\"ryy\" size=\"4\" maxlength=\"4\" value=\"$ryy\">\n";
echo "&nbsp;mm-dd-yyyy\n";



echo "</br>";
echo "</br>"; 
echo "<label>Donor number:</label>&nbsp;&nbsp;&nbsp;" . $dnum;
echo "</br>";
echo "</br>";
echo "<label>Organization:</label>&nbsp;&nbsp;&nbsp;" . $organization; 

echo "<input type=\"hidden\" name=\"organization\" value=\"$organization\">\n";

echo "</br>";
echo "</br>";

echo "<label>Status:</label>&nbsp;&nbsp;&nbsp;" . $donorstatus; 

echo "<input type=\"hidden\" name=\"donorstatus\" value=\"$donorstatus\">\n";

echo "</br>";
echo "</br>";

echo "<label>RX/BC Pll/OTC Use (Y/N)(Dates):</label>&nbsp;&nbsp;" . $rxbcchoose; 

echo "<input type=\"hidden\" name=\"rxbcchoose\" value=\"$rxbcchoose\">\n";

echo "</br>";
echo "</br>";

echo "<label>Special Diet:</label> &nbsp;&nbsp;";   

if ($reg=="on")     
   {
      echo "&nbsp;&nbsp;&nbsp;" . "Reg";
      echo "<input type=\"hidden\" name=\"reg\" value=\"$reg\">\n";
   }     

if ($dfree=="on")     
   {
      echo "&nbsp;&nbsp;&nbsp;" . "Dfree";
      echo "<input type=\"hidden\" name=\"dfree\" value=\"$dfree\">\n";
   }     

if ($veg=="on")
   {
      echo "&nbsp;&nbsp;&nbsp;" . "Veg";
      echo "<input type=\"hidden\" name=\"veg\" value=\"$veg\">\n";
   }      
if ($vegan=="on")    
   {
      echo "&nbsp;&nbsp;&nbsp;" . "Vegan";
      echo "<input type=\"hidden\" name=\"vegan\" value=\"$vegan\">\n";
   }     

if ($others=="on") 
   {        
      echo "&nbsp;&nbsp;&nbsp;" . "Others"; 
      echo "<input type=\"hidden\" name=\"other\" value=\"$other\">\n";
   } 


echo "</br>";
echo "</br>";

echo "<label>Donor Comments:</label>&nbsp;&nbsp;" . "$donorcomment"; 
echo "<input type=\"hidden\" name=\"donorcomment\" value=\"$donorcomment\">\n";

echo "</br>";
echo "</br>";


// Creating Baby's birthday

$babysdobmm = substr($babysdob,5,2);
$babysdobdd = substr($babysdob,8,2);
$babysdobyy = substr($babysdob,0,4);

echo "<label>Baby's DOB:</label>&nbsp;&nbsp;&nbsp" . "$babysdobmm - $babysdobdd - $babysdobyy";

echo "&nbsp;&nbsp;&nbsp;mm-dd-yyyy\n";

echo "<input type=\"hidden\" name=\"babysdob\" value=\"$babysdob\">\n";

echo "</br>";
echo "</br>";

echo "</div>";
echo "<div class=\"sectioncolumn twoColumnSection\">";

echo "<label>Cooler number:</label>&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"coolernumber\" size=\"4\" maxlength=\"4\" value=\"$coolernumber\">\n"; 

echo "</br>";
echo "</br>";

echo "<label>Cooler Comments:</label>\n";
echo "<br>\n";
echo "<textarea name=\"coolercomments\" rows=2 cols=40 maxlength=40 >\n";
echo "$coolercomments\n";
echo "</textarea>\n";
echo "</br>";
echo "</br>";



echo "<label>Number of Ounces:</label>&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"numberofounces\" size=\"4\" maxlength=\"4\" value=\"$numberofounces\">\n"; 
echo "</br>"; 
echo "</br>"; 

$fcmm = substr($expressiondatefrom,5,2);
$fcdd = substr($expressiondatefrom,8,2);
$fcyy = substr($expressiondatefrom,0,4);

$tcmm = substr($expressiondateto,5,2);
$tcdd = substr($expressiondateto,8,2);
$tcyy = substr($expressiondateto,0,4);


echo "<label>Expression Range:</label>";
echo "</br>";
echo "</br>";
echo "&nbsp;&nbsp;<label>From:</label>&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"fcmm\" size=\"2\" maxlength=\"2\" value=\"$fcmm\">\n";
echo "- <input type=\"int\" name=\"fcdd\" size=\"2\" maxlength=\"2\" value=\"$fcdd\">\n";
echo "- <input type=\"int\" name=\"fcyy\" size=\"4\" maxlength=\"4\" value=\"$fcyy\">\n";
echo "&nbsp;mm-dd-yyyy\n";
echo "</br>";
echo "</br>";
echo "&nbsp;&nbsp;<label>To:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"tcmm\" size=\"2\" maxlength=\"2\" value=\"$tcmm\">\n";
echo "- <input type=\"int\" name=\"tcdd\" size=\"2\" maxlength=\"2\" value=\"$tcdd\">\n";
echo "- <input type=\"int\" name=\"tcyy\" size=\"4\" maxlength=\"4\" value=\"$tcyy\">\n";
echo "&nbsp;mm-dd-yyyy\n";

echo "</br>"; 
echo "</br>"; 

echo "<label>Stored from:</label>&nbsp;&nbsp;&nbsp;". "<b>$storefrom</b>";
echo "<input type=\"hidden\" name=\"storefrom\" value=\"$storefrom\">\n";


switch ($milkgrade)
{
case 'H': // hospital
  $h = 'selected';
  break;
case 'M': // Mature
  $df = 'selected';
  break;
case 'F': // Mature - dairy free
  $dfm = 'selected';
  break;
case 'O':
  $oth = 'selected';
  break;
default:
  echo "";
}


switch ($packetstate)
{
case 'W':
  $w = 'selected';
  break;
case 'R':
  $r = 'selected';
  break;
case 'O':
  $o = 'selected';
  break;
default:
  echo "";
}


switch ($storagelocation)
{
case 'Lab':
  $Lab = 'selected';
  break;
case 'F2':
  $F2 = 'selected';
  break;
case 'F3':
  $F3 = 'selected';
  break;
case 'F4':
  $F4 = 'selected';
  break;
case 'F1A':
  $F1A = 'selected';
  break;
case 'F1B':
  $F1B = 'selected';
  break;
case 'R3':
  $R3 = 'selected';
  break;
default:
  echo "";
}


?>

</br>
</br>


<label>Milk Grade:</label>&nbsp;&nbsp;&nbsp;

<select name="milkgrade" id="milkgrade" onchange="showme('milkgrade','milkgradeother',3)">  
<option value="H" <?php echo $h ?>>Hospital (28 days from Baby's Birthday)</option>
<option value="M" <?php echo $df ?>>Mature</option>
<option value="F" <?php echo $dfm ?>>Mature - Dairy Free</option>
<option value="O" <?php echo $oth ?>>Other</option>
</select>

&nbsp;&nbsp;&nbsp;
<input type ="text" name="milkgradeother" id="milkgradeother" style=" position:relative;visibility:<?php if($milkgrade=="O") echo "visible"; else echo "hidden"; ?>" value="<?php echo $milkgradeother ?>" size=15 maxsize=15 >  

</br><br>

<label>Package State:</label>&nbsp;&nbsp;

<select name="packetstate" id="packetstate" onchange="showme('packetstate','packetstateother',2)">  
<option value="W" <?php echo $w ?>>Waiting</option>
<option value="R" <?php echo $r ?>>Ready to Use</option>
<option value="O" <?php echo $o ?>>Other</option>
</select>
&nbsp;&nbsp;&nbsp;
<input type ="text" name="packetstateother" id="packetstateother" style=" position:relative;visibility:hidden;" value="Other">  

<br><br>
<label>Storage Location:</label>&nbsp;&nbsp
<select name="storagelocation">  
<option value="Lab" <?php echo $Lab ?>>Lab</option>
<option value="F2" <?php echo $F2 ?>>F2 (raw)</option>
<option value="F3" <?php echo $F3 ?>>F3 (raw)</option>
<option value="F4" <?php echo $F4 ?>>F4 (raw)</option>
<option value="F1A" <?php echo $F1A ?>>F1A</option>
<option value="F1B" <?php echo $F1B ?>>F1B</option>
<option value="R3" <?php echo $R3 ?>>R3</option>
</select>
</div>
</fieldset>

<?php
mysqli_free_result($result); 

$sql   = "SELECT processnumber FROM screenertable where donornumber = '$dnum'";


//$result = mysql_query($sql, $con); 
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

$processnumber = $row['processnumber'];

echo "<input type=\"hidden\" name=\"processnumber\" value=\"$processnumber\">\n";

?>
<br class="clear">
<br>
<label>Illness and Medication Report Available?:</label>&nbsp;&nbsp;&nbsp;&nbsp;
<select name="mreportselect" id="mreportselect" onchange="showme('mreportselect','mreport',0)">
<option value="Yes" <?php if($mreport=='Yes') echo "selected"?>>Yes</option>
<option value="No" <?php if($mreport=='No' or $mreport=='') echo "selected"?>>No</option>
</select>
<?php

      echo "<input type=\"hidden\" name=\"mreport\" value=\"$mreport\">\n";

?>
<div id="mreport" <?php if($mreport=='No' or $mreport=='') echo "style=\"visibility:hidden; display:none\""?>>
      <fieldset class="sectiondisplay">
      <legend>Illness and Medical Report</legend>
      <div class="sectioncolumn twoColumnSection">
      <label>Who was Ill?</label>&nbsp;&nbsp;

      <select name="illness">  
      <option value="Donor" <?php echo $donor ?>>Donor</option>
      <option value="Family Member" <?php echo $family ?>>Family Member</option>
      </select>

      <br>
      <br>
      <label>Please Explain:</label>
      <br>

      <textarea name="illnesscomment" rows=2 cols=45 maxlength=52>
<?php echo $illnesscomment ?>
      </textarea>

      <br>
      <br>


      <label>Illness&nbsp;&nbsp;Began:</label>&nbsp;&nbsp;&nbsp;
<input type=int name=illbmm size=2 maxlength=2 value="<?php echo $illnessbeganmm ?>">
- <input type=int name=illbdd size=2 maxlength=2 value="<?php echo       $illnessbegandd ?>">
- <input type=int name=illbyy size=4 maxlength=4 value="<?php echo $illnessbeganyy ?>">

<br><br><label>Illness Ended:</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type=int name=illemm size=2 maxlength=2 value="<?php echo $illnessendmm ?>">
- <input type=int name=illedd size=2 maxlength=2 value="<?php echo $illnessenddd ?>">
- <input type=int name=illeyy size=4 maxlength=4 value="<?php echo $illnessendyy ?>">

      <br>
      <br>
      <label>Description of Symptoms:</label>
      <br>
      <!--<br>-->
      <textarea name="symptomdescription" rows=2 cols=45 maxlength=52 >
<?php echo $symptomdescription ?>
      </textarea>

      <br>
      <br>

      <label>Fever?</label>&nbsp;&nbsp;

      <input type ="text" name="fever" size=3 maxlength=3 value="<?php echo $fever ?>">
&nbsp;&nbsp;&#176F

      <br>
      <br>


      <label>Fever&nbsp;&nbsp;Started:</label>&nbsp;&nbsp;&nbsp;
<input type=int name=fsmm size=2 maxlength=2 value="<?php echo $feverstartmm ?>">
- <input type=int name=fsdd size=2 maxlength=2 value="<?php echo $feverstartdd ?>">
- <input type=int name=fsyy size=4 maxlength=4 value="<?php echo $feverstartyy ?>">

<br><br><label>Fever Ended:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=int name=femm size=2 maxlength=2 value="<?php echo $feverendmm ?>">
- <input type=int name=fedd size=2 maxlength=2 value="<?php echo $feverenddd ?>">
- <input type=int name=feyy size=4 maxlength=4 value="<?php echo $feverendyy ?>">

     </div>
     <div class="sectioncolumn twoColumnSection">  
     <label>DONOR MEDICATION USE</label>

     <select name="meduse"id="meduse" onchange="showme('meduse','dosagediv',0)">
     <option value="Yes" <?php echo $yes ?>>Yes</option>
     <option value="No" <?php echo $no ?>>No</option>
     </select>

     <br>
     <br>
      <div id="dosagediv" <?php if($meduse=='No') echo "style=\"visibility:hidden;display:none\""?> >
     <label>Types:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=text name=medtypes size=20 maxlength=20 value="<?php echo $medtypes ?>"> 
     <br>
     <br>

     <label>Dosage:</label>&nbsp;&nbsp;<input type=text name=dosage size=20 maxlength=20 value="<?php echo $dosage ?>"> 
     <br>
     <br>


     <label>Dosage&nbsp;&nbsp;Started:</label>&nbsp;&nbsp;&nbsp;
<input type=int name=dsmm size=2 maxlength=2 value="<?php echo $dosagestartmm ?>">
- <input type=int name=dsdd size=2 maxlength=2 value="<?php echo $dosagestartdd ?>">
- <input type=int name=dsyy size=4 maxlength=4 value="<?php echo $dosagestartyy ?>">

<br><br><label>Dosage Ended:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=int name=demm size=2 maxlength=2 value="<?php echo $dosageendmm ?>">
- <input type=int name=dedd size=2 maxlength=2 value="<?php echo $dosageenddd ?>">
- <input type=int name=deyy size=4 maxlength=4 value="<?php echo $dosageendyy ?>">
</div>
</div>
<div class="section">
<hr>
     <br>
     <label>Notes/Comments:</label>
     <br>
     <textarea name="reportcomments" rows=2 cols=50 maxlength=102 >
<?php echo $reportcomments ?>
</textarea>

     <br>
     <br>


     <label>Signed:</label>&nbsp;&nbsp;<input type=text name=signature size=30 maxlength=30 value="<?php echo $signature ?>"> 
<br>
<br>


     <label>Date:</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type=int name=smm size=2 maxlength=2 value="<?php echo $signaturedatemm ?>">
- <input type=int name=sdd size=2 maxlength=2 value="<?php echo $signaturedatedd ?>">
- <input type=int name=syy size=4 maxlength=4 value="<?php echo $signaturedateyy ?>">

     <br>
     <br>
     </div>
</fieldset>
</div>
     <br class="clear">


<?php
echo "</br>";
echo "<input type=\"submit\" value=\"Edit Donor Package\">\n";
echo "</form>\n";


   mysqli_free_result($result); 

   echo "<p><a href=\"./receivingmenu.php\">Return to Receiver Menu</a></p>\n";

   mysqli_close($con);

?> 
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>

