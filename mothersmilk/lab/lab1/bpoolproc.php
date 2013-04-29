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



$bpoolnumber = $_POST["bpoolnumber"];

if (!$bpoolnumber)
   {
      // Blue Pool number came from labdsply.php
     
      $bpoolnumber = $_GET["bpoolnumber"];

      echo "Came from labdsply\n";
   }
else
   {
      // Blue Pool number came from labdsply.php
     
      echo "Came from bpoolsearch.php\n";
   }



// Search for Blue Pool Number in table

// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

    mysql_select_db('milk_db', $con);


$sql = "select donornumberl, apstatus, packagenumber, receivedate, bpoolnumber, bpooldate, bpooldsgn, bpoolrn  
from screenertable, receivertable, labtable
where donornumber = donornumberr
and donornumberr = donornumberl
and bpoolnumber = '$bpoolnumber'";


echo $sql;
echo "</br>";

$result = mysql_query($sql, $con); 



/*
echo "</br>"; 
Print_r ($_SESSION);
echo "</br>";

*/
if (!$result)
   {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
      exit;
   }


// echo "</br>";

$row = mysql_fetch_assoc($result);

$packagenumber = $row['packagenumber'];
$receivedate = $row['receivedate'];
$bpooldate = $row['bpooldate'];
$bpooldsgn = $row['bpooldsgn'];
$bpoolrn = $row['bpoolrn'];


echo "</br>"; 
echo "<p><b>Blue Pool Processing</b></p>"; 
echo "</br>"; 
echo "Blue Pool Number:&nbsp;&nbsp;" . "<b>" . $bpoolnumber . "</b>";
echo "&nbsp;&nbsp;&nbsp;Blue Pool Date:&nbsp;&nbsp;"  . "<b>" . $bpooldate . "</b>";
echo "</br>\n";
echo "Blue Pool Designation:&nbsp;&nbsp;"  . "<b>" . $bpooldsgn . "</b>";
echo "</br>\n";
echo "Blue Pool Refrigeration Number:&nbsp;&nbsp;"  . "<b>" . $bpoolrn . "</b>";
echo "</br>\n";

// displays donors within the blue pool 

$sqld = "select donornumberl, donorstat from labtable
where bpoolnumber = '$bpoolnumber'";


// echo $sqld;
// echo "</br>";

$resultd = mysql_query($sqld, $con); 

if (!$resultd) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}



echo "<TABLE FRAME=VOID CELLSPACING=0 COLS=3 RULES=NONE BORDER=0>\n";
echo "	<COLGROUP><COL WIDTH=200><COL WIDTH=200><COL WIDTH=200></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=155 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=3>Donor Number</FONT></B></TD>\n";
echo "			<TD WIDTH=173 ALIGN=LEFT><B><FONT SIZE=3>Donor Status</FONT></B></TD>\n";
echo "			<TD WIDTH=176 ALIGN=LEFT><B><FONT SIZE=3></FONT></B></TD>\n";
echo "		</TR>\n";

while ($row = mysql_fetch_assoc($resultd)) 
   {
       $dnum=$row['donornumberl'];
       $dnrstat=$row['donorstat'];

       echo "<TR>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4>$dnum</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$dnrstat</FONT></TD>\n";
//       echo "<TD ALIGN=LEFT><FONT SIZE=4>REMOVE</FONT></TD>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./bpooldnrdelete.php?dnum=$dnum&bpoolnumber=$bpoolnumber\">Remove</a></FONT></TD>\n";

       echo "</TR>\n";
   
   }


echo "	</TBODY>\n";
echo "</TABLE>\n";

/*
echo "<TABLE FRAME=VOID CELLSPACING=0 COLS=3 RULES=NONE BORDER=0>\n";
echo "	<COLGROUP><COL WIDTH=255><COL WIDTH=273><COL WIDTH=276><COL WIDTH=219></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=155 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=3>Donor Number</FONT></B></TD>\n";
echo "			<TD WIDTH=173 ALIGN=LEFT><B><FONT SIZE=3>Donor Status</FONT></B></TD>\n";
echo "			<TD WIDTH=176 ALIGN=LEFT><B><FONT SIZE=3>REMOVE</FONT></B></TD>\n";
echo "		</TR>\n";

while ($row = mysql_fetch_assoc($resultd)) 
   {
       $dnum=$row['donornumberl'];
       $dnrstat=$row['donorstat'];

       echo "<TR>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4>$dnum</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$dnrstat</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>LINK REMOVE DONOR</FONT></TD>\n";
       echo "</TR>\n";
   
   }


echo "	</TBODY>\n";
echo "</TABLE>\n";

*/
echo "<p><a href=\"./bpooldnradd.php?bpoolnumber=$bpoolnumber\">Add Donor</a></p>\n";


echo "</br>\n";




echo "Package Number:&nbsp;&nbsp;"  . "<b>" . $packagenumber . "</b>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;Date Received:&nbsp;&nbsp;" . "<b>" . $receivedate . "</b>";
echo "</br>\n";
echo "Package Designation:&nbsp;&nbsp;"  . "<b>" . "modify db" . "</b>";


echo "</br>"; 
Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 


 mysql_close($con);


$urights = $_SESSION['urights'];


if ($urights==1 or $urights==2)
     {
         echo "<p><a href=\"./labedit.php?dnum=$dnum\">Edit</a></p>\n";
     }

echo "</br>"; 

echo "<p><a href=\"./labproc.php\">Lab Processing Menu</a></p>\n";

echo "</br>"; 



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
