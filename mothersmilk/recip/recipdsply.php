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


$dnum = $_GET["dnum"];


// Search for Donor in table

// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

    mysql_select_db('milkdb', $con);

// $sql   = "SELECT fname, lname, donornum, dnrapdate, bpoolnumber, bpooldate FROM donortbl, labtbl where donornum =  '$dnum'";

$sql   = "SELECT fname, lname, donornum, dnrapdate FROM donortbl where donornum =  '$dnum'";

// $sql   = "SELECT * FROM donortbl where donorfum =  '$dnum'";

//echo $sql;
//echo "</br>";

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


echo "</br>"; 
echo "First Name:  " . "<b>" . $row['fname'] . "</b>"; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Name:  " . "<b>" . $row['lname'] . "</b>"; 
echo "</br>"; 
echo "</br>"; 
echo "Donor number:" . "&nbsp;&nbsp;&nbsp;" . "<b>" . $dnum . "</b>"; 
echo "</br>\n";
echo "Donor Application Date:&nbsp;&nbsp;" . "<b>" . $row['dnrapdate'] . "</b>";
echo "</br>\n";


//$sql   = "SELECT fname, lname, donornum, dnrapdate, bpoolnumber, bpooldate FROM donortbl, labtbl where donornum =  '$dnum'";

 $sql2   = "SELECT * FROM labtbl where donornuml =  '$dnum'";

// $sql   = "SELECT * FROM donortbl where donorfum =  '$dnum'";

//echo $sql;
//echo "</br>";

   $result = mysql_query($sql2, $con); 

   $row = mysql_fetch_assoc($result);



echo "Blue Pool Number:&nbsp;&nbsp;" . "<b>" . $row['bpoolnumber'] . "</b>";
echo "</br>\n";
echo "Blue Pool Date:&nbsp;&nbsp;"  . "<b>" . $row['bpooldate'] . "</b>";
echo "</br>\n";
echo "Batch Number:&nbsp;&nbsp;"  . "<b>" . $row['zip'] . "</b>";
echo "</br>\n";
echo "Bottle Number:&nbsp;&nbsp;"  . "<b>" . $row['apstbtlid'] . "</b>";
echo "</br>\n";
echo "Date Received</br>\n";
echo "</br>\n";


echo "</br>"; 
Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 


 mysql_close($con);


$urights = $_SESSION['urights'];

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










if ($urights==1 or $urights==2)
     {
         echo "<p><a href=\"./labedit.php?dnum=$dnum\">Edit</a></p>\n";
     }

?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
