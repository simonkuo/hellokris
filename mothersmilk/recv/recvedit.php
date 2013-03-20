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


$dnum = $_GET["dnum"];

/*
echo "<br>";
echo "dnum: " . $dnum;
echo "<br>";
*/

// Search for Donor in table

// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);


$sql   = "SELECT * FROM receivertable where donornumberr =  '$dnum'";


$result = mysql_query($sql, $con); 

$row = mysql_fetch_assoc($result);


//Print_r ($_SESSION);


$rdate = $row['receivedate'];
$cdate = $row['createdate'];
$pkgnum = $row['packagenumber'];
$pkgnumoncs = $row['pkgnumoncs'];



echo "<form action=\"recvcnfrm.php?dnum=$dnum&ctype=1\" method=\"post\">\n";
echo "<br>";
echo "Doner number:&nbsp;&nbsp;&nbsp;" . "<b>$dnum</b>";
echo "</br>";
echo "</br>";

$rmm = substr($rdate,5,2);
$rdd = substr($rdate,8,2);
$ryy = substr($rdate,0,4);

echo "Date Received:&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"rmm\" size=\"2\" maxlength=\"2\" value=\"$rmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"rdd\" size=\"2\" maxlength=\"2\" value=\"$rdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"ryy\" size=\"4\" maxlength=\"4\" value=\"$ryy\">\n";
echo "&nbsp;mm-dd-yyyy\n";


echo "</br>"; 
echo "</br>";

$cmm = substr($cdate,5,2);
$cdd = substr($cdate,8,2);
$cyy = substr($cdate,0,4);

echo "Date Created:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<input type=\"int\" name=\"cmm\" size=\"2\" maxlength=\"2\" value=\"$cmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"cdd\" size=\"2\" maxlength=\"2\" value=\"$cdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"cyy\" size=\"4\" maxlength=\"4\" value=\"$cyy\">\n";
echo "&nbsp;mm-dd-yyyy\n";


echo "</br>"; 

echo "</br>";

echo "Package number:&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"pkgnum\" size=\"4\" maxlength=\"4\" value=\"$pkgnum\">\n"; 
echo "</br>"; 
echo "</br>"; 

echo "Ounces Donated:&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"pkgnumoncs\" size=\"4\" maxlength=\"4\" value=\"$pkgnumoncs\">\n"; 
echo "</br>"; 


switch ($location)
{
case 'Refrigerator 1':
  $refrigerator1 = 'selected';
  break;
case 'Refrigerator 2':
  $refrigerator2 = 'selected';
  break;
case 'Refrigerator 3':
  $refrigerator3 = 'selected';
  break;
case 'other':
  $other = 'selected';
  break;
default:
  echo "";
}


echo "</br>\n";
echo " Location:&nbsp;&nbsp;";
echo "<select name=\"location\">\n";
echo "<option value=\"Refrigerator 1\" $refrigerator1>Refrigerator 1</option>\n";
echo "<option value=\"Refrigerator 2\" $refrigerator2>Refrigerator 2</option>\n";
echo "<option value=\"Refrigerator 3\" $refrigerator3>Refrigerator 3</option>\n";
echo "<option value=\"other\" $other>Other</option>\n";
echo "</select>\n";
echo "\n";

echo "</br>\n";


switch ($status)
{
case 'Waiting':
  $waiting = 'selected';
  break;
case 'Ready':
  $ready = 'selected';
  break;
case 'Quarintine':
  $quarintine = 'selected';
  break;
case 'other':
  $other = 'selected';
  break;
default:
  echo "";
}


echo "</br>\n";
echo " Location:&nbsp;&nbsp;";
echo "<select name=\"location\">\n";
echo "<option value=\"Waiting\" $waiting>Waiting</option>\n";
echo "<option value=\"Ready\" $ready>Ready</option>\n";
echo "<option value=\"Quarintine\" $quarintine>Quarintine</option>\n";
echo "<option value=\"other\" $other>Other</option>\n";
echo "</select>\n";
echo "\n";


echo "</br>\n";

echo "</br>\n";

echo "</br>\n";
echo "<input type=\"submit\" value=\"Edit Donor Package\">\n";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
echo "</form>\n";

 echo "</br>";

   echo "</br>";
   echo "</br>";


// ****************************************************************

   mysql_free_result($result); 

   echo "</br>";
   echo "</br>";
   echo "</br>";



   echo "</br>";
   echo "<p><a href=\"./receivingmenu.php\">Return to Receiver Menu</a></p>\n";


   mysql_close($con);




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
