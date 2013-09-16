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
 <title>Add Package</title>
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
include '../include/mystylex.php'; 


?>

<h1 class="pageTitle">Add Package</h1>


<p><a href="./donorslt.php">Return to results</a></p>
<?php

$dnum = $_GET["dnum"];




/*  Connect to Data Base */

$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);

$sql   = "SELECT * FROM screenertable where donornumber =  '$dnum'";

$result = mysqli_query($con,$sql);

if (!$result) 
    {
       echo "DB Error, could not query the database\n";
       echo 'MySQL Error: ' . mysqli_error($con);
       exit;
    }

$row = mysqli_fetch_assoc($result);

$diet = $row['diet'];
$organization = $row['organization'];
$organizationother = $row['organizationother'];
$donorstatus = $row['determinechoose'];
$rxbcchoose = $row['rxbcchoose'];
$rxbcdate = $row['rxbcdate'];
$babysdob = $row['babysdob']; 
$storefrom = $row['storefrom']; 
$donorcomment = $row['donorcomment'];

$reg = $row['reg'];
$dfree = $row['dfree'];
$veg = $row['veg'];
$vegan = $row['vegan'];
$other = $row['other'];



echo "<form action=\"recvcnfrm.php?dnum=$dnum&ctype=2\" method=\"post\">\n";


?>

<fieldset class="sectiondisplay">
<legend>General Information</legend>
<?php

// Populate month - day - year today's date

$rmm = (idate("m"));
$rdd = (idate("d"));
$ryy = (idate("Y"));

echo "<div class=\"sectioncolumn twoColumnSection\">";
echo "<label>Donor number:</label>&nbsp;&nbsp;&nbsp;" . $dnum . "<br><br>";
echo "<label>Date Received:</label>&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"rmm\" size=\"2\" maxlength=\"2\" value=\"$rmm\">\n";
echo "-&nbsp;<input type=\"int\" name=\"rdd\" size=\"2\" maxlength=\"2\" value=\"$rdd\">\n";
echo "-&nbsp;<input type=\"int\" name=\"ryy\" size=\"4\" maxlength=\"4\" value=\"$ryy\">\n";
echo "&nbsp;mm-dd-yyyy\n";

echo "</br>"; 
echo "</br>"; 


echo "<label>Organization:</label>&nbsp;&nbsp;&nbsp;" . $organization;

echo "<input type=\"hidden\" name=\"organization\" value=\"$organization\">\n";

if ($organization =="OTH") 
   {
       echo "&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;" . $organizationother; 
       echo "<input type=\"hidden\" name=\"organizationother\" value=\"$organizationother\">\n";

   }

echo "</br>";
echo "</br>";

echo "<label>Status:</label>&nbsp;&nbsp;&nbsp;" . $donorstatus; 

echo "<input type=\"hidden\" name=\"donorstatus\" value=\"$donorstatus\">\n";

echo "</br>";
echo "</br>";

echo "<label>RX/BC Pll/OTC Use (Y/N)(Dates):</label>&nbsp;&nbsp;" . $rxbcchoose; 

echo "<input type=\"hidden\" name=\"rxbcchoose\" value=\"$rxbcchoose\">\n";


if ($row['rxbcchoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . $rxbcdate . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
       echo "<input type=\"hidden\" name=\"rxbcdate\" value=\"$rxbcdate\">\n";
   }

echo "</br>";
echo "</br>";


echo "<label>Special Diet:</label> &nbsp;&nbsp;";   

if ($reg=="on")     
   {
      echo "&nbsp;&nbsp;&nbsp;Reg";
      echo "<input type=\"hidden\" name=\"reg\" value=\"$reg\">\n";
   }     

if ($dfree=="on")     
   {
      echo "&nbsp;&nbsp;&nbsp;Dfree";
      echo "<input type=\"hidden\" name=\"dfree\" value=\"$dfree\">\n";
   }     

if ($veg=="on")
   {
      echo "&nbsp;&nbsp;&nbsp;Veg";
      echo "<input type=\"hidden\" name=\"veg\" value=\"$veg\">\n";
   }      
if ($vegan=="on")    
   {
      echo "&nbsp;&nbsp;&nbsp;Vegan";
      echo "<input type=\"hidden\" name=\"vegan\" value=\"$vegan\">\n";
   }     

if ($others=="on") 
   {        
      echo "&nbsp;&nbsp;&nbsp;Others"; 
      echo "<input type=\"hidden\" name=\"other\" value=\"$other\">\n";
   } 





echo "</br>";
echo "</br>"; 

echo "<label>Donor Comments:</label>&nbsp;&nbsp;" . $donorcomment; 
echo "<input type=\"hidden\" name=\"donorcomment\" value=\"$donorcomment\">\n";


echo "</br>";
echo "</br>";

// Break string to dsplay month - day - year
echo "<label>Baby's DOB:</label>&nbsp;&nbsp;&nbsp;" . substr($babysdob,5,2) . "-" .  substr($babysdob,8,2) . "-" . substr($babysdob,0,4) . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 

echo "<input type=\"hidden\" name=\"babysdob\" value=\"$babysdob\">\n";


echo "</br>";
echo "</br>";

echo "</div>";
echo "<div class=\"sectioncolumn twoColumnSection\">";

echo "<label>Cooler number:</label>&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"coolernumber\" size=\"4\" maxlength=\"4\">\n"; 
echo "</br>";
echo "</br>";

echo "<label>Cooler Comments:</label>\n";
echo "<br>\n";
echo "<textarea name=\"coolercomments\" rows=2 cols=40 maxlength=40 >\n";
echo "$coolercomments\n";
echo "</textarea>\n";
echo "</br>";
echo "</br>";

echo "<label>Number of Ounces:</label>&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"numberofounces\" size=\"4\" maxlength=\"4\">\n"; 
echo "</br>"; 
echo "</br>"; 


echo "<label>Expression Range:</label>";
echo "</br>";
echo "</br>";
echo "&nbsp;&nbsp;<label>From:</label>&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"fcmm\" size=\"2\" maxlength=\"2\" value=\"mm\">\n";
echo "-&nbsp;<input type=\"int\" name=\"fcdd\" size=\"2\" maxlength=\"2\" value=\"dd\">\n";
echo "-&nbsp;<input type=\"int\" name=\"fcyy\" size=\"4\" maxlength=\"4\" value=\"yyyy\">\n";
echo "</br>";
echo "</br>";
echo "&nbsp;&nbsp;<label>To:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"tcmm\" size=\"2\" maxlength=\"2\" value=\"mm\">\n";
echo "-&nbsp;<input type=\"int\" name=\"tcdd\" size=\"2\" maxlength=\"2\" value=\"dd\">\n";
echo "-&nbsp;<input type=\"int\" name=\"tcyy\" size=\"4\" maxlength=\"4\" value=\"yyyy\">\n";


echo "</br>"; 
echo "</br>"; 

echo "<label>Stored from:</label>&nbsp;&nbsp;&nbsp;" . $storefrom;
echo "<input type=\"hidden\" name=\"storefrom\" value=\"$storefrom\">\n";


?>

</br>
</br>


<label>Milk Grade:</label>&nbsp;&nbsp

<select name="milkgrade" id="milkgrade" onchange="showme('milkgrade','milkgradeother',3)">  
<option value="H">Hospital (28 days from Baby's Birthday)</option>
<option value="M">Mature</option>
<option value="F">Mature - Dairy Free</option>
<option value="O">Other</option>
</select>
&nbsp;&nbsp;&nbsp;
<input type ="text" name="milkgradeother" id="milkgradeother" style=" position:relative;visibility:hidden;display:none;" value="" size=15 maxsize=15 >  

</br><br>

<label>Package State:</label>&nbsp;&nbsp

<select name="packetstate" id="packetstate" onchange="showme('packetstate','packetstateother',3)">  
<option value="W">Waiting</option>
<option value="R">Ready to Use</option>
<option value="U">Used</option>
<option value="O">Other</option>
</select>
&nbsp;&nbsp;&nbsp;
<input type ="text" name="packetstateother" id="packetstateother" style=" position:relative;visibility:hidden;" value="Other">  

</br><br>

<label>Storage Location:</label>&nbsp;&nbsp;

<select name="storagelocation" id="storagelocation">  
<option value="Lab">Lab</option>
<option value="F2">F2 (raw)</option>
<option value="F3">F3 (raw)</option>
<option value="F4">F4 (raw)</option>
<option value="F1A">F1A</option>
<option value="F1B">F1B</option>
<option value="R3">R3</option>
</select>

</div>
</fieldset>


<br class="clear">
<p>
<label>Illness and Medication Report Available?:</label>&nbsp;&nbsp;&nbsp;&nbsp;


<select name="mreportselect" id="mreportselect" onchange="showme('mreportselect','mreport',0)">
<option value="Yes" >Yes</option>
<option value="No" selected>No</option>
</select>
&nbsp;&nbsp;&nbsp;
</p>

<div id="mreport" style="visibility:hidden; display:none">
<fieldset class="sectiondisplay">

<legend>Illness and Medication Report</legend>

<div class="sectioncolumn twoColumnSection">

<label>Who was Ill?</label>&nbsp;&nbsp;

<select name="illness">  
<option value="Donor">Donor</option>
<option value="Family Member">Family Member</option>
</select>

<br>
<br>
<label>Please Explain:</label>

<br>
<textarea name="illnesscomment" rows=2 cols=45 maxlength=52 >
</textarea>

<br>
<br>

<label>Illness Began:</label>&nbsp;&nbsp;&nbsp;
<input type=int name=illbmm size=2 maxlength=2 value="mm">
-&nbsp;<input type=int name=illbdd size=2 maxlength=2 value="dd">
-&nbsp;<input type=int name=illbyy size=4 maxlength=4 value="yyyy">

<br><br><label>Illness Ended:</label>&nbsp;&nbsp;&nbsp;
<input type=int name=illemm size=2 maxlength=2 value="mm">
-&nbsp;<input type=int name=illedd size=2 maxlength=2 value="dd">
-&nbsp;<input type=int name=illeyy size=4 maxlength=4 value="yyyy">

<br>
<br>
<label>Description of Symptoms:</label>

<textarea name="symptomdescription" rows=2 cols=45 maxlength=52 >
</textarea><!-- cols 25 -->

<br>
<br>

<label>Fever?</label>&nbsp;&nbsp;

<input type ="text" name="fever" size=3 maxlength=3>
&nbsp;&nbsp;&#176F


</br>
</br>


<label>Fever Started:</label>&nbsp;&nbsp;&nbsp;
<input type=int name=fsmm size=2 maxlength=2 value="mm">
-&nbsp;<input type=int name=fsdd size=2 maxlength=2 value="dd">
-&nbsp;<input type=int name=fsyy size=4 maxlength=4 value="yyyy">

<br><br><label>Fever Ended:</label>&nbsp;&nbsp;&nbsp;
<input type=int name=femm size=2 maxlength=2 value="mm">
-&nbsp;<input type=int name=fedd size=2 maxlength=2 value="dd">
-&nbsp;<input type=int name=feyy size=4 maxlength=4 value="yyyy">

</br>
</br>

</div>
<div class="sectioncolumn twoColumnSection">

<label>DONOR MEDICATION USE</label>

<select name="meduse" id="meduse" onchange="showme('meduse','dosagediv',0)">
<option value="Yes">Yes</option>
<option value="No" selected>No</option>
</select>

</br>
</br>
<div id="dosagediv" style="visibility:hidden;display:none">
<label>Types:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=text name=medtypes size=20 maxlength=20> 
</br>
</br>

<label>Dosage:</label>&nbsp;&nbsp;<input type=text name=dosage size=20 maxlength=20> 
</br>
</br>


<label>Dosage Started:</label>&nbsp;&nbsp;&nbsp;
<input type=int name=dsmm size=2 maxlength=2 value="mm">
-&nbsp;<input type=int name=dsdd size=2 maxlength=2 value="dd">
-&nbsp;<input type=int name=dsyy size=4 maxlength=4 value="yyyy">

<br><br><label>Dosage Ended:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=int name=demm size=2 maxlength=2 value="mm">
-&nbsp;<input type=int name=dedd size=2 maxlength=2 value="dd">
-&nbsp;<input type=int name=deyy size=4 maxlength=4 value="yyyy">


</div>
<br>
<br>

</div>
<div class="section">
<hr>
<label>Notes/Comments:</label>
<br>

<textarea name="reportcomments" rows=2 cols=50 maxlength=102 >
</textarea>
<br><br>
<label>Signed:</label>&nbsp;&nbsp;<input type=text name=signature size=30 maxlength=30> 
</br>
</br>


<label>Date:</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type=int name=smm size=2 maxlength=2 value="mm">
-&nbsp;<input type=int name=sdd size=2 maxlength=2 value="dd">
-&nbsp;<input type=int name=syy size=4 maxlength=4 value="yyyy">
</div>


</fieldset>
</div>


<br class="clear">
<?php

echo "</br>"; 


mysqli_free_result($result); 

echo "<input type=\"submit\" value=\"Add Package\">\n";

echo "</form>\n";

echo "</br>";

mysqli_close($con);

?> 

<p><a href="./donorslt.php">Return to results</a>&nbsp;&nbsp;

<a href="./receivingmenu.php">Receiver Menu</a></p>


</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
