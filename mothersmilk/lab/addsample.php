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



echo "</br>"; 
echo "<p><b>Create New Blue Pool</b></p>"; 
echo "</br>"; 


echo "<form action=\"bpoolcnfrm.php?dnum=$dnum&ctype=2\" method=\"post\">\n";
echo "<br>";

echo "Blue Pool Number:&nbsp;&nbsp; <input type=\"text\" name=\"bpoolnumber\" size=\"9\" maxlength=\"9\" value=\"$bpoolnumber\">\n"; 


// Populate month - day - year

$bpmm = (idate("m"));
$bpdd = (idate("d"));
$bpyy = (idate("Y"));


echo "&nbsp;&nbsp;&nbsp;Blue Pool Date:&nbsp;&nbsp";
echo "<input type=\"int\" name=\"bpmm\" size=\"2\" maxlength=\"2\" value=\"$bpmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"bpdd\" size=\"2\" maxlength=\"2\" value=\"$bpdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"bpyr\" size=\"4\" maxlength=\"4\" value=\"$bpyy\">\n";
echo "&nbsp;(mm-dd-yyyy)\n";

echo "</br>\n";
echo "</br>\n";

echo "Blue Pool Designation:&nbsp;&nbsp;&nbsp;";

echo "<select name=\"bpooldesignation\">\n";
echo "<option value=\"Dairy Free\">Dairy Free</option>\n";
echo "<option value=\"Full Term\">Full Term</option>\n";
echo "<option value=\"Pre Term\">Pre Term</option>\n";
echo "<option value=\"Research Only\">Research Only</option>\n";
echo "<option value=\"Unusable\">Unusable</option>\n";
echo "<option value=\"Quarantined\">Quarantined</option>\n";
echo "<option value=\"Hospital Grade\">Hospital Grade</option>\n";
echo "<option value=\"Outpatient\">Outpatient</option>\n";
echo "</select>\n";

echo "</br>\n";
echo "</br>\n";
echo "Blue Pool Refrigeration Number:&nbsp;&nbsp; <input type=\"text\" name=\"bpoolrnumber\" size=\"9\" maxlength=\"9\" value=\"$bpoolrnumber\">\n"; 
echo "</br>\n";
echo "</br>\n";

// displays donors within the blue pool 
/*
// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);

$sql = "select donornumberl, donorstat from labtable
where bpoolnumber = '$bpoolnumber'";

// echo $sql;
// echo "</br>";

$resultd = mysql_query($sql, $con); 

if (!$resultd) 
    {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }

*/

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


echo "Package Number:&nbsp;&nbsp; <input type=\"text\" name=\"bpooldesignation\" size=\"9\" maxlength=\"9\" value=\"$packagenumber\">\n"; 

// echo "&nbsp;&nbsp;&nbsp;&nbsp;Date Received:&nbsp;&nbsp; <input type=\"text\" name=\"receivedate\" size=\"9\" maxlength=\"9\" value=\"$receivedate\">\n"; 


echo "&nbsp;&nbsp;&nbsp;&nbsp;Date Received:&nbsp;&nbsp";
echo "<input type=\"int\" name=\"rmm\" size=\"2\" maxlength=\"2\" value=\"$rmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"rdd\" size=\"2\" maxlength=\"2\" value=\"$rdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"ryr\" size=\"4\" maxlength=\"4\" value=\"$ryy\">\n";
echo "&nbsp;(mm-dd-yyyy)\n";



echo "</br>\n";
echo "</br>\n";


echo "Package Designation:&nbsp;&nbsp;&nbsp;";
echo "<select name=\"bpooldesignation\">\n";
echo "<option value=\"Dairy Free\">Dairy Free</option>\n";
echo "<option value=\"Full Term\">Full Term</option>\n";
echo "<option value=\"Pre Term\">Pre Term</option>\n";
echo "<option value=\"Research Only\">Research Only</option>\n";
echo "<option value=\"Unusable\">Unusable</option>\n";
echo "<option value=\"Quarantined\">Quarantined</option>\n";
echo "</select>\n";

echo "</br>";

echo "</br>";

echo "</br>\n";
echo "<input type=\"submit\" value=\"Add Blue Pool\">\n";


echo "</br>\n";
echo "</form>\n";


echo "</br>"; 

echo "<p><a href=\"./labmenu.php\">Lab Menu</a></p>\n";

echo "</br>"; 



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
