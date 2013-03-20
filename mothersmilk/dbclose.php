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

 echo "</br>"; 

   echo "</br>";
   echo "<P>Closing Sessions!</P>\n";
   echo "</br>";
   echo "</br>";
   session_destroy();
   echo "</br>";

//   Print_r ($_SESSION);
   echo "</br>";
   echo "</br>";
//   echo "<P>Closing Database!</P>\n";
   echo "</br>";
   echo "</br>";

 //  Print_r ($_SESSION);
   echo "</br>";

   mysql_close();


   echo "</br>";
   echo "</br>";
   echo "</br>";
   echo "<p><a href=\"./dblogon.html\">Return to Database logon</a></p>\n";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
