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


$fexpmm = $_POST["fexpmm"];
$fexpdd = $_POST["fexpdd"];
$fexpyr = $_POST["fexpyy"];

$texpmm = $_POST["texpmm"];
$texpdd = $_POST["texpdd"];
$texpyr = $_POST["texpyy"];


$donornumberr = $_POST["donornumber"];




// Construct Date
$fdate = $fexpyr . "-" . $fexpmm . "-" . $fexpdd;
$tdate = $texpyr . "-" . $texpmm . "-" . $texpdd;


/*
echo "</br>";
echo "From:  "; 
echo "<b>"; 
echo $_POST["fexpmm"] . " " . $_POST["fexpdd"] . " " . $_POST["fexpyy"];
echo "</b>"; 
echo "</br>"; 
echo "To:  "; 
echo "<b>"; 
echo $_POST["texpmm"] . " " . $_POST["texpdd"] . " " . $_POST["texpyy"];
echo "</b>"; 
echo "</br>"; 

echo "</bf>";
echo $donornumberr; 
echo "</br>"; 


Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 
*/

/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

   

   echo  "<P><FONT SIZE=5><B>Receiving Milk Search Results</B></FONT></P>";

   echo "</br>";
   echo "</br>";
   echo "</br>";

    mysql_select_db('milk_db', $con);

   if (!$donornumberr) {
       $donornumberr = '77777'; 
//       exit;
       }

   if (!$packetnum) {
       $packetnum = 7777; 
//       exit;
       }




   if (!mysql_select_db('milk_db', $con)) {
       echo 'Could not select database';
       exit;
       }

echo "</br>";
/*
echo "packetnum: " . $packetnum;
echo "</br>";
echo "donormun: " . $donornumberr;
echo "<br>";
echo "fdate: " . $fdate;
echo "<br>";
*/

//$donornumberr = 'null';

if (($packetnum == '7777') and ($donornumberr == '77777') and ($fdate == '--'))
   {
       $sql   = "SELECT * FROM receivertable";
   }
else
   {
       $sql   = "SELECT * FROM receivertable where pkgnum =  $packetnum or donornumberrberr = '$donornumberrberr' or rdate between '$fdate' and '$tdate' ";
   }


//echo $sql;
echo "</br>";

   $result = mysql_query($sql, $con); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}


echo "<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>\n";
echo "	<COLGROUP><COL WIDTH=100><COL WIDTH=150><COL WIDTH=150><COL WIDTH=150><COL WIDTH=150><COL WIDTH=100></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=100 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=5>Donor #</FONT></B></TD>\n";
echo "			<TD WIDTH=160 ALIGN=LEFT><B><FONT SIZE=5>Number of Coolers</FONT></B></TD>\n";
echo "			<TD WIDTH=100 ALIGN=LEFT><B><FONT SIZE=5>Received Date</FONT></B></TD>\n";
echo "			<TD WIDTH=180 ALIGN=LEFT><B><FONT SIZE=5>Expression Date</FONT></B></TD>\n";
echo "			<TD WIDTH=180 ALIGN=LEFT><B><FONT SIZE=5>Freezer Location</FONT></B></TD>\n";
echo "			<TD WIDTH=100 ALIGN=LEFT><B><FONT SIZE=5>Removed from Freezer</FONT></B></TD>\n";
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
       $rdate=$row['receivedate'];
       $cdate=$row['createdate'];
       $pkgnum = $row['packagenumber'];
       $donornum=$row['donornumberr'];

       echo "<TR>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./recvrdsply.php?dnum=$donornum\"> $donornum</a></FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$pkgnum</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$rdate</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$cdate</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$cdate</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>yes</FONT></TD>\n";
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
       echo "</TR>\n";
    }


echo "	</TBODY>\n";
echo "</TABLE>\n";
echo "\n";


/*

   while ($row = mysql_fetch_assoc($result)) {
    echo $row[dnrnum] . " " . $row['rdate'] . " " . $row['rdesigna'] . " " . $row['pkgnum'];
    $rec = 1;   
    echo "</br>";
   }

if (!$rec) {
   echo "No Records Found\n";
   echo "</br>";
}
*/


   mysql_free_result($result); 


   mysql_close($con);


echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";



if ($urights==1 or $urights==2)
   {
       echo "<p><a href=\"./recvadd.php?dnum=$dnum\">Add</a></p>\n";
   }


echo "<p><a href=\"./receivingmenu.php\">Receiver Menu</a></p>\n";
//echo "</br>";
echo "<p><a href=\"./recvsearch.php\">Search</a></p>\n";
//echo "</br>";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
