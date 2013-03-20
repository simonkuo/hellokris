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

// Updated 1/18/2013




$dnum = $_GET["dnum"];

echo "<br>";

//  Connect to Data Base  

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);

if (!mysql_select_db('milk_db', $con)) 
   {
   echo 'Could not select database';
   exit;
   }




$pkgnumoncs = $_POST["pkgnumoncs"];
$rmm = $_POST["rmm"];
$rdd = $_POST["rdd"];
$ryy = $_POST["ryy"];
$cmm = $_POST["cmm"];
$cdd = $_POST["cdd"];
$cyy = $_POST["cyy"];
$pkgnum = $_POST["pkgnum"];
$rdate = $ryy . "-" . $rmm . "-" . $rdd;
$cdate = $cyy . "-" . $cmm . "-" . $cdd;

// $ctype determines if the record is added or edited

$ctype = $_GET["ctype"];

if ($ctype==1)
   {
      echo  "<P><FONT SIZE=5><B>Package Edited</B></FONT></P>";
   }
else
   {
      echo  "<P><FONT SIZE=5><B>Package Added</B></FONT></P>";
      $dnum = $_POST["donornumber"];
   }
echo "</br>"; 



echo "</br>"; 
echo "Donor number:&nbsp;&nbsp;" . "<b>" . $dnum . "</b>"; 
echo "</br>"; 
echo "</br>"; 

echo "Date Received:&nbsp;&nbsp;";
 
echo "<b>$rmm</b>" . "-" . "<b>$rdd</b>" . "-" . "<b>$ryy</b>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";

echo "</br>"; 
echo "</br>"; 

echo "Date Created:&nbsp;&nbsp;&nbsp; ";
 
echo "<b>$cmm</b>" . "-" . "<b>$cdd</b>" . "-" . "<b>$cyy</b>" .  "&nbsp;&nbsp;&nbsp;" . "(mm-dd-yyyy)";

echo "</br>"; 
echo "</br>"; 


echo "Package number:&nbsp;&nbsp;&nbsp;&nbsp;" . "<b>$pkgnum</b>"; 
echo "</br>"; 

echo "</br>"; 

echo "Package number of ounces:&nbsp;&nbsp;&nbsp;&nbsp;" . "<b>$pkgnumoncs</b>"; 
echo "</br>"; 
echo "</br>"; 
 
// Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 


// determines whether dreceiver package is being edited or added



if ($ctype==1)
   {
   //Receiver Package is being edited
   $sql = "update receivertable set receivedate='$rdate', createdate='$cdate', packagenumber='$pkgnum', pkgnumoncs='$pkgnumoncs' WHERE donornumberr = '$dnum'";
   $result = mysql_query($sql, $con);

   if (!$result) 
        {
         echo "DB Error, could not query the database\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        } 

   }

else
   {

      //Receiver Package is being added

       $sql = "insert into receivertable (donornumberr, receivedate, createdate, packagenumber, pkgnumoncs) values ($dnum, '$rdate', '$cdate', '$pkgnum', '$pkgnumoncs')";


        $result = mysql_query($sql, $con);

        if (!$result) 
            {
               echo "DB Error, could not query the database\n";
               echo 'MySQL Error: ' . mysql_error();
               exit;
            } 

   }



echo "<br>";
//echo $sql;
echo "<br>";


mysql_close($con);

echo "</br>";
echo "</br>";
echo "<p><a href=\"./receivingmenu.php\">Return to Receiving Menu</a></p>\n";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
