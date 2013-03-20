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

$donornum = $_POST["donornumber"];
$lastname = $_POST["lastname"];

$fdnrapmm = $_POST["fdnrapmm"];
$fdnrapdd = $_POST["fdnrapdd"];
$fdnrapyr = $_POST["fdnrapyr"];

$tdnrapmm = $_POST["tdnrapmm"];
$tdnrapdd = $_POST["tdnrapdd"];
$tdnrapyr = $_POST["tdnrapyr"];



// Construct Date
$fdate = $fdnrapyr . "-" . $fdnrapmm . "-" . $fdnrapdd;
$tdate = $tdnrapyr . "-" . $tdnrapmm . "-" . $tdnrapdd;

$urights = $_SESSION['urights'];



/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

   echo "<br>";   

   echo  "<P><FONT SIZE=4><B>Search Results</B></FONT></P>";

   echo "</br>";

    mysql_select_db('milk_db', $con);

   if (!$donornum) {
       $donornum = 77777; 
//       exit;
       }


   if (!$lastname) {
       $lastname = 'noname'; 
//       exit;
       }


   if (!mysql_select_db('milk_db', $con)) {
       echo 'Could not select database';
       exit;
       }
/*
echo "<br>";
echo "lastname: " . $lastname;
echo "<br>";
echo "donornum" . $donornum;
echo "<br>";
echo "fdate: " . $fdate;
echo "<br>";
*/

if (($lastname == 'noname') and ($donornum == 77777) and ($fdate == '--'))
   {
       $sql   = "SELECT * FROM screenertable order by donornumber";
   }
else
   {
       $sql   = "SELECT * FROM screenertable where lastname =  '$lastname' or donornumber = $donornum or dnrapdate between '$fdate' and '$tdate' order by donornumber";
   }

// echo $sql;
 echo "</br>";

   $result = mysql_query($sql, $con); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}



echo "<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>\n";
// echo "	<COLGROUP><COL WIDTH=255><COL WIDTH=273><COL WIDTH=276><COL WIDTH=219></COLGROUP>\n";
echo "	<COLGROUP><COL WIDTH=200><COL WIDTH=200><COL WIDTH=200><COL WIDTH=230></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=155 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=4>Application Date</FONT></B></TD>\n";
echo "			<TD WIDTH=173 ALIGN=LEFT><B><FONT SIZE=4>First Name</FONT></B></TD>\n";
echo "			<TD WIDTH=176 ALIGN=LEFT><B><FONT SIZE=4>Last Name</FONT></B></TD>\n";
echo "			<TD WIDTH=219 ALIGN=LEFT><B><FONT SIZE=4>Donor Number</FONT></B></TD>\n";
echo "		</TR>\n";
/*
echo "		<TR>\n";
echo "			<TD HEIGHT=17 ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "		</TR>\n";
*/

while ($row = mysql_fetch_assoc($result)) 
   {
       $dnrapdate=$row['dnrapdate'];
       $fname=$row['firstname'];
       $lname=$row['lastname'];
       $donornum=$row['donornumber'];


       echo "<TR>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./donordsply.php?dnum=$donornum\"> $dnrapdate</a></FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$fname</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$lname</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$donornum</FONT></TD>\n";
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

if($urights==1 or $urights==2)
  {
   echo "<P><a href=\"./donoradd.php\">Add Donor</a></P>\n";
  }


?> 


<P><a href="./donorsearch.php">Donor Search</a></P>
<P><a href="./donormenu.php">Donor Menu</a></P>
</br>


</BODY>
</HTML>
