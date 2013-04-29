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

$urights = $_SESSION['urights'];


// receive date post

$frcvmm = $_POST["frcvmm"];
$frcvdd = $_POST["frcvdd"];
$frcvyr = $_POST["frcvyy"];

$trcvmm = $_POST["trcvmm"];
$trcvdd = $_POST["trcvdd"];
$trcvyr = $_POST["trcvyy"];

// expression date post

$fexpmm = $_POST["fexpmm"];
$fexpdd = $_POST["fexpdd"];
$fexpyr = $_POST["fexpyy"];

$texpmm = $_POST["texpmm"];
$texpdd = $_POST["texpdd"];
$texpyr = $_POST["texpyy"];


$packagenumber = $_POST["packagenumber"];

$donornumberr = $_POST["donornumber"];




// Construct Receive Date
$fdate = $frcvyr . "-" . $frcvmm . "-" . $frcvdd;
$tdate = $trcvyr . "-" . $trcvmm . "-" . $trcvdd;


/*
if ($fdate == '--') 
   {
      // Insert a "From" date if blank
      $fdate = '2010-01-01';
   }

if ($tdate == '--') 
   {
      // Insert a "To" date if blank
      $tdate = '2070-01-01';
   }



// Construct Expression Date
$fdate = $fexpyr . "-" . $fexpmm . "-" . $fexpdd;
$tdate = $texpyr . "-" . $texpmm . "-" . $texpdd;




echo "</br>";
echo "From:  "; 
echo "<b>"; 
echo $_POST["frcvmm"] . " " . $_POST["frcvdd"] . " " . $_POST["frcvyy"];
echo "</b>"; 
echo "</br>"; 
echo "To:  "; 
echo "<b>"; 
echo $_POST["trcvmm"] . " " . $_POST["trcvdd"] . " " . $_POST["trcvyy"];
echo "</b>"; 
echo "</br>"; 



//Print_r ($_SESSION);
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

if (!$donornumberr) 
   {
      $donornumberr = 0; 
//       exit;
   }

if (!$packagenumber) 
   {
      $packagenumber = 0; 
//       exit;
   }

if (!mysql_select_db('milk_db', $con)) 
   {
      echo 'Could not select database';
      exit;
   }

/*

echo "</br>";

echo "packagenumber: " . $packagenumber;
echo "</br>";
echo "donornumber: " . $donornumberr;
echo "<br>";
echo "fdate: " . $fdate;
echo "<br>";
echo "tdate: " . $tdate;
echo "<br>";
echo "<br>";
echo "<br>";

*/


if (($packagenumber == 0) and ($donornumberr == 0) and ($fdate == '--') and ($tdate == '--'))
   {
       $sql   = "SELECT * FROM receivertable order by packagenumber";
   }
else
   {
       $sql   = "SELECT * FROM receivertable where packagenumber =  $packagenumber or donornumberr = '$donornumberr' or receivedate between '$fdate' and '$tdate' order by packagenumber";
   }

/*
echo $sql;
echo "</br>";
echo "</br>";
*/

$result = mysql_query($sql, $con); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}


echo "<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>\n";
echo "	<COLGROUP><COL WIDTH=150><COL WIDTH=150><COL WIDTH=20><COL WIDTH=150><COL WIDTH=280><COL WIDTH=100></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=100 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=5>Package Number</FONT></B></TD>\n";
echo "			<TD WIDTH=100 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=5>Donor Number</FONT></B></TD>\n";
echo "			<TD WIDTH=160 ALIGN=LEFT><B><FONT SIZE=5>Package State</FONT></B></TD>\n";
echo "			<TD WIDTH=100 ALIGN=LEFT><B><FONT SIZE=5>Cooler Number</FONT></B></TD>\n";
echo "			<TD WIDTH=180 ALIGN=LEFT><B><FONT SIZE=5>Receive Date</FONT></B></TD>\n";
echo "			<TD WIDTH=180 ALIGN=LEFT><B><FONT SIZE=5>Location</FONT></B></TD>\n";
echo "		</TR>\n";
echo "		<TR>\n";
echo "			<TD HEIGHT=17 ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "		</TR>\n";


while ($row = mysql_fetch_assoc($result)) 
   {
       $packagenumber = $row['packagenumber'];
       $donornumber = $row['donornumberr'];
       $packetstate = $row['packetstate'];
       $coolernumber=$row['coolernumber'];
       $rdate=$row['receivedate'];
       $storagelocation=$row['storagelocation'];

       echo "<TR>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./recvrdsply.php?packagenumber=$packagenumber\"> $packagenumber</a></FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$donornumber</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$packetstate</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$coolernumber</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$rdate</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$storagelocation</FONT></TD>\n";
       echo "</TR>\n";
   
       $rec = 1;   /* triggers when records are found  */
   }



if (!$rec) 
   {
       echo "<TR>\n";
       echo "<TD HEIGHT=17 ALIGN=LEFT><FONT SIZE=4>No Records Found</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><BR></TD>\n";
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
echo "<p><a href=\"./recvsearch.php\">Package Search</a></p>\n";
//echo "</br>";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
