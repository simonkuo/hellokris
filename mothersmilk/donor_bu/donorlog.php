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
//Print_r ($_SESSION);


$dnum = $_GET["dnum"];

$urights = $_SESSION['urights'];



/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

echo "<br>";   

echo  "<P><FONT SIZE=4><B>Donor&nbsp;&nbsp;&nbsp;" . $dnum .  "&nbsp;&nbsp;&nbsp;History</B></FONT></P>";

// echo  "<B>Donor&nbsp;&nbsp;&nbsp;" .  $dnum . "&nbsp;&nbsp;&nbsp;History</B>";

echo "</br>";

mysql_select_db('milk_db', $con);


if (!mysql_select_db('milk_db', $con)) 
    {
       echo 'Could not select database';
       exit;
    }


$sql   = "SELECT * FROM screenertablelog where donornumber =  $dnum order by transactionnumber";


echo $sql;
echo "</br>";
echo "</br>";

$result = mysql_query($sql, $con); 

if (!$result) 
    {
       echo "DB Error, could not query the database\n";
       echo 'MySQL Error: ' . mysql_error();
       exit;
    }



echo "<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>\n";
// echo "	<COLGROUP><COL WIDTH=255><COL WIDTH=273><COL WIDTH=276><COL WIDTH=219></COLGROUP>\n";
echo "	<COLGROUP><COL WIDTH=200><COL WIDTH=200><COL WIDTH=200><COL WIDTH=230></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=155 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=4>Transaction Number</FONT></B></TD>\n";
echo "			<TD WIDTH=173 ALIGN=LEFT><B><FONT SIZE=4>Transaction Type</FONT></B></TD>\n";
echo "			<TD WIDTH=176 ALIGN=LEFT><B><FONT SIZE=4>Transaction Date</FONT></B></TD>\n";
echo "			<TD WIDTH=219 ALIGN=LEFT><B><FONT SIZE=4>Username</FONT></B></TD>\n";
echo "		</TR>\n";

echo "		<TR>\n";
echo "			<TD HEIGHT=17 ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "		</TR>\n";


while ($row = mysql_fetch_assoc($result)) 
   {
       $transactionnumber=$row['transactionnumber'];
       $transactiontype=$row['transactiontype'];
       $transactiondate=$row['transactiondate'];
       $username=$row['username'];

       echo "<TR>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./donordsply.php?dnum=$dnum&logtable=1&transactionnumber=$transactionnumber\">$transactionnumber</a></FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$transactiontype</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$transactiondate</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$username</FONT></TD>\n";
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
       echo "</TR>\n";
    }


echo "	</TBODY>\n";
echo "</TABLE>\n";
echo "\n";



   mysql_free_result($result); 



mysql_close($con);


echo "</br>";
echo "</br>";



?> 


<P><a href="./donorsearch.php">Donor Search</a></P>
<P><a href="./donormenu.php">Donor Menu</a></P>
</br>


</BODY>
</HTML>
