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

$urights = $_SESSION['urights'];

$donornumberr = $_GET["dnum"];


$determinechoose = $_GET["determinechoose"];

echo "</br>";
echo "determinechoose: " . $determinechoose;
echo "</br>";


$fexpmm = $_POST["fexpmm"];
$fexpdd = $_POST["fexpdd"];
$fexpyr = $_POST["fexpyy"];

$texpmm = $_POST["texpmm"];
$texpdd = $_POST["texpdd"];
$texpyr = $_POST["texpyy"];


// Construct Date
$fdate = $fexpyr . "-" . $fexpmm . "-" . $fexpdd;
$tdate = $texpyr . "-" . $texpmm . "-" . $texpdd;


/*


Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 
*/

/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

   

echo  "<P><FONT SIZE=5><B>Packet Search Results</B></FONT></P>";

echo "</br>";
echo "</br>";
echo "</br>";

mysql_select_db('milk_db', $con);



if (!mysql_select_db('milk_db', $con)) {
    echo 'Could not select database';
    exit;
    }



// Updated donor status in receivertable and receivertablelog based on change of status 

$sql = "update receivertable set donorstatus = '$determinechoose' WHERE donornumberr = $donornumberr";

/*
echo "</br>";
echo $sql;
echo "</br>";
*/
  
$result = mysql_query($sql, $con); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

echo "</br>";

$sql = "update receivertablelog set donorstatus = '$determinechoose' WHERE donornumberr = $donornumberr";

/*
echo "</br>";
echo $sql;
echo "</br>";
*/
  
$result = mysql_query($sql, $con); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}


switch ($determinechoose)
{
case 'D':
  $packetsearch = "packetstate = 'W'";
  break;
case 'F':
  $packetsearch = "packetstate = 'R' or packetstate = 'W'";
  break;
default:
  echo "";
}

$sql   = "SELECT * FROM receivertable where donornumberr = $donornumberr and $packetsearch order by packagenumber";

/*
echo "</br>";
echo $sql;
echo "</br>";
*/

$result = mysql_query($sql, $con); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}


echo "<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>\n";
echo "	<COLGROUP><COL WIDTH=150><COL WIDTH=20><COL WIDTH=150><COL WIDTH=280><COL WIDTH=100></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=100 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=5>Package Number</FONT></B></TD>\n";
echo "			<TD WIDTH=160 ALIGN=LEFT><B><FONT SIZE=5>Package State</FONT></B></TD>\n";
echo "			<TD WIDTH=100 ALIGN=LEFT><B><FONT SIZE=5>Cooler Number</FONT></B></TD>\n";
echo "			<TD WIDTH=180 ALIGN=LEFT><B><FONT SIZE=5>Expression Range</FONT></B></TD>\n";
echo "			<TD WIDTH=180 ALIGN=LEFT><B><FONT SIZE=5>Location</FONT></B></TD>\n";
echo "		</TR>\n";
echo "		<TR>\n";
echo "			<TD HEIGHT=17 ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "		</TR>\n";

$processnumber = 0;


while ($row = mysql_fetch_assoc($result)) 
   {
       $packagenumber = $row['packagenumber'];
       $packetstate = $row['packetstate'];
       $coolernumber=$row['coolernumber'];
       $expressionrange=$row['expressionrange'];
       $storagelocation=$row['storagelocation'];

       $processnumber = $processnumber + 1;


       echo "<TR>\n";
//       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./recvrdsply.php?packagenumber=$packagenumber\"> $packagenumber</a></FONT></TD>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./recvedit.php?packagenumber=$packagenumber\"> $packagenumber</a></FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$packetstate</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$coolernumber</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$expressionrange</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$storagelocation</FONT></TD>\n";
       echo "</TR>\n";
   
       $rec = 1;   /* triggers when records are found  */
   }

echo "</br>";
echo "processnumber: " . $processnumber;
echo "</br>";

//  processnumber detemines how many packages need to be processed 

$sql = "update screenertable set processnumber = $processnumber WHERE donornumber = $donornumberr";

$result = mysql_query($sql, $con); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}


if (!$rec) 
   {
       echo "<TR>\n";
       echo "<TD HEIGHT=17 ALIGN=LEFT><FONT SIZE=4>No Records Found</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><BR></TD>\n";
       echo "<TD ALIGN=LEFT><BR></TD>\n";
       echo "<TD ALIGN=LEFT><BR></TD>\n";
       echo "<TD ALIGN=LEFT><BR></TD>\n";
       echo "</TR>\n";
    }


echo "	</TBODY>\n";
echo "</TABLE>\n";
echo "\n";




mysql_free_result($result); 


mysql_close($con);


echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";


echo "<p><a href=\"./receivingmenu.php\">Receiver Menu</a></p>\n";
//echo "</br>";
echo "<p><a href=\"./dailysearch.php\">Daily Search</a></p>\n";
//echo "</br>";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>