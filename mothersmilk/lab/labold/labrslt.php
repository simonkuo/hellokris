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

$donornumber = $_POST["donornumber"];
$bottlenumber = $_POST["bottlenumber"];
$bluepoolnumber = $_POST["bluepoolnumber"];

$fbplmm = $_POST["fbplmm"];
$fbpldd = $_POST["fbpldd"];
$fbplyr = $_POST["fbplyr"];

$tbplmm = $_POST["tbplmm"];
$tbpldd = $_POST["tbpldd"];
$tbplyr = $_POST["tbplyr"];


// Construct Date
$fdate = $fbplyr . "-" . $fbplmm . "-" . $fbpldd;
$tdate = $tbplyr . "-" . $tbplmm . "-" . $tbpldd;


echo "<menu>\n";
echo "       <form action=\"./labmenu.php\" style=\"display:inline\">\n";
echo "  <li>\n";
echo "          <input type=\"submit\" id=\"mysubmit\" value=\"Lab Menu\">\n";
echo "  </li>\n";
echo "       </form>\n";
echo "  <li>\n";
echo "       <form action=\"./labsearch.php\" style=\"display:inline\">\n";
echo "          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" id=\"mysubmit\" value=\"Search\">\n";
echo "       </form>\n";
echo "  </li>\n";

$urights = $_SESSION['urights'];

echo "</menu>\n";
echo "\n";


/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);
/*
   echo "<br>";   

   echo  "<P><FONT SIZE=4><B>Search Results</B></FONT></P>";

   echo "</br>";
*/
    mysql_select_db('milkdb', $con);

   if (!$donornumber) 
      {
       $donornumber = '77777'; 
//       exit;
      }


   if (!$bottlenumber) {
       $bottlenumber = 'none'; 
//       exit;
       }


   if (!$bluepoolnumber) {
       $bluepoolnumber = 'none'; 
//       exit;
       }

/*
echo "<br>";
echo "bottlenumber: " . $bottlenumber;
echo "<br>";
echo "donornumber " . $donornumber;
echo "<br>";
echo "bluepoolnumber " . $bluepoolnumber;
echo "<br>";
echo "bluepoolnum " . $bluepoolnum;
echo "<br>";
echo "fdate: " . $fdate;
echo "<br>";
echo "tdate: " . $tdate;
echo "<br>";
*/

if (($bottlenumber == 'none') and ($bluepoolnumber == 'none') and ($donornumber == '77777') and ($fdate == '--'))
   {
       $sql = "SELECT donornuml, apstbtlid, bpoolnumber, bpooldate FROM labtbl order by dnrrcrdnuml";
   }
else
   {
       $sql = "SELECT donornuml, apstbtlid, bpoolnumber, bpooldate  FROM labtbl where apstbtlid = '$bottlenumber' or bpoolnumber =  '$bluepoolnumber' or donornuml = '$donornumber' or bpooldate between '$fdate' and '$tdate' order by dnrrcrdnuml";
   }


 echo $sql;
 echo "</br>";

   $result = mysql_query($sql, $con); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}


echo "<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>\n";
echo "	<COLGROUP><COL WIDTH=255><COL WIDTH=273><COL WIDTH=276><COL WIDTH=219></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=155 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=5>Donor Number</FONT></B></TD>\n";
echo "			<TD WIDTH=173 ALIGN=LEFT><B><FONT SIZE=5>Bottle Number</FONT></B></TD>\n";
echo "			<TD WIDTH=176 ALIGN=LEFT><B><FONT SIZE=5>Blue Pool Number</FONT></B></TD>\n";
echo "			<TD WIDTH=219 ALIGN=LEFT><B><FONT SIZE=5>Blue Pool Date</FONT></B></TD>\n";
echo "		</TR>\n";
echo "		<TR>\n";
echo "			<TD HEIGHT=17 ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "		</TR>\n";


while ($row = mysql_fetch_assoc($result)) 
   {
       $bpooldate=$row['bpooldate'];
       $bottlenumber=$row['apstbtlid'];
       $bpoolnumber=$row['bpoolnumber'];
       $donornumber=$row['donornuml'];

       echo "<TR>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./labdsply.php?dnum=$donornumber\"> '$donornumber'</a></FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$bottlenumber</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$bpoolnumber</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$bpooldate</FONT></TD>\n";
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




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
