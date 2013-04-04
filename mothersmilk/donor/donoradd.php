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

//Print_r ($_SESSION);

/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);


// Next 4 lines generate the next donor number   

mysql_select_db('milk_db', $con);

$result = mysql_query("SELECT MAX(donornumber) FROM screenertable"); 

$lastnumber = mysql_result($result,0);

$donornumber = $lastnumber + 1;  /* Next donor number  */

// Populate month - day - year

$appmm = (idate("m"));
$appdd = (idate("d"));
$appyy = (idate("Y"));
// echo "<br>";
echo "<p><span><font size=5>Donor Screening</font></span></p>\n";

echo "<form action=\"dnrcnfrm.php?donornumber=$donornumber&ctype=2\" method=\"post\">\n";
// echo "Donor number:&nbsp;&nbsp; ";
echo "Doner Number:&nbsp;&nbsp;" . "<span>" . $donornumber . "</span>";
echo "</br>\n";
echo "</br>\n";

?>

Application Status:&nbsp;&nbsp;&nbsp;

<select name="determinechoose" id="determinechoose" onchange="showme2('determinechoose','determine')">  
<option value="N/A" >Please Select</option>   
<option value="A" >Applied or Awaiting</option>
<option value="P" >Passed Phone Screen</option>
<option value="NP" >No Passed Phone Screen</option>
<option value="F" >Failed</option>
<option value="D" >Donor Accepted</option>
<option value="C" >Closed</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="determine" id="determine" style="display:none;position:relative;visibility:hidden;" value="" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  

<?php

echo "</br>\n";
echo "</br>\n";

echo "Call Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
?>

<input type="int" name="dnrappmm" size="2" maxlength="2" value="<?php echo $appmm ?>">
&nbsp;&nbsp;<input type="int" name="dnrappdd" size="2" maxlength="2" value="<?php echo $appdd ?>">
&nbsp;&nbsp;<input type="int" name="dnrappyr" size="4" maxlength="4" value="<?php echo $appyy ?>">


<?php
echo "</br>\n";
echo "</br>\n";
?>

Organization:&nbsp;&nbsp;&nbsp;

<select name="organization" id="organization" onchange="showme('organization','organizationother',3)">  
<option value="N/A" >Please Select</option>";
<option value="IND" >Individual</option>
<option value="STN" >Stanford</option>  
<option value="JHH" >John Hopkns</option>
<option value="OTH" >Other</option>
</select>
&nbsp;&nbsp;&nbsp;
<input type ="text" name="organizationother" id="organizationother" style="display:none;position:relative;visibility:hidden;" value="" size=20 maxlength=20>  

<?php
echo "</br>\n";
echo "</br>\n";
echo "First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"donorfname\" size=\"25\" maxlength=\"20\" >";
echo "</br>\n";
echo "</br>\n";
echo "Middle Name:&nbsp; <input type=\"text\" name=\"donormname\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "</br>\n";
echo "Last Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"donorlname\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "</br>\n";
echo "Address:&nbsp;&nbsp; <input type=\"text\" name=\"address\" size=\"25\" maxlength=\"20\">\n";
echo "&nbsp;&nbsp;City:&nbsp;&nbsp; <input type=\"text\" name=\"city\" size=\"25\" maxlength=\"20\">\n";
echo "</br>\n";
echo "</br>\n";
echo "State:&nbsp;&nbsp; <input type=\"text\" name=\"state\" size=\"5\" maxlength=\"2\">\n";
echo "&nbsp;&nbsp;Zip Code:&nbsp;&nbsp; <input type=\"text\" name=\"zip\" size=\"7\" maxlength=\"5\">\n";
echo "&nbsp;&nbsp;Country:&nbsp;&nbsp; <input type=\"text\" name=\"country\" size=\"20\" maxlength=\"15\" value=\"USA\">\n";
echo "</br>\n";
echo "</br>\n";

echo "Home Phone:&nbsp;&nbsp; <input type=\"text\" name=\"hphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"hphonesu\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;&nbsp;Cell Phone:&nbsp;&nbsp; <input type=\"text\" name=\"cphoneac\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonepr\" size=\"3\" maxlength=\"3\">\n";
echo "&nbsp;" . "-" . "&nbsp; <input type=\"text\" name=\"cphonesu\" size=\"4\" maxlength=\"4\">\n";

echo "</br>\n";
echo "</br>\n";
echo "Email:&nbsp;&nbsp; <input type=\"text\" name=\"email\" size=\"30\" maxlength=\"20\">\n";

echo "</br>\n";
echo "</br>\n";
echo " Referred By:&nbsp;&nbsp;";
echo "<select name=\"referral\">\n";
echo "<option value=\"N/A\" >Please Select</option>";
echo "<option value=\"internet\">Internet</option>\n";
echo "<option value=\"previous\">Previous Donor</option>\n";
echo "<option value=\"surrogate\">Surrogate</option>\n";
echo "<option value=\"other\">Other</option>\n";
echo "</select>\n";
echo "\n";

echo "</br>\n";
echo "</br>\n";
echo "<p><span>Baby Information</span></p>\n";

echo "Baby's Name:&nbsp; <input type=\"text\" name=\"babysname\" size=\"25\" maxlength=\"20\">\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;Baby's DOB:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
?>

<input type="int" name="bbmm" size="2" maxlength="2" value="" placeholder = "mm">
&nbsp;&nbsp;<input type="int" name="bbdd" size="2" maxlength="2" value="" placeholder = "dd">
&nbsp;&nbsp;<input type="int" name="bbyy" size="4" maxlength="4" value="" placeholder = "yyyy">

<?php
echo "</br>\n";
echo "</br>\n";
echo "Baby Status:&nbsp;&nbsp;";
echo "<select name=\"babystatus\">\n";
echo "<option value=\"N/A\" >Please Select</option>";
echo "<option value=\"Preterm\">Preterm (<36 wks)</option>\n";
echo "<option value=\"In hospital\">In Hospital</option>\n";
echo "<option value=\"Bereaved\">Bereaved</option>\n";
echo "<option value=\"Research\">Research</option>\n";
echo "</select>\n";
echo "\n";
echo "</br>";
echo "</br>";

echo "Amount can donate:&nbsp;<input type=\"text\" name=\"donateamount\" size=\"10\" maxlength=\"20\">\noz";
echo "</br>";
echo "</br>";
echo "Stored from:&nbsp;&nbsp;";
echo "<select name=\"storefrom\">\n";
echo "<option value=\"N/A\" >Please Select</option>";
echo "<option value=\"deepfreeze\">Deep Freeze</option>\n";
echo "<option value=\"milkhome\">Milk at Home</option>\n";
echo "<option value=\"hospital\">Hospital</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;&nbsp;Can commit to 100 oz:&nbsp;&nbsp;";
echo "<select name=\"milkcommit\">\n";
echo "<option value=\"N/A\" >Please Select</option>";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";
echo "</br>";
echo "</br>";
?>
RX/BC Pll/OTC Use (Y/N)(Dates):&nbsp;&nbsp;&nbsp;

<select name="rxbcchoose" id="rxbcchoose" onchange="showme('rxbcchoose','rxbcdate',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="rxbcdate" id="rxbcdate" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy"> 

<?php
echo "</br>";
echo "</br>";
?>
Supplements w/Herbs/Herb Teas (Y/N)(Dates):&nbsp;&nbsp;

<select name="herbschoose" id="herbschoose" onchange="showme('herbschoose','herbs',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="herbs" id="herbs" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  

<?php
echo "</br>\n";
echo "</br>\n";
?>
Alcohol while pumping (Y/N)(Dates):&nbsp;&nbsp;
<select name="alcoholchoose" id="alcoholchoose" onchange="showme('alcoholchoose','alcohol',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="alcohol" id="alcohol" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy"> 

<?php
echo "</br>\n";
echo "</br>\n";
echo "Smoke:&nbsp;&nbsp;";
echo "<select name=\"smoke\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";


echo "&nbsp;&nbsp;&nbsp;ivDrugs:&nbsp;&nbsp;";
echo "<select name=\"ivDrug\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"yes\">Yes</option>\n";
echo "<option value=\"no\">No</option>\n";
echo "</select>\n";

echo "</br>";
echo "</br>";
?>
Transfusion (Y/N)(Dates):&nbsp;&nbsp;
<select name="transfusionchoose" id="transfusionchoose" onchange="showme('transfusionchoose','transfusion',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="transfusion" id="transfusion" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  

<?php
echo "</br>";
echo "</br>";
?>

Work Hi-Risk/Blood (Y/N)(Dates):&nbsp;&nbsp;

<select name="workchoose" id="workchoose" onchange="showme('workchoose','work',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="work" id="work" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  

<?php
echo "</br>";
echo "</br>";
?>

Tattoos/Piercing (Y/N)(Dates):&nbsp;&nbsp;

<select name="tattooschoose" id="tattooschoose" onchange="showme('tattooschoose','tattoos',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="tattoos" id="tattoos" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy"> 

<?php
echo "</br>";
echo "</br>";

echo "Hep Test:&nbsp;&nbsp;";

echo "<select name=\"heptest\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"Yes\">Yes</option>\n";
echo "<option value=\"No\">No</option>\n";
echo "<option value=\"Ns\">Ns</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;HIV Test:&nbsp;&nbsp;";

echo "<select name=\"hivtest\">\n";
echo "<option value=\"N/A\">Please Select</option>\n";
echo "<option value=\"Yes\">Yes</option>\n";
echo "<option value=\"No\">No</option>\n";
echo "<option value=\"Ns\">Ns</option>\n";
echo "</select>\n";

echo "</br>";
echo "</br>";

echo "TB Test:&nbsp;&nbsp;";

echo "<select name=\"tbtest\">\n";
echo "<option value=\"N/A\" >Please Select</option>\n";
echo "<option value=\"Yes\" >Yes</option>\n";
echo "<option value=\"No\" >No</option>\n";
echo "<option value=\"Ns\" >Ns</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp;TB Treatment:&nbsp;&nbsp;";

echo "<select name=\"tbtreat\">\n";
echo "<option value=\"N/A\" >Please Select</option>\n";
echo "<option value=\"Neg\" >Negative</option>\n";
echo "<option value=\"Pos\" >Positive</option>\n";
echo "</select>\n";

echo "</br>";
echo "</br>";

?>

Cold Sores/Herpes while breatfeedng (Y/N)(Dates):&nbsp;&nbsp;

<select name="herpeschoose" id="herpeschoose" onchange="showme('herpeschoose','herpes',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="herpes" id="herpes" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "mm-dd-yyyy">  

<?php
echo "</br>";
echo "</br>";
echo "Hemophilia:&nbsp;&nbsp;";

echo "<select name=\"hemophilia\">\n";
echo "<option value=\"N/A\" >Please Select</option>\n";
echo "<option value=\"Yes\" >Yes</option>\n";
echo "<option value=\"No\" >No</option>\n";
echo "</select>\n";

echo "&nbsp;&nbsp; Growth Hormones:&nbsp;&nbsp;";

echo "<select name=\"hormones\">\n";
echo "<option value=\"N/A\" >Please Select</option>\n";
echo "<option value=\"Yes\" >Yes</option>\n";
echo "<option value=\"No\" >No</option>\n";
echo "</select>\n";


echo "</br>";
echo "</br>";
?>

UK '80-96 3+MOS. (Y/N)(Yrs):&nbsp;&nbsp;

<select name="ukmoschoose" id="ukmoschoose" onchange="showme('ukmoschoose','ukmos',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="ukmos" id="ukmos" style="display:none;position:relative;visibility:hidden;" value= "" size=20 maxlength=20 placeholder = "years"> 

<?php

echo "</br>"; 
echo "</br>"; 
?>

Europe '80 5+yrs (Y/N)(Yrs):&nbsp;&nbsp;

<select name="eurochoose" id="eurochoose" onchange="showme('eurochoose','euro',1)">
<option value="N/A" >Please Select</option>   
<option value="Yes" >Yes</option>
<option value="No" >No</option>
</select>
&nbsp;&nbsp;&nbsp;

<input type ="text" name="euro" id="euro" style="display:none;position:relative;visibility:hidden; " value= "" size=20 maxlength=20 placeholder = "years">  



<?php

echo "Special Diet:";
echo "</br>";

?>

<input type="checkbox" name="reg" value="Reg" > Regular
<input type="checkbox" name="dfree" value="Dfree" > Dairy-Free
<input type="checkbox" name="veg" value="Veg" > Vegetarian(eggs/dairy)
<input type="checkbox" name="vegan" value="Vegan" > Vegan
<input type="checkbox" name="others" value="Other" > Other


<?php
echo "</br>";
echo "</br>";
echo "Comments (100 characters)";

echo "</br>\n";
echo "</br>\n";

echo "\n";


echo "<textarea name=\"donorcomment\" rows=\"2\" cols=\"50\" maxlength=\"102\"
>\n"; echo "</textarea>\n"; echo "\n";

echo "</br>\n";




echo "</br>\n";
echo "</br>\n";
echo "<input type=\"submit\" value=\"Add Donor\">\n";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
echo "</form>\n";

echo "</br>";


mysql_free_result($result); 

   echo "</br>";
   echo "</br>";
   echo "</br>";

   echo "<p><a href=\"./donorslt.php\">Return to Donor Result</a></p>\n";

   echo "</br>";
   echo "<p><a href=\"./donormenu.php\">Return to Donor Menu</a></p>\n";

mysql_close($con);




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
