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
<style>
body
{
background-color:yellow;
}
h1
{
color:orange;
text-align:center;
}
p
{
font-family:"Times New Roman";
font-size:20px;
}
</style>

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php

// Determines if post is correct.  Will be comment out later! 
//  **********************************************************

// *************************************************************

// Set initial username and password within session and therefore does not get lost
// when going from one page to the next 

if (!$_SESSION['fconnect'])
   {
	$_SESSION['uname'] = $_POST["uname"]; 
	$_SESSION['pwd'] = $_POST["pwd"];
        $_SESSION['fconnect']=1;

   if ($_SESSION['uname']=='donor1')
      {
	$_SESSION['urights'] = 8; 
      }
   else
      {
	$_SESSION['urights'] = 5; 
      } 


   } 

Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 
echo "<b>"; 
echo "Welcome:  "; 
echo "<b>"; 
echo $_SESSION['uname'];
echo "</b>"; 
echo "</br>"; 
   echo "</br>";
   echo "<p><a href=\"./dbclose.php\">Log Out</a></p>\n";

/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

if (!$con)
  {
  echo "</br>";
  echo "</br>";
  echo "</br>";
  echo "Unable to connect to database"; 

  echo "</br>"; 
 
  echo "invalid username or password"; 

  echo "</br>"; 

  echo "<p><a href=\"./dblogon.html\">Return to Database Login</a></p>\n";


//  die('Could not connect: ' . mysql_error());
  }

else
  {

   echo "</br>";
   echo "</br>";
   
//   echo "<h1>Welcome to United Way Database!</h1>\n";

   echo  "<P><FONT SIZE=14><B>Welcome to the Mothers Milk Database</B></FONT></P>";

   echo "</br>";
   echo "</br>";
   echo "</br>";

   echo "<P><a href=\"./donor/donormenu.html\">Donor Menu</a></P>\n";
   echo "</br>";
   echo "</br>";
   echo "<P><a href=\"./recv/receivingmenu.html\">Receiving Menu</a></P>\n";
   echo "</br>";
   echo "</br>";
   echo "<P><a href=\"./lab/labmenu.html\">Lab Menu</a></P>\n";
   echo "</br>";
   echo "</br>";
   echo "<P><a href=\"./receipientmenu.html\">Receipient Menu</a></P>\n";
   echo "</br>";
   echo "</br>";
   echo "<P><a href=\"./accountingmenu.html\">Accounting Menu</a></P>\n";
   echo "</br>";
   echo "</br>";
   echo "</br>";
   echo "<P>Seen only by root. Used to enter technicians</P>\n";
   echo "</br>";
   echo "</br>";
   echo "</br>";




   echo "</br>";
   echo "</br>";
   echo "</br>";
   echo "<p><a href=\"./dbclose.php\">Log Out</a></p>\n";
  }


?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
