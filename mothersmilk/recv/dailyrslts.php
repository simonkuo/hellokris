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


$urights = $_SESSION['urights'];

$determinechoose = $_POST["determinechoose"];

echo "determinechoose:" . $determinechoose;

echo "<br>";   

echo  "<P><FONT SIZE=4><B>Search Results</B></FONT></P>";

echo "</br>";



/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);


$sql = "SELECT screenertable.donornumber, screenertable.firstname, screenertable.lastname, screenertable.organization, screenertable.determinechoose from screenertable  inner join receivertable on screenertable.donornumber = receivertable.donornumberr where screenertable.determinechoose = '$determinechoose' and screenertable.processflag = 'Y' group by screenertable.donornumber"; 

echo $sql;
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
echo "	<COLGROUP><COL WIDTH=180><COL WIDTH=180><COL WIDTH=120><COL WIDTH=30><COL WIDTH=50></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=155 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=4>Donor Number</FONT></B></TD>\n";
echo "			<TD WIDTH=173 ALIGN=LEFT><B><FONT SIZE=4>First Name</FONT></B></TD>\n";
echo "			<TD WIDTH=176 ALIGN=LEFT><B><FONT SIZE=4>Last Name</FONT></B></TD>\n";
echo "			<TD WIDTH=219 ALIGN=LEFT><B><FONT SIZE=4>Type</FONT></B></TD>\n";
echo "			<TD WIDTH=219 ALIGN=LEFT><B><FONT SIZE=4>Status</FONT></B></TD>\n";
echo "		</TR>\n";

echo "		<TR>\n";
echo "			<TD HEIGHT=17 ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "		</TR>\n";


while ($row = mysql_fetch_assoc($result)) 
   {
       $donornum=$row['donornumber'];
       $fname=$row['firstname'];
       $lname=$row['lastname'];
       $organization=$row['organization'];
       $determinechoose=$row['determinechoose'];


       echo "<TR>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./dailypackagesearch.php?dnum=$donornum&determinechoose=$determinechoose\"> $donornum</a></FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$fname</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$lname</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$organization</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$determinechoose</FONT></TD>\n";
       echo "</TR>\n";
   
       $rec = 1;   /* triggers when records are found  */
   }


if (!$rec) 
   {
       echo "<TR>\n";
       echo "<TD HEIGHT=17 ALIGN=LEFT><FONT SIZE=4>No Packages Found</FONT></TD>\n";
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

?>

<P><FONT SIZE=4><B>Click on link to process package</B></FONT></P>

</br>

<P><a href="./dailysearch.php">Daily Search</a></P>

<P><a href="./receivingmenu.php">Receiving Menu</a></P>
</br>


</BODY>
</HTML>
